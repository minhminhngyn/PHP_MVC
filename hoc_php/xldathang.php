<?php
session_start();
include("connect.inp");

// 1. Lấy thông tin từ form và session
$nguoinhanhang = $_POST['nguoinhanhang'];
$diachinhanhang = $_POST['diachinhanhang'];
$sodienthoai = $_POST['sodienthoai'];
$user = $_SESSION['user'];

// 2. Update bảng dondathang
$sql = "UPDATE dondathang 
        SET nguoinhanhang='$nguoinhanhang', diachinhanhang='$diachinhanhang', sodienthoai='$sodienthoai'
        WHERE user='$user' AND chedo=0";
$con->query($sql);

// 3. Lấy mã đơn đặt hàng để update bảng chitietdathang
$sql = "SELECT Sohoadon FROM dondathang WHERE user='$user' AND chedo=0";
$result = $con->query($sql);
$row = $result->fetch_assoc();
$sohoadon = $row['Sohoadon'];

// 3. Update bảng chitietdathang với mã hàng và số lượng
foreach ($_SESSION['cart'] as $masp => $soluong) {
    $sql = "UPDATE chitietdathang 
            SET Soluong='$soluong' 
            WHERE Sohoadon='$sohoadon' AND Masp='$masp'";
    $con->query($sql);
}

// 4. Chuyển hướng sang trang xác nhận đơn hàng
header("Location: donhang.php");
$con->close();
?>
