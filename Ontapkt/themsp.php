<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm mới sản phẩm</title>
</head>
<body>
    <h2>Thêm mới sản phẩm</h2>
    <div class="product-form" id="productForm">
    <form action="xlthemsp.php" method="POST">
    Mã hàng: <input type="text" name="Mahang" required><br><p></p>
    Tên hàng: <input type="text" name="Tenhang" required><br><p></p>
    Số lượng: <input type="number" name="Soluong"><br><p></p>
    Hình ảnh: <input type="text" name="Hinhanh"><br><p></p>
    Mô tả: <input type="text" name="Mota"><br><p></p>
    Giá hàng: <input type="number" name="Giahang" required step="0.01"><br><p></p>
    <!-- Thêm trường ẩn để lưu Maloai -->
    <input type="hidden" name="Maloai" value="<?php echo isset($_GET['Maloai']) ? $_GET['Maloai'] : ''; ?>">
    <input type="submit" value="Thêm mới">
</form>

    </div>
    <div class="actions">
        <a href="ktr1.php"><button>Quay lại</button></a>
    </div>
</body>
</html>
