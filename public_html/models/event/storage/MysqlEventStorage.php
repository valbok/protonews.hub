<?php
/**
 * @author VaL
 * @copyright Copyright (C) 2014 VaL::bOK
 * @package protonews.hub
 */

/**
 * Implementation of mysql storage for events
 */
class MysqlEventStorage implements iEventStorage {

    /**
     * @var PDO
     */
    protected $pdo = false;

    /**
     * @param PDO
     */
    function __construct(PDO $pdo) {
        $this->pdo = $pdo;
    }

    /**
     * Executes select queries
     *
     * @return []
     */
    protected function query($q) {
        return $this->pdo->query($q)->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Executes a query
     *
     * @return bool
     */
    protected function exec($q) {
        return $this->pdo->exec($q);
    }

    /**
     * @copydoc iEventStorage::fetch
     */
    function fetch($id) {
        $id = intval($id);
        $sql = 'SELECT * FROM event WHERE id = ' . $id;
        $e = $this->query($sql);
        if (!isset($e[0])) {
            return false;
        }

        return $this->parse($e[0]);
    }

    /**
     * @copydoc iEventStorage::fetchList
     */
    function fetchList($limit = false, $offset = false) {
        $sql = 'SELECT * FROM event';
        if ($limit or $offset) {
            $sql .= ' limit ' . intval($offset) . ', ' . intval($limit);
        }
        $result = array();
        $list = $this->query($sql);
        foreach ($list as $item) {
            $result[] = $this->parse($item);
        }

        return $result;
    }

    /**
     * Inserts an event to db
     *
     * @return int
     */
    function insert(iEvent $event) {
        $sql = 'INSERT INTO event(name, created, updated) VALUES(';
        $sql .= '"' . self::escapeString($event->name()) . '", "' . intval($event->created()) . '", "' . intval($event->updated()) . '")';
        
        $this->exec($sql);

        $id = $this->pdo->lastInsertId();
        $event->id = $id;
        foreach ($event->articleIds() as $aid) {
            $sql = 'INSERT INTO article(event_id, article_id) VALUES(';
            $sql .= '"' . $id . '", "' . self::escapeString($aid) . '")';
            
            $this->exec($sql);
        }

        return $id;
    }

    /**
     * @return Event
     * @todo Avoid uneeded query. Use lazy init instead
     */
    protected function parse($e) {
        $event = new Event;
        $event->id($e['id']);
        $event->name($e['name']);
        $event->created($e['created']);
        $event->updated($e['updated']);

        $sql = 'SELECT article_id FROM article WHERE event_id = ' . $e['id'];
        $as = $this->query($sql);
        foreach ($as as $a) {
            $event->append($a['article_id']);
        }

        return $event;
    }

    /**
     * @return PDO
     */
    static function pdo() {
        $pdo = new PDO('mysql:host=localhost;dbname=protonews', 'root', '');
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

        return $pdo;        
    }

    function escapeString($str) {
        return $str;
    }
}
