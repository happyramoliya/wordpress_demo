jQuery(document).ready(function() {
    jQuery('#load-data').click(function() {
        jQuery.ajax({
            url: 'https://jsonplaceholder.typicode.com/posts',
            type: 'GET',
            dataType: 'json',
            success: function(data) {
                displayData(data);
            },
            error: function(error) {
                console.log('Error:', error);
            }
        });
    });

    function displayData(data) {
        var container = jQuery('#data-container');
        container.empty();
        data.forEach(function(post) {
            container.append('<div><h3>' + post.title + '</h3><p>' + post.body + '</p></div>');
        });
    }
});
