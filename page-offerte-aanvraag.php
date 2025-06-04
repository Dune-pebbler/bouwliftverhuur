<?php
/**
 * Template name: Page offerte aanvraag
 */
get_header();
?>

<?php if(function_exists('yoast_breadcrumb')): ?>
    <section class="container">
        <div class="row">
            <div class="col-12">
                <?php yoast_breadcrumb( '<p id="breadcrumbs">','</p>' ); ?>
            </div>
        </div>
    </section>
<?php endif; ?>


<section class="form-offerte-container">
    <div class="container">
        <div class="row">
            <div class="col-12 col-xl-4 col-lg-8 offset-xl-4 offset-lg-2">
                <?php the_content(); ?>
            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>