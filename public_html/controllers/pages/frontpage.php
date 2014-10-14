<?php
/**
 * @author VaL
 * @copyright Copyright (C) 2014 VaL::bOK
 * @package protonews.hub
 */

/**
 * Frontpage logic
 */
class Controller_frontpage extends Controller {
	
    /**
     * @copydoc Controller::process
     */
    function process() {
        return self::layout(Template::get()->fetch('frontpage.tpl'));
	}
}