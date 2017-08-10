<?php
function my_autoloader($class){
    include 'classes/' . $class . '.class.php';
}

spl_autoload_register('my_autoloader');

spl_autoload_register(function($class){
    include $class.'.php';
});
spl_autoload_unregister('my_autoloader');
var_dump(spl_autoload_extensions());
print_r(spl_autoload_functions());exit;
$a = new a();
echo $a->var;
$b = new b();
echo $b->var; 
