jQuery(function ($) {
    var page = 2; // Track page number for load more

    $('#load-more-button').on('click', function () {
        $.ajax({
            type: 'POST',
            url: ajaxpagination.ajaxurl,
            data: {
                action: 'load_more_posts',
                page: page,
            },
            success: function (response) {
                if (response.trim() === 'nomore') {
                    // No more posts
                    $('#load-more-container').html('<p>No more books to load.</p>');
                } else {
                    $('#book-archive').append(response);
                    page++;
                }
            }
        });
    });
});


// jQuery(function ($) {
//     var page = 2; // Track page number for infinite scrolling

//     // Function to load more posts
//     function loadMorePosts() {
//         $.ajax({
//             type: 'POST',
//             url: ajaxpagination.ajaxurl,
//             data: {
//                 action: 'load_more_posts',
//                 page: page,
//             },
//             success: function (response) {
//                 if (response.trim() === 'nomore') {
//                     // No more posts
//                     $('#book-archive').append('<p>No more books to load.</p>');
//                     $(window).off('scroll'); // Disable infinite scrolling
//                 } else {
//                     $('#book-archive').append(response);
//                     page++;
//                 }
//             }
//         });
//     }

//     // Infinite scrolling with Waypoints
//     $('#book-archive').waypoint({
//         handler: function (direction) {
//             if (direction === 'down') {
//                 loadMorePosts();
//             }
//         },
//         offset: 'bottom-in-view',
//     });
// });



// jQuery(function ($) {
//     var page = 2; // Track page number for infinite scrolling
//     var loading = false; // Flag to prevent multiple simultaneous requests

//     // Function to load more posts
//     function loadMorePosts() {
//         if (loading) return; // Prevent multiple simultaneous requests
//         loading = true;

//         $.ajax({
//             type: 'POST',
//             url: ajaxpagination.ajaxurl,
//             data: {
//                 action: 'load_more_posts',
//                 page: page,
//             },
//             success: function (response) {
//                 if (response.trim() === 'nomore') {
//                     // No more posts
//                     $('#book-archive').append('<p>No more books to load.</p>');
//                     $(window).off('scroll'); // Disable infinite scrolling
//                 } else if (response.trim() === 'error') {
//                     // Error loading posts
//                     $('#book-archive').append('<p>Error loading posts.</p>');
//                     $(window).off('scroll'); // Disable infinite scrolling
//                 } else {
//                     $('#book-archive').append(response);
//                     page++;
//                 }

//                 loading = false; // Reset the loading flag
//             },
//             error: function () {
//                 // Handle AJAX error
//                 $('#book-archive').append('<p>Error loading posts.</p>');
//                 $(window).off('scroll'); // Disable infinite scrolling
//                 loading = false; // Reset the loading flag
//             }
//         });
//     }

//     // Infinite scrolling with Waypoints
//     $('#book-archive').waypoint({
//         handler: function (direction) {
//             if (direction === 'down') {
//                 loadMorePosts();
//             }
//         },
//         offset: 'bottom-in-view',
//     });
// });