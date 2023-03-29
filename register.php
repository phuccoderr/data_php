<?php
include("include/common.php");
if (is_method_post()) {
    $username = $_POST["username"];
    $password = $_POST["password"];
    $cf_password = $_POST["cf_password"];
    //kiem tra password
    if ($password != $cf_password) {
        js_alert("mat khau khong hop li");
        js_redirect_to("register.php");
        die;
    } 
    //kiem tra ten dang nhap
    if(isUserNameExists($username)) {
        js_alert("ten dang nhap da ton tai");
        js_redirect_to("register.php");
        die;
    }
    $options = [
        "cost" =>10
        
    ];
    // $password_hash = password_hash($password,PASSWORD_BCRYPT,$options); 
    //  tăng độ khó hash mật khẩu
    $password_hash = password_hash($password,PASSWORD_BCRYPT);
    $sql = "insert into users values (default,? , ?)";
    $param = [$username,$password_hash];
    db_execute($sql,$param);
}

function isUserNameExists(string $username): bool { 
    $sql = "select * from users where username = ?";
    $data = db_select($sql,[$username]);
    return !empty($data);
}
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập</title>
</head>

<body>
    <h2>Đăng ký tài khoản</h2>
    <form method="post">
        <div>
            <label>Tên đăng nhập</label>
            <input type="text" name="username" minlength="4" required maxlength="50">
        </div>
        <div>
            <label>Mật khẩu</label>
            <input type="password" name="password" minlength="4" required>
        </div>
        <div>
            <label>Nhập lại mật khẩu</label>
            <input type="password" name="cf_password" minlength="4" required>
        </div>
        <div>
            <input type="submit" value="đăng ký">
        </div>
    </form>
</body>

</html>