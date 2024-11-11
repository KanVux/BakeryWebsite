<!-- Add User Modal -->
<div class="modal fade" id="addUserModal" tabindex="-1" aria-labelledby="addUserModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addUserModalLabel">Thêm Người Dùng</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <form action="/admin/add-user" method="POST">
                <div class="modal-body">

                    <!-- Tên người dùng -->
                    <div class="mb-3">
                        <label for="name" class="form-label">Tên Người Dùng</label>
                        <input type="text" class="form-control" id="name" name="name" required placeholder="Nhập tên người dùng">
                    </div>

                    <!-- Email -->
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" required placeholder="Nhập email">
                    </div>

                    <!-- Mật khẩu -->
                    <div class="mb-3">
                        <label for="password" class="form-label">Mật khẩu</label>
                        <input type="password" class="form-control" id="password" name="password" required placeholder="Nhập mật khẩu">
                    </div>

                    <!-- Địa chỉ -->
                    <div class="mb-3">
                        <label for="address" class="form-label">Mật khẩu</label>
                        <textarea class="form-control" id="address" name="address" rows="3"
                            placeholder="Nhập địa chỉ..."></textarea>
                    </div>

                    <!-- Quyền -->
                    <div class="mb-3">
                        <label for="acc_type" class="form-label">Quyền</label>
                        <select class="form-select" id="acc_type" name="acc_type" required>
                            <option value="0">Người Dùng</option>
                            <option value="1">Admin</option>
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
