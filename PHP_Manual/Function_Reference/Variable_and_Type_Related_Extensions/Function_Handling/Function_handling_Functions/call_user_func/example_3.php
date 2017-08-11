<?php
namespace Foobar;

class Foo{
    static public function test(){
        print "Hello world!\n";
    }
}

call_user_func(__NAMESPACE__ . '\Foo::test');
call_user_func([__NAMESPACE__ . '\Foo', 'test']);
