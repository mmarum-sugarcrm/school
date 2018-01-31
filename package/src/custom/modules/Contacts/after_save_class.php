<?php

if (!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');

class after_save_class
{
    function after_save_method($bean, $event, $arguments)
    {
        $GLOBALS['log']->fatal('Hello, Lauren!');
    }
}

?>