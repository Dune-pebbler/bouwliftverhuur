<?php get_header(); ?>





<?php if( have_rows('slides') ): ?>
    <section class="slider owl-theme owl-carousel">
        <?php while( have_rows('slides') ): the_row(); $image = get_sub_field('afbeelding'); ?>
            <div class="slide">
                <img src="<?= $image['url']; ?>" alt="" loading="lazy">
                <?php if($titel = get_sub_field('titel_slide') ): ?>
                <div class="caption">
                    <div class="container">
                        <h2><?= $titel; ?></h2>
                    </div>
                </div>
                <?php endif; ?>
            </div>
        <?php endwhile; ?>
    </section>
<?php endif; ?>

<section class="page-content">
    <div class="container">
        <?php the_content(); ?>
    </div>
</section>

<!-- start pagebuilder -->

<?php get_footer(); ?>