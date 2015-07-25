<?php
class Composer {

    public $loader;

    public function __construct(){
        $this->loader = include 'vendor/autoload.php';
    }
}