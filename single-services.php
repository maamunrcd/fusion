<?php

/**
 * The template for displaying all single posts and attachments
 *
 * @package WordPress
 * @subpackage Infotech
 * @since Infotech 1.0
 */

get_header(); ?>
<main class="inner">
    <section class="section-wrapper products">
        <div class="page-header-wrapper carousel-inner">
            <div class="carousel-item active">
                <img src="<?php echo the_post_thumbnail_url('full'); ?>" alt="page-banner">
                <div class="carousel-caption d-flex justify-content-center align-content-center">
                    <h5 class="page-title"><?php echo get_the_title(); ?></h5>
                </div>
            </div>
        </div>
        <div class="main_content">
            <?php the_content(); ?>
        </div>
    </section>

</main>


<?php get_footer(); ?>