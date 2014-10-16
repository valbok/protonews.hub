<?php
/**
 * @author VaL
 * @copyright Copyright (C) 2014 VaL::bOK
 * @package protonews.hub
 */

/**
 * Creates event
 */
class Controller_create_event extends Controller_frontpage {

    /**
     * @copydoc Controller::process
     */
    function process() {
        $this->title = "Create event";
        $this->articles = self::fetchArticles();

        return $this->layout($this->fetch('create_event.tpl'));
    }
}