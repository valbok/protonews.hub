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
        $limit = 10;
        $offset = intval(@$_GET['offset']);
        $list = ArticleStorage::fetchList($limit, $offset);

        $tpl = new Template();
        $tpl->article_list = $list;

        return $tpl->fetch('frontpage.tpl');
	}
}