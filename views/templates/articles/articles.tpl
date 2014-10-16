<?
if (!isset($preview)) {
    $preview = 'preview.tpl';
}
foreach($articles as $article) {
    self::tpl('articles/' . $preview, array('article' => $article));
}
?>