
<?php
session_start();
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Test Session</title>
</head>
<body>
    <h2>KIỂM TRA SESSION</h2>

    <?php
    echo "Chào bạn " . $_SESSION['name'];
    echo " có tuổi là: " . $_SESSION['age'];
    ?>

    <br>
    <a href="huy_session.php">Hủy Session</a>
</body>
</html>
