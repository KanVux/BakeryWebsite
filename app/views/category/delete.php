<!-- Modal Delete User -->
<div class="modal fade" id="deleteUserModal<?= $user->id ?>" tabindex="-1"
    aria-labelledby="deleteUserModalLabel<?= $user->id ?>" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteUserModalLabel<?= $user->id ?>">Xóa Người Dùng</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Bạn có chắc chắn muốn xóa người dùng này không?
            </div>
            <div class="modal-footer">
                <form action="/admin/delete-user/<?= $user->id ?>" method="POST">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                    <button type="submit" class="btn btn-danger">Xóa</button>
                </form>
            </div>
        </div>
    </div>
</div>