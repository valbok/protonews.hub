<div class="container videoinfo">
    <div class="ele1ment-info">
        <h1 style="color:#666" col1orclass="video-title"><?=$event->name()?></h1>
    </div>
    <div class="clearfix"></div>

    <?=self::tpl('articles/articles.tpl', array('articles' => $articles));?>
</div>