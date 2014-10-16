var article_offset = 0;
var event_offset = 0;
$( document ).ready(function(){
    $('.more').click(function() {
        article_offset += 10;
        var ths = this;
        var service = $(this).data('service') || "articles";
        $(ths).next('.loader').show();
        var link = '/ajax/' + service + '?offset=' + article_offset;
        $.get( link,
                function(data) {
                    $(".articles").append(data);
                    $(ths).next('.loader').hide();
                }
        );

        return false;
    });

    $('.more-events').click(function() {
        event_offset += 4;
        var ths = this;
        $(ths).next('.loader').show();
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

