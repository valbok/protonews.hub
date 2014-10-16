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
        $this->title = "News feed";
        $this->articles = $this->fetchArticles();

        return $this->layout($this->fetch('frontpage.tpl'));
    }

    /**
     * @return html
     */
    protected function fetchArticles($offset = false) {
        $result = array();
        try {
            $limit = 10;
            $result = ArticleStorage::fetchList($limit, $offset);
        } catch (Exception $e) {
            $this->errors[] = $e->getMessage();
        }

        return $result;
    }
}