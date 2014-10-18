<?php
/**
 * @author VaL
 * @copyright Copyright (C) 2014 VaL::bOK
 * @package protonews.hub
 */

/**
 * Api for events
 */
interface iEvent {
    
    /**
     * Appends new value to internal structure
     *
     * @return this
     */
    function append($articleId);

    /**
     * @return this|int
     */
    function id($newValue = null);

    /**
     * @return this|string
     */
    function name($newValue = null);

    /**
     * @return this|int
     */
    function created($newValue = null);

    /**
     * @return this|int
     */
    function updated($newValue = null);

    /**
     * @return this|[]
     */
    function articleIds($newValue = null);
}

