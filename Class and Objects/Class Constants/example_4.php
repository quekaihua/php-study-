<?php
//PHP5.6后支持常量表达式
const ONE = 1;
class foo{
	const TWO = ONE * 2;
	const THREE = ONE + self::TWO;
	const SENTENCE = 'The value of THREE IS ' . self::THREE;
}

echo foo::TWO , PHP_EOL;
echo foo::THREE , PHP_EOL;
echo foo::SENTENCE , PHP_EOL;