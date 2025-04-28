<?php
function classes() {
    $sql = "SELECT * FROM classes";
    return pdo_query($sql);
}