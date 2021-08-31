<?php
/*
 * Template Name: Contact us
 * 
 * The template for Contact us Page
 *
 * This is the template that displays Contact us Page.
 *
 */
get_header();

if (have_posts()) : while (have_posts()) : the_post();
?>
        <main class="inner">
            <?php the_content(); ?>
        </main>
<?php
    endwhile;
endif;
get_footer();
?>