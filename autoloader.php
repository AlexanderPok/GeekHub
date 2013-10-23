<?php
/**
 * Created by JetBrains PhpStorm.
 * User: PokuZz
 * Date: 22.10.13
 * Time: 22:18
 * To change this template use File | Settings | File Templates.
 */

class Autoloader
{
    public static function register()
    {
        spl_autoload_register(array('Autoloader', 'loadClass'));
    }
    public static function loadClass($className)
    {
        $className = ltrim($className, '\\');
        $fileName  = '';
        if ($lastNsPos = strrpos($className, '\\')) {
            $namespace = substr($className, 0, $lastNsPos);
            $className = substr($className, $lastNsPos + 1);
            $fileName  = str_replace('\\', DIRECTORY_SEPARATOR, $namespace) . DIRECTORY_SEPARATOR;
        }
        $fileName .= str_replace('_', DIRECTORY_SEPARATOR, $className) . '.php';

        require $fileName;
    }
}
