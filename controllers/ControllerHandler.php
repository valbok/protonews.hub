<?php
/**
 * @author VaL
 * @copyright Copyright (C) 2014 VaL::bOK
 * @package protonews.hub
 */

/**
 * Handler for controllers
 */
class ControllerHandler {

    /**
     * Processes specified controller by name
     *
     * @return html
     * @exception Exception
     */
    static function process($name) {
        $name = str_replace('/', '_', $name);
        $class = 'Controller_' . $name;
        if (!class_exists($class)) {
            throw new Exception('Could not find controller: ' . $name);
        }

        $result = new $class;
        return $result->process();
    }
}