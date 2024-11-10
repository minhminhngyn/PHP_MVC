<?php
//Kết nối database
include "connect.php";
//Tạo database
/*$sql="CREATE DATABASE cosodl";
if(mysqLi_query($conn,$sql))
{
    echo 'Tạo thành công';
}
else
{
    echo 'Tạo thất bại';
}
?>*/
//Tạo bảng
/*$sql = "CREATE TABLE thanhvien(
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,//Tự động tạo id
taikhoan VARCHAR(30) NOT NULL,
matkhau VARCHAR(30) NOT NULL,
level INT(6)
)";
if($conn->query($sql)==TRUE)
{
    echo 'Tạo bảng thành công';
}
else
{
    echo 'Tạo thất bại';
}*/
//Thêm dữ liệu: f5 index trước sau đó f5 localhost
/*$id = "";//tự động tạo id rồi nên không cần thêm ở đây
$taikhoan = 'admin2';
$matkhau = '12345678';
$level = 2;
$sql = "INSERT INTO thanhvien (id, taikhoan, matkhau, level) VALUES('$id', '$taikhoan', '$matkhau', '$level')";
mysqLi_query($conn, $sql);*/
//Lấy dữ liệu từ MySQL
/*$sql = "SELECT * FROM thanhvien";
$result = mysqLi_query($conn,$sql);
//echo mysqLi_num_rows($result);
if(mysqLi_num_rows($result)>0)
{
    while($row=mysqli_fetch_array($result))
    {
        echo $row['id']."|".$row['taikhoan']."|".$row['matkhau']."|".$row['level'];
        echo '<br>';
    }
}*/
//Xóa dữ liệu
/*$sql = "DELETE FROM thanhvien WHERE id='2'";
mysqLi_query($conn,$sql);*/
//Sửa dữ liệu
$id = "";//tự động tạo id rồi nên không cần thêm ở đây
$taikhoan = 'admin3';//Data sửa
$matkhau = '01234';
$level = 3;
$sql="UPDATE thanhvien SET id='$id', taikhoan='$taikhoan', matkhau='$matkhau', level='$level' WHERE id=1";
mysqLi_query($conn, $sql);