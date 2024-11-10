<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bài tập PHP</title>
</head>
<body>
    <h1>Bài tập PHP</h1>
    
    <!-- Bài 1: Tính giai thừa -->
    <h2>Bài 1: Tính giai thừa</h2>
    <form method="post">
        <label>Nhập một số:</label>
        <input type="number" name="factorial_num" required>
        <input type="submit" name="calculate_factorial" value="Tính giai thừa">
    </form>
    <?php
    if (isset($_POST['calculate_factorial'])) {
        $n = $_POST['factorial_num'];

        // Giai thừa không đệ quy
        function factorial_non_recursive($n) {
            $result = 1;
            for ($i = 2; $i <= $n; $i++) {
                $result *= $i;
            }
            return $result;
        }

        // Giai thừa đệ quy
        function factorial_recursive($n) {
            if ($n <= 1) {
                return 1;
            }
            return $n * factorial_recursive($n - 1);
        }

        echo "Giai thừa (không đệ quy) của $n là: " . factorial_non_recursive($n) . "<br>";
        echo "Giai thừa (đệ quy) của $n là: " . factorial_recursive($n) . "<br>";
    }
    ?>

    <!-- Bài 2: Kiểm tra số nguyên tố -->
    <h2>Bài 2: Kiểm tra số nguyên tố</h2>
    <form method="post">
        <label>Nhập một số:</label>
        <input type="number" name="prime_num" required>
        <input type="submit" name="check_prime" value="Kiểm tra số nguyên tố">
    </form>
    <?php
    if (isset($_POST['check_prime'])) {
        $num = $_POST['prime_num'];

        function is_prime($num) {
            if ($num < 2) return false;
            for ($i = 2; $i <= sqrt($num); $i++) {
                if ($num % $i == 0) return false;
            }
            return true;
        }

        echo $num . (is_prime($num) ? " là số nguyên tố." : " không phải là số nguyên tố.") . "<br>";
    }
    ?>

    <!-- Bài 3: Đảo ngược chuỗi -->
    <h2>Bài 3: Đảo ngược chuỗi</h2>
    <form method="post">
        <label>Nhập chuỗi:</label>
        <input type="text" name="string_to_reverse" required>
        <input type="submit" name="reverse_string" value="Đảo ngược chuỗi">
    </form>
    <?php
    if (isset($_POST['reverse_string'])) {
        $string = $_POST['string_to_reverse'];
        echo "Chuỗi sau khi đảo ngược: " . strrev($string) . "<br>";
    }
    ?>

    <!-- Bài 4: Kiểm tra chữ thường -->
    <h2>Bài 4: Kiểm tra chữ thường</h2>
    <form method="post">
        <label>Nhập chuỗi:</label>
        <input type="text" name="lowercase_string" required>
        <input type="submit" name="check_lowercase" value="Kiểm tra">
    </form>
    <?php
    if (isset($_POST['check_lowercase'])) {
        $string = $_POST['lowercase_string'];

        function is_lowercase($string) {
            return ctype_lower($string);
        }

        echo is_lowercase($string) ? "Tất cả các ký tự đều là chữ thường." : "Có ký tự không phải là chữ thường." . "<br>";
    }
    ?>

    <!-- Bài 5: Kiểm tra ngày tháng hợp lệ -->
    <h2>Bài 5: Kiểm tra ngày tháng hợp lệ</h2>
    <form method="post">
        <label>Nhập ngày tháng (dd-mm-yyyy):</label>
        <input type="text" name="date_string" required>
        <input type="submit" name="validate_date" value="Kiểm tra ngày tháng">
    </form>
    <?php
    if (isset($_POST['validate_date'])) {
        $date = $_POST['date_string'];

        function is_valid_date($date) {
            $d = DateTime::createFromFormat('d-m-Y', $date);
            return $d && $d->format('d-m-Y') === $date;
        }

        echo is_valid_date($date) ? "Ngày tháng hợp lệ." : "Ngày tháng không hợp lệ." . "<br>";
    }
    ?>

    <!-- Bài 6: Tính số ngày giữa hai ngày tháng -->
    <h2>Bài 6: Tính số ngày giữa hai ngày tháng</h2>
    <form method="post">
        <label>Nhập ngày bắt đầu (dd-mm-yyyy):</label>
        <input type="text" name="start_date" required><br>
        <label>Nhập ngày kết thúc (dd-mm-yyyy):</label>
        <input type="text" name="end_date" required>
        <input type="submit" name="calculate_days" value="Tính số ngày">
    </form>
    <?php
    if (isset($_POST['calculate_days'])) {
        $start = $_POST['start_date'];
        $end = $_POST['end_date'];

        function calculate_days_between($start, $end) {
            $start_date = DateTime::createFromFormat('d-m-Y', $start);
            $end_date = DateTime::createFromFormat('d-m-Y', $end);
            return $start_date && $end_date ? $end_date->diff($start_date)->days : "Ngày tháng không hợp lệ.";
        }

        echo "Số ngày giữa $start và $end là: " . calculate_days_between($start, $end) . " ngày.<br>";
    }
    ?>

    <!-- Bài 7: Chuẩn hóa chuỗi -->
    <h2>Bài 7: Chuẩn hóa chuỗi</h2>
    <form method="post">
        <label>Nhập chuỗi văn bản:</label>
        <input type="text" name="text_to_normalize" required>
        <input type="submit" name="normalize_text" value="Chuẩn hóa">
    </form>
    <?php
    if (isset($_POST['normalize_text'])) {
        $text = $_POST['text_to_normalize'];

        function normalize_text($text) {
            $text = trim($text);
            $text = preg_replace('/\s+/', ' ', $text);
            return ucfirst(strtolower($text));
        }

        echo "Chuỗi sau khi chuẩn hóa: " . normalize_text($text) . "<br>";
    }
    ?>
</body>
</html>
