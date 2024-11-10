<?php $this->layout("layout/admin_layout", ['title' => 'Admin Dashboard']) ?>
<?php $this->start("page") ?>

<!-- Tab Content -->
<div class="container my-5 bg-light p-5 rounded-3 shadow-sm" style="max-width: 1200px; margin: 0 auto;">
    <h1 class="text-center text-primary mb-4 font-title">Quản lý Dữ liệu - Tiệm Bánh Ngọt</h1>

    <!-- Tab Nav -->
    <ul class="nav nav-tabs" id="adminTabs" role="tablist">
        <li class="nav-item" role="presentation">
            <a class="nav-link active" id="product-tab" data-bs-toggle="tab" href="#products" role="tab"
                aria-controls="products" aria-selected="true">Sản phẩm</a>
        </li>
        <li class="nav-item" role="presentation">
            <a class="nav-link" id="users-tab" data-bs-toggle="tab" href="#users" role="tab" aria-controls="users"
                aria-selected="false">Người dùng</a>
        </li>
        <li class="nav-item" role="presentation">
            <a class="nav-link" id="categories-tab" data-bs-toggle="tab" href="#categories" role="tab"
                aria-controls="categories" aria-selected="false">Danh mục sản phẩm</a>
        </li>
    </ul>

    <!-- Tab Content -->
    <div class="tab-content mt-4" id="adminTabsContent">

        <!-- Sản phẩm Tab -->
        <div class="tab-pane fade show active" id="products" role="tabpanel" aria-labelledby="product-tab">
            <h3 class="text-warning">Danh mục Sản phẩm</h3>
            <button class="btn btn-success mb-3" data-bs-toggle="modal" data-bs-target="#addProductModal">Thêm Sản
                Phẩm</button>
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
                    <?php foreach ($products as $product): ?>
                        <tr>
                            <td><?php echo $product->product_id; ?></td>
                            <td>
                                <img src="/uploads/<?php echo $product->product_img; ?>" alt="Ảnh sản phẩm" width="50"
                                    height="50" class="img-thumbnail">
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
                </tbody>
            </table>
        </div>

        <!-- Các tab còn lại cho người dùng và danh mục sản phẩm -->
        <div class="tab-pane fade" id="users" role="tabpanel" aria-labelledby="users-tab">
            <h3 class="text-warning">Danh sách Người dùng</h3>
            <table class="table table-striped table-hover">
                <thead class="table-light">
                    <tr>
                        <th>ID</th>
                        <th>Tên người dùng</th>
                        <th>Email</th>
                        <th>Quyền</th>
                        <th>Hành động</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($users as $user): ?>
                        <tr>
                            <td><?php echo $user->id; ?></td>
                            <td><?php echo $user->name; ?></td>
                            <td><?php echo $user->email; ?></td>
                            <td>
                                <?php echo $user->acc_type == 1 ? 'Admin' : 'Người dùng'; ?>
                            </td>
                            <td>
                                <button class="btn btn-warning btn-sm" data-bs-toggle="modal"
                                    data-bs-target="#editUserModal<?php echo $user->id; ?>">
                                    <i class="bi bi-pencil"></i> Sửa
                                </button>
                                <button class="btn btn-danger btn-sm" data-bs-toggle="modal"
                                    data-bs-target="#deleteUserModal<?php echo $user->id; ?>">
                                    <i class="bi bi-trash"></i> Xóa
                                </button>
                            </td>
                        </tr>

                        <!-- Modal Edit -->
                         
                        <!-- Edit Product Modal -->
                        <div class="modal fade" id="editProductModal<?= $product->product_id ?>" tabindex="-1"
                            aria-labelledby="editProductModalLabel<?= $product->product_id ?>" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="editProductModalLabel<?= $product->product_id ?>">Chỉnh sửa Sản Phẩm</h5>
                                        <button type="button" class="btn-close" data-bsdismiss="modal" aria-label="Close"></button>
                                    </div>
                        
                                    <form action="/admin/edit-product/<?= $product->product_id ?>" method="POST" enctype="multipart/form-data">
                                        <div class="modal-body">
                        
                                            <!-- Tên sản phẩm -->
                                            <div class="mb-3">
                                                <label for="product_name_<?= $product->product_id ?>" class="form-label">Tên Sản Phẩm</label>
                                                <input type="text" class="form-control" id="product_name_<?= $product->product_id ?>"
                                                    name="product_name" value="<?= $product->product_name ?>" required>
                                            </div>
                        
                                            <!-- Giá sản phẩm -->
                                            <div class="mb-3">
                                                <label for="price_<?= $product->product_id ?>" class="form-label">Giá</label>
                                                <input type="number" class="form-control" id="price_<?= $product->product_id ?>" name="price"
                                                    value="<?= $product->price ?>" required min="1">
                                            </div>
                        
                                            <!-- Ảnh sản phẩm -->
                                            <div class="mb-3">
                                                <label for="product_img_<?= $product->product_id ?>" class="form-label">Ảnh Sản Phẩm</label>
                                                <input type="file" class="form-control" id="product_img_<?= $product->product_id ?>"
                                                    name="product_img" accept="image/*">
                                                <img src="/uploads/<?= $product->product_img ?>" alt="Product Image" width="100" class="mt-2">
                                            </div>
                        
                                            <!-- Mô tả sản phẩm -->
                                            <div class="mb-3">
                                                <label for="product_description_<?= $product->product_id ?>" class="form-label">Mô tả Sản
                                                    Phẩm</label>
                                                <textarea class="form-control" id="product_description_<?= $product->product_id ?>"
                                                    name="product_description" rows="3"><?= $product->product_description ?></textarea>
                                            </div>
                        
                                            <!-- Danh mục sản phẩm -->
                                            <div class="mb-3">
                                                <label for="category_id_<?= $product->product_id ?>" class="form-label">Danh mục Sản
                                                    Phẩm</label>
                                                <select class="form-select" id="category_id_<?= $product->product_id ?>" name="category_id"
                                                    required>
                                                    <option value="">Chọn danh mục</option>
                                                    <?php foreach ($categories as $category): ?>
                                                        <option value="<?= $category->category_id ?>"
                                                            <?= $category->category_id == $product->category_id ? 'selected' : '' ?>>
                                                            <?= $category->category_name ?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>
                        
                                        </div>
                        
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                                            <button type="submit" class="btn btn-primary">Lưu</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- Modal Delete -->
                        <?php require_once ROOTDIR . 'app/views/user/delete.php'; ?>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>

        <div class="tab-pane fade" id="categories" role="tabpanel" aria-labelledby="categories-tab">
            <h3 class="text-warning">Danh mục Loại sản phẩm</h3>
            <table class="table table-striped table-hover">
                <thead class="table-light">
                    <tr>
                        <th>ID</th>
                        <th>Tên danh mục</th>
                        <th>Hành động</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($categories as $category): ?>
                        <tr>
                            <td><?php echo $category->category_id; ?></td>
                            <td><?php echo $category->category_name; ?></td>
                            <td>
                                <button class="btn btn-warning btn-sm" data-bs-toggle="modal"
                                    data-bs-target="#editCategoryModal<?php echo $category->category_id; ?>">
                                    <i class="bi bi-pencil"></i> Sửa
                                </button>
                                <button class="btn btn-danger btn-sm" data-bs-toggle="modal"
                                    data-bs-target="#deleteCategoryModal<?php echo $category->category_id; ?>">
                                    <i class="bi bi-trash"></i> Xóa
                                </button>
                            </td>
                        </tr>

                        <!-- Modal Edit -->
                        <?php require_once ROOTDIR . 'app/views/category/edit.php'; ?>
                        <!-- Modal Delete -->
                        <?php require_once ROOTDIR . 'app/views/category/delete.php'; ?>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>

    </div>
</div>
<?php if (isset($_SESSION['error'])): ?>
    <div class="alert alert-danger">
        <?php echo $_SESSION['error']; ?>
    </div>
    <?php unset($_SESSION['error']); ?>
<?php endif; ?>

<?php $this->stop() ?>