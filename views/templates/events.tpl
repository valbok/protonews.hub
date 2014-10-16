<div class="page-wrapper">
    <div class="page-header-wrap">
        <header class="page-header">
            <div id="header" class="header-bar">
                <div class="wrapper clear">
                    <div class="header-bar-wrap">
                        <span class="menu-link"><span><a href="/">news</a></span></span>
                        <form class="searchform"
                          action="#">
                            <a href="/events">Events</a>
                        </form>

                        <span class="page-title clear">
                            <span class="title responsive-text-fill">
                            </span>
                        </span>
                    </div>
                </div>
            </div>
        </header>
    </div>

    <div id="main-wrapper" class="wrapper">
        <div class="main-content">
            <div id="dfdboxedit"></div>
            <div class="content">
                <div id="front-66" class="drfront">  
                    <div class="container">
                        <div class="bs-example bs-example-tabs">
                            <div class="tab-content" id="myTabContent">
                                <div id="home" class="tab-pane active">
                                    <div class="row video-collection events">
                                        <div style="float:right" class="article-extract article-extract-two-thirds left row-1 img-brd-0 bg-skin-bg_transparent-bordertop df-left-in-row df-top-in-row df-bottom-in-row">
                                                <span class="df-img-container">
                                                    <span class="df-img-container-inner">   
                                                        <span class="df-img-layer">&nbsp;</span>                    
                                                        <div class="artsource" style="right: auto">
                                                            <a href="/create/event">create</a> 
                                                        </div>
                                                    </span>
                                                </span> 
                                        </div> 
                                        <br/>
                                        <br/>                                    
                                        <?=self::tpl('events/events.tpl', array('events' => $events))?>
                                    </div>
                                    <a href="#" class="more-events">More >></a><img style="display:none" class="loader" src="/views/images/loader.gif"/>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>        
    </div>
</div>
