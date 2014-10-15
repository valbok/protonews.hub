<?php
/**
 * @author VaL
 * @copyright Copyright (C) 2014 VaL::bOK
 * @package protonews.hub
 */

/**
 * Events frontpage logic
 */
class Controller_events extends Controller {

    /**
     * @copydoc Controller::process
     */
    function process() {
        $this->title = "Events";
        $this->events = self::fetchEvents();

        return $this->layout($this->fetch('events/events.tpl'));
    }

    /**
     * @return html
     */
    protected static function fetchEvents($offset = false) {
        $limit = 10;
        $events = EventStorage::fetchList($limit, $offset);

        return $events;
    }
}