<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách sản phẩm</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        .product-table {
            width: 80%;
            margin: 20px auto;
            border-collapse: collapse;
        }

        .product-table th, .product-table td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        .product-table th {
            background-color: #f2f2f2;
        }

        .product-table td {
            vertical-align: middle;
        }

        .action-buttons button {
            padding: 5px 10px;
            margin-right: 5px;
            font-size: 14px;
            cursor: pointer;
        }

        .action-buttons button.delete {
            background-color: #ff4d4d;
            color: white;
            border: none;
            border-radius: 3px;
        }

        .action-buttons button.edit {
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 3px;
        }

        .action-buttons button:hover {
            opacity: 0.9;
        }

        .add-product {
            margin-top: 20px;
            text-align: center;
        }

        .add-product button {
            padding: 10px 20px;
            font-size: 16px;
            background-color: #007BFF;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .add-product button:hover {
            background-color: #0056b3;
        }

        .pagination {
            margin-top: 20px;
            text-align: center;
        }

        .pagination a {
            text-decoration: none;
            margin: 0 5px;
            padding: 5px 10px;
            color: #007BFF;
            border: 1px solid #ddd;
            border-radius: 5px;
        }

        .pagination a:hover {
            background-color: #f2f2f2;
            color: #0056b3;
        }
    </style>
</head>
<body>

    <h2 style="text-align: center;">Danh sách sản phẩm</h2>

    <table class="product-table">
        <thead>
            <tr>
                <th>Tên sản phẩm</th>
                <th>Giá sản phẩm</th>
                <th>Mô tả</th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody>
            <!-- Hàng sản phẩm mẫu -->
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td class="action-buttons">
                    <button class="edit" onclick="editProduct(1)">Sửa</button>
                    <button class="delete" onclick="deleteProduct(1)">Xóa</button>
                </td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td class="action-buttons">
                    <button class="edit" onclick="editProduct(2)">Sửa</button>
                    <button class="delete" onclick="deleteProduct(2)">Xóa</button>
                </td>
            </tr>
            <!-- Thêm các hàng sản phẩm khác bằng PHP -->
            <?php
            // Kết nối cơ sở dữ liệu và hiển thị sản phẩm từ DB tại đây
            ?>
        </tbody>
    </table>

    <div class="pagination">
        <a href="#">1</a>
        <a href="#">2</a>
        <a href="#">3</a>
    </div>

    <div class="add-product">
        <button onclick="window.location.href='themsp.php'">Thêm sản phẩm mới</button>
    </div>

    <script>
        function editProduct(id) {
            // Redirect to edit product page
            window.location.href = `suasp.php?id=${id}`;
        }

        function deleteProduct(id) {
            if (confirm("Bạn có chắc chắn muốn xóa sản phẩm này?")) {
                // Redirect to delete product page
                window.location.href = `xoasp.php?id=${id}`;
            }
        }
    </script>

</body>
</html>
