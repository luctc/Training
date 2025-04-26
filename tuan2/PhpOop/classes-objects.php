<?php

// Class là một khuôn mẫu (blueprint) để tạo ra các đối tượng (objects). Nó định nghĩa các thuộc tính (properties) và phương thức (methods) mà một đối tượng có thể có.
class SanPham
{
    // Thuộc tính
    public $ten;
    public $gia;

    // Constructor là một phương thức đặc biệt được tự động gọi khi bạn khởi tạo một object.
    public function __construct($ten, $gia)
    {
        $this->ten = $ten;
        $this->gia = $gia;
    }

    //Destructor là phương thức được tự động gọi khi object bị hủy (kết thúc chương trình hoặc unset đối tượng). 
    function __destruct()
    {
        echo "Sản phẩm có tên là: {$this->ten} và nó có giá {$this->gia}VND.<br>";
    }


    // Phương thức hiển thị thông tin sản phẩm
    public function hienThiThongTin()
    {
        echo "Sản phẩm: $this->ten - Giá: $this->gia VND<br>";
    }

    public $test;
    //nghịch
    public function test($test)
    {
        $this->test = $test;
        return $this->test;
    }
}

// Object là một thể hiện cụ thể của class. Có thể tạo nhiều đối tượng từ một class.
// Tạo đối tượng
$sp1 = new SanPham("Laptop", 15000000);
$sp2 = new SanPham("Điện thoại", 7000000);

// Gọi phương thức
$sp1->hienThiThongTin(); // Sản phẩm: Laptop - Giá: 15000000 VND
$sp2->hienThiThongTin(); // Sản phẩm: Điện thoại - Giá: 7000000 VND


echo $sp1->test('hahah') . "<br>";
