<?php
$vendorDir = dirname(dirname(__FILE__));
$baseDir = dirname($vendorDir);
return array(
    'App\\Foo\\Bar' => $baseDir.'/app/Foo/Bar.php',
    'App\\Baz\\Qux' => $baseDir.'/app/Baz/Qux.php',
    'One\\Two\\Three' => $vendorDir.'/one/two/src/Three.php',
    'Four\\Five\\Six' => $vendorDir.'/four/five/src/Six.php',
);
