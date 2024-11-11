<!-- Add Category Modal -->
<div class="modal fade" id="addCategoryModal" tabindex="-1" aria-labelledby="addCategoryModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addCategoryModalLabel">Thêm Danh Mục</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="/admin/add-category" method="POST">
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="category_id" class="form-label">Ký hiệu Danh Mục</label>
                        <input type="text" class="form-control" id="category_id" name="category_id" required>
                    </div>
                    <div class="mb-3">
                        <label for="category_name" class="form-label">Tên Danh Mục</label>
                        <input type="text" class="form-control" id="category_name" name="category_name" required>
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