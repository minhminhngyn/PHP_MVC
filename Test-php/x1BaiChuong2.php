<?php
function giaithua($so)
{
    $gt=1;
    for($i=1;$i<=$so;$i++)
    {
        $gt=$gt*$i;
    }
    return $gt;
}
//echo "Kết quả tính giai thừa là:".giaithua($so);
header("location:Phuongthuc.php?kq=".giaithua($so));//Chuyển hướng trang//
?>
