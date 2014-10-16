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
     * @exception Exception
     */
    function fetchList($limit, $offset);

    /**
     * Fetches one object
     *
     * @param $id int
     * @return iArticle
     * @exception Exception
     */
    function fetch($id);
}