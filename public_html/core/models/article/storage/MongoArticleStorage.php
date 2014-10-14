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
     * Fetches a list of articles
     *
     * @param $limit int
     * @param $offset int
     * @return iArticle[]
     */
    function fetchList($limit = false, $offset = false) {
        $result = array();
        $cursor = $this->find();
        $cursor->limit($limit);
        $cursor->skip($offset);
        foreach ($cursor as $id => $value) {
            $item = new Article;
            $item->id = $id;
            $item->content = $value['content'];            
            $item->imgUrl = $value['imgUrl']; 
            $item->link = $value['link']; 
            $item->type = $value['type']; 
            $item->created = (string) $value['createTime'];
            $item->updated = (string) $value['updateTime'];

            $result[] = $item;
        }

        return $result;
    }

    /**
     * @param []
     * @return []
     */
    protected function find($q = array()) {
        return $this->collection->find($q);
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
