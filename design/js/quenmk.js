function validateForm() {
    const email = document.getElementById("email").value;
    const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (email === "") {
        alert("Vui lòng nhập email!");
        return false;
    }
    if (!emailPattern.test(email)) {
        alert("Email không hợp lệ!");
        return false;
    }
    return true;
}