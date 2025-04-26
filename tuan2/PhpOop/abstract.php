<?php

// abstract là lớp trừu tượng, dùng làm khuôn mẫu cho các lớp con.
// Nó không thể được khởi tạo trực tiếp, chỉ có thể được kế thừa.
// Trong abstract class vẫn có thể khai báo các thuộc tính và phương thức bình thường 


// KHI NÀO DÙNG
// Một lớp cha tổng quát, dùng chung logic.
// Một vài phương thức bạn muốn lớp con tự định nghĩa lại.

abstract class NhanVien {
    protected $ten;

    public function __construct($ten) {
        $this->ten = $ten;
    }

    // Hàm có thân
    public function hienThiTen() {
        echo "Nhân viên: $this->ten<br>";
    }

    // Phương thức trừu tượng
    abstract public function tinhLuong();
}

class NhanVienToanThoiGian extends NhanVien {
    private $luongThang;

    public function __construct($ten, $luongThang) {
        parent::__construct($ten);
        $this->luongThang = $luongThang;
    }

    public function tinhLuong() {
        return $this->luongThang;
    }
}

class NhanVienBanThoiGian extends NhanVien {
    private $soGio;
    private $luongTheoGio;

    public function __construct($ten, $soGio, $luongTheoGio) {
        parent::__construct($ten);
        $this->soGio = $soGio;
        $this->luongTheoGio = $luongTheoGio;
    }

    public function tinhLuong() {
        return $this->soGio * $this->luongTheoGio;
    }
}

$nv1 = new NhanVienToanThoiGian("An", 10000000);
$nv2 = new NhanVienBanThoiGian("Bình", 80, 50000);

$nv1->hienThiTen();
echo "Lương: " . $nv1->tinhLuong() . " VND<br><br>";

$nv2->hienThiTen();
echo "Lương: " . $nv2->tinhLuong() . " VND<br>";

