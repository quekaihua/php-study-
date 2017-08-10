<?php
$file = file_get_contents('https://www.baidu.com/');
file_put_contents( 'test.txt', $file);
$tags = get_meta_tags('test.txt');
var_dump($tags);
