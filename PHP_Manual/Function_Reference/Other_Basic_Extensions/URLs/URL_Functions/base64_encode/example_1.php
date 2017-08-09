<?php
$str = "This is an encoded string";
$de = base64_encode($str);
echo $de, PHP_EOL;
echo base64_decode($de), PHP_EOL;
