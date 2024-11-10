<?php
namespace App\Controllers;

use App\Models\Product;
use App\Controllers\Controller;

class CartController extends Controller
{
    public function __construct()
    {
        parent::__construct();

        // Kiểm tra session đã được khởi tạo chưa
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        // Kiểm tra xem người dùng đã đăng nhập chưa
        if (isset($_SESSION['user_id'])) {
            // Nếu chưa khởi tạo session cho giỏ hàng, khởi tạo một mảng rỗng
            if (!isset($_SESSION['user_id'])) {
                $_SESSION['user_id'] = [];
            }
        } else {
            // Nếu chưa đăng nhập, khởi tạo session cho giỏ hàng
            $_SESSION['cart'] = [];
        }
    }


    // Thêm sản phẩm vào giỏ hàng
    public function add($productId, $quantity = 1)
    {
        // Kiểm tra nếu người dùng đã đăng nhập
        if (isset($_SESSION['user_id'])) {
            $product = new Product(PDO());
            $product->where('product_id', $productId);

            // Kiểm tra nếu sản phẩm hợp lệ
            if ($product->product_id !== -1) {
                if (isset($_SESSION['cart'][$productId])) {
                    $_SESSION['cart'][$productId]['quantity'] += $quantity;
                } else {
                    $_SESSION['cart'][$productId] = [
                        'product' => $product->toArray(),
                        'quantity' => $quantity
                    ];
                }
            }
        }

        redirect('/cart');
    }

    // Xóa sản phẩm khỏi giỏ hàng
    public function remove($productId)
    {
        if (isset($_SESSION['cart'][$productId])) {
            unset($_SESSION['cart'][$productId]);
        }
        redirect('/cart');
    }

    // Hiển thị giỏ hàng
    public function view()
    {
        $title = 'Shopping Cart';
        $total = $this->calculateTotal();
        $this->renderPage('cart/index', [
            'cart' => $_SESSION['cart'],
            'total' => $total,
            'title' => $title
        ]);
    }

    // Xóa toàn bộ giỏ hàng
    public function clear()
    {
        if (isset($_SESSION['user_id'])) {
            $_SESSION['cart'] = [];
        }
        redirect('/cart');
    }

    // Tính tổng giá trị giỏ hàng
    public function calculateTotal()
    {
        $total = 0;
        if (isset($_SESSION['cart'])) {
            foreach ($_SESSION['cart'] as $item) {
                $total += $item['product']['price'] * $item['quantity'];
            }
        }
        return $total;
    }

    // Cập nhật số lượng sản phẩm trong giỏ hàng
    public function update($productId)
    {
        // Kiểm tra nếu người dùng đã đăng nhập
        if (isset($_SESSION['user_id'])) {
            // Lấy giá trị quantity từ POST
            $quantity = $_POST['quantity'] ?? 1;

            // Đảm bảo số lượng không nhỏ hơn 1
            if ($quantity < 1) {
                $quantity = 1;
            }

            // Kiểm tra nếu sản phẩm có trong giỏ hàng và cập nhật số lượng
            if (isset($_SESSION['cart'][$productId])) {
                $_SESSION['cart'][$productId]['quantity'] = $quantity;
            }

            // Tính tổng giá trị giỏ hàng
            $totalPrice = 0;
            foreach ($_SESSION['cart'] as $item) {
                $totalPrice += $item['product']['price'] * $item['quantity'];
            }

            // Trả về kết quả dưới dạng JSON (bao gồm tổng tiền và tổng giá trị giỏ hàng)
            echo json_encode([
                'success' => true,
                'totalPrice' => number_format($totalPrice),
                'totalAmount' => number_format($totalPrice)
            ]);
            exit;
        }
    }
}
