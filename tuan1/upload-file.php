<?php
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    echo "<b>File to be uploaded: </b>" . $_FILES["uploadfile"]["name"] . "<br>";
    echo "<b>Type: </b>" . $_FILES["uploadfile"]["type"] . "<br>";
    echo "<b>File Size: </b>" . $_FILES["uploadfile"]["size"] / 1024 . "<br>";
    echo "<b>Store in: </b>" . $_FILES["uploadfile"]["tmp_name"] . "<br>";

    if($_FILES["uploadfile"]["tmp_name"] ==''){
        echo '<h3>Vui lòng chọn ảnh</h3>';
    } else if (file_exists("uploads/" . $_FILES["uploadfile"]["name"])) {
        echo "<h3>ảnh đã tồn tại</h3>";
    } else {
        move_uploaded_file($_FILES["uploadfile"]["tmp_name"], "uploads/" . $_FILES["uploadfile"]["name"]);
        echo "<h3>Thêm ảnh thành công</h3>";
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>File Upload </title>
</head>
<body>
<h2>File Upload Form</h2>
<form method="POST" action="upload-file.php" enctype="multipart/form-data">
    <label for="file">File name:</label>
    <input type="file" name="uploadfile" />
    <input type="submit" name="submit" value="Upload" />
</form>
</body>
</html>