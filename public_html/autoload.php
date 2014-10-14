<?php
/**
 * Include this file when you would like to use autoloading
 *
 * @author VaL
 * @copyright Copyright (C) 2014 VaL::bOK
 * @license GNU GPL v2
 */

/**
 * Provides the native autoload functionality
 */
class Autoloader
{
    /**
     * @var []
     */
    protected static $Classes = null;

    /**
     * Callback for autoload classes
     */
    public static function autoload($className) {
        if (self::$Classes === null) {
            self::$Classes = require 'var/autoload.php';
        }
        if (isset(self::$Classes[$className])) {
            require(self::$Classes[$className]);
        }
    }
}

spl_autoload_register(array('Autoloader', 'autoload'));

?>
