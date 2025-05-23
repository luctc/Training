<?php
function pdo_get_connection()
{
    $dburl = "mysql:host=localhost;dbname=week2;charset=utf8";
    $username = 'root';
    $password = '';

    $conn = new PDO($dburl, $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    return $conn;
}
function pdo_execute($sql)
{
    $sql_args = array_slice(func_get_args(), 1);
    try {
        $conn = pdo_get_connection();
        $stmt = $conn->prepare($sql);
        $stmt->execute($sql_args);
    } catch (PDOException $e) {
        // throw $e;
        error_log($e->getMessage()); 
        die("Có lỗi xảy ra. Vui lòng thử lại sau.");
    } finally {
        unset($conn);
    }
}
// truy vấn nhiều dữ liệu
function pdo_query($sql)
{
    $sql_args = array_slice(func_get_args(), 1);
    try {
        $conn = pdo_get_connection();
        $stmt = $conn->prepare($sql);
        $stmt->execute($sql_args);
        $rows = $stmt->fetchAll();
        return $rows;
    } catch (PDOException $e) {
        // throw $e;
        error_log($e->getMessage()); 
        die("Có lỗi xảy ra. Vui lòng thử lại sau.");
    } finally {
        unset($conn);
    }
}
// truy vấn  1 dữ liệu
function pdo_query_one($sql)
{
    $sql_args = array_slice(func_get_args(), 1);
    try {
        $conn = pdo_get_connection();
        $stmt = $conn->prepare($sql);
        $stmt->execute($sql_args);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        // đọc và hiển thị giá trị trong danh sách trả về
        return $row;
    } catch (PDOException $e) {
        // throw $e;
        error_log($e->getMessage()); 
        die("Có lỗi xảy ra. Vui lòng thử lại sau.");
    } finally {
        unset($conn);
    }
}
function pdo_query_value($sql)
{
    $sql_args = array_slice(func_get_args(), 1);
    try {
        $conn = pdo_get_connection();
        $stmt = $conn->prepare($sql);
        $stmt->execute($sql_args);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return array_values($row)[0];
    } catch (PDOException $e) {
        // throw $e;
        error_log($e->getMessage()); 
        die("Có lỗi xảy ra. Vui lòng thử lại sau.");
    } finally {
        unset($conn);
    }
}

function pdo_executeid($sql)
{
    $sql_args = array_slice(func_get_args(), 1);
    try {
        $conn = pdo_get_connection();
        $stmt = $conn->prepare($sql);
        $stmt->execute($sql_args);
        $lastInsertId = $conn->lastInsertId();

        return $lastInsertId;
    } catch (PDOException $e) {
        // throw $e;
        error_log($e->getMessage()); 
        die("Có lỗi xảy ra. Vui lòng thử lại sau.");
    } finally {
        unset($conn);
    }
}
