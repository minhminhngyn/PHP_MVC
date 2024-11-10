<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh mục sản phẩm</title>
    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: Arial, Helvetica, sans-serif;
        }

        /* Style the side navigation */
        .sidenav {
            height: 100%;
            width: 200px;
            position: fixed;
            z-index: 1;
            top: 0;
            left: 0;
            background-color: #000;
            overflow-x: hidden;
        }

        /* Side navigation links */
        .sidenav a {
            color: white;
            padding: 16px;
            text-decoration: none;
            display: block;
        }

        /* Change color on hover */
        .sidenav a:hover {
            background-color: #ddd;
            color: black;
        }

        /* Style the content */
        .content {
            margin-left: 200px;
            padding-left: 20px;
        }

        .product-grid {
            margin-left: 200px;
            margin-top: 30px;
            padding-left: 20px;
            display: grid;
            grid-template-columns: repeat(5, 1fr);
            gap: 20px;
        }

        .product {
            border: 0.2px solid #000;
            padding: 10px;
            text-align: left;
            width: 230px;
            cursor: pointer; /* Change cursor to pointer */
        }

        .product {
        cursor: pointer;
        transition: background-color 0.3s;
        }

        .product.selected {
        background-color: #f0f8ff; /* Màu nền khi sản phẩm được chọn */
        border: 2px solid #007BFF; /* Viền nổi bật khi sản phẩm được chọn */
        }
        .product a {
            display: block;
            text-align: right;
            margin-top: 10px; /* Add some space between the product details and the link */
        }

        .product .image {
            width: 100%;
            height: 150px;
            background-color: #f0f0f0;
            margin-bottom: 10px;
        }

        .pagination {
            margin-top: 20px;
            text-align: center;
        }

        .pagination a {
            text-decoration: none;
            margin: 0 5px;
            color: #000;
        }

        .actions {
            margin: 20px;
            text-align: center;
        }

        .actions button {
            padding: 10px 20px;
            margin: 5px;
            font-size: 16px;
            cursor: pointer;
            background-color: #007BFF;
            color: white;
            border: none;
            border-radius: 5px;
        }

        .actions button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="content">
        <h2>Danh mục sản phẩm</h2>
    </div>
    
    <div class="sidenav">
        <?php
        //connect//
        include("connect.php");
        //show data loai hang//
        $sql = "SELECT * FROM loaisp";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_array($result)) {
                echo '<a href="?Maloai=' . $row["Maloai"] . '">' . $row["Tenloai"] . '</a>';
            }
        } else {
            echo '<p>Không có loại sản phẩm nào.</p>';
        }
        ?>
    </div>

    <div class="product-grid">
        <?php
        // Phân trang
        $each_record = 2; // Số bản ghi trên mỗi trang
        $page = 1; // Trang mặc định
        if (isset($_GET['page'])) {
            $page = $_GET['page']; // Nếu có chọn trang, lấy giá trị trang đó
        }
        $offset = ($page - 1) * $each_record; // Tính điểm bắt đầu của dữ liệu

        // Kiểm tra nếu Maloai được chọn
        if (isset($_GET['Maloai'])) {
            $maloai = mysqli_real_escape_string($conn, $_GET['Maloai']);
            // Lấy tổng số sản phẩm thuộc Maloai này
            $total_sql = "SELECT COUNT(*) as total FROM sanpham WHERE Maloai = '$maloai'";
            $sql = "SELECT * FROM sanpham WHERE Maloai = '$maloai' LIMIT $each_record OFFSET $offset";
        } else {
            // Lấy tổng số sản phẩm
            $total_sql = "SELECT COUNT(*) as total FROM sanpham";
            // Hiển thị tất cả sản phẩm nếu không có Maloai
            $sql = "SELECT * FROM sanpham LIMIT $each_record OFFSET $offset";
        }

        // Lấy tổng số sản phẩm
        $total_result = mysqli_query($conn, $total_sql);
        $total_row = mysqli_fetch_assoc($total_result);
        $total_record = $total_row['total']; // Tổng số bản ghi

        $result = mysqli_query($conn, $sql);
        //show data san pham//
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_array($result)) {
                echo '<div class="product" onclick="selectProduct(this)" data-id="' . $row["Mahang"] . '">';
                echo '<div class="image"></div>';
                echo '<p>' . $row["Tenhang"] . '</p>';
                echo '<p>Giá: $' . $row["Giahang"] . '</p>';
                echo '<a href="#">Chi tiết</a>';
                echo '</div>';
            }
        } else {
            echo "Không có sản phẩm nào.";
        }
        ?>
    </div>

    <div class="pagination">
        <?php
        // Tính tổng số trang
        $total_page = ceil($total_record / $each_record);

        // Hiển thị các liên kết phân trang
        for ($i = 1; $i <= $total_page; $i++) {
            echo "<a href='?page=$i";
            if (isset($_GET['Maloai'])) {
                echo "&Maloai=" . $_GET['Maloai']; // Giữ lại Maloai khi phân trang
            }
            echo "'>$i</a> ";
        }
        $conn->close();
        ?>
    </div>
    
    <div class="actions">
    <a href="themsp.php?Maloai=<?php echo isset($_GET['Maloai']) ? $_GET['Maloai'] : ''; ?>"><button>Thêm mới</button></a>
        <button onclick="deleteProduct()">Xóa</button>
        <a href="suasp.php"><button>Sửa</button></a>
    </div>

    <script>
        let selectedProduct = null;
        //select để xóa//
        function selectProduct(element) {
            if (selectedProduct) {
                selectedProduct.classList.remove('selected'); // Remove highlight from previously selected product
            }
            selectedProduct = element; // Update the selected product
            selectedProduct.classList.add('selected'); // Highlight the currently selected product
        }
        //confirm việc xóa//
        function deleteProduct() {
            if (selectedProduct) {
                const maHang = selectedProduct.getAttribute('data-id');
                if (confirm("Bạn có chắc chắn muốn xóa sản phẩm này?")) {
                    // Redirect to the delete page with the selected Mahang
                    window.location.href = `xoasp.php?Mahang=${maHang}`;
                }
            } else {
                alert("Vui lòng chọn một sản phẩm để xóa.");
            }
        }
    </script>
</body>
</html>
