<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sửa sản phẩm</title>
</head>
<body>
    <?php
        include("connect.php");

        // Kiểm tra xem giá trị "Mahang" có tồn tại trong POST không
        if (isset($_POST["Mahang"])) {
            $mahang = $_POST["Mahang"];
            $sql = "SELECT * FROM sanpham WHERE Mahang='$mahang'";
            $result = $conn->query($sql);

            // Kiểm tra nếu có kết quả từ truy vấn
            if ($result && $result->num_rows > 0) {
                $row = $result->fetch_assoc();
            } else {
                echo "Không tìm thấy sản phẩm với mã hàng này.";
                exit; // Dừng thực thi nếu không tìm thấy sản phẩm
            }
        } else {
            echo "Không có mã hàng được cung cấp.";
            exit; // Dừng thực thi nếu không có mã hàng
        }
    ?>
    <h2>Sửa sản phẩm</h2>
    <div class="product-form" id="productForm">
        <form action="xlsuaLoai.php" method="POST">
            Mã hàng:<input type="text" name="Mahang" value="<?php echo htmlspecialchars($row['Mahang']); ?>" readonly><br>
            Tên hàng:<input type="text" name="Tenhang" value="<?php echo htmlspecialchars($row['Tenhang']); ?>"><br>
            Số lượng:<input type="text" name="Soluong" value="<?php echo htmlspecialchars($row['Soluong']); ?>"><br>
            Hình ảnh:<input type="text" name="Hinhanh" value="<?php echo htmlspecialchars($row['Hinhanh']); ?>"><br>
            Mô tả:<input type="text" name="Mota" value="<?php echo htmlspecialchars($row['Mota']); ?>"><br>
            Giá hàng:<input type="text" name="Giahang" value="<?php echo htmlspecialchars($row['Giahang']); ?>"><br>
            <input type="submit" value="Cập nhật">
        </form>
    </div>
    <div class="actions">
        <a href="ktr1.php"><button>Quay lại</button></a>
    </div>
</body>
</html>
