<?php

// kế thừa: Lớp con kế thừa thuộc tính và phương thức từ lớp cha (dùng từ khóa extends).
class DongVat {
    public $ten;

    public function __construct($ten) {
        $this->ten = $ten;
    }

    public function keu() {
        echo "$this->ten đang kêu<br>";
    }
}

class Meo extends DongVat {
    public function keu() {
        echo "$this->ten: Meo meo!<br>";
    }
}

$meo = new Meo("Mèo Mun");
$meo->keu(); // Gọi phương thức được ghi đè (override)

