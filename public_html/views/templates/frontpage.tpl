<div class="page-wrapper">
    <div id="wallpaper_ad_wrapper" class="wallpaper_ad_wrapper"></div>
    <div class="page-header-wrap">
        <header class="page-header">
            <div id="header" class="header-bar">
                <div class="wrapper clear">
                    <div class="header-bar-wrap">
                        <form class="searchform"
                              action="http://r.lp4.io/sol.no/menu_d_search/http://www.kvasir.no/alle">
                            <input id="searchkvasir" class="searchfield" type="text" name="q" autocorrect="off"
                                   placeholder="Søk i Kvasir">
                            <input type="hidden" name="partnerid" value="sol">
                            <input type="hidden" name="source" value="search">
                            <input class="searchbutton" type="submit">
                        </form>

                        <span class="page-title clear">
                            <a href="http://r.lp4.io/sol.no/menu_d_logo/http://www.sol.no/" class="logo">www.sol.no</a>
                            <span class="title responsive-text-fill">
                                <?=date('F j, Y')?>                        
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
                    <div class="articles">      
                        <?=self::tpl('articles.tpl', array('articles' => $articles))?>
                    </div>

                    <a href="#" class="more">More >></a><img style="display:none" class="loader" src="/views/images/loader.gif"/>
                </div>
            </div>
        </div>
    </div>        
</body>
</html>
