<?php

namespace App\services;

class Connection
{
    public static function make($config)
    {
        return new \PDO(
            'mysql:host=' . $config['host'] . ';dbname=' . $config['dbname'],
            $config['login'],
            $config['password'],
            $config['options']
        );
    }
}