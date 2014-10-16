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
        return $this->tpl->fetch($path);
    }
}