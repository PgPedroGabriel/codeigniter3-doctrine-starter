<?php
function autoload()
{
    spl_autoload_register(function($class)
    {
        if(strpos($class,'CI_') !== 0 && file_exists(APPPATH.'core/'.$class.'.php'))
        {
            require_once APPPATH . 'core/' . $class.'.php';
        }
    });
}