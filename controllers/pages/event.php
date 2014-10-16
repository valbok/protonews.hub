<?php
/**
 * @author VaL
 * @copyright Copyright (C) 2014 VaL::bOK
 * @package protonews.hub
 */

/**
 * Events frontpage logic
 */
class Controller_event extends Controller {
	
    /**
     * @copydoc Controller::process
     */
    function process() {
        if (isset($_POST['delete'])) {
            $id = @$_POST['id'];
            try {
                EventStorage::delete($id);
                self::go('/events');
            } catch (Exception $e) {
                $this->errors[] = $e->getMessage();
            }
        }

        $event = self::fetchEvent(@$_GET['id']);
        if (!$event) {
            self::go('/');
        }
        $this->title = 'Articles of event ' . $event->name();
        $this->event = $event;
        $this->articles = self::fetchArticles($event);
        return $this->layout($this->fetch('events/event.tpl'));
    }

    /**
     * @return html
     */
    protected static function fetchEvent($id) {
        return EventStorage::fetch($id);
    }

    /**
     * @return html
     */
    protected static function fetchArticles($event) {
        $result = array();
        foreach($event->articleIds() as $id) {
            try {
                $result[] = ArticleStorage::fetch($id);
            } catch (Exception $e) {
            }
        }

        return $result;
    }
}