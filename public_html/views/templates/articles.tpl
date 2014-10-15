<?
foreach($articles as $article) {
    self::tpl('article.tpl', array('article' => $article));
}
?>