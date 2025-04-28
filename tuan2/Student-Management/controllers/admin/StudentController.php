<?php
require_once __DIR__ . '/../../models/student.php';
require_once __DIR__ . '/../../models/class.php';


function index()
{
    $students = students();
    // print_r($students);
    include 'views/admin/students/index.php';
}

function create()
{
    $classes = classes();
    include 'views/admin/students/create.php';
}

function store()
{
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        $name = $_POST['name'] ?? '';
        $email = $_POST['email'] ?? '';
        $phone = $_POST['phone'] ?? '';
        $address = $_POST['address'] ?? '';
        $class_id = $_POST['class_id'] ?? '';


        $error = [];

        if (empty(trim($name))) {
            $error['name'] = '*Name không được để trống!';
        }


        $regexEmail = '/^[\w\-\.]+@([\w\-]+\.)+[\w\-]{2,4}$/';
        if (empty(trim($email))) {
            $error['email'] = '*Email không được để trống!';
        } elseif (!preg_match($regexEmail, $email)) {
            $error['email'] = '*Email không hợp lệ!';
        }


        $regexPhone = '/^(0\d{9,10})$/';
        if (empty(trim($phone))) {
            $error['phone'] = '*Phone không được để trống!';
        } elseif (!preg_match($regexPhone, $phone)) {
            $error['phone'] = '*Phone không hợp lệ!';
        }


        if (empty(trim($address))) {
            $error['address'] = '*Address không được để trống!';
        }

        if (!empty($error)) {
            $classes = classes();
            include 'views/admin/students/create.php';
            return;
        }

        insert($name, $email, $phone, $address, $class_id);
        header('Location: index.php?act=students');
        exit;
    }
}

function show()
{
    if (isset($_GET['id']) && ($_GET['id'] > 0)) {
        $student = student($_GET['id']);
        // print_r($student);
    }
    include 'views/admin/students/show.php';
}

function edit()
{
    if (isset($_GET['id']) && ($_GET['id'] > 0)) {
        $student = student($_GET['id']);
        // var_dump($student);
    }
    $classes = classes();
    include 'views/admin/students/edit.php';
}
function update()
{
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        $id = $_POST['id'] ?? '';
        $name = $_POST['name'] ?? '';
        $email = $_POST['email'] ?? '';
        $phone = $_POST['phone'] ?? '';
        $address = $_POST['address'] ?? '';
        $class_id = $_POST['class_id'] ?? '';


        $error = [];
        if (empty(trim($name))) {
            $error['name'] = '*Name không được để trống!';
        }


        $regexEmail = '/^[\w\-\.]+@([\w\-]+\.)+[\w\-]{2,4}$/';
        if (empty(trim($email))) {
            $error['email'] = '*Email không được để trống!';
        } elseif (!preg_match($regexEmail, $email)) {
            $error['email'] = '*Email không hợp lệ!';
        }


        $regexPhone = '/^(0\d{9})$/';
        if (empty(trim($phone))) {
            $error['phone'] = '*Phone không được để trống!';
        } elseif (!preg_match($regexPhone, $phone)) {
            $error['phone'] = '*Phone không hợp lệ!';
        }


        if (empty(trim($address))) {
            $error['address'] = '*Address không được để trống!';
        }

        if (!empty($error)) {
            $classes = classes();
            $student = [
                'student_id' => $id,
                'name' => $name,
                'email' => $email,
                'phone' => $phone,
                'address' => $address,
                'class_id' => $class_id
            ];
            include 'views/admin/students/edit.php';
            return;
        }

        updateStudent($id, $name, $email, $phone, $address, $class_id);
        header('Location: index.php?act=students');
        exit;
    }
}

function destroy()
{
    if (isset($_POST['id']) && ($_POST['id'] > 0)) {
        delete($_POST['id']);
    }
    header('Location: index.php?act=students');
    exit;
}
