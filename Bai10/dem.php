
<?php
session_start();

if (!isset($_SESSION['count'])) {
    $_SESSION['count'] = 1;
} else {
    $_SESSION['count']++;
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Đếm lượt truy cập</title>
</head>
<body>
    <h2>CHƯƠNG TRÌNH ĐẾM</h2>

    <?php
    echo "Số lần truy cập: " . $_SESSION['count'];
    ?>

    <br><br>
    <a href="tang.php">Next</a>
</body>
</html>
