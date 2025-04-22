<?php
session_start();

if (!isset($_SESSION['student'])) {
    $_SESSION['student'] = [];
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $mssv = $_POST['mssv'] ?? '';
    $name = $_POST['name'] ?? '';
    $email = $_POST['email'] ?? '';
    $phone = $_POST['phone'] ?? '';
    $address = $_POST['address'] ?? '';

    if(empty($_SESSION['student'])){
        $id = 1;
    }else{
        $latest = end($_SESSION['student']);
        
        // var_dump($latest ['id']);

        $id = $latest ['id'] + 1;
    }

    if(!empty($mssv) && !empty($name) && !empty($email) && !empty($phone) && !empty($address)){
        $_SESSION['student'][] = [
            'id' => $id,
            'mssv' => $mssv,
            'name' => $name,
            'email' => $email,
            'phone' => $phone,
            'address' => $address
        ];
    }
}

// var_dump($_SESSION['student']);
// print_r($_SESSION['student']);

// session_destroy();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách sinh viên</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js" integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq" crossorigin="anonymous"></script>
    <script>
        function validateForm(e) {
            let mssv = document.getElementById("mssv").value;
            let name = document.getElementById("name").value;
            let email = document.getElementById("email").value;
            let phone = document.getElementById("phone").value;
            let address = document.getElementById("address").value;
            
            let validate_mssv = document.getElementById("validate_mssv");
            let validate_name = document.getElementById("validate_name");
            let validate_email = document.getElementById("validate_email");
            let validate_phone = document.getElementById("validate_phone");
            let validate_address = document.getElementById("validate_address");

            validate_mssv.innerHTML = "";
            validate_name.innerHTML = "";
            validate_email.innerHTML = "";
            validate_phone.innerHTML = "";
            validate_address.innerHTML = "";

            let validate = true;
            
            if (mssv == "") {
                validate_mssv.innerHTML = "Mã sinh viên không được để trống";
                validate = false;
            } else if (mssv.length < 5) {
                validate_mssv.innerHTML = "Mã sinh viên phải lớn hơn 5 ký tự";
                validate = false;
            }

            if (name == "") {
                validate_name.innerHTML = "Họ và tên không được để trống";
                validate = false;
            } else if (name.length < 5) {
                validate_name.innerHTML = "Họ và tên phải lớn hơn 5 ký tự";
                validate = false;
            }

            const regexEmail = /^[\w.-]+@[a-zA-Z\d.-]+\.[a-zA-Z]{2,}$/;
            if (email == "") {
                validate_email.innerHTML = "Email không được để trống";
                validate = false;
            } else if (!regexEmail.test(email)) { 
                validate_email.innerHTML = "Email chưa đúng dịnh dạng";
                validate = false;
            }

            const regexPhone = /^0\d{9}$/;
            if (phone == "") {
                validate_phone.innerHTML = "Số điện thoại không được để trống";
                validate = false;
            } else if (!regexPhone.test(phone))  {
                validate_phone.innerHTML = "Số điện thoại chưa đúng dịnh dạng";
                validate = false;
            }

            if(address == "") {
                validate_address.innerHTML = "Địa chỉ không được để trống";
                validate = false;
            }
            return validate;
        }
    </script>
</head>

<body>
    <div class="container mt-5">

        <div class="row">
            <!-- Bảng bên trái -->
            <div class="col-md-8 px-5">
                <h1 class="text-center p-4">Danh sách sinh viên</h1>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Mã số sinh viên</th>
                            <th scope="col">Họ và Tên</th>
                            <th scope="col">Email</th>
                            <th scope="col">Số điện thoại</th>
                            <th scope="col">Địa chỉ</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php
                        foreach ($_SESSION['student'] as $key => $value) :
                        ?>
                            <tr>
                                <th scope="row">
                                    <?php echo $value['id']; ?>
                                </th>
                                <td> <?php echo $value['mssv']; ?> </td>
                                <td> <?php echo $value['name']; ?> </td>
                                <td> <?php echo $value['email']; ?> </td>
                                <td> <?php echo $value['phone']; ?> </td>
                                <td> <?php echo $value['address']; ?> </td>
                            </tr>
                        <?php endforeach ?>

                    </tbody>
                </table>
            </div>

            <!-- Form bên phải -->
            <div class="col-md-4">
                <h1 class="text-center p-4">Thêm sinh viên</h1>
                <form action="" method="post" onsubmit="return validateForm()">
                    

                    <div class="mb-3">
                        <label for="mssv" class="form-label">Mã sinh viên</label>
                        <input type="text" class="form-control" id="mssv" name="mssv">
                        <p id="validate_mssv" class="form-text text-danger"></p>
                    </div>

                    <div class="mb-3">
                        <label for="name" class="form-label">Họ và Tên</label>
                        <input type="text" class="form-control" id="name" name="name">
                        <p id="validate_name" class="form-text text-danger"></p>
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="text" class="form-control" id="email" name="email" aria-describedby="emailHelp">
                        <p id="validate_email" class="form-text text-danger"></p>
                    </div>

                    <div class="mb-3">
                        <label for="phone" class="form-label">Số điện thoại</label>
                        <input type="text" class="form-control" id="phone" name="phone">
                        <p id="validate_phone" class="form-text text-danger"></p>
                    </div>

                    <div class="mb-3">
                        <label for="address" class="form-label">Địa chỉ</label>
                        <input type="text" class="form-control" id="address" name="address">
                        <p id="validate_address" class="form-text text-danger"></p>
                    </div>

                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>

            </div>
        </div>
    </div>


</body>

</html>