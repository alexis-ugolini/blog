<?php

class Helper_Config
{
    public function __construct($file='default.ini')
    {
        if (! file_exists($file)) {
            $file = 'default.ini';
        }
        $this->config = parse_ini_file($file, true);
    }
    function get($value, $category)
    {
        return ((isset($this->config[$category]) && isset($this->config[$category][$value]))?$this->config[$category][$value]:null);
    }
}