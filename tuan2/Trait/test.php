<?php

include("trait.php");

class TestClass1
{
    use TraitTest;
}


$a1 = new TestClass1;
$a1->testTrait(); // Output: hahahahhhhahahha





class TestClass2
{
    use TraitTest;

    public function testTrait()
    {
        echo "<br> hihiihihihihihhihi";
    }
}

$a2 = new TestClass2;
$a2->testTrait(); // Output: hihiihihihihihhihi