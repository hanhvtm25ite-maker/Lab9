
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Bài 9 - Upload hình ảnh</title>
    <style>
        body {
            font-family: Arial;
            margin: 40px;
        }

        .container {
            width: 500px;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 8px;
        }

        button {
            padding: 7px 15px;
            cursor: pointer;
        }

        img {
            max-width: 300px;
            margin-top: 15px;
        }

        .message {
            margin-top: 15px;
            color: green;
        }

        .error {
            color: red;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>UPLOAD HÌNH ẢNH</h2>

    <form action="" method="post"
          enctype="multipart/form-data">

        <input type="hidden" name="MAX_FILE_SIZE"
               value="5000000">

        <label>Upload hình ảnh:</label>
        <input type="file" name="ufile"
               accept=".jpg,.jpeg,.gif" required>

        <p>
            <button type="submit" name="upload">
                Upload
            </button>
        </p>
    </form>

    <?php
    if (isset($_POST['upload'])) {

        $target_path = "uploads/";

        if (!isset($_FILES['ufile']) ||
            $_FILES['ufile']['error'] != 0) {

            echo "<p class='error'>Upload thất bại!</p>";

        } else {

            $file_name = basename($_FILES['ufile']['name']);
            $target_file = $target_path . $file_name;

         if (!preg_match('/\.(jpg|jpeg|gif|png)$/i', $file_name)) {
    echo "<p class='error'>Không phải file ảnh!</p>";
}
            // Kiểm tra dung lượng
            elseif ($_FILES['ufile']['size'] > 5000000) {

                echo "<p class='error'>File vượt quá 5MB!</p>";

            }
            // Kiểm tra file trùng tên
            elseif (file_exists($target_file)) {

                echo "<p class='error'>File đã tồn tại!</p>";

            }
            // Tiến hành upload
            elseif (move_uploaded_file(
                $_FILES['ufile']['tmp_name'],
                $target_file
            )) {

                echo "<p class='message'>";
                echo "Upload hình ảnh thành công!";
                echo "</p>";

                echo "<img src='" . htmlspecialchars($target_file) . "'>";

            } else {

                echo "<p class='error'>";
                echo "Có lỗi xảy ra khi upload!";
                echo "</p>";
            }
        }
    }
    ?>

</div>

</body>
</html>
