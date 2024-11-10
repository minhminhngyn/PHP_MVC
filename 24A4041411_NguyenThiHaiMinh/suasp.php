<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sửa Sản Phẩm</title>
</head>
<body>
    <?php
        include("connect.php");
        $mahang = $_GET["Mahang"];
        $sql = "SELECT * FROM sanpham WHERE Mahang='$mahang'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
        } else {
            echo "Không tìm thấy sản phẩm với mã hàng này.";
            exit;
        }
    ?>
    <form action="xlsuasp.php" method="POST">
    Mã hàng: <input type="text" name="Mahang" value="<?php echo $row['Mahang']; ?>" readonly><br><p></p>
    Tên hàng: <input type="text" name="Tenhang" value="<?php echo $row['Tenhang']; ?>"><br><p></p>
    Giá: <input type="text" name="Gia" value="<?php echo isset($row['Giahang']) ? htmlspecialchars($row['Giahang']) : ''; ?>"><br><p></p>
    Số lượng: <input type="number" name="Soluong" value="<?php echo $row['Soluong']; ?>"><br><p></p>
    Mô tả: <input type="text" name="Mota" value="<?php echo $row['Mota']; ?>"><br><p></p>
    <input type="submit" value="Sửa">
    <input type="reset" value="Nhập lại">
</form>
</body>
</html>
