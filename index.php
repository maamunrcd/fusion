<?php
/*
 * Template Name: Home Page
 * 
 * The template for Home Page
 *
 * This is the template that displays Home Page.
 *
 */
$options = get_option('infotech_theme_option'); // unique id of the framework

get_header();
?>
<main>
    <div class="slider-banner">
        <div class="container">
            <?php
            $loop = new WP_Query(
                array(
                    'post_type' => 'sliders',
                    'posts_per_page' => 3
                )
            );
            $sliderIndex = 0;
            ?>
            <?php if ($options['slider-radio'] == '0') {
            ?>
                <div class="row">
                    <div class="col-12 col-md-6">
                        <div id="slider-banner" class="carousel slide" data-ride="carousel">
                            <div class="carousel-inner">

                                <?php while ($loop->have_posts()) : $loop->the_post(); ?>
                                    <div class="carousel-item <?php echo $sliderIndex === 0 ? 'active' : '' ?>">
                                        <div class="carousel-item-wrapper">
                                            <h1 class="slider-title"><?php echo the_title(); ?></h1>
                                            <p class="slider-para">
                                                <?php echo the_content(); ?>
                                            </p>
                                            <a class="btn btn-primary" href=<?php echo get_field('slider_button_url'); ?>><?php echo get_field('slider_button_text'); ?></a>
                                        </div>
                                    </div>
                                    <?php $sliderIndex++; ?>
                                <?php endwhile;
                                wp_reset_query(); ?>

                            </div>
                        </div>
                    </div>
                    <div class="col-6 d-none d-md-block">
                        <div class="slider-thumbail">
                            <img class="img-fluid" src="<?php echo get_template_directory_uri() ?>/assets/images/slider-round-img.png">
                        </div>
                    </div>
                </div>
            <?php
            } else {
            ?>
                <div id="slider-banner" class="carousel slide" data-ride="carousel" data-interval="2000">
                    <div class="carousel-inner <?php echo $options['slider-radio'] !== '0' ? 'width-image' : '' ?>">

                        <?php while ($loop->have_posts()) : $loop->the_post(); ?>
                            <div class="carousel-item <?php echo $sliderIndex === 0 ? 'active' : '' ?>">
                                <div class="row">
                                    <div class="col-12 col-md-6">
                                        <div class="carousel-item-wrapper">
                                            <h1 class="slider-title"><?php echo the_title(); ?></h1>
                                            <p class="slider-para">
                                                <?php echo the_content(); ?>
                                            </p>
                                            <a class="btn btn-primary" href=<?php echo get_field('slider_button_url'); ?>><?php echo get_field('slider_button_text'); ?></a>
                                        </div>
                                    </div>
                                    <div class="col-6 d-none d-md-block slider-image-wrapper">
                                        <div class="slider-thumbail">
                                            <img class="img-fluid" src="<?php echo the_post_thumbnail_url('full'); ?>">
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <?php $sliderIndex++; ?>
                        <?php endwhile;
                        wp_reset_query(); ?>

                    </div>
                </div>
            <?php
            } ?>
        </div>
    </div>
    <section class="section-wrapper service">
        <div class="section-header">
            <h1 class="section-header-title text-center"><?php echo $options['all-section-tab']['service-section-title']; ?></h1>
            <h4 class="section-header-sub-title text-center">
                <?php echo $options['all-section-tab']['service-section-subtitle']; ?>
            </h4>
        </div>
        <div class="container">
            <div class="row">
                <?php
                $loop = new WP_Query(
                    array(
                        'post_type' => 'services',
                        'posts_per_page' => 6,
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
        <div class="view-all text-center">
            <a href="http://localhost/infotech/index.php/services">View All Services</a>
        </div>
    </section>
    <section class="section-wrapper marketing-review">
        <div class="container">
            <div class="row">
                <?php
                $loop = new WP_Query(
                    array(
                        'post_type' => 'announcements',
                        'posts_per_page' => 1,
                        'order' => 'DESC'
                    )
                );
                ?>

                <?php while ($loop->have_posts()) : $loop->the_post(); ?>
                    <div class="col-12 col-md-6 order-1 order-md-0">
                        <div class="marketing-review-img">
                            <img class="img-fluid" src="<?php echo get_the_post_thumbnail_url() ?>">
                        </div>
                    </div>
                    <div class="col-12 col-md-6 order-0 order-md-1">
                        <div class="marketing-review-wrapper pl-0 pl-md-3">
                            <div class="section-header">
                                <h4 class="section-header-sub-title"><?php echo get_the_title() ?></h4>
                            </div>
                            <div class="contain">
                                <?php the_content() ?>
                            </div>
                        </div>
                    </div>
                <?php endwhile;
                wp_reset_query(); ?>

            </div>
        </div>
    </section>
    <section class="section-wrapper products">
        <div class="section-header">
            <h1 class="section-header-title text-center"><?php echo $options['all-section-tab']['product-section-title']; ?></h1>
            <h4 class="section-header-sub-title text-center">
                <?php echo $options['all-section-tab']['product-section-subtitle']; ?>
            </h4>
        </div>
        <div class="container">
            <div class="row">

                <?php
                $loop = new WP_Query(
                    array(
                        'post_type' => 'products',
                        'posts_per_page' => 6,
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
    <section class="section-wrapper videos">
        <div class="container">
            <div class="row">
                <div class="col-12 offset-0 col-lg-8 offset-lg-2">
                    <div class="section-header">
                        <h4 class="section-header-sub-title text-center">
                            <?php echo $options['all-section-tab']['video-title']; ?>
                        </h4>
                    </div>
                </div>


                <?php
                $loop = new WP_Query(
                    array(
                        'post_type' => 'videos',
                        'posts_per_page' => 1,
                        'order' => 'DESC'
                    )
                );
                ?>

                <?php while ($loop->have_posts()) : $loop->the_post(); ?>
                    <div class="col-12">
                        <div class="video-wrapper">
                            <iframe width="100%" height="565" src="https://www.youtube.com/embed/<?php echo get_field(('video_url_id')) ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                        </div>
                    </div>
                <?php endwhile;
                wp_reset_query(); ?>
            </div>
        </div>
    </section>

    <section class="section-wrapper gallery">
        <?php
        $query = new WP_Query(
            array(
                'post_type' => 'gallery',
                'posts_per_page' => 15,
                'order' => 'ASC'
            )
        ); ?>
        <div class="section-header">
            <h1 class="section-header-title text-center">
                <?php echo $options['all-section-tab']['gallery-title']; ?>
            </h1>
            <h4 class="section-header-sub-title text-center">
                <?php echo $options['all-section-tab']['gallery-subtitle']; ?>
            </h4>
        </div>
        <div class="container">
            <div class="row">
                <div class="lightbox-wrapper">
                    <?php
                    $count = 1;
                    if ($query->have_posts()) {
                        $columnCount = 4;
                        $rows = array_chunk($query->get_posts(), $columnCount);
                        foreach (range(0, $columnCount - 1) as $column) {
                            printf("<div class=\"column\">", $column + 1);
                            foreach ($rows as $row) {
                                if (false == isset($row[$column])) {
                                    continue;
                                }
                                $post = $row[$column];
                                setup_postdata($post);
                    ?>
                                <img class="img-fluid mb-2" src="<?php the_post_thumbnail_url(); ?>" style="width:100%" onclick="openModal();currentSlide(<?php echo $count; ?> )" class="hover-shadow cursor">

                    <?php
                                $count++;
                            }
                            print("</div>");
                        }
                    }
                    ?>
                </div>
            </div>
        </div>
        <div id="myModal" class="modal">
            <span class="close cursor" onclick="closeModal()">&times;</span>
            <div class="modal-content">
                <?php while ($query->have_posts()) : $query->the_post(); ?>
                    <div class="slider-item">
                        <div class="carousel-item active">
                            <img class="img-fluid" src="<?php the_post_thumbnail_url('full'); ?>">
                            <div class="carousel-caption">
                                <h5 class="section-header-sub-title">
                                    <?php echo get_the_title(); ?>
                                </h5>
                                <?php echo get_the_content(); ?>
                            </div>
                        </div>
                    </div>
                <?php endwhile;
                ?>
                <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
                <a class="next" onclick="plusSlides(1)">&#10095;</a>
            </div>
        </div>
        <?php
        wp_reset_query();
        ?>
    </section>
    <section class="section-wrapper news-events">
        <div class="section-header">
            <h4 class="section-header-sub-title text-center"> <?php echo $options['all-section-tab']['news-events-title']; ?></h4>
            <div class="container">
                <div class="row">
                    <div class="col-12 col-lg-8 offset-lg-2">
                        <p class="page-para text-center">
                            <?php echo $options['all-section-tab']['trusted-by-title']; ?>
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row news-events-slider common-slider">
                <?php
                $query = new WP_Query(
                    array(
                        'post_type' => 'post',
                        'posts_per_page' => 15,
                        'order' => 'ASC'
                    )
                );
                ?>
                <?php while ($query->have_posts()) : $query->the_post(); ?>
                    <?php gt_set_post_view(); ?>
                    <div class="col-4">
                        <div class="card post rounded-0 border-0">
                            <img class="card-img-top" src=<?php echo get_the_post_thumbnail_url() ?> alt="Card image cap">
                            <div class="card-body">
                                <div class="clock-comments d-flex justify-content-between">
                                    <div class="clock-comments-item d-flex align-items-center justify-content-center">
                                        <img class="icon" src="<?php echo get_template_directory_uri() ?>/assets/images/awesome-clock.svg">
                                        <span><?php echo get_the_date(); ?></span>
                                    </div>
                                    <div class="clock-comments-item d-flex align-items-center justify-content-center">
                                        <img class="icon" src="<?php echo get_template_directory_uri() ?>/assets/images/eye.svg">
                                        <span><?= gt_get_post_view(); ?></span>
                                    </div>
                                </div>
                                <h5 class="card-title post-title"><?php echo get_the_title(); ?></h5>
                                <p class="card-text page-para"><?php echo get_the_excerpt(); ?></p>
                                <a class="read-more" href="<?php echo get_the_permalink() ?>">Read More <img src="<?php echo get_template_directory_uri() ?>/assets/images/readmore.svg"></a>
                            </div>
                        </div>
                    </div>
                <?php endwhile;
                wp_reset_query(); ?>
            </div>
        </div>
        </div>
    </section>
    <section class="section-wrapper clients">
        <div class="section-header">
            <h4 class="section-header-sub-title text-center">Trusted By</h4>
        </div>
        <div class="container">
            <div class="row clients-images common-slider align-content-center align-content-center">
                <?php
                $loop = new WP_Query(
                    array(
                        'post_type' => 'clients',
                        'posts_per_page' => 20,
                        'order' => 'ASC',
                    )
                );
                ?>

                <?php while ($loop->have_posts()) : $loop->the_post(); ?>
                    <div class="col-3 d-flex align-content-center align-content-center">
                        <img class="img-fluid" src="<?php echo the_post_thumbnail_url(); ?>">
                    </div>
                <?php endwhile;
                wp_reset_query(); ?>
            </div>
        </div>
        </div>
    </section>
</main>
<?php
get_footer();
?>