<?php
class models_dangnhap extends Model {
    // Đăng nhập người dùng
    public function loginUser($username, $password, $remember) {
        $stmt = $this->con->prepare("SELECT MaTK, MatKhau, TrangThaiHoatDong, Solansaidangnhap, Lanchothulai, Email, PhanQuyen FROM thongtintaikhoan WHERE TenDangNhap = ?");
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows > 0) {
            $stmt->bind_result($maTK, $hashedPassword, $trangthaiTK, $solansaidangnhap, $lanchothulai, $email, $vaitro);
            $stmt->fetch();

            // Kiểm tra trạng thái tài khoản
            if ($trangthaiTK == 0 && strtotime($lanchothulai) > time()) {
                return ['status' => 'error', 'message' => 'Tài khoản của bạn đang bị khóa. Vui lòng thử lại sau.'];
            }

            // Kiểm tra mật khẩu
            if (password_verify($password, $hashedPassword)) {
                $_SESSION['user_id'] = $maTK;
                $_SESSION['vaitro'] = $vaitro;

                // Xóa thông tin tạm thời nếu đăng nhập thành công
                $this->resetLoginAttempts($maTK);

                // Lưu token nếu chọn "remember me"
                if ($remember) {
                    $token = bin2hex(random_bytes(16));
                    $expire = date('Y-m-d H:i:s', time() + (30 * 24 * 60 * 60));
                    setcookie('remember_me', $token, time() + (30 * 24 * 60 * 60), '/', '', true, true);
                    $this->updateToken($maTK, $token, $expire);
                }

                return ['status' => 'success', 'role' => $vaitro];
            } else {
                $this->incrementLoginAttempts($maTK, $solansaidangnhap);
                return ['status' => 'error', 'message' => 'Sai tên đăng nhập hoặc mật khẩu.'];
            }
        } else {
            return ['status' => 'error', 'message' => 'Sai tên đăng nhập hoặc mật khẩu.'];
        }
    }

    // Tăng số lần đăng nhập sai
    private function incrementLoginAttempts($maTK, $solansaidangnhap) {
        $solansaidangnhap++;
        $stmt = $this->con->prepare("UPDATE thongtintaikhoan SET Solansaidangnhap = ? WHERE MaTK = ?");
        $stmt->bind_param("ii", $solansaidangnhap, $maTK);
        $stmt->execute();

        if ($solansaidangnhap >= 5) {
            $lockTime = date('Y-m-d H:i:s', strtotime('+60 minutes'));
            $stmt = $this->con->prepare("UPDATE thongtintaikhoan SET TrangThaiHoatDong = 0, Lanchothulai = ? WHERE MaTK = ?");
            $stmt->bind_param("si", $lockTime, $maTK);
            $stmt->execute();
        }
    }

    // Đặt lại số lần đăng nhập sai
    private function resetLoginAttempts($maTK) {
        $stmt = $this->con->prepare("UPDATE thongtintaikhoan SET Solansaidangnhap = 0, Lanchothulai = NULL WHERE MaTK = ?");
        $stmt->bind_param("i", $maTK);
        $stmt->execute();
    }

    // Cập nhật token
    private function updateToken($maTK, $token, $expire) {
        $stmt = $this->con->prepare("UPDATE thongtintaikhoan SET Tokenluudangnhap = ?, Ngayhethantoken = ? WHERE MaTK = ?");
        $stmt->bind_param("ssi", $token, $expire, $maTK);
        $stmt->execute();
    }

    // Xóa token khi đăng xuất
    public function clearToken($token) {
        $stmt = $this->con->prepare("UPDATE thongtintaikhoan SET Tokenluudangnhap = NULL, Ngayhethantoken = NULL WHERE Tokenluudangnhap = ?");
        $stmt->bind_param("s", $token);
        $stmt->execute();
    }

    // Kiểm tra token để tự động đăng nhập
    public function checkToken($token) {
        $stmt = $this->con->prepare("SELECT MaTK, PhanQuyen FROM thongtintaikhoan WHERE Tokenluudangnhap = ? AND Ngayhethantoken > NOW()");
        $stmt->bind_param("s", $token);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows > 0) {
            $stmt->bind_result($maTK, $vaitro);
            $stmt->fetch();
            return ['status' => 'success', 'user_id' => $maTK, 'role' => $vaitro];
        } else {
            return ['status' => 'error'];
        }
    }
}
?>
