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

    /**
     * @var string
     */
    public $id = false;

    /**
     * @var []
     */
    public $content = array();

    /**
     * @var string
     */
    public $imgUrl = false;

    /**
     * @var string
     */
    public $link = false;

    /**
     * @var string
     */
    public $type = false;

    /**
     * @var int
     */
    public $created = false;

    /**
     * @var int
     */
    public $updated = false;
}

