<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kết quả bình chọn</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f0f2f5;
            margin: 0;
            padding: 40px 0;
        }
        table {
            width: 550px;
            margin: 0 auto;
            border-collapse: collapse;
            background: white;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        th, td {
            padding: 12px;
            border: 1px solid #ddd;
        }
        .header {
            background: #3498db;
            color: white;
            text-align: center;
            font-weight: bold;
        }
        .bar {
            background: #e74c3c;
            height: 18px;
        }
        .footer {
            text-align: right;
            font-weight: bold;
            background: #f8f9fa;
        }
        a {
            display: block;
            width: 550px;
            margin: 20px auto 0;
            text-align: center;
            color: #3498db;
            text-decoration: none;
        }
    </style>
</head>
<body>
    <?php
    require_once("config.php");

    // Lấy mô tả câu hỏi
    $s = "SELECT * FROM binhchon WHERE idBC = 1";
    $kq = mysqli_query($config, $s);
    $d = mysqli_fetch_array($kq);
    $mota = $d["MoTa"];

    // Tổng số lần chọn
    $s = "SELECT SUM(SoLanChon) AS tongsolanchon FROM phuongan WHERE idBC = 1";
    $kq = mysqli_query($config, $s);
    $d = mysqli_fetch_array($kq);
    $tongsobinhchon = $d["tongsolanchon"];
    if ($tongsobinhchon == 0) $tongsobinhchon = 1; // tránh chia cho 0
    ?>

    <table>
        <tr>
            <td colspan="3" class="header"><?php echo $mota; ?></td>
        </tr>

        <?php
        $s = "SELECT * FROM phuongan WHERE idBC = 1";
        $kq = mysqli_query($config, $s);
        while ($d = mysqli_fetch_array($kq)) {
            $phantram = ($d["SoLanChon"] / $tongsobinhchon) * 100;
            $rong = ($d["SoLanChon"] / $tongsobinhchon) * 200; // chiều rộng thanh
        ?>
            <tr>
                <td width="180"><?php echo $d["MoTa"]; ?></td>
                <td width="220">
                    <div style="background:#eee; width:200px; height:18px;">
                        <div class="bar" style="width: <?php echo $rong; ?>px;"></div>
                    </div>
                    <?php echo round($phantram, 2); ?>%
                </td>
                <td width="150">Số lần chọn: <?php echo $d["SoLanChon"]; ?></td>
            </tr>
        <?php } ?>

        <tr>
            <td colspan="3" class="footer">Tổng số lần chọn: <?php echo $tongsobinhchon; ?></td>
        </tr>
    </table>

    <a href="index.php">← Quay lại bình chọn</a>
</body>
</html>