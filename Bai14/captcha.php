<?php
session_start();

// Tạo chuỗi ngẫu nhiên 6 ký tự
$string = substr(md5(time() . rand()), 0, 6);
$_SESSION['captcha'] = $string;

// Tạo ảnh
$img = imagecreate(150, 50);
$background = imagecolorallocate($img, 0, 0, 0);       // nền đen
$text_color = imagecolorallocate($img, 255, 255, 255); // chữ trắng

// Vẽ chuỗi lên ảnh
imagestring($img, 5, 40, 15, $string, $text_color);

// Xuất ảnh
header("Content-Type: image/png");
imagepng($img);
imagedestroy($img);
?>