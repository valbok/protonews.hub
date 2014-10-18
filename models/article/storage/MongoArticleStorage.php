<?php
/**
 * @author VaL
 * @copyright Copyright (C) 2014 VaL::bOK
 * @package protonews.hub
 */

/**
 * Implementation of mongo storage for articles
 */
class MongoArticleStorage implements iArticleStorage {

    /**
     * @var MongoCollection
     */
    protected $collection = false;

    /**
     * @param MongoCollection
     */
    function __construct(MongoCollection $collection) {
        $this->collection = $collection;
    }

    /**
     * @copydoc iArticleStorage::fetchList
     */
    function fetchList($limit = false, $offset = false) {
        $result = array();
        $cursor = $this->collection->find();
        $cursor->limit($limit);
        $cursor->skip($offset);
        foreach ($cursor as $id => $value) {
            $result[] = self::parse($value);
        }

        return $result;
    }

    /**
     * @return Article
     */
    protected static function parse($value) {
        $item = new Article;
        $item->id($value['_id']);
        $item->content($value['content']);
        $item->imgUrl($value['imgUrl']);
        $item->link($value['link']);
        $item->type($value['type']);
        $item->created((string) $value['createTime']);
        $item->updated((string) $value['updateTime']);

        return $item;
    }

    /**
     * @copydoc iArticleStorage::fetch
     */
    function fetch($id) {
        $o = $this->collection->findOne(array('_id' => new MongoId($id)));

        return self::parse($o);
    }

    /**
     * @return MongoCollection
     */
    static function collection() {
        $client = new MongoClient('mongodb://article_reader:article_reader@ds063879.mongolab.com:63879/heroku_app29725784');
        $db = $client->heroku_app29725784;
    
        return $db->articles;
    }
}
