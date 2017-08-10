<?php

preg_match('/(?:\D+|<\d+)*[!?]/', 'foobar foobar foobar');
var_dump(preg_last_error() == PREG_BACKTRACK_LIMIT_ERROR);
var_dump(preg_last_error());
var_dump(get_defined_constants(true)['pcre']);
echo array_flip(get_defined_constants(true)['pcre'])[preg_last_error()];
