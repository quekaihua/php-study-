<?php
class foo{
	const BAR = <<<'EOT'
bar
EOT;

	const BAZ = <<<EOT
baz
EOT;
}

echo foo::BAR , PHP_EOL;
echo foo::BAZ , PHP_EOL;