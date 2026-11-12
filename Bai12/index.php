<?php
require_once __DIR__ . "/functions.php";

// Kiểm tra người dùng có chọn sản phẩm không
if (isset($_GET['id'])) {

    $id = (int)$_GET['id'];

    // Kiểm tra người dùng có nhấn nút Rate không
    if (isset($_POST['rate_submit'])) {

        if (isset($_POST['rate'])) {

            $rate = (int)$_POST['rate'];

            setRatingInfo($id, $rate);
        }
    }

    // Lấy thông tin sản phẩm
    $html = getProduct($id);

    // Hiển thị trang chi tiết
    include("template/view-product.php");

} else {

    // Lấy danh sách sản phẩm
    $html = listProduct();

    // Hiển thị trang danh sách
    include("template/list-products.php");
}

?>