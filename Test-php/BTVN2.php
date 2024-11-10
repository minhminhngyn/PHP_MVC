<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bài tập PHP</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        .container {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            padding: 10px;
        }

        .box {
            flex: 1 1 calc(20% - 20px);
            min-width: 250px;
            box-sizing: border-box;
            border: 1px solid #000;
            padding: 10px;
        }

        input, textarea {
            width: 100%;
            margin-top: 10px;
            padding: 5px;
        }

        button {
            margin-top: 10px;
        }

        h2 {
            margin-top: 0;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="box">
            <h2>Bài 1</h2>
            <label>Nhập mảng số nguyên (cách nhau bằng dấu phẩy):</label>
            <input type="text" id="array1" placeholder="e.g. 1,2,3,4,...">
            <button onclick="bai1()">Xử lý</button>
            <div id="result1"></div>
        </div>

        <div class="box">
            <h2>Bài 2</h2>
            <label>Nhập mảng 1 (cách nhau bằng dấu phẩy):</label>
            <input type="text" id="array2_1" placeholder="e.g. 1,2,3,4,...">
            <label>Nhập mảng 2 (cách nhau bằng dấu phẩy):</label>
            <input type="text" id="array2_2" placeholder="e.g. 5,6,7,8,...">
            <button onclick="bai2()">Xử lý</button>
            <div id="result2"></div>
        </div>

        <div class="box">
            <h2>Bài 3</h2>
            <label>Nhập mảng liên hợp (key:value, cách nhau bằng dấu phẩy):</label>
            <input type="text" id="array3" placeholder="e.g. ab:Hà Nội,ac:Thái Bình,...">
            <button onclick="bai3()">Xử lý</button>
            <div id="result3"></div>
        </div>

        <div class="box">
            <h2>Bài 4</h2>
            <label>Nhập mảng 1 (cách nhau bằng dấu phẩy):</label>
            <input type="text" id="array4_1" placeholder="e.g. -10,-2,8,9,25">
            <label>Nhập mảng 2 (cách nhau bằng dấu phẩy):</label>
            <input type="text" id="array4_2" placeholder="e.g. -1,8,9,13,...">
            <button onclick="bai4()">Xử lý</button>
            <div id="result4"></div>
        </div>

        <div class="box">
            <h2>Bài 5</h2>
            <label>Nhập mảng chuỗi (cách nhau bằng dấu phẩy):</label>
            <input type="text" id="array5" placeholder="e.g. apple,banana,orange,...">
            <button onclick="bai5()">Xử lý</button>
            <div id="result5"></div>
        </div>
    </div>

    <script>
        function bai1() {
            var array1 = document.getElementById('array1').value.split(',').map(Number);//chuyển đổi thành số nguyên//
            var tong = array1.reduce((a, b) => a + b, 0);//tính tổng bằng cách cộng dồn a, b, bắt đầu từ 0//
            var soLe = array1.filter(num => num % 2 !== 0);//lọc số lẻ//
            var soChan = array1.filter(num => num % 2 === 0);//lọc số chẵn//
            var sapXepGiamDan = [...array1].sort((a, b) => b - a);//sắp xếp theo giảm dần, tạp array 1 là bản sao, quy tắc b>a thì đổi chỗ//
            
            var ketQua = `Tổng của các phần tử mảng: ${tong}<br>`;
            ketQua += `Các phần tử lẻ: ${soLe.join(', ')}<br>`;
            ketQua += `Các phần tử chẵn: ${soChan.join(', ')}<br>`;
            ketQua += `Mảng sau khi sắp xếp giảm dần: ${sapXepGiamDan.join(', ')}<br>`;
            document.getElementById('result1').innerHTML = ketQua;
        }

        function bai2() {
            var array2_1 = document.getElementById('array2_1').value.split(',').map(Number);
            var array2_2 = document.getElementById('array2_2').value.split(',').map(Number);
            var tronMang = array2_1.concat(array2_2).sort((a, b) => a - b);

            var ketQua = `Mảng trộn và sắp xếp tăng dần: ${tronMang.join(', ')}<br>`;
            document.getElementById('result2').innerHTML = ketQua;
        }

        function bai3() {
            var array3 = document.getElementById('array3').value.split(',').reduce((obj, item) => {
                var parts = item.split(':');
                obj[parts[0]] = parts[1];
                return obj;
            }, {});
            
            var sapXep = Object.keys(array3).sort().reduce((obj, key) => {
                obj[key] = array3[key];
                return obj;
            }, {});

            var daoNguoc = Object.fromEntries(Object.entries(sapXep).map(([key, value]) => [value, key]));
            
            var ketQua = `Mảng liên hợp sau sắp xếp: ${JSON.stringify(sapXep)}<br>`;
            ketQua += `Mảng liên hợp sau khi chuyển đổi giá trị thành khóa: ${JSON.stringify(daoNguoc)}<br>`;
            document.getElementById('result3').innerHTML = ketQua;
        }

        function bai4() {
            var array4_1 = document.getElementById('array4_1').value.split(',').map(Number);
            var array4_2 = document.getElementById('array4_2').value.split(',').map(Number);
            var tronMang = array4_1.concat(array4_2).sort((a, b) => a - b);//nối 2 mảng+sắp xếp tăng dần//
            var nhoNhat = Math.min(...tronMang);//Math.min(...tronMang) sử dụng toán tử spread (...) để giải nén mảng tronMang thành các tham số riêng lẻ, rồi sử dụng Math.min để tìm phần tử nhỏ nhất.//

            var ketQua = `Mảng trộn và sắp xếp: ${tronMang.join(', ')}<br>`;
            ketQua += `Phần tử có giá trị nhỏ nhất: ${nhoNhat}<br>`;
            document.getElementById('result4').innerHTML = ketQua;
        }

        function bai5() {
            var array5 = document.getElementById('array5').value.split(',');
            var chuyenHoa = array5.map(str => str.toUpperCase());//chuyển đổi thành chữ hoa//
            var phanTuNganNhat = chuyenHoa.reduce((a, b) => a.length <= b.length ? a : b);//duyệt qua toàn bộ mảng và trả về chuỗi ngắn nhất bằng cách so sánh a.length và b.length//
            var sapXep = [...chuyenHoa].sort();//sắp xếp mảng vào 1 bản sao //
            var xoaBanSao = [...new Set(sapXep)];//loại bỏ các phần tử trùng lặp//

            var ketQua = `Mảng sau khi chuyển đổi thành chữ hoa: ${chuyenHoa.join(', ')}<br>`;
            ketQua += `Phần tử có độ dài ngắn nhất: ${phanTuNganNhat}<br>`;
            ketQua += `Mảng sau khi sắp xếp: ${sapXep.join(', ')}<br>`;
            ketQua += `Mảng sau khi xóa bản sao: ${xoaBanSao.join(', ')}<br>`;
            document.getElementById('result5').innerHTML = ketQua;
        }
    </script>
</body>
</html>
