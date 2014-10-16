<?
foreach($events as $event) {
    self::tpl('events/preview.tpl', array('event' => $event));
}
?>
