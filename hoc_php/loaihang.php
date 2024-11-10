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
    function ktraxoa()
    {
        return confirm("Bạn có muón xóa không?");
    }
    </script>
<body>
    <?php
    if(isset($_GET['status']))
    {
        if($_GET['status']==1){
            echo "<span id='tb' style='display:none';>Thêm thành công</span>";
        }
        else if($_GET['status']==2){
            echo "<span id='tb' style='display:none';>Xóa thành công</span>";
        }
        else if($_GET['status']==3){
            echo "<span id='tb' style='display:none';>Sửa thành công</span>";
        }
        else
            echo "<span id='tb' style='display:none;'>Lỗi thêm/xóa/sửa</span>";
    }
    /*if (isset($_POST['status'])) {
        if ($_POST['status'] == 1) {
            echo "<span id='tb' style='display:none;'>Thêm thành công</span>";
        } else if ($_POST['status'] == 2) {
            echo "<span id='tb' style='display:none;'>Xóa thành công</span>";
        } else if ($_POST['status'] == 3) {
            echo "<span id='tb' style='display:none;'>Sửa thành công</span>";
        } else {
            echo "<span id='tb' style='display:none;'>Lỗi thêm/xóa/sửa</span>";
        }
    }*/
        include("connect.inp");
       //tinh tong so ban ghi
       $sql="select count(Maloai) as ts From loaisp";
       $result=$con->query($sql);
       $row=$result->fetch_assoc();
       $sum_record=$row["ts"];
       $each_record=4;
       //
       $page=1;
       if(isset($_GET["page"]))
       {
           $page=$_GET["page"];
       }
       $offset=($page-1)*$each_record;
       //Xây dựng câu lệnh truy vấn lấy dữ liệu
       $sql="SELECT * FROM loaisp LIMIT $each_record OFFSET $offset";
       //thực thi sql
       $result=$con->query($sql);
        //Đọc duyệt kết quả
        if($result->num_rows>0){
            //tạo một bảng
            echo"<table><tr><td>STT</td><td>Mã loại</td><td> 
            Tên loại</td><td>Mô tả</td><td>Chi tiết</td><td>Sửa</td><td>Thêm</td><td>Xóa</td>"; 
            $i=1;    
            while($row=$result->fetch_assoc())
            {
                echo "<tr><td>$i</td><td>{$row['Maloai']}</td><td>
                 {$row['Tenloai']}</td><td>{$row['Mota']}
                 </td> <td><a href='chitiet_mathang.php?Maloai={$row['Maloai']}'> Chitiet</a></td> <td><a href='suaLoai.php?Maloai={$row['Maloai']}'> Sửa</a></td> <td><a href='themLoai.php?Maloai={$row['Maloai']}'> Thêm</a></td>
                 <td><a href='xoaLoai.php?Maloai={$row['Maloai']}'onclick='return ktraxoa();'>Xóa</a></td></tr>";
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
    <div id="ds_trang" style="margin-left:50%;">
        <?php
            $p=1;
            while($p<=ceil($sum_record/$each_record)){
                echo "<a href='loaihang.php?page={$p}'>$p</a> ";
                $p=$p+1;
            }
        ?>
    </div>


</body>
</html>