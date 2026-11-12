<?php
require_once("config.php");

if (!isset($_GET["idPA"])) {
    header("Location: index.php");
    exit;
}

$idPA = (int)$_GET["idPA"];

// Tăng số lần chọn của câu hỏi
$qr1 = "UPDATE binhchon SET SoLanChon = SoLanChon + 1 WHERE idBC = 1";

// Tăng số lần chọn của phương án được chọn
$qr  = "UPDATE phuongan SET SoLanChon = SoLanChon + 1 WHERE idBC = 1 AND idPA = $idPA";

if (mysqli_query($config, $qr1) && mysqli_query($config, $qr)) {
    header("Location: ketquabinhchon.php");
    exit;
} else {
    echo "Cập nhật thất bại!";
}
?>