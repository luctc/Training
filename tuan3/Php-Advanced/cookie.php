<?php

if (isset($_POST['login'])) {
    if ($_POST['name'] === 'admin' && $_POST['password'] === '123456') {
        setcookie("name", $_POST['name'], time() + 3600);
        header("Location: cookie.php");
        exit;
    } else {
        echo "Đăng nhập thất bại <br>";
    }
}
if(isset($_POST['logout'])) {
    setcookie("name", '', time() - 3600);
    header("Location: cookie.php");
    exit;
}
?>
<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>COOKIE</title>
</head>

<body>
    <?php if (isset($_COOKIE['name'])) : ?>
        <h1>Xin chào <?php echo $_COOKIE['name']; ?> !</h1>
        <form method="post">
            <input type="submit" name="logout" value="Đăng xuất">
        </form>
    <?php else : ?>
        <form method="post">
            <input type="text" name="name" placeholder="Tài khoản">
            <input type="password" name="password" placeholder="Mật khẩu">
            <input type="submit" name="login" value="Đăng nhập">
        </form>
    <?php endif; ?>

    <?php
?>
</body>

</html>