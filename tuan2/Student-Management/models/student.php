<?php
function studentAll() {
    $sql = "SELECT s.id AS student_id , name, email, phone, address, class_id, c.id, class_name  
        FROM students AS s
        INNER JOIN classes AS c ON s.class_id = c.id 
        ORDER BY student_id DESC";
    return pdo_query($sql);
}