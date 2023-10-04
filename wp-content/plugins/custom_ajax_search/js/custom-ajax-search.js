jQuery(document).ready(function($) {
    $('#search-button').on('click', function() {
        var searchQuery = $('#search').val();

        $.ajax({
            url: ajax_object.ajax_url,
            type: 'post',
            data: {
                action: 'custom_ajax_search',
                query: searchQuery
            },
            success: function(response) {
                $('.blogs-list').html(response);
            }
        });
    });
});


