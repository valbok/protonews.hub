<div>
    <?
    foreach($events as $event) {
        self::tpl('events/preview.tpl', array('event' => $event));
    }
    ?>
    <? if (!$has_more) { ?>
        <span class="events-no-more"></span>
    <? } ?>
</div>