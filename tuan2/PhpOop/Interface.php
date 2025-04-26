<?php


// Interface là một khuôn mẫu gồm các phương thức chưa có nội dung
// Lớp nào implements interface thì phải định nghĩa đầy đủ(khai báo lại phương thức + phải viết phần thân cho nó) các phương thức đó.
// 1 class có thể implements nhiều interface
interface DonViVanChuyen {
    public function guiHang($donHang);
    public function traCuTrangThai($maVanDon);
}


class GiaoHangNhanh implements DonViVanChuyen {
    public function guiHang($donHang) {
        echo "Gửi hàng qua Giao Hàng Nhanh: $donHang<br>";
    }

    public function traCuTrangThai($maVanDon) {
        echo "Trạng thái GHN: Đang vận chuyển - Mã: $maVanDon<br>";
    }
}

class ViettelPost implements DonViVanChuyen {
    public function guiHang($donHang) {
        echo "Gửi hàng qua ViettelPost: $donHang<br>";
    }

    public function traCuTrangThai($maVanDon) {
        echo "Trạng thái ViettelPost: Đã đến bưu cục - Mã: $maVanDon<br>";
    }
}

class GrabExpress implements DonViVanChuyen {
    public function guiHang($donHang) {
        echo "Gửi hàng qua GrabExpress: $donHang<br>";
    }

    public function traCuTrangThai($maVanDon) {
        echo "Trạng thái GrabExpress: Đã giao thành công - Mã: $maVanDon<br>";
    }
}


function xuLyVanChuyen(DonViVanChuyen $donVi, $donHang, $maVanDon) {
    $donVi->guiHang($donHang);
    $donVi->traCuTrangThai($maVanDon);
}


$ghn = new GiaoHangNhanh();
$vtp = new ViettelPost();
$grab = new GrabExpress();
$grab->guiHang("test đơn hàng GrabExpress");

xuLyVanChuyen($ghn, "Đơn hàng #1001", "GHN123");
xuLyVanChuyen($vtp, "Đơn hàng #1002", "VTP456");
xuLyVanChuyen($grab, "Đơn hàng #1003", "GRB789");

