var article_offset = 0;
var event_offset = 0;
$( document ).ready(function(){
    $('.more').click(function() {
        article_offset += 10;
        $(this).next('.loader').show();
        var link = '/ajax/articles?offset=' + article_offset;
        $.get( link,
                function(data) {
                    $(".articles").append(data);
                    $(this).next('.loader').hide();
                }
        );

        return false;
    });

    $('.more-events').click(function() {
        event_offset += 10;
        $(this).next('.loader').show();
        var ths = this;
        var link = '/ajax/events?offset=' + event_offset;
        $.get( link,
                function(data) {
                    $(".events").append(data);
                    $(ths).next('.loader').hide();
                }
        );

        return false;
    });

});

