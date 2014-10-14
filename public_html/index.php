<?php
/**
 * @author VaL
 * @copyright Copyright (C) 2014 VaL::bOK
 * @package protonews.hub
 */

ini_set('display_errors', 1);
error_reporting(E_ALL);

require 'autoload.php';

$uri = $_SERVER['SCRIPT_NAME'];
try {
    echo trim(
        ControllerHandler::process(
            $uri == '/' ? 'frontpage' : substr($uri, 1)
        )
    );
} catch (Exception $e) {
    echo $e->getMessage();
}
