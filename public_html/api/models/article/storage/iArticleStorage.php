<?php
/**
 * @author VaL
 * @copyright Copyright (C) 2014 VaL::bOK
 * @package protonews.hub
 */

/**
 * Api for article storage
 */
interface iArticleStorage {

    /**
     * Fetches a list of articles
     *
     * @param $limit int
     * @param $offset int
     * @return iArticle[]
     */
    function fetchList($limit, $offset);
}