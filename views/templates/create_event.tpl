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
                    <div st1yle="float:left">  
                        <?=$errors?"<p>" . implode('<br/>', $errors) . "</p>":""?>
                        <form method="post" class="navbar-form navbar-right" action="/create/event" >
                            <div class="form-group">
                                <input type="text" autocomplete="off" placeholder="Name" class="search-input form-control" name="title" id="searchstring">
                            </div>
                            <input class="searchbutton" type="submit" value="Create event" name="create">
                            <br/><br/><br/><br/><br/>
                            <div class="articles">
                                <?=self::tpl('articles/articles.tpl', array('articles' => $articles, 'preview' => 'create_event_preview.tpl'))?>
                            </div>

                            <a href="#" data-service="create/event/articles" class="more">More >></a><img style="display:none" class="loader" src="/views/images/loader.gif"/>
                        </form>
                    </div>
                </div>
            </div>
        </div>        
    </div>
</div>
