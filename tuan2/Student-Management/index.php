    <?php
// filepath: index.php

// Kết nối DB, autoload, hoặc các include cần thiết
require_once __DIR__ . '/includes/db.php';
require_once __DIR__ . '/controllers/StudentController.php';


if (isset($_GET['act'])) {
    $act = $_GET['act'];
    switch ($act) {
        case 'students':
            index();
            break;
        case 'students/create':
            create();
            // include 'views/admin/students/create.php';
            break;
        // Thêm các module khác nếu có
        default:
            echo "Trang không tồn tại!";
            break;
    }
} else {
    include 'views/admin/dashboard.php';
}
