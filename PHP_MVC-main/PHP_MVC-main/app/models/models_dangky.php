<?php
    require_once 'core/core_models.php';
    require_once 'dangky.php';

    class models_dangky extends Model
    {
        protected $table_thongtintaikhoan='thongtintaikhoan';
        protected $table_thongtincanhan='thongtincanhan';

        //lấy tất cả thông tin từ bảng thông tin tài khoản và bảng thông tin cá nhân
        public function getInfor_checktrungtaikhoan($username,$email) 
        {
            $sql="SELECT * FROM {$this->table_thongtintaikhoan} INNER JOIN {$this->table_thongtincanhan} 
                WHERE TenDangNhap='{$username}' or Email='{$email}';";
            $result=$this->con->query($sql);
            return $result;
        }

        //lấy thông tin mã tài khoản/ mã khách hàng
        public function getID()
        {
            $sql="SELECT MAX(MaTK) as max_ma from {$this->table_thongtintaikhoan}";
            $result=$this->con->query($sql);
            $row = $result->fetch_assoc();
            return $row['max_ma'];
        }

        //thêm dữ liệu vào bảng thông tin tài khoản
        public function insert_thongtintaikhoan($object) 
        {
            $thuocTinh = get_object_vars($object);
            $slthuoctinh=count($thuocTinh);
            
            $query="INSERT INTO {$this->table_thongtintaikhoan} (MaTK, TenDangNhap, MatKhau, NgayTao, 
            NguoiTao, NgaySua, NguoiSua, PhanQuyen, TrangThaiHoatDong, TrangThaiXacThuc, TokenEmail, 
            ThoiGianTokenEmail,ThoiGianHieuLuc) 
            VALUES (";
            $i=1;
            foreach ($thuocTinh as $key => $value)
            {
                if (is_string($value))
                    $query.="'$value'";
                else
                    $query.="{$value}";
                if ($i!=$slthuoctinh)
                    $query.=",";
                $i=$i+1;
            }
            $query.=")";
            echo "<br> <h3>cau lenh sql: ".$query;
            return $this->con->query($query);
            
        }
    }
?>