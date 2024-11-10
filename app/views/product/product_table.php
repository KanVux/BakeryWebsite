<h3 class="text-warning">Danh mục Sản phẩm</h3>
<button class="btn btn-success mb-3" data-bs-toggle="modal" data-bs-target="#addProductModal">Thêm Sản Phẩm</button>
<?php require_once ROOTDIR . 'app/views/product/add.php' ?>
<table class="table table-striped table-hover">
    <thead class="table-light">
        <tr>
            <th>ID</th>
            <th>Ảnh</th>
            <th>Tên sản phẩm</th>
            <th>Giá</th>
            <th>Hành động</th>
        </tr>
    </thead>
    <tbody>
        <?php if (isset($products) && is_array($products)): ?>
            <?php foreach ($products as $product): ?>
                <tr>
                    <td><?php echo $product->product_id; ?></td>
                    <td>
                        <img src="/uploads/<?php echo $product->product_img; ?>" alt="Ảnh sản phẩm" width="50" height="50"
                            class="img-thumbnail">
                    </td>
                    <td><?php echo $product->product_name; ?></td>
                    <td><?php echo number_format($product->price); ?> VND</td>
                    <td>
                        <button class="btn btn-warning btn-sm" data-bs-toggle="modal"
                            data-bs-target="#editProductModal<?php echo $product->product_id; ?>">
                            <i class="bi bi-pencil"></i> Sửa
                        </button>
                        <button class="btn btn-danger btn-sm" data-bs-toggle="modal"
                            data-bs-target="#deleteProductModal<?php echo $product->product_id; ?>">
                            <i class="bi bi-trash"></i> Xóa
                        </button>
                    </td>
                </tr>

                <!-- Modal Edit -->
                <?php require_once ROOTDIR . 'app/views/product/edit.php'; ?>
                <!-- Modal Delete -->
                <?php require_once ROOTDIR . 'app/views/product/delete.php'; ?>
            <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td colspan="5" class="text-center">Không có sản phẩm nào</td>
            </tr>
        <?php endif; ?>
    </tbody>
</table>