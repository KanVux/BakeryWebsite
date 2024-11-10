<!-- Edit Category Modal -->
<div class="modal fade" id="editCategoryModal<?= $category->category_id ?>" tabindex="-1"
    aria-labelledby="editCategoryModalLabel<?= $category->category_id ?>" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editCategoryModalLabel<?= $category->category_id ?>">Chỉnh Sửa Danh Mục</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="/admin/edit-category/<?= $category->category_id ?>" method="POST">
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="category_name_<?= $category->category_id ?>" class="form-label">Tên Danh Mục</label>
                        <input type="text" class="form-control" id="category_name_<?= $category->category_id ?>"
                            name="category_name" value="<?= $category->category_name ?>" required>
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