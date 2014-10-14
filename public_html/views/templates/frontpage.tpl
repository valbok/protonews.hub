<script type="text/javascript">
    
    $(document).ready(function(e){
        var url = '/ajax/articles';
        $.post(url, 
            function(data){
                alert(data);
            });

        var url = '/ajax/events';
        $.post(url, 
            function(data){
                alert(data);
            });
    });

</script>
