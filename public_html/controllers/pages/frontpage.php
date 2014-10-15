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
        $this->title = "Vi samler nyhetene for deg!";
        $this->articles = self::fetchArticles();

        return $this->layout($this->fetch('frontpage.tpl'));
	}

    /**
     * @return html
     */
    protected static function fetchArticles($offset = false) {
        $limit = 10;
        $articles = ArticleStorage::fetchList($limit, $offset);

        return $articles;
    }
}