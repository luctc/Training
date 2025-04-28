<?php
function students() {
    $sql = "SELECT s.id AS student_id , name, email, phone, address, class_id, c.id, class_name  
        FROM students AS s
        INNER JOIN classes AS c ON s.class_id = c.id 
        ORDER BY student_id DESC";
    return pdo_query($sql);
}

function student($id){
    $sql = "SELECT s.id AS student_id , name, email, phone, address, class_id, c.id, class_name  
        FROM students AS s
        INNER JOIN classes AS c ON s.class_id = c.id 
        WHERE s.id = $id";
    return pdo_query_one($sql);
}

function insert($name, $email, $phone, $address, $class_id) {
    $sql = "INSERT INTO students (name, email, phone, address, class_id) VALUES ('$name', '$email', '$phone', '$address', '$class_id')";
    pdo_execute($sql);
}

function updateStudent($id, $name, $email, $phone, $address, $class_id) {
    $sql = "UPDATE students 
    SET name = '$name', email = '$email', phone = '$phone', address = '$address', class_id = '$class_id'
    WHERE id = $id";
    pdo_execute($sql);
}

function delete($id) {
    $sql = "DELETE FROM students WHERE id = $id";
    pdo_execute($sql);
}
