<?php
call_user_func(function($args){
    print "[$args[0]], [$args[1]]";
}, ['test', 'key']);
