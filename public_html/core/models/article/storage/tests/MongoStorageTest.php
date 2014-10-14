<?php
/**
 * @author VaL
 * @copyright Copyright (C) 2014 VaL::bOK
 * @package protonews.hub
 */

require_once 'autoload.php';

class MongoStorageTest extends PHPUnit_Framework_TestCase {

    function testList() {
        $collection = MongoArticleStorage::collection();
        $m = new MongoArticleStorage($collection);
        $list = $m->fetchList();
        $this->assertTrue(is_array($list));
        $this->assertTrue(count($list) > 0);
        foreach ($list as $item) {
            $this->assertTrue($item instanceof Article);
        }
    }

    function testLimitList() {
        $collection = MongoArticleStorage::collection();
        $m = new MongoArticleStorage($collection);
        $list = $m->fetchList(10);
        $this->assertTrue(is_array($list));
        $this->assertEquals(10, count($list));
    }

    function testLimitOffsetList() {
        $collection = MongoArticleStorage::collection();
        $m = new MongoArticleStorage($collection);
        $limit = 2;
        $list = $m->fetchList($limit);
        $this->assertTrue(is_array($list));
        $this->assertEquals($limit, count($list));
        $list2 = $m->fetchList($limit, 2);
        $this->assertTrue(is_array($list2));
        $this->assertEquals($limit, count($list2));
        for ($i = 0; $i < $limit; $i++) {
            $this->assertNotEquals($list[$i]->id, $list2[$i]->id);
        }
    }

}
?>