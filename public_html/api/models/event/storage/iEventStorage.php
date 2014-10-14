<?php
/**
 * @author VaL
 * @copyright Copyright (C) 2014 VaL::bOK
 * @package protonews.hub
 */

/**
 * Api for event storage
 */
interface iEventStorage {

    /**
     * Fetches a list of events
     *
     * @param $limit int
     * @param $offset int
     * @return iEvent[]
     */
    function fetchList($limit, $offset);

    /**
     * Fetches one object
     *
     * @param $id int
     * @return iEvent
     */
    function fetch($id);
}