<?php
include("connect.inp");
session_start();
if (isset($_GET['Masp'])) {
    $masp = $_GET['Masp'];
    $user = $_SESSION['user'];

    // Xóa sản phẩm khỏi giỏ hàng
    $sql = "DELETE chitietdathang
            FROM chitietdathang
            JOIN dondathang ON chitietdathang.Maddh = dondathang.Maddh
            WHERE chitietdathang.Masp = '$masp' 
            AND dondathang.user = '$user' AND dondathang.chedo = 0";

    if ($con->query($sql)) {
        header('Location: giohang.php');
    } else {
        echo "Lỗi xóa sản phẩm";
    }
}
?>
