<?php
$server = 'localhost';
$user='root';
$pass = '';
$database = 'qlbanhang';
$conn = new mysqLi($server, $user, $pass, $database);
if($conn)
{
    mysqLi_query($conn, "SET NAMES 'utf8' ");
    //echo 'Đẫ kết nối thành công';
}
else
{echo 'Kết nối thất bại';}
?>
