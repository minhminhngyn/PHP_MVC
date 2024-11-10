<?php
session_start();
include("connect.inp");

// 1. Lấy session_user
$user = $_SESSION['user'];

// 2. Truy vấn lấy dữ liệu từ 3 bảng: mặt hàng, chitietsanpham, dondathang
$sql = "SELECT sanpham.Tensp, chitietsanpham.Masp, chitietsanpham.Soluong, sanpham.Gia, chitietsanpham.Soluong * sanpham.Gia AS ThanhTien
        FROM chitietsanpham 
        JOIN sanpham ON chitietsanpham.Masp = sanpham.Masp
        JOIN dondathang ON chitietsanpham.Sohoadon = dondathang.Sohoadon
        WHERE dondathang.chedo = 0 AND dondathang.nguoidathang = '$user'";  // sửa từ dondathang.user thành dondathang.nguoidathang

$result = $con->query($sql);

// Kiểm tra kết quả truy vấn
if (!$result) {
    die("Lỗi truy vấn: " . $con->error); // Hiển thị lỗi nếu truy vấn thất bại
}

// 3. Hiển thị bảng giỏ hàng
echo "<table>
        <tr>
            <td>Mã sản phẩm</td>
            <td>Tên sản phẩm</td>
            <td>Giá</td>
            <td>Số lượng</td>
            <td>Thành tiền</td>
            <td>Xóa</td>
        </tr>";

$total = 0;
while ($row = $result->fetch_assoc()) {
    $total += $row['ThanhTien'];
    echo "<tr>
            <td>{$row['Masp']}</td>
            <td>{$row['Tensp']}</td>
            <td>{$row['Gia']}</td>
            <td>
                <input type='number' value='{$row['Soluong']}' min='1' onchange='updateQuantity(this, \"{$row['Masp']}\")'>
            </td>
            <td>{$row['ThanhTien']}</td>
            <td><a href='xoaMatHang.php?Masp={$row['Masp']}' onclick='return ktraxoa();'>Xóa</a></td>
          </tr>";
}
echo "<tr>
        <td colspan='4'>Tổng tiền</td>
        <td>$total</td>
      </tr>";
echo "</table>";

// 4. Nhập thông tin người nhận hàng
?>
<form method="POST" action="xldathang.php">
    <label>Người nhận hàng:</label>
    <input type="text" name="nguoinhanhang" required><br>
    <label>Địa chỉ nhận hàng:</label>
    <input type="text" name="diachinhanhang" required><br>
    <label>Số điện thoại:</label>
    <input type="text" name="sodienthoai" required><br>
    <input type="submit" value="Đặt hàng">
    <a href="list_mathang.php">
    <button type="button">Quay lại trang sản phẩm</button>
</a>
</form>

<script>
function updateQuantity(input, Masp) {
    // Tăng số lượng sản phẩm và cập nhật thành tiền bằng JavaScript
    var soluong = input.value;
    window.location.href = `updateQuantity.php?Masp=${Masp}&Soluong=${soluong}`;
}
</script>
<?php
$con->close();
?>
