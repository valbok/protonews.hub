<?php
/**
 * @author VaL
 * @copyright Copyright (C) 2014 VaL::bOK
 * @package protonews.hub
 */

/**
 * Api for controllers
 */
interface iController {

    /**
     * Processes controller, handles params and returns formated data
     *
     * @return html
     */
    function process();
}