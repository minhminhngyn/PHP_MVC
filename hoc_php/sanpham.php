<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>
<style>
#header
{
	width:100%;
	height:100px;
	float:left;
}
#sidebar{
	width:20%;
	height:600px;
	float:left;
	background-color:lightgrey;
}
#content
{
	width:80%;
	height:600px;
	float:left;
	
}
.row
{
	width:100%;
	height: 250px;
	background-color: lightblue;
}
.col
{
	width:30%;
	margin-left:3%;
	float:left;
	height:220px;
	background-color: orange;
	text-align: center;
	padding-top:10px;
}
.img
{
	width:80%;
	height:180px;
}
</style>
<?php
//Kết nối cơ sở dữ liệu
$ocon=mysqli_connect("localhost","root","","qlbanhang");
if(!$ocon)
{
	die("Kết nối bị lỗi".mysqli_connect_error());

}
//else
//	echo "Ket noi thanh cong <br>";
?>
<body>
	<div id="header">
		<div id="left" style="width:70%; float:left; height:100%;">
		</div>
		<div id="right" style="width:30%; float:left;height:100%;">
			<div id="topright" style="width:100%; float:left; height:50%;">
			</div>
			<div id="botright" style="width:100%; float:left; height: 50%; background-color:pink;">
				<form name="frmsearch" action="sanpham.php" method="GET">
					<input type="text" name="txtsearch" placeholder="Nhập thông tin cần tìm" style="width:150px; height:30px; border-radius:4px;">
					<input type="submit" value="Search"  style="width:70px; height:30px; border-radius:4px;background-color:lightblue;">
				</form>

				<?php
				if(isset($_SESSION["user"]))
					{
						echo "Xin chao:".$_SESSION["user"];
						echo "<a href='xllogout.php'>Logout</a>";
					}
				?>
			</div>
		</div>
	</div>
	<div id="sidebar">
		<?php if(isset($_SESSION["user"]) and $_SESSION["quyen"]==1)
			{
				?>
		<ul class="list-group">
		<?php
		$sql_lh="select * from loaisanpham";
		$result2=$ocon->query($sql_lh);
		if($result2->num_rows>0)
			{
				while($row=$result2->fetch_assoc())
					{
						?>
		
  <li class="list-group-item list-group-item-success"><a href="sanpham.php?maloai=<?php echo $row['Maloai'];?>"><?php echo $row["Tenloai"];?></a></li>

			<?php
			}//while
		}//if

				?>
				</ul> 
			<?php } ?>
	</div>
	<div id="content">
		<?php
		//tinh tong so ban ghi
		$tongsobanghi=0;
		$s_bghimoitrang=1;
		$sqltongso="select * from sanpham";
		if(isset($_GET['maloai']))
			$sqltongso.=" where Maloai='".$_GET['maloai']."'";
		if(isset($_GET['txtsearch']))//tim kiem
		{
			$sqltongso.=" where Tensp like '%".$_GET['txtsearch']."%'";
		}
		$result1=$ocon->query($sqltongso);
		$tongsobanghi=$result1->num_rows;
		//hienthi
		$sql="select * from sanpham";
		if(isset($_GET['maloai']))//phan theo loai
		{
			$sql.=" where Maloai='".$_GET['maloai']."'";
		}
		if(isset($_GET['txtsearch']))//tim kiem
		{
			$sql.=" where Tensp like '%".$_GET['txtsearch']."%'";
		}
		
		$sql.=" limit ".$s_bghimoitrang;//gioi han so ban ghi tren moi trang
		if(isset($_GET['trang']))
			$sql.=" OFFSET ".($_GET['trang']-1)*$s_bghimoitrang;
		//thực thi truy vấn

		$result=$ocon->query($sql);

		//kiem tra kết quả trả về
		if($result->num_rows>0)
		{
			$i=0;
			while($row=$result->fetch_assoc())
			{

			 if($i%3==0) echo "<div class='row'>";
			 ?>
			<div class="col">
				<img src="image/<?php echo $row['Hinhanh'];?>" class="img">
				<?php echo "<br>".$row['Tensp']."<br>".$row['Gia'];?>
				<a href="chitiet_mathang.php?masp=<?php echo $row['Masp'];?>">Chi tiết</a>
			</div>
		<?php if($i%3==2)
			echo "</div>";
			$i=$i+1;
			}//endwhile
		}//endif
		?>
	</div>
	<div id="phantrang">
		<ul>
			<?php
			$i=1;
			while($i<=ceil($tongsobanghi/$s_bghimoitrang))
			{?>
				<li><a href=
				"sanpham.php?trang=<?php echo $i;
				if(isset($_GET['maloai']))
				echo "&maloai=".$_GET['maloai'];
				//tim kiem
				if(isset($_GET['txtsearch']))
					echo "&txtsearch=".$_GET['txtsearch'];

				?>"><?php echo $i;?></a></li>
			<?php
				$i++;
			}
			?>
		</ul>
	</div>
</body>
</html>