<?php
trait foo{}
class bar{
    use foo;
}
$o = new bar();
print_r(class_uses($o));

print_r(class_uses('bar'));

