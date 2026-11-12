<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bình chọn</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f0f2f5;
            margin: 0;
            padding: 40px 0;
        }
        #binhchon {
            width: 500px;
            margin: 0 auto;
            background: white;
            padding: 25px 30px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        h2 {
            margin-top: 0;
            color: #2c3e50;
            text-align: center;
        }
        label {
            display: block;
            margin: 12px 0;
            cursor: pointer;
        }
        input[type="radio"] {
            margin-right: 10px;
        }
        input[type="submit"] {
            margin-top: 20px;
            padding: 10px 25px;
            background: #3498db;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 15px;
        }
        input[type="submit"]:hover {
            background: #2980b9;
        }
    </style>
</head>
<body>
    <div id="binhchon">
        <h2>BÌNH CHỌN</h2>
        <form method="get" action="xulybinhchon.php">
            <p><strong>Bạn nghĩ sao về chất lượng của trang web hocweb.com.vn?</strong></p>
            
            <?php
            require_once("config.php");
            $s = "SELECT * FROM phuongan WHERE idBC = 1";
            $kq = mysqli_query($config, $s);
            $i = 0;
            while ($row = mysqli_fetch_array($kq)) {
            ?>
                <label>
                    <input type="radio" 
                           name="idPA" 
                           value="<?php echo $row['idPA']; ?>"
                           <?php if ($i == 0) { echo "checked"; $i++; } ?>>
                    <?php echo $row['MoTa']; ?>
                </label>
            <?php } ?>

            <p>
                <input type="submit" name="Submit" value="Xem kết quả">
            </p>
        </form>
    </div>
</body>
</html>