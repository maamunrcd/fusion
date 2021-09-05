<?php
/*
 * Template Name: Service
 * 
 * The template for Services Page
 *
 * This is the template that displays all Services.
 *
 */
get_header();
?>
<main class="inner">
    <section class="section-wrapper service">
        <div class="page-header-wrapper carousel-inner">
            <div class="carousel-item active">
                <img src="<?php echo the_post_thumbnail_url('full'); ?>" alt="page-banner">
                <div class="carousel-caption d-flex justify-content-center align-content-center">
                    <h5 class="page-title"><?php echo get_the_title(); ?></h5>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <?php
                $loop = new WP_Query(
                    array(
                        'post_type' => 'services',
                        'posts_per_page' => -1,
                        'order' => 'ASC'
                    )
                );
                ?>

                <?php while ($loop->have_posts()) : $loop->the_post(); ?>
                    <div class="col-12 col-sm-6 col-md-6 col-lg-4">
                        <div class="section-item">
                            <div class="section-item-icon">
                                <img class="img-fluid" src="<?php echo get_field('service_icon')["url"]; ?>" />
                                <img class="img-fluid service_icon_tool" src="<?php echo get_field('service_icon_tool')["url"]; ?>" />
                            </div>
                            <div class="section-item-content">
                                <h3 class="section-item-title mb-3">
                                    <a href="<?php the_permalink(); ?>">
                                        <?php echo the_title(); ?>
                                    </a>
                                </h3>
                                <p class="page-para">
                                    <?php echo get_field('small_paragraph'); ?>
                                </p>
                            </div>
                        </div>
                    </div>
                <?php endwhile;
                wp_reset_query(); ?>
            </div>
        </div>
    </section>
</main>
<?php
get_footer();
?>