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

                    <div class="container videoinfo">
                        <div class="ele1ment-info">
                            <h1 style="color:#666" col1orclass="video-title"><?=$event->name()?></h1>
                        </div>
                        <div class="clearfix"></div>

                        <?=self::tpl('articles/articles.tpl', array('articles' => $articles));?>
                    </div>
                </div>
            </div>
        </div>        
    </div>
</div>
                    