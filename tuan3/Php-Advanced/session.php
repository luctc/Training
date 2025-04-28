<?php
session_start();
if (isset($_POST['login'])) {
    if ($_POST['name'] === 'admin' && $_POST['password'] === '123456') {
        $_SESSION['name'] = $_POST['name'];
        echo "Đăng nhập thành công <br>";
    } else {
        echo "Đăng nhập thất bại <br>";
    }
}
if(isset($_POST['logout'])) {
    session_destroy();
    header("Location: session.php");
    exit;
}
?>
<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>session</title>
</head>

<body>
    <?php if (isset($_SESSION['name'])) : ?>
        <h1>Xin chào <?php echo $_SESSION['name']; ?> !</h1>
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

</body>

</html>