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
        $offset = @$_GET['offset'];
        $this->events = self::fetchEvents($offset);
        $this->has_more = ($offset + self::LIMIT) < self::fetchEventsCount();

        return $this->fetch('events/events.tpl');
    }
}