<?php
include("include/common.php");
if(is_logged()) {
    js_redirect_to("Test.php");
}
if (is_method_post()) {
    $username = $_POST["username"] ?? "";
    $password = $_POST["password"] ?? "";
    //lay du lieu roi so sanh
    $sql = "SELECT * FROM data_php.users where username = ?";
    $user = db_select($sql, [$username]);


    if (empty($user)) {
        js_alert("ten dang nhap hoac mat khau khong hop le");
        js_redirect_to("login.php");
        die;
    }

    $user = $user[0];

    // password_verify( )
    if (password_verify($password, $user["password"]) == true) {
        js_alert("dang nhap thanh cong");
        $_SESSION["username"] = $username;
        $_SESSION["user_id"] = $user["id"];
        js_redirect_to("Test.php");
    } else {
        js_alert(" mat khau khong hop le");
        js_redirect_to("login.php");
        die;
    }
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
    <h2>Đăng nhập</h2>
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
            <input type="submit" value="đăng ký">
        </div>
    </form>
</body>

</html>