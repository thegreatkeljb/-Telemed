// LOGIN SCRIPT

document.getElementById("loginbutton").addEventListener("click", function(e) {
    e.preventDefault();
    loginUser();
});
function loginUser() {
    const username = document.getElementById("uname");
    const password = document.getElementById("password");
    var formData = new FormData();
    formData.append("login_user", 1);
    formData.append("username", username.value);
    formData.append("password", password.value);
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "scripts/php/login_user.php", true);
    xhr.onreadystatechange = function() {
        if(xhr.readyState === 4 && xhr.status === 200) {
            const response = xhr.responseText;
            const data = JSON.parse(response);
            if(data.state == "patient-login-success") {
                window.location.href = "patient.php";
            } else if(data.state == "healthcare-provider-login-success") {
                window.location.href = "healthcare.php";
            } else {
                alert(data.message);
            }
        }
    }
    xhr.send(formData);
}