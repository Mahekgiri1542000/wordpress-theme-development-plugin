<?php
/* Template Name: Books */

get_header();

?>

<div id="book-archive" class="grid-container">
    <?php
    // Custom query for books
    $book_query = new WP_Query(array(
        'post_type' => 'books',
        'post_status' => 'publish',
        'posts_per_page' => 4, // Display all books
        'orderby' => 'date', // Order by post date
        'order' => 'ASC', // Set the order to ascending
    ));

    if ($book_query->have_posts()) :
        while ($book_query->have_posts()) : $book_query->the_post();
            $book_title             = get_field('book_title');
            $book_short_description = get_field('book_short_description');
            $author                 = get_field('author');
            $book_image             = get_field('book_image');
    ?>
            <div class="grid-item">

                <?php if ($book_image) : ?>
                    <img src="<?php echo $book_image; ?>" alt="">
                <?php endif; ?>
                <h2><?php the_title(); ?></h2>
                <p><?php echo esc_html($author); ?></p>
                <p><?php echo esc_html($book_short_description); ?></p>

            </div>
    <?php
        endwhile;
        wp_reset_postdata(); // Reset the post data to the main query
    else :
        echo 'No books found.';
    endif;
    ?>
</div>

<div id="load-more-container">
    <button id="load-more-button">Load More</button>
</div>

<script>    
</script>

<?php
get_footer();