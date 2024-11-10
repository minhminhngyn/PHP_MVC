<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bài tập PHP</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        .container {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 20px;
        }
        .question-box {
            border: 1px solid #ccc;
            padding: 15px;
            border-radius: 8px;
            background-color: #f9f9f9;
            box-shadow: 2px 2px 8px rgba(0, 0, 0, 0.1);
        }
        .question-box label {
            font-weight: bold;
        }
        .question-box input[type="submit"] {
            margin-top: 10px;
            padding: 8px 16px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        .question-box input[type="submit"]:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <h1>Bài tập PHP</h1>
    <form method="post">
        <div class="container">
            <div class="question-box">
                <label for="q1">Bài 1: Tính giai thừa (đệ quy và không đệ quy):</label><br><p></p>
                <input type="text" id="q1" name="q1_input" placeholder="Nhập số..."><br>
                <input type="submit" name="q1" value="Giải bài 1">
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
                if (isset($_POST["q1"])) {
                    $so = $_POST["q1_input"];
                    echo "<p>Kết quả tính giai thừa đệ quy là:". factorial($so) . "</p>";
                    echo "<p>Kết quả tính giai thừa không đệ quy: " . nonFactorial($so) . "</p>";
                }
                ?>
            </div>
            
            <div class="question-box">
                <label for="q2">Bài 2: Kiểm tra số nguyên tố:</label><br><p></p>
                <input type="text" id="q2" name="q2_input" placeholder="Nhập số..."><br>
                <input type="submit" name="q2" value="Giải bài 2">
                <?php
                if (isset($_POST["q2"])) {
                    $num = $_POST["q2_input"];
                    if (is_numeric($num)) {
                        echo "<p>" . ($num . (isPrime($num) ? " là " : " không phải là ") . "số nguyên tố.") . "</p>";
                    } else {
                        echo "<p>Vui lòng nhập một số nguyên.</p>";
                    }
                }
                ?>
            </div>

            <div class="question-box">
                <label for="q3">Bài 3: Đảo ngược chuỗi:</label><br><p></P>
                <input type="text" id="q3" name="q3_input" placeholder="Nhập chuỗi..."><br>
                <input type="submit" name="q3" value="Giải bài 3">
                <?php
                if (isset($_POST["q3"])) {
                    $str = $_POST["q3_input"];
                    echo "<p>" . reverseString($str) . "</p>";
                }
                ?>
            </div>

            <div class="question-box">
                <label for="q4">Bài 4: Kiểm tra chữ thường:</label><br><p></P>
                <input type="text" id="q4" name="q4_input" placeholder="Nhập chuỗi..."><br>
                <input type="submit" name="q4" value="Giải bài 4">
                <?php
                if (isset($_POST["q4"])) {
                    $str = $_POST["q4_input"];
                    echo "<p>" . (isLowerCase($str) ? "Tất cả đều là chữ thường." : "Có chữ hoa.") . "</p>";
                }
                ?>
            </div>

            <div class="question-box">
                <label for="q5">Bài 5: Kiểm tra ngày hợp lệ:</label><br><p></P>
                <input type="text" id="q5" name="q5_input" placeholder="Nhập ngày (dd/mm/yyyy)..."><br>
                <input type="submit" name="q5" value="Giải bài 5">
                <?php
                if (isset($_POST["q5"])) {
                    $dateString = $_POST["q5_input"];
                    echo "<p>" . (isValidDate($dateString) ? "Ngày tháng hợp lệ." : "Không hợp lệ (lưu ý nhập dạng dd/mm/yyyy).") . "</p>";
                }
                ?>
            </div>

            <div class="question-box">
                <label for="q6">Bài 6: Tính số ngày giữa hai ngày:</label><br><p></p>
                <input type="text" id="q6" name="q6_input1" placeholder="Nhập ngày thứ nhất (dd/mm/yyyy)..."><br><p></p>
                <input type="text" id="q6" name="q6_input2" placeholder="Nhập ngày thứ hai (dd/mm/yyyy)..."><br>
                <input type="submit" name="q6" value="Giải bài 6">
                <?php
                if (isset($_POST["q6"])) {
                    $date1 = $_POST["q6_input1"];
                    $date2 = $_POST["q6_input2"];
                    $daysDifference = calculateDaysDifference($date1, $date2);
                    echo "<p>" . (is_numeric($daysDifference) ? "Số ngày chênh lệch: " . $daysDifference : $daysDifference) . "</p>";
                }
                ?>
            </div>

            <div class="question-box">
                <label for="q7">Bài 7: Chuẩn hóa chuỗi:</label><br><p></P>
                <input type="text" id="q7" name="q7_input" placeholder="Nhập văn bản..."><br>
                <input type="submit" name="q7" value="Giải bài 7">
                <?php
                if (isset($_POST["q7"])) {
                    $text = $_POST["q7_input"];
                    echo "<p>" . normalizeText($text) . "</p>";
                }
                ?>
            </div>
        </div>
    </form>

    <?php
    function factorial($n) {
        if ($n === 0 || $n === 1) {
            return 1;
        } else {
            return $n * factorial($n - 1);
        }
    }

    function nonFactorial($n) {
        $result = 1;
        for ($i = 1; $i <= $n; $i++) {
            $result *= $i;
        }
        return $result;
    }

    function isPrime($num) {
        if ($num <= 1) return false;
        for ($i = 2; $i <= sqrt($num); $i++) {
            if ($num % $i == 0) return false;
        }
        return true;
    }

    function reverseString($str) {
        return strrev($str);
    }

    function isLowerCase($str) {
        return ctype_lower($str);
    }

    function isValidDate($dateString) {
        $dateObj = DateTime::createFromFormat("d/m/Y", $dateString);
        return $dateObj && $dateObj->format("d/m/Y") === $dateString;
    }

    /*function calculateDaysDifference($date1, $date2) {
        $dateTime1 = DateTime::createFromFormat("d/m/Y", $date1);
        $dateTime2 = DateTime::createFromFormat("d/m/Y", $date2);

        if ($dateTime1 === false || $dateTime2 === false) {
            return "Invalid date format. Please use the format dd/mm/yyyy.";
        }

        $interval = $dateTime1->diff($dateTime2);
        return $interval->format("%a");
    }*/
    function calculateDaysDifference($date1, $date2) {
        // Tách ngày, tháng, năm từ chuỗi ngày bằng cách sử dụng hàm explode
        $date1_parts/*chuỗi1*/ = explode("/", $date1);
        $date2_parts/*chuỗi2*/ = explode("/", $date2);
    
        // Tạo các đối tượng DateTime từ các phần đã tách
        $dateTime1 = new DateTime($date1_parts[2] . '/' . $date1_parts[1] . '/' . $date1_parts[0]);
        $dateTime2 = new DateTime($date2_parts[2] . '/' . $date2_parts[1] . '/' . $date2_parts[0]);
    
        // Tính toán sự chênh lệch giữa hai ngày
        if ($dateTime1 === false || $dateTime2 === false) {
            return "Invalid date format. Please use the format dd/mm/yyyy.";
        }
        $interval = $dateTime1->diff($dateTime2);
    
        // Trả về số ngày chênh lệch
        return $interval->days;
    }

    function normalizeText($text) {
        // Example normalization function (convert to lowercase and trim)
        return strtolower(trim($text));
    }
    ?>
</body>
</html>
