<?php

function loadClass($class)
{
    require $class .'.php';
}

spl_autoload_register('loadClass');

$crud = new Crud();
