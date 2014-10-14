<?php
/**
 * @author VaL
 * @copyright Copyright (C) 2014 VaL::bOK
 * @package protonews.hub
 */

/**
 * Event implementation
 */
class Event implements iEvent {

    use tUnexpandbleFields;

    /**
     * @var string[]
     */
    protected $articleIds = array();

    /**
     * @var int
     */
    protected $id = false;

    /**
     * @var string
     */
    protected $name = false;

    /**
     * @var int
     */
    protected $created = false;

    /**
     * @var int
     */
    protected $updated = false;

    /**
     * @copydoc iEvent::append
     */
    function append($id) {
        $this->articleIds[$id] = $id;

        return $this;
    }

    /**
     * @copydoc iEvent::id
     */
    function id($v = null) {
        return $this->setget('id', $v);
    }

    /**
     * @copydoc iEvent::content
     */
    function name($v = null) {
        return $this->setget('name', $v);
    }

    /**
     * @copydoc iEvent::created
     */
    function created($v = null) {
        return $this->setget('created', $v);
    }

    /**
     * @copydoc iEvent::updated
     */
    function updated($v = null) {
        return $this->setget('updated', $v);
    }

    /**
     * @copydoc iEvent::updated
     */
    function articleIds($v = null) {
        return $this->setget('articleIds', $v);
    }
}

