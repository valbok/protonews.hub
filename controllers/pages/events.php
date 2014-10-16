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

    const LIMIT = 4;

    /**
     * @copydoc Controller::process
     */
    function process() {
        $this->title = "Events";
        $this->events = self::fetchEvents();
        $this->events_total_count = self::fetchEventsCount();
        $this->limit = self::LIMIT;

        return $this->layout($this->fetch('events.tpl'));
    }

    /**
     * @return html
     */
    protected static function fetchEvents($offset = false) {
        $events = EventStorage::fetchList(self::LIMIT, $offset);

        return $events;
    }

    /**
     * @return int
     */
    protected static function fetchEventsCount() {
        return EventStorage::fetchCount();
    }
}