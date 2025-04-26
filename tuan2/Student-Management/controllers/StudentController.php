<?php
require_once __DIR__ . '/../models/student.php';
require_once __DIR__ . '/../models/class.php';
function index(){
    $students = studentAll();
    // print_r($students);
    include 'views/admin/students/index.php';
}



function create(){
    $classes = classAll();
    include 'views/admin/students/create.php';
}

function store(){
    include 'views/admin/students/index.php';
}

function show(){
    include 'views/admin/students/index.php';
}

function edit(){
    include 'views/admin/students/index.php';
}
function update(){
    include 'views/admin/students/index.php';
}

function destroy(){
    include 'views/admin/students/index.php';
}
