<?php
class SimpleClass{

	public $var1 = 'hello' . 'world.';
	public $var2 = <<<EOD
hello world
EOD;

	public $var3 = 1+2;
	//invalid property declarations
	public $var4 = self::myStaticMethod();
	public $var5 = $myVar;

	public $var6 = myConstant;
	public $var7 = array(true, false);

	public $var8 = <<<'EOD'
hello world
EOD;

}