<?php

// Đa hình: Cho phép một phương thức có thể có nhiều cách thực hiện khác nhau tùy thuộc vào đối tượng gọi nó. 
    //(cho phép ghi đè phương thức trong lớp con, mà không làm biến đổi đến class cha).
class Hinh {
    public function ve() {
        echo "Vẽ hình cơ bản<br>";
    }
}

class HinhTron extends Hinh {
    public function ve() {
        echo "Vẽ hình tròn<br>";
    }
}

class HinhChuNhat extends Hinh {
    public function ve() {
        echo "Vẽ hình chữ nhật<br>";
    }
}

// Mảng các đối tượng
$dsHinh = [new Hinh(), new HinhTron(), new HinhChuNhat()];

foreach ($dsHinh as $hinh) {
    $hinh->ve(); // Mỗi object gọi phiên bản riêng của hàm `ve()`
}
?>
