<?php
$text = '<p>Test paragraph.</p><!-- Comment --> <a href="#fragment">Other text</a>';
echo strip_tags($text);
echo "\n";

// 允许 <p> 和 <a>
echo strip_tags($text, '<p><a>');
?>