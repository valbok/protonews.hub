<?
foreach($articles as $article) {
    self::tpl('articles/preview.tpl', array('article' => $article));
}
?>