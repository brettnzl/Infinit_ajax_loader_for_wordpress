jQuery(document).ready(function($) {

    var next_page = 2;
    var total_pages = $('.rd-load-more a').data('totalpages');
    var loading = false;

    $('.rd-load-more a').on('click', function(event) {
        event.preventDefault();

        if( ! loading ) {
            loading = true;

            $('.rd-load-more').addClass('loading');

            $.ajax({
                url: ajaxurl,
                type: 'post',
                data: {
                    action: 'rd_load_more',
                    next_page: next_page,
                    total_pages: total_pages
                },
                success: function(response) {
                    $('.rd-load-more').removeClass('loading');
                    $('#post-ajax-container').append(response);
                    next_page++;

                    if( next_page > total_pages ) {
                        $('.rd-load-more').remove();
                    }

                    loading = false;
                },
                error: function() {
                    $('.rd-load-more').removeClass('loading');
                    loading = false;
                }
            });
        }
    });

});
