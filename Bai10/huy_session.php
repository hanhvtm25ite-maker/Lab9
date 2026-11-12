
<?php
session_start();

// Xóa riêng biến name
unset($_SESSION['name']);
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Hủy Session</title>
</head>
<body>
    <h2>ĐÃ HỦY SESSION NAME</h2>

    <?php
    echo "Tên: " . ($_SESSION['name'] ?? 'Đã bị xóa') . "<br>";
    echo "Tuổi: " . ($_SESSION['age'] ?? 'Đã bị xóa');
    ?>
</body>
</html>
