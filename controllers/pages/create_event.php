<?php
/**
 * @author VaL
 * @copyright Copyright (C) 2014 VaL::bOK
 * @package protonews.hub
 */

/**
 * Creates event
 */
class Controller_create_event extends Controller_frontpage {

    /**
     * @copydoc Controller::process
     */
    function process() {
        $errors = array();
        if (isset($_POST['create'])) {
            $name = isset($_POST['title']) ? $_POST['title'] : false;
            $article_ids = isset($_POST['article_ids']) ? $_POST['article_ids'] : array();
            if (!$name) {
                $errors[] = 'Name is required';
            }

            $ids = array();
            foreach ($article_ids as $id) {
                if (ArticleStorage::fetch($id)) {
                    $ids[] = $id;
                }
            }

            if (!$ids) {
                $errors[] = 'At least one article required';
            }

            if (!$errors) {
                $e = new Event;
                $e->name = $name;
                foreach ($ids as $id) {
                    $e->append($id);
                }

                try {
                    EventStorage::insert($e);
                } catch (Exception $e) {
                    $errors[] = $e->getMessage();
                }

                if (!$errors and $e->id()) {
                    self::go('/event?id=' . $e->id());
                }
            }
        }
        $this->errors = $errors;
        $this->title = "Create event";
        $this->articles = $this->fetchArticles();

        return $this->layout($this->fetch('create_event.tpl'));
    }
}