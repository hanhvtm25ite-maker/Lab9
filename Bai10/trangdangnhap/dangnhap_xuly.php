
<?php
session_start();
include 'connect.php';

if (isset($_POST['cancel'])) {
    header("Location: index.php");
    exit();
}

if (isset($_POST['login'])) {

    $name = $_POST['username'];
    $pass = $_POST['password'];

    // Truy vấn tài khoản bằng Prepared Statement
    $sql = "SELECT * FROM users WHERE Username = ? AND Password = ?";

    $stmt = mysqli_prepare($connect, $sql);
    mysqli_stmt_bind_param($stmt, "ss", $name, $pass);
    mysqli_stmt_execute($stmt);

    $result = mysqli_stmt_get_result($stmt);

    if (mysqli_num_rows($result) > 0) {

        $row = mysqli_fetch_assoc($result);

        $_SESSION['username'] = $name;
        $_SESSION['password'] = $pass;

        // Ghi nhớ đăng nhập
        if (isset($_POST['remember'])) {
            setcookie("username", $name, time() + 60, "/");
        }

        echo "<script>
            alert('Login Successful!');
            location.href='trangquantriadmin.php';
        </script>";

    } else {

        echo "<script>
            alert('Login Failed!');
            location.href='index.php';
        </script>";
    }
}
?>
