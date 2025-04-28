<?php
// Kiểm tra nếu form được submit
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $errors = [];
    $uploadDir = 'uploads/';

    // Đảm bảo thư mục uploads tồn tại
    if (!is_dir($uploadDir)) {
        mkdir($uploadDir, 0777, true);
    }

    // Duyệt từng file
    foreach ($_FILES['files']['name'] as $key => $name) {

        echo $key . " - " . $name . "<br>";

        
        $tmpName = $_FILES['files']['tmp_name'][$key];
        $size = $_FILES['files']['size'][$key];
        $error = $_FILES['files']['error'][$key];

        // Nếu file không có lỗi
        if ($error === 0) {
            $fileExt = strtolower(pathinfo($name, PATHINFO_EXTENSION));
            $allowed = ['jpg', 'jpeg', 'png', 'gif'];

            // Kiểm tra định dạng file
            if (!in_array($fileExt, $allowed)) {
                $errors[] = "$name: Định dạng file không hợp lệ.";
                continue;
            }

            // Kiểm tra kích thước file (giới hạn 2MB)
            if ($size > 2 * 1024 * 1024) {
                $errors[] = "$name: File quá lớn (>2MB).";
                continue;
            }

            // Đặt tên file mới để tránh trùng
            $newName = uniqid('img_', true) . '.' . $fileExt;
            $destination = $uploadDir . $newName;

            // Di chuyển file vào thư mục upload
            if (move_uploaded_file($tmpName, $destination)) {
                echo "<p style='color:green;'>Tải lên thành công: $newName</p>";
            } else {
                $errors[] = "$name: Tải lên thất bại.";
            }
        } else {
            $errors[] = "$name: Lỗi khi tải lên.";
        }
    }

    // In ra lỗi (nếu có)
    if (!empty($errors)) {
        foreach ($errors as $err) {
            echo "<p style='color:red;'>$err</p>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Upload nhiều file</title>
</head>
<body>
    <h2>Upload nhiều file ảnh</h2>

    <form action="" method="post" enctype="multipart/form-data">
        <input type="file" name="files[]" multiple><br><br>
        <button type="submit">Upload</button>
    </form>
</body>
</html>
