<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // print_r($_FILES['uploads']['name']);
    // echo "<br>";
    // print_r($_FILES['uploads']['tmp_name']);


    foreach($_FILES['uploads']['name'] as $key => $value){

        $error = $_FILES['uploads']['error'][$key];
        $size = $_FILES['uploads']['size'][$key];

        // Một số mã lỗi cơ bản
        // 0: Không có lỗi
        // 4: Không có file nào được chọn
        if($error === 0){
            $fileExt = strtolower(pathinfo($value, PATHINFO_EXTENSION));
            $arr = ['jpg', 'jpeg', 'png', 'gif'];

            if(!in_array($fileExt, $arr)){
                echo "<p style='color: red;' > $value: Định dạng file không hợp lệ </p>";
                continue; // nếu định dạng không hợp lệ thì bỏ qua file này chạy tiếp với file khác
            }

            if($size > 2 * 1024 * 1024){
                echo "<p style='color: red;' > $value : File quá lớn (>2MB) </p>";
                continue;
            }

            $newName = uniqid('img_') . '.' . $fileExt;

            if(move_uploaded_file($_FILES['uploads']['tmp_name'][$key], 'uploads/' . $newName)){
                echo "<p style='color: green;' >Upload thành công file: $newName </p>";
            }
        }else{
            echo 'Lỗi tải ảnh '; 
        }
        
    }
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload nhiều file ảnh</title>
</head>

<body>

    <h2>Upload nhiều file ảnh</h2>

    <form action="" method="post" enctype="multipart/form-data">
        <input type="file" name="uploads[]" multiple>
        <input type="submit" value="Upload">
    </form>
</body>

</html>
