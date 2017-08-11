<?php
namespace Foobar;
class Foo{
    static public function test($name){
        print "Hello $name!\n";
    }
}

namespace Core;
use Foobar\Foo;

call_user_func_array('Foobar\Foo::test', ['john']);

#call_user_func_array([__NAMESPACE__ . '\Foo', 'test'], ['mike']);
