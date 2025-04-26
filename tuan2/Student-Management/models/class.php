<?php
function classAll() {
    $sql = "SELECT * FROM classes";
    return pdo_query($sql);
}