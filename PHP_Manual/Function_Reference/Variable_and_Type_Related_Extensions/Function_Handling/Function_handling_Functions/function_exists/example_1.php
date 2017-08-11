<?php
if(function_exists('imap_open')){
    echo "yes, IMAP is opened.";
}else{
    echo "no, IMAP isn't opened";
}
