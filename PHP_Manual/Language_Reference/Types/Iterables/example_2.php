<?php
// Iterable parameter default value example
function foo(iterable $itetable = []){
	foreach ($iterable as $value){
		//...
	}
}