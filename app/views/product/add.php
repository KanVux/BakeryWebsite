<!-- Add Product Modal -->
<div class="modal fade" id="addProductModal" tabindex="-1" aria-labelledby="addProductModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addProductModalLabel">Thêm Sản Phẩm</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <form action="/admin/add-product" method="POST" enctype="multipart/form-data">
                <div class="modal-body">

                    <!-- Tên sản phẩm -->
                    <div class="mb-3">
                        <label for="product_name" class="form-label">Tên Sản Phẩm</label>
                        <input type="text" class="form-control" id="product_name_add" name="product_name" required
                            placeholder="Nhập tên sản phẩm">
                    </div>

                    <!-- Giá sản phẩm -->
                    <div class="mb-3">
                        <label for="price" class="form-label">Giá</label>
                        <input type="number" class="form-control" id="price_add" name="price" required
                            placeholder="Nhập giá sản phẩm" min="1">
                    </div>

                    <!-- Ảnh sản phẩm -->
                    <div class="mb-3">
                        <label for="product_img" class="form-label">Ảnh Sản Phẩm</label>
                        <input type="file" class="form-control" id="product_img_add" name="product_img" accept="image/*">
                    </div>

                    <!-- Mô tả sản phẩm -->
                    <div class="mb-3">
                        <label for="product_description" class="form-label">Mô tả Sản Phẩm</label>
                        <textarea class="form-control" id="product_description" name="product_description" rows="3"
                            placeholder="Nhập mô tả sản phẩm"></textarea>
                    </div>

                    <!-- Danh mục sản phẩm -->
                    <div class="mb-3">
                        <label for="category_id" class="form-label">Danh mục Sản Phẩm</label>
                        <select class="form-select" id="category_id_add" name="category_id" required>
                            <option value="">Chọn danh mục</option>
                            <!-- Add options dynamically from the database -->
                            <?php foreach ($categories as $category): ?>
                                <option value="<?= $category->category_id ?>"><?= $category->category_name ?></option>
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