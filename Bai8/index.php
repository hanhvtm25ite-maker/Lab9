
<?php
$submitted = "";

if (isset($_POST["ok"])) {
    $submitted = $_POST["tomtat"] ?? "";
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Demo TinyMCE</title>

    <script src="https://cdn.tiny.cloud/1/w5ynp6529z18hhk7r9en28jmym0z08qkz7w54lqyaadj246u/tinymce/8/tinymce.min.js"
        referrerpolicy="origin"
        crossorigin="anonymous">
    </script>

    <style>
        body {
            margin: 8px;
            font-family: Arial, sans-serif;
            background: #fff;
        }

        .tox {
            border: 1px solid #ccc !important;
        }

        .tox .tox-toolbar__primary {
            background: #f1f1f1 !important;
            padding: 2px !important;
        }

        .tox .tox-toolbar__group {
            padding: 0 3px !important;
            margin: 0 2px !important;
        }

        .tox .tox-tbtn {
            width: 28px !important;
            height: 28px !important;
        }

        .tox .tox-tbtn--select {
            width: auto !important;
        }

        .tox .tox-tbtn svg {
            width: 18px !important;
            height: 18px !important;
        }

        input[type="submit"] {
            margin-top: 15px;
            padding: 6px 15px;
            cursor: pointer;
        }

        .result {
            border: 1px solid #ccc;
            padding: 15px;
            min-height: 50px;
        }
    </style>
</head>

<body>

    <form method="POST">

        <textarea name="tomtat" id="tomtat">Welcome to TinyMCE!</textarea>

        <br>

        <input type="submit" name="ok" value="Gửi nội dung">

    </form>

    <script>
        tinymce.init({
            selector: '#tomtat',

            height: 300,

            menubar: false,
            statusbar: false,
            resize: true,

            plugins: [
                'advlist', 'autolink', 'lists',
                'link', 'image', 'charmap',
                'preview', 'anchor', 'searchreplace',
                'visualblocks', 'code', 'fullscreen',
                'media', 'table', 'wordcount',
                'emoticons'
            ],

            toolbar_mode: 'wrap',

            toolbar1: 'undo redo | newdocument | cut copy paste | searchreplace | preview | code | fullscreen',

            toolbar2: 'bold italic underline strikethrough | subscript superscript | removeformat | bullist numlist | outdent indent',

            toolbar3: 'alignleft aligncenter alignright alignjustify | blocks fontfamily fontsize | forecolor backcolor',

            toolbar4: 'link unlink anchor | image media table | charmap emoticons | visualblocks',

            font_family_formats:
                'Arial=arial,helvetica,sans-serif;' +
                'Times New Roman=times new roman,times;' +
                'Verdana=verdana,geneva;' +
                'Courier New=courier new,courier;',

            fontsize_formats: '8pt 10pt 12pt 14pt 16pt 18pt 24pt 36pt',

            content_style:
                'body { font-family: Arial; font-size: 14px; text-align: left; }',

            branding: false,
            promotion: false
        });
    </script>

    <?php if (isset($_POST["ok"])): ?>

        <h2>NỘI DUNG ĐÃ GỬI</h2>

        <div class="result">
            <?php echo $submitted; ?>
        </div>

    <?php endif; ?>

</body>
</html>
