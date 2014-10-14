<?php
/**
 * @author VaL
 * @copyright Copyright (C) 2014 VaL::bOK
 * @package protonews.hub
 */

/**
 * Proxy for defined article storage
 */
class ArticleStorage {

    /**
     * @copydoc iArticleStorage::fetchList
     */
    static function fetchList($limit = false, $offset = false) {
        static $cache = [];
        $key = md5($limit . $offset);
        if (isset($cache[$key])) {
            return $cache[$key];
        }
        
        $list = self::storage()->fetchList($limit, $offset);
        $cache[$key] = $list;

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

