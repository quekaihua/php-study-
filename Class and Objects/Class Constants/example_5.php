<?php
//PHP7.1支持类常量的可见性定义
class Foo{

	public const BAR = 'bar';
	private const BAZ = 'baz';

}

echo Foo::BAR, PHP_EOL;
echo Foo::BAZ, PHP_EOL;