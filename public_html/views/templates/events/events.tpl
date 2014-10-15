<div class="container">
    <div class="bs-example bs-example-tabs">
        <div class="tab-content" id="myTabContent">
            <div id="home" class="tab-pane active">
                <div class="row video-collection">
                    <?
                    foreach($events as $event) {
                        self::tpl('events/preview.tpl', array('event' => $event));
                    }
                    ?>                
                </div>
            </div>
        </div>
    </div>
</div>
