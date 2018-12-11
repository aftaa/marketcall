<?php
/**
 * Created by PhpStorm.
 * User: Maxim Gabidullin <after@ya.ru>
 * Date: 25.11.2018
 * Time: 19:55
 */

spl_autoload_register(function (string $className) {
    $className = str_replace('\\', '/', $className);
    $className .= '.php';
    require_once $className;
});

ini_set('display_errors', '0');