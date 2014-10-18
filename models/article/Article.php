<?php
/**
 * @author VaL
 * @copyright Copyright (C) 2014 VaL::bOK
 * @package protonews.hub
 */

/**
 * Article basic structure
 */
class Article implements iArticle {

    use tUnexpandbleFields;

    /**
     * @var string
     */
    protected $id = false;

    /**
     * @var []
     */
    protected $content = array();

    /**
     * @var string
     */
    protected $imgUrl = false;

    /**
     * @var string
     */
    protected $link = false;

    /**
     * @var string
     */
    protected $type = false;

    /**
     * @var int
     */
    protected $created = false;

    /**
     * @var int
     */
    protected $updated = false;

    /**
     * @copydoc iArticle::id
     */
    function id($v = null) {
        return $this->setget('id', $v);
    }

    /**
     * @copydoc iArticle::content
     */
    function content($v = null) {
        return $this->setget('content', $v);
    }

    /**
     * @copydoc iArticle::imgUrl
     */
    function imgUrl($v = null) {
        return $this->setget('imgUrl', $v);
    }

    /**
     * @copydoc iArticle::link
     */
    function link($v = null) {
        return $this->setget('link', $v);
    }

    /**
     * @copydoc iArticle::type
     */
    function type($v = null) {
        return $this->setget('type', $v);
    }

    /**
     * @copydoc iArticle::created
     */
    function created($v = null) {
        return $this->setget('created', $v);
    }

    /**
     * @copydoc iArticle::updated
     */
    function updated($v = null) {
        return $this->setget('updated', $v);
    }

    /**
     * @return string
     */
    function domain() {
        $url = parse_url($this->link);
        return $url['host'];
    }
}
