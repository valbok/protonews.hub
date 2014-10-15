var offset = 0;
$( document ).ready(function(){
    $('.more').click(function() {
        offset += 10;
        $('.loader').show();
        var link = '/ajax/articles?offset=' + offset;
        $.get( link,
                function(data) {
                    $(".articles").append(data);
                    $('.loader').hide();
                }
        );

        return false;
    });
});

