jQuery(document).ready(function($) {
    $('#custom-ajax-search-form').on('submit', function(e) {
        e.preventDefault();

        var searchQuery = $('#search').val();

        $.ajax({
            url: ajaxurl,
            type: 'post',
            data: {
                action: 'custom_ajax_search',
                query: searchQuery
            },
            success: function(response) {
                $('#search-results').html(response);
            }
        });
    });
});


