
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Đăng nhập</title>
</head>
<body>

    <h1>ĐĂNG NHẬP</h1>

    <form action="dangnhap_xuly.php" method="post">
        <table>
            <tr>
                <td>
                    <label>Username:</label>
                </td>
                <td>
                    <input type="text" name="username" required>
                </td>
            </tr>

            <tr>
                <td>
                    <label>Password:</label>
                </td>
                <td>
                    <input type="password" name="password" required>
                </td>
            </tr>

            <tr>
                <td colspan="2">
                    <input type="checkbox" name="remember">
                    <span>Remember</span>
                </td>
            </tr>

            <tr>
                <td>
                    <input type="submit" name="login" value="Login">
                </td>
                <td>
                    <input type="submit" name="cancel" value="Cancel">
                </td>
            </tr>
        </table>
    </form>

</body>
</html>
