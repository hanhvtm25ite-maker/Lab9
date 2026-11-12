<?php
// Thiết lập header XML
header("Content-Type: text/xml; charset=utf-8");

// Kết nối CSDL
$conn = mysqli_connect("localhost", "root", "", "rss");
if (!$conn) {
    die("Không thể kết nối CSDL: " . mysqli_connect_error());
}
mysqli_set_charset($conn, "utf8mb4");

// Lấy dữ liệu
$query = "SELECT * FROM news ORDER BY id DESC";
$result = mysqli_query($conn, $query);

// Bắt đầu xuất RSS
echo '<?xml version="1.0" encoding="UTF-8"?>';
echo '<rss version="2.0">';
echo '<channel>';
echo '<title>Học Web | Học làm web pro</title>';
echo '<link>http://hocweb.com.vn</link>';
echo '<description>Website hocweb.com.vn được hình thành từ ý tưởng giúp các em sinh viên trường đại học công nghiệp thực phẩm có 1 nơi học tập thực tế gắn với nhu cầu doanh nghiệp từ đó lan rộng ra mô hình học tập thực tế cùng doanh nghiệp cho các sinh viên trong các tỉnh thành</description>';
echo '<language>vi</language>';

// Xuất các item
while ($row = mysqli_fetch_assoc($result)) {
    echo '<item>';
    echo '<title>' . htmlspecialchars($row['title']) . '</title>';
    echo '<link>' . htmlspecialchars($row['link']) . '</link>';
    echo '<description>' . htmlspecialchars($row['description']) . '</description>';
    echo '<guid>' . htmlspecialchars($row['link']) . '</guid>';
    echo '</item>';
}

echo '</channel>';
echo '</rss>';

mysqli_close($conn);
?>