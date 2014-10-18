<?php
/**
 * @author VaL
 * @copyright Copyright (C) 2014 VaL::bOK
 * @package protonews.hub
 */

require_once 'autoload.php';

class MysqlEventStorageTest extends PHPUnit_Framework_TestCase {

    function testFetchUnknown() {
        $db = new MysqlEventStorage(MysqlEventStorage::pdo());
        $this->assertEquals(false, $db->fetch('666'));
    }

    function testInsertAndFetch() {
        $db = new MysqlEventStorage(MysqlEventStorage::pdo());
        $e = new Event;
        $e->name('test');
        $e->created(1);
        $e->updated(2);
        $e->append("542eaa5c588af691ffc53320");
        $e->append("542eaa5c588af691ffc53321");

        $this->assertTrue(is_numeric($db->insert($e)));
        $this->assertTrue($e->id() != false);

        $se = $db->fetch($e->id());
        $this->assertEquals($e->name(), $se->name());
        $this->assertEquals($e->created(), $se->created());
        $this->assertEquals($e->updated(), $se->updated());
        $this->assertEquals($e->articleIds(), $se->articleIds());
    }

    function testFetchList() {
        $db = new MysqlEventStorage(MysqlEventStorage::pdo());
        $list = $db->fetchList();
        $this->assertTrue(is_array($list));
        $this->assertTrue(count($list) > 0);
        $this->assertTrue($list[0] instanceof iEvent);
    }

    function testFetchListLimit() {
        $db = new MysqlEventStorage(MysqlEventStorage::pdo());
        $list = $db->fetchList(2);
        $this->assertTrue(is_array($list));
        $this->assertEquals(2, count($list));

        $list2 = $db->fetchList(2, 1);
        $this->assertTrue(is_array($list2));
        $this->assertEquals(2, count($list2));
        $this->assertNotEquals($list[0]->id(), $list2[0]->id());
        $this->assertNotEquals($list[1]->id(), $list2[1]->id());
    }

    function testDelete() {
        $db = new MysqlEventStorage(MysqlEventStorage::pdo());
        $list = $db->fetchList();
        $db->delete($list[0]->id());
        $this->assertFalse($db->fetch($list[0]->id()));
        $list2 = $db->fetchList();
        $this->assertEquals(count($list), count($list2) + 1);
    }

    function testCount() {
        $db = new MysqlEventStorage(MysqlEventStorage::pdo());
        $c = $db->fetchCount();
        $this->assertTrue(is_numeric($c));
        $this->assertTrue($c > 0);
    }
}
?>