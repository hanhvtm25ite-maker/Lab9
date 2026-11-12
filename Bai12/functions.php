<?php

// 1. KẾT NỐI DATABASE
$conn = mysqli_connect("localhost", "root", "", "rating");

if (!$conn) {
    die("Khong the ket noi toi CSDL: " . mysqli_connect_error());
}

mysqli_set_charset($conn, "utf8mb4");


// 2. HÀM LẤY THÔNG TIN ĐÁNH GIÁ
function getRatingInfo($id) {
    global $conn;

    $query = "SELECT * FROM rating_info WHERE product_id = ?";
    $stmt = mysqli_prepare($conn, $query);

    mysqli_stmt_bind_param($stmt, "i", $id);
    mysqli_stmt_execute($stmt);

    $result = mysqli_stmt_get_result($stmt);

    $return = 'Đánh giá<br><ul id="rating-info">';

    if ($row = mysqli_fetch_assoc($result)) {

        for ($i = 5; $i >= 1; $i--) {
            $return .= "<li><strong>$i</strong>: "
                    . $row['rate_'.$i] . "</li>";
        }

    } else {

        for ($i = 5; $i >= 1; $i--) {
            $return .= "<li><strong>$i</strong>: 0</li>";
        }
    }

    $return .= "</ul>";

    mysqli_stmt_close($stmt);

    return $return;
}


// 3. HÀM CẬP NHẬT ĐÁNH GIÁ
function setRatingInfo($id, $rate) {
    global $conn;

    // Chỉ chấp nhận điểm từ 1 đến 5
    if ($rate < 1 || $rate > 5) {
        return;
    }

    $column = "rate_" . $rate;

    $query = "UPDATE rating_info
              SET $column = $column + 1
              WHERE product_id = ?";

    $stmt = mysqli_prepare($conn, $query);

    mysqli_stmt_bind_param($stmt, "i", $id);
    mysqli_stmt_execute($stmt);

    mysqli_stmt_close($stmt);
}


// 4. HÀM LẤY THÔNG TIN SẢN PHẨM
function getProduct($id) {
    global $conn;

    $query = "SELECT * FROM products WHERE id = ?";

    $stmt = mysqli_prepare($conn, $query);

    mysqli_stmt_bind_param($stmt, "i", $id);
    mysqli_stmt_execute($stmt);

    $result = mysqli_stmt_get_result($stmt);
    $row = mysqli_fetch_assoc($result);

    mysqli_stmt_close($stmt);

    if (!$row) {
        return "<p>Không tìm thấy sản phẩm!</p>";
    }

    $rating_info = getRatingInfo($id);

    $return = '
        <div id="product-img">
            <img src="'.htmlspecialchars($row['img_url']).'"
                 alt="Sản phẩm">
        </div>

        '.$rating_info.'

        <div class="clear-fx"></div>

        <h2>'.htmlspecialchars($row['title']).'</h2>
    ';

    return $return;
}


// 5. HÀM LẤY DANH SÁCH SẢN PHẨM
function listProduct() {
    global $conn;

    $query = "SELECT * FROM products";

    $result = mysqli_query($conn, $query);

    $return = "";

    while ($row = mysqli_fetch_assoc($result)) {

        $rating_info = getRatingInfo($row['id']);

        $return .= '
            <div class="product-info">

                <div id="product-img">
                    <img src="'.htmlspecialchars($row['img_url']).'"
                         alt="Sản phẩm">
                </div>

                '.$rating_info.'

                <div class="clear-fx"></div>

                <h2>
                    <a href="index.php?id='.$row['id'].'">
                        '.htmlspecialchars($row['title']).'
                    </a>
                </h2>

            </div>
        ';
    }

    return $return;
}

?>