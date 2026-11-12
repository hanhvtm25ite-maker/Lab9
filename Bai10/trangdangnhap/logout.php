
<?php
session_start();

// Xóa toàn bộ SESSION
session_unset();
session_destroy();

// Xóa COOKIE username
setcookie("username", "", time() - 3600, "/");

echo "<script>
    alert('Logout Successful!');
    location.href='index.php';
</script>";
?>
