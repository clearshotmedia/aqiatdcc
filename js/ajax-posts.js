
// ajax posts
// https://premium.wpmudev.org/blog/load-posts-ajax/
(function($) {
    
    
    function find_page_number( element ) {
		element.find('span').remove();
		return parseInt( element.html() );
	}


    $(document).on( 'click', '.posts a', function( event ) {
        event.preventDefault();
            console.log('ghridj');
        
        $('.posts a').removeClass('clicked');
        $(this).addClass('clicked');
        $('#newsout ').empty();
        $postid = $(this).attr("id");
        console.log($postid);
        $.ajax({
            url: ajaxposts.ajaxurl,
            type: 'post',
            data: {
                action: 'ajax_pagination',
                query_vars: ajaxposts.query_vars,
                postid: $postid
            },
            success: function( html ) {
                //alert( result );
               // 
                $('#newsout').append( html );

            }
        })
    })
})(jQuery);