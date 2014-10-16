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
     * @exception Exception
     */
    function fetchList($limit, $offset);

    /**
     * Fetches one object
     *
     * @param $id int
     * @return iEvent
     * @exception Exception
     */
    function fetch($id);

    /**
     * Inserts an event to db
     *
     * @return int Id of inserted value or false
     * @exception Exception
     */
    function insert(iEvent $event);

    /**
     * Deletes an event from db
     *
     * @return void
     * @exception Exception
     */
    function delete($id);
}