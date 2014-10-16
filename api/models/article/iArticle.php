<?php
/**
 * @author VaL
 * @copyright Copyright (C) 2014 VaL::bOK
 * @package protonews.hub
 */

/**
 * Api for articles
 */
interface iArticle {

    /**
     * @return this|int
     */
    function id($newValue = null);

    /**
     * @return this|[]
     */
    function content($newValue = null);

    /**
     * @return this|string
     */
    function imgUrl($newValue = null);

    /**
     * @return this|string
     */
    function link($newValue = null);

    /**
     * @return this|string
     */
    function type($newValue = null);

    /**
     * @return this|int
     */
    function created($newValue = null);

    /**
     * @return this|int
     */
    function updated($newValue = null);
}

