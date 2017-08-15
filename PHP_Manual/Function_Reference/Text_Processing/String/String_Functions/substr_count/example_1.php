<?php
$text = 'This is a test';
echo strlen($text);

echo substr_count($text, 'is');

echo substr_count($text, 'is', 3);

echo substr_count($text, 'is', 3, 3);

echo substr_count($text, 'is', 5, 6);

$text2 = 'gcdgcdgcd';
echo substr_count($text2, 'gcd');
