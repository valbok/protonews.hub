<div class="container">
    <div class="bs-example bs-example-tabs">
        <div class="tab-content" id="myTabContent">
            <div id="home" class="tab-pane active">
                <div class="row video-collection events">
                    <?=self::tpl('events/events.tpl', array('events' => $events))?>
                </div>
                <a href="#" class="more-events">More >></a><img style="display:none" class="loader" src="/views/images/loader.gif"/>
            </div>
        </div>
    </div>
</div>
