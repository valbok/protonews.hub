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
    function id();

    /**
     * @return this|[]
     */
    function content();

    /**
     * @return this|string
     */
    function imgUrl();

    /**
     * @return this|string
     */
    function link();

    /**
     * @return this|string
     */
    function type();

    /**
     * @return this|int
     */
    function created();

    /**
     * @return this|int
     */
    function updated();
}

