<div class="df-container row-1 df-container-skin-three-fourth">   
    <div class="df-container-inner">        
        <div class="article-extract article-extract-two-thirds left row-1 img-brd-0 bg-skin-bg_transparent-bordertop df-left-in-row df-top-in-row df-bottom-in-row">
            <div class="article-content">       
                <span class="df-img-container">
                    <span class="df-img-container-inner">
                        <? if ($article->imgUrl()) { ?>
                            <a class="cxense" href="<?=$article->link()?>">
                                <img src="<?=$article->imgUrl()?>" alt=" " class="article-image" />
                            </a>
                        <? } ?>
                        <span class="df-img-layer"></span>                    
                        <div class="artsource" style="right: auto">
                            <a href="<?=$article->link()?>"><?=$article->domain()?></a> 
                        </div>
                    </span>
                </span> 
                <p class="subtitle editLine cXenseParse notDefault t19 title_3">
                    <?=implode('<br/>', $article->content())?>
                </p>
                <br/>
            </div>  
        </div> 
    </div>
</div>
