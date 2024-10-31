<?php
    require_once 'core/core_models.php';

    class models_dangky extends Model
    {
        protected $table_thongtintaikhoan='thongtintaikhoan';
        protected $table_thongtincanhan='thongtincanhan';

        //lấy tất cả thông tin từ bảng thông tin tài khoản và bảng thông tin cá nhân
        public function getall_thongtincanhan_thongtintaikhoan($username,$email) 
        {
            $sql="SELECT * FROM $this->table_thongtintaikhoan INNER JOIN $this->table_thongtincanhan 
                WHERE TenDangNhap='{$username}' or Email='{$email}';";
            $result=$con->query($sql);
            return $result;
        }

        //lấy thông tin mã tài khoản/ mã khách hàng
        public function getID($id)
        {
            $sql="SELECT MAX($id) as max_ma from $this->table_thongtintaikhoan";
            $result=$con->query($sql);
            return $result;
        }
    }
?>