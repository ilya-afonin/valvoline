$(document).ready(function(){

    $(".pagination").remove();

    $('body').on('click', '.catalog__more a', function(e){
        e.preventDefault();
        var href = $(this).attr("href");
        var more = $(this).closest(".catalog__more");
        history.replaceState({filter: href}, "", href);
        $.post(href, { page: 1 }, function( data ) {
            more.remove();
            $("#comp_content_load").append(data);
            $(".pagination").remove();
        });
        return false;
    });

});
