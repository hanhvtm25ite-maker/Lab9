
<?php
session_start();

// Kiểm tra đăng nhập
if (!isset($_SESSION['username'])) {
    echo "<script>
        alert('Bạn chưa đăng nhập!');
        location.href='index.php';
    </script>";
    exit();
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Trang quản trị</title>
</head>
<body>

    <h1>TRANG QUẢN TRỊ</h1>

    <?php
    echo "Xin chào: " . htmlspecialchars($_SESSION['username']);
    ?>

    <br><br>

    <a href="logout.php">Logout</a>

</body>
</html>
