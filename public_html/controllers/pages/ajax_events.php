<?php
/**
 * @author VaL
 * @copyright Copyright (C) 2014 VaL::bOK
 * @package protonews.hub
 */

/**
 * Fetches articles by ajax
 */
class Controller_ajax_events extends Controller {
	
    /**
     * @copydoc Controller::process
     */
    function process() {
        $limit = 10;
        $offset = intval(@$_GET['offset']);
        $list = EventStorage::fetchList($limit, $offset);

        $tpl = Template::get();
        $tpl->list = $list;

        return $tpl->fetch('ajax/events.tpl');
	}
}