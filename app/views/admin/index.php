<?php $this->layout("layout/admin_layout",['title'=>'Admin Dashboard'])?>
<?php $this->start("page")?>
    <!-- Tab Content -->
    <div   div class="container my-5 bg-light p-5 rounded-3 shadow-sm" style="max-width: 1200px; margin: 0 auto;">
    <h1 class="text-center text-primary mb-4 font-title">Quản lý Dữ liệu - Tiệm Bánh Ngọt</h1>
    
    <!-- Tab Nav -->
    <ul class="nav nav-tabs" id="adminTabs" role="tablist">
        <li class="nav-item" role="presentation">
            <a class="nav-link active" id="product-tab" data-bs-toggle="tab" href="#products" role="tab" aria-controls="products" aria-selected="true">Sản phẩm</a>
        </li>
        <li class="nav-item" role="presentation">
            <a class="nav-link" id="users-tab" data-bs-toggle="tab" href="#users" role="tab" aria-controls="users" aria-selected="false">Người dùng</a>
        </li>
        <li class="nav-item" role="presentation">
            <a class="nav-link" id="categories-tab" data-bs-toggle="tab" href="#categories" role="tab" aria-controls="categories" aria-selected="false">Danh mục sản phẩm</a>
        </li>
    </ul>

    <!-- Tab Content -->
    <div class="tab-content mt-4" id="adminTabsContent">

        <!-- Sản phẩm Tab -->
        <div class="tab-pane fade show active" id="products" role="tabpanel" aria-labelledby="product-tab">
            <h3 class="text-warning">Danh mục Sản phẩm</h3>
            <table class="table table-striped table-hover">
                <thead class="table-light">
                    <tr>
                        <th>ID</th>
                        <th>Ảnh</th> <!-- Cột ảnh -->
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
                                <!-- Hiển thị ảnh sản phẩm -->
                                <img src="/uploads/<?php echo $product->product_img; ?>" alt="Ảnh sản phẩm" width="50" height="50" class="img-fluid">
                            </td>
                            <td><?php echo $product->product_name; ?></td>
                            <td><?php echo number_format($product->price); ?> VND</td>
                            <td>
                                <a href="/admin/edit/<?php echo $product->product_id; ?>" class="btn btn-warning btn-sm">
                                    <i class="bi bi-pencil"></i> Sửa
                                </a>
                                <a href="/admin/delete/<?php echo $product->product_id; ?>" class="btn btn-danger btn-sm">
                                    <i class="bi bi-trash"></i> Xóa
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>

        <!-- Các tab còn lại cho người dùng và danh mục sản phẩm -->
        <!-- Tab Người Dùng -->
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
                                <a href="/admin/edit/<?php echo $user->id; ?>" class="btn btn-warning btn-sm">
                                    <i class="bi bi-pencil"></i> Sửa
                                </a>
                                <a href="/admin/delete/<?php echo $user->id; ?>" class="btn btn-danger btn-sm">
                                    <i class="bi bi-trash"></i> Xóa
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
       <!-- Tab Danh Mục Sản Phẩm -->
        <div class="tab-pane fade" id="categories" role="tabpanel" aria-labelledby="categories-tab">
            <h3 class="text-warning">Danh mục Sản phẩm</h3>
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
                                <a href="/admin/edit/<?php echo $category->category_id; ?>" class="btn btn-warning btn-sm">
                                    <i class="bi bi-pencil"></i> Sửa
                                </a>
                                <a href="/admin/delete/<?php echo $category->category_id; ?>" class="btn btn-danger btn-sm">
                                    <i class="bi bi-trash"></i> Xóa
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>


<!-- Thêm Bootstrap Icons -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

<!-- Thêm Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>


<!-- Thêm Bootstrap Icons -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

<!-- Thêm Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>


<!-- Thêm Bootstrap Icons -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

<?php $this->stop()?>
