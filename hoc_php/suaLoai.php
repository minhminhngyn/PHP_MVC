<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        include("connect.inp");
        $maloai=$_GET["Maloai"];
        //$maloai=$_POST["Maloai"];
        //Xây dựng câu lệnh truy vấn lấy dữ liệu
        $sql="SELECT * FROM loaisp where Maloai='$maloai'";
        //thực thi sql
        $result=$con->query($sql);
        $row=$result->fetch_assoc();
    ?>
    <form action="xlsuaLoai.php" method="POST">
        Mã loại:<input type="text" name="Maloai" value="<?php echo $row['Maloai']; ?>" readonly><br>
        Tên loại:<input type="text" name="Tenloai" value="<?php echo $row['Tenloai']; ?>"><br>
        Mô tả:<input type="text" name="Mota" value="<?php echo $row['Mota']; ?>"><br>
        <input type="Submit" value="Sửa"><input type="reset" value="Nhập lại">
    </form>
</body>
</html>