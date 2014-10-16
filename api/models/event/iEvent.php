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
    function id();

    /**
     * @return this|string
     */
    function name();

    /**
     * @return this|int
     */    
    function created();

    /**
     * @return this|int
     */    
    function updated();

    /**
     * @return this|[]
     */    
    function articleIds();
}

