<?php
require __DIR__ . '/vendor/autoload.php';

use App\TestClass;

$test = new TestClass();
echo $test->sayHello();