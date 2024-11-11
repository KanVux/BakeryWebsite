<!-- Edit Product Modal -->
<div class="modal fade" id="editProductModal<?= $product->product_id ?>" tabindex="-1" aria-labelledby="editProductModalLabel<?= $product->product_id ?>" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editProductModalLabel<?= $product->product_id ?>">Chỉnh sửa Sản Phẩm</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>


            <form action="/admin/edit-product/<?= $product->product_id ?>" method="POST" enctype="multipart/form-data">
                <div class="modal-body">

                    <!-- Tên sản phẩm -->
                    <div class="mb-3">
                        <label for="product_name_<?= $product->product_id ?>" class="form-label">Tên Sản Phẩm</label>
                        <input type="text" class="form-control" id="product_name_<?= $product->product_id ?>" name="product_name" value="<?= $product->product_name ?>" required>
                    </div>

                    <!-- Giá sản phẩm -->
                    <div class="mb-3">
                        <label for="price_<?= $product->product_id ?>" class="form-label">Giá</label>
                        <input type="number" class="form-control" id="price_<?= $product->product_id ?>" name="price" value="<?= $product->price ?>" required min="1">
                    </div>

                    <!-- Ảnh sản phẩm -->
                    <div class="mb-3">
                        <label for="product_img_<?= $product->product_id ?>" class="form-label">Ảnh Sản Phẩm</label>
                        <input type="file" class="form-control" id="product_img_<?= $product->product_id ?>" name="product_img" accept="image/*">
                        <img src="/uploads/<?= $product->product_img ?>" alt="Product Image" width="100" class="mt-2">
                    </div>

                    <!-- Mô tả sản phẩm -->
                    <div class="mb-3">
                        <label for="product_description_<?= $product->product_id ?>" class="form-label">Mô tả Sản Phẩm</label>
                        <textarea class="form-control" id="product_description_<?= $product->product_id ?>" name="product_description" rows="3"><?= $product->product_description ?></textarea>
                    </div>

                    <!-- Danh mục sản phẩm -->
                    <div class="mb-3">
                        <label for="category_id_<?= $product->product_id ?>" class="form-label">Danh mục Sản Phẩm</label>
                        <select class="form-select" id="category_id_<?= $product->product_id ?>" name="category_id" required>
                            <option value="">Chọn danh mục</option>
                            <?php foreach ($categories as $category): ?>
                                <option value="<?= $category->category_id ?>" <?= $category->category_id == $product->category_id ? 'selected' : '' ?>><?= $category->category_name ?></option>
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