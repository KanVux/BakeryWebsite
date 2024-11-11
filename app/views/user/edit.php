<!-- Edit User Modal -->
<div class="modal fade" id="editUserModal<?= $user->id ?>" tabindex="-1" aria-labelledby="editUserModalLabel<?= $user->id ?>" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editUserModalLabel<?= $user->id ?>">Chỉnh Sửa Người Dùng</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <form action="/admin/edit-user/<?= $user->id ?>" method="POST">
                <div class="modal-body">

                    <!-- Tên người dùng -->
                    <div class="mb-3">
                        <label for="name_<?= $user->id ?>" class="form-label">Tên Người Dùng</label>
                        <input type="text" class="form-control" id="name_<?= $user->id ?>" name="name" value="<?= $user->name ?>" required>
                    </div>

                    <!-- Email -->
                    <div class="mb-3">
                        <label for="email_<?= $user->id ?>" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email_<?= $user->id ?>" name="email" value="<?= $user->email ?>" required>
                    </div>

                    <!-- Mật khẩu cũ -->
                    <div class="mb-3">
                        <label for="old_password_<?= $user->id ?>" class="form-label">Mật khẩu cũ</label>
                        <input type="password" class="form-control" id="old_password_<?= $user->id ?>" name="old_password" placeholder="Nhập mật khẩu cũ" required>
                    </div>

                    <!-- Mật khẩu mới -->
                    <div class="mb-3">
                        <label for="password_<?= $user->id ?>" class="form-label">Mật khẩu mới</label>
                        <input type="password" class="form-control" id="password_<?= $user->id ?>" name="password" placeholder="Nhập mật khẩu mới nếu muốn thay đổi">
                    </div>

                    <!-- Quyền -->
                    <div class="mb-3">
                        <label for="acc_type_<?= $user->id ?>" class="form-label">Quyền</label>
                        <select class="form-select" id="acc_type_<?= $user->id ?>" name="acc_type" required>
                            <option value="0" <?= $user->acc_type == 0 ? 'selected' : '' ?>>Người Dùng</option>
                            <option value="1" <?= $user->acc_type == 1 ? 'selected' : '' ?>>Admin</option>
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
