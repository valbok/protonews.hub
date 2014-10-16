<?php
/**
 * @author VaL
 * @copyright Copyright (C) 2014 VaL::bOK
 * @package protonews.hub
 */

/**
 * Fetches events by ajax
 */
class Controller_ajax_events extends Controller_events {

    /**
     * @copydoc Controller::process
     */
    function process() {
        $this->events = self::fetchEvents(@$_GET['offset']);

        return $this->fetch('events/events.tpl');
    }
}