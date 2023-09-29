$(document).ready(function() {
    $('#load-data').click(function() {
        $.ajax({
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
        var container = $('#data-container');
        container.empty();
        data.forEach(function(post) {
            container.append('<div><h3>' + post.title + '</h3><p>' + post.body + '</p></div>');
        });
    }
});
