<?php
/*
 * Template Name: Client
 * 
 * The template for clients Page
 *
 * This is the template that displays all clients.
 *
 */
get_header();
?>
<main class="inner">
    <section class="section-wrapper clients">
        <div class="page-header-wrapper carousel-inner">
            <div class="carousel-item active">
                <img src="<?php echo the_post_thumbnail_url('full'); ?>" alt="page-banner">
                <div class="carousel-caption d-flex justify-content-center align-content-center">
                    <h5 class="page-title"><?php echo get_the_title(); ?></h5>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row align-content-center align-content-center">
                <?php
                $loop = new WP_Query(
                    array(
                        'post_type' => 'clients',
                        'posts_per_page' => -1,
                        'order' => 'ASC',
                    )
                );
                ?>

                <?php while ($loop->have_posts()) : $loop->the_post(); ?>
                    <div class="col-4">
                        <div class="client-item">
                            <div class="client-info carousel-item active">
                                <img class="img-fluid" src="<?php echo the_post_thumbnail_url('full'); ?>" alt="page-banner">
                                <div class="carousel-caption">
                                    <h5 class="client-title"><?php echo get_the_title(); ?></h5>
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