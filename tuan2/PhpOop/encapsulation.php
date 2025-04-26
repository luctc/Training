<?php

// Đóng gói: Ẩn dữ liệu nội bộ của object, chỉ cho phép truy cập qua getter/setter.
class TaiKhoanNganHang {
    private $soDu = 0;

    public function guiTien($soTien) {
        if ($soTien > 0) $this->soDu += $soTien;
    }

    public function xemSoDu() {
        return $this->soDu;
    }
}

$taiKhoan = new TaiKhoanNganHang();
$taiKhoan->guiTien(1000000);
echo "Số dư: " . $taiKhoan->xemSoDu() . " VND<br>";
?>
