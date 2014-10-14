<?php
/**
 * @author VaL
 * @copyright Copyright (C) 2014 VaL::bOK
 * @package protonews.hub
 */

/**
 * Proxy for defined event storage
 */
class EventStorage {

    /**
     * @copydoc iEventStorage::fetch
     */
    static function fetch($id) {
        static $cache = array();
        if (isset($cache[$id])) {
            return $cache[$id];
        }
        
        $list = self::storage()->fetch($id);
        $cache[$id] = $list;

        return $list;
    }

    /**
     * @copydoc iEventStorage::fetchList
     */
    static function fetchList($limit = false, $offset = false) {
        static $cache = array();
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
            $db = new MysqlEventStorage(MysqlEventStorage::pdo());
        }
        return $db;
    }
}

