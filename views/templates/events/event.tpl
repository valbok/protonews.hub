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
                    <div style="float:right" class="article-extract">
                        <span class="df-img-container">
                            <span class="df-img-container-inner">   
                                <span class="df-img-layer">&nbsp;</span>                    
                                <div class="artsource" style="right: auto">
                                    <form method="post" action="/event">
                                        <input type="hidden" name="id" value="<?=$event->id()?>" />
                                        <input class="searchbutton" type="submit" name="delete" value="delete" onclick="return confirm('Are you sure you want to delete the event?')">
                                    </form>
                                </div>
                            </span>
                        </span> 
                    </div> 

                    <div class="container videoinfo">       
                        <h1 style="color:#666" col1orclass="video-title"><?=$event->name()?></h1>
                        <div class="clearfix"></div>
                        <?=self::tpl('articles/articles.tpl', array('articles' => $articles));?>
                    </div>
                </div>
            </div>
        </div>        
    </div>
</div>
                    