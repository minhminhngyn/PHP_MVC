<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        table{
            width:70%;
            margin-left:15%;
        }
        table,tr,td{
            border:1px solid;
        }
    </style>
</head>
<script>
    function ktraxoa(){
        return confirm("Bạn có thực sự muốn xóa không?");
    }
</script>
<body>
    <?php
        if(isset($_GET['status']))
        {
            if($_GET['status']==1){
                echo "<span id='tb' style='display:none';>Thêm thành công</span>";
            }
            else
                echo "<span id='tb' style='display:none;'>Lỗi thêm</span>";
        }
        include("connect.inp");

        //tinh tong so ban ghi
        $sql="select count(Masp) as ts From Sanpham";
        $result=$con->query($sql);
        $row=$result->fetch_assoc();
        $sum_record=$row["ts"];
        $each_record=4;
        //xác định page
        $page=1;
        if(isset($_GET["page"]))
        {
            $page=$_GET["page"];
        }
        $offset=($page-1)*$each_record;
        //Xây dựng câu lệnh truy vấn lấy dữ liệu
        $sql="SELECT * FROM Sanpham LIMIT $each_record OFFSET $offset";
        //thực thi sql
        $result=$con->query($sql);
        //Đọc duyệt kết quả
        if($result->num_rows>0){
            //tạo một bảng
            echo"<table>
            <tr>
                <td>STT</td>
                <td>Mã sản phẩm</td>
                <td>Tên sản phẩm</td>
                <td>Giá</td>
                <td>Chi tiết</td><td>Sửa</td><td>Xóa</td>"; 
            $i=1;    
            while($row=$result->fetch_assoc())
            {
                echo "<tr><td>$i</td><td>{$row['Masp']}</td><td>
                 {$row['Tensp']}</td><td>{$row['Gia']}
                 </td><td><a href='chitiet_mathang.php?Masp={$row['Masp']}'>Chitiet</a></td> <td><a href='suaLoai.php?Masp={$row['Masp']}'> Sửa</a></td>
                 <td><a href='xoaLoai.php?Masp={$row['Masp']}' onclick='return ktraxoa();'>Xóa</a></td></tr>";
                 $i=$i+1;
            } 
            echo "</table>"; 
   
        }//if đúng
        else
            echo "Không có dữ liệu trong bảng";
        $con->close();
    ?>
    <script>
            alert(document.getElementById("tb").innerHTML);
    </script>
    <div id="ds_trang" style="margin-left:30%;">
        <?php
            $p=1;
            while($p<=ceil($sum_record/$each_record)){
                echo "<a href='list_mathang.php?page={$p}'>$p</a> ";
                $p=$p+1;
            }
        ?>
    </div>
</body>
</html>