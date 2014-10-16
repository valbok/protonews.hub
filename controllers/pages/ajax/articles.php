<?php
/**
 * @author VaL
 * @copyright Copyright (C) 2014 VaL::bOK
 * @package protonews.hub
 */

/**
 * Fetches articles by ajax
 */
class Controller_ajax_articles extends Controller_frontpage {

    /**
     * @copydoc Controller::process
     */
    function process() {
        $this->articles = $this->fetchArticles(@$_GET['offset']);

        return $this->fetch('articles/articles.tpl');
    }
}