<?php
get_header();
while (have_posts()) : the_post();
?>
    <main class="inner">
        <div class="main_content">
            <?php the_content(); ?>
        </div>
    </main>
<?php
endwhile;
get_footer();
?>