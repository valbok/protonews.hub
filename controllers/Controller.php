<?php
/**
 * @author VaL
 * @copyright Copyright (C) 2014 VaL::bOK
 * @package protonews.hub
 */

/**
 * Base abstract controller. Shares logic between other controllers.
 */
abstract class Controller implements iController {

    /**
     * @var Template
     */
    protected $tpl = false;

    /**
     * @var []
     */
    protected $errors = array();

    function __construct() {
        $this->tpl = Template::get();
    }

    /**
     * @return void
     */
    function __set($name, $value) {
        $this->tpl->$name = $value;
    }

    /**
     * @return 
     */
    function __get($name) {
        $v = $this->tpl->$name;
        if ($v === null) {
            $v = isset($this->$name) ? $this->$name : null;
        }

        return $v;
    }

    /**
     * @return html
     */
    function layout($html) {
        $this->tpl->page = trim($html);

        return $this->tpl->fetch('layout.tpl');
    }

    /**
     * @return html
     */
    function fetch($path) {
        $this->tpl->errors = $this->errors;
        return $this->tpl->fetch($path);
    }

    /**
     * @return void
     */
    function go($to) {
        header("Location: $to");
        exit;
    }

}