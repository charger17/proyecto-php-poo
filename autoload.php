<?php

function controller_autoloadc($className){
    include 'controllers/'.$className.'.php';
}

spl_autoload_register('controller_autoloadc'); 