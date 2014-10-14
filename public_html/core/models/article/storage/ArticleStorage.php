<?php
/**
 * @author VaL
 * @copyright Copyright (C) 2014 VaL::bOK
 * @package protonews.hub
 */

/**
 * Adapter for defined article storage
 */
class ArticleStorage {

    /**
     * Fetches a list of articles
     *
     * @param $limit int
     * @param $offset int
     * @return Article[]
     */
    static function fetchList($limit = false, $offset = false) {
        $list = self::storage()->fetchList($limit, $offset);

        return $list;
    }

    /**
     * @return iArticleStorage
     */
    protected static function storage() {
        static $db = false;
        if (!$db) {
            $db = new MongoArticleStorage(MongoArticleStorage::collection());
        }
        return $db;
    }
}

