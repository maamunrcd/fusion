<?php
/*
 * Template Name: Product
 * 
 * The template for products Page
 *
 * This is the template that displays all products.
 *
 */
get_header();
?>
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
        <div class="container">
            <div class="row">
                <?php
                $loop = new WP_Query(
                    array(
                        'post_type' => 'products',
                        'posts_per_page' => -1,
                        'order' => 'ASC'
                    )
                );
                ?>

                <?php while ($loop->have_posts()) : $loop->the_post(); ?>

                    <div class="col-12 col-sm-6 col-md-6 col-lg-4">
                        <div class="section-item">
                            <div class="d-flex">
                                <div>
                                    <div class="product-icon">
                                        <img class="img-fluid" src="<?php echo get_field('product_icon')["url"]; ?>" />
                                    </div>
                                </div>
                                <div class="section-item-content">
                                    <h3 class="section-item-title mb-3">
                                        <a href="<?php the_permalink(); ?>">
                                            <?php echo the_title(); ?>
                                        </a>
                                    </h3>
                                    <p class="page-para">
                                        <?php echo get_field('product_small_paragraph'); ?>
                                    </p>
                                    <a class="read-more" href="<?php the_permalink(); ?>">Read More <img src="<?php echo get_template_directory_uri() ?>/assets/images/readmore.svg"></a>
                                </div>
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