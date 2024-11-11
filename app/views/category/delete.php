<!-- Modal Delete v -->
<div class="modal fade" id="deleteCategoryModal<?= $category->category_id ?>" tabindex="-1"
    aria-labelledby="deleteCategoryModalLabel<?= $category->category_id ?>" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteCategoryModalLabel<?= $category->category_id ?>">Xóa Danh mục</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Bạn có chắc chắn muốn xóa Danh mục này không?
            </div>
            <div class="modal-footer">
                <form action="/admin/delete-category/<?= $category->category_id ?>" method="POST">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                    <button type="submit" class="btn btn-danger">Xóa</button>
                </form>
            </div>
        </div>
    </div>
</div>