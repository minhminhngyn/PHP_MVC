<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <H1> Tính giai thừa</H1>
    <form name="bai1" method="POST" action="x1Baichuong2.php">
        Nhập số cần tính giai thừa:<input type="number" name="txtso">
        <input type="submit" value="Tính">
    </form>
    <?php
/*function giaithua($so)
{
    $gt=1;
    for($i=1;$i<=$so;$i++)
    {
        $gt=$gt*$i;
    }
    return $gt;
}
if(isset($_POST["txtso"])){
    $so=$_POST["txtso"];
    echo "Kết quả tính giai thừa là:".giaithua($so);
}*/
if(isset($_GET['kq']))
echo "Kết quả tính giai thừa là:".$_GET['kq'];
?>
</body>
</html>