<?php
function exception_handler($exception){
    echo "Uncaught exception: ", $exception->getMessage(), PHP_EOL;
}
set_exception_handler("exception_handler");
throw new Exception('Some Exception');
echo "Not Executed\n";
