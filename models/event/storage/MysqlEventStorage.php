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
     * @copydoc iEventStorage::fetch
     */
    function fetch($id) {
        $stmt = $this->pdo->prepare('SELECT * FROM event WHERE id = :id');        
        $stmt->bindValue(':id', $id);
        $stmt->execute();

        $e = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if (!isset($e[0])) {
            return false;
        }

        return $this->parse($e[0]);
    }

    /**
     * @copydoc iEventStorage::fetchList
     */
    function fetchList($limit = false, $offset = false) {
        $sql = 'SELECT * FROM event ORDER BY created';
        if ($limit or $offset) {
            $sql .= ' limit :offset, :limit';
        }
        $stmt = $this->pdo->prepare($sql);        
        $stmt->bindValue(':limit', $limit);
        $stmt->bindValue(':offset', $offset);
        $stmt->execute();

        $result = array();
        $list = $stmt->fetchAll(PDO::FETCH_ASSOC);
        foreach ($list as $item) {
            $result[] = $this->parse($item);
        }

        return $result;
    }

    /**
     * @copydoc iEventStorage::insert
     */
    function insert(iEvent $event) {
        $sql = 'INSERT INTO event(name, created, updated) VALUES(:name, :created, :updated)';
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':name', $event->name());
        $stmt->bindValue(':created', $event->created());
        $stmt->bindValue(':updated', $event->updated());
        $stmt->execute();        

        $id = $this->pdo->lastInsertId();
        $event->id = $id;
        foreach ($event->articleIds() as $aid) {
            $sql = 'INSERT INTO article(event_id, article_id) VALUES(:id, :aid)';
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindValue(':id', $id);
            $stmt->bindValue(':aid', $aid);
            $stmt->execute();
        }

        return $id;
    }

    /**
     * @copydoc iEventStorage::delete
     */
    function delete($id) {
        $stmt = $this->pdo->prepare('DELETE FROM article WHERE event_id = :id');
        $stmt->bindValue(':id', $id);
        $stmt->execute();
        $stmt = $this->pdo->prepare('DELETE FROM event WHERE id = :id');
        $stmt->bindValue(':id', $id);
        $stmt->execute();
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

        $sql = 'SELECT article_id FROM article WHERE event_id = :id';
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':id',  $e['id']);
        $stmt->execute();
        $as = $stmt->fetchAll(PDO::FETCH_ASSOC);
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
}
