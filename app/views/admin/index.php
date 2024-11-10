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
            <?php include ROOTDIR . 'app/views/product/add.php' ?>
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
                            <?php include ROOTDIR . 'app/views/product/edit.php'; ?>
                            <!-- Modal Delete -->
                            <?php include ROOTDIR . 'app/views/product/delete.php'; ?>

                        <?php endforeach; ?>    
                    <?php else: ?>
                        <tr>
                            <td colspan="5" class="text-center">Không có sản phẩm nào</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>

        <!-- Người dùng Tab -->
        <div class="tab-pane fade" id="users" role="tabpanel" aria-labelledby="users-tab">
            <h3 class="text-warning">Danh sách Người dùng</h3>
            <button class="btn btn-success mb-3" data-bs-toggle="modal" data-bs-target="#addUserModal">Thêm Người Dùng</button>
            <?php include ROOTDIR . 'app/views/user/add.php' ?>
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
                    <?php if (isset($users) && is_array($users)): ?>
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
                            <?php include ROOTDIR . 'app/views/user/edit.php'; ?>
                            <!-- Modal Delete -->
                            <?php include ROOTDIR . 'app/views/user/delete.php'; ?>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="5" class="text-center">Không có người dùng nào</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>

        <!-- Danh mục sản phẩm Tab -->
        <div class="tab-pane fade" id="categories" role="tabpanel" aria-labelledby="categories-tab">
            <h3 class="text-warning">Danh mục Loại sản phẩm</h3>
            <button class="btn btn-success mb-3" data-bs-toggle="modal" data-bs-target="#addCategoryModal">Thêm Danh Mục</button>
            <?php include ROOTDIR . 'app/views/category/add.php' ?>
            <table class="table table-striped table-hover">
                <thead class="table-light">
                    <tr>
                        <th>ID</th>
                        <th>Tên danh mục</th>
                        <th>Hành động</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (isset($categories) && is_array($categories)): ?>
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
                            <?php include ROOTDIR . 'app/views/category/edit.php'; ?>
                            <!-- Modal Delete -->
                            <?php include ROOTDIR . 'app/views/category/delete.php'; ?>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="3" class="text-center">Không có danh mục nào</td>
                        </tr>
                    <?php endif; ?>
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