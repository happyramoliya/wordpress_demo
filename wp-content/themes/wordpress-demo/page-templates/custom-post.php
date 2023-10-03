<?php
//Template Name: Post Demo
get_header();
?>

<div>
    <?php echo do_shortcode('[custom_ajax_search]');?>
</div>

<section class="blog-collection-content">
    <div class="container">
        <div class="blogs-list">
            <?php $the_query = new WP_Query(array(
                'posts_per_page' => -1,
                'post_type' => 'post',
            )
            );?>
            <?php while ($the_query->have_posts()): $the_query->the_post();
            $featured_img_url = get_the_post_thumbnail_url($post->ID, 'full');?>
            <div class="blog-item">
                <div class="blog-feature-image">
                    <a href="<?php the_permalink();?>"><img src="<?php echo $featured_img_url; ?>" alt="salesforce"></a>
                    <div class="blog-date"><span><?php echo get_the_date('j F, Y'); ?></span></div>
                </div>
                <div class="blog-list-content">
                    <h3><a href="<?php the_permalink();?>"><?php the_title();?></a></h3>
                    <p><?php the_excerpt();?></p>
                </div>
            </div>
            <?php endwhile;?>
        </div>
    </div>
</section>

<?php
get_footer();
?>



