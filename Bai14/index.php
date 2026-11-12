<?php
session_start();

if (isset($_POST['submit'])) {
    $input = trim($_POST['input']);
    
    if ($input === $_SESSION['captcha']) {
        $_SESSION['message'] = "* Right captcha !!!";
        $_SESSION['message_type'] = "success";
    } else {
        $_SESSION['message'] = "* Wrong captcha !!!";
        $_SESSION['message_type'] = "error";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>CAPTCHA</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: sans-serif;
            background: #ecf0f1;
        }
        form {
            width: 450px;
            margin: 40px auto;
            border: 1px solid #95a5a6;
            border-radius: 5px;
            background: #fff;
            padding: 25px;
        }
        form input[type="text"] {
            width: 200px;
            height: 48px;
            padding: 0 10px;
            margin: 0;
            float: left;
            border: 1px solid #2c3e50;
            margin-right: 10px;
            border-radius: 5px;
            font-size: 18px;
            box-sizing: border-box;
        }
        form img {
            height: 48px;
            vertical-align: middle;
        }
        form input[type="submit"] {
            margin-top: 15px;
            padding: 8px 25px;
            background: #2980b9;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 15px;
        }
        form input[type="submit"]:hover {
            background: #3498db;
        }
        #message {
            margin-top: 15px;
            font-weight: bold;
        }
        .success {
            color: #27ae60;
        }
        .error {
            color: #c0392b;
        }
        h2 {
            margin-top: 0;
            color: #2c3e50;
        }
    </style>
</head>
<body>
    <form action="" method="POST">
        <h2>CAPTCHA - WEB</h2>
        <p>Please enter the captcha:</p>
        
        <input type="text" name="input" autocomplete="off" required>
        <img src="captcha.php" alt="captcha">
        <br>
        
        <input type="submit" name="submit" value="Send">
        
        <p id="message" class="<?php echo $_SESSION['message_type'] ?? ''; ?>">
            <?php
            if (isset($_SESSION['message'])) {
                echo $_SESSION['message'];
                unset($_SESSION['message']);
                unset($_SESSION['message_type']);
            }
            ?>
        </p>
    </form>
</body>
</html>