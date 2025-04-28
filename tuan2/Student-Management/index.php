    <?php
    // Kết nối DB
    require_once __DIR__ . '/includes/db.php';
    require_once __DIR__ . '/controllers/admin/StudentController.php';


    if (isset($_GET['act'])) {
        $act = $_GET['act'];
        switch ($act) {
            case 'students':
                index();
                break;
            case 'students/create':
                create();
                break;
            case 'students/store':
                store();
                break;
            case 'students/show':
                show();
                break;
            case 'students/edit':
                edit();
                break;
            case 'students/update':
                update();
                break;
            case 'students/destroy':
                destroy();
                break;
            default:
                echo "Trang không tồn tại!";
                break;
        }
    } else {
        include 'views/admin/dashboard.php';
    }
