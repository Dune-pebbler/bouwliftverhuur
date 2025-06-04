<?php
/**
 * Template name: Page contact
 */
get_header();
get_template_part("part", "title-container");
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

<section class="contact-container">
    <div class="container">
        <div class="row">
            <div class="col-12 col-lg-6 offset-lg-1">
                <h2><?= the_title(); ?></h2>
                <h3><?= get_bloginfo('name'); ?></h3>


                <div class="contact-content">
                    <?php if($street = get_field('street', 'option')): ?>
                        <span><?= $street; ?></span>
                    <?php endif; ?>
                    <?php if($location = get_field('location', 'option')): ?>
                        <span><?= $location; ?></span>
                    <?php endif; ?>
                </div>        
                <div class="contact-content">
                    <?php if($phone = get_field('phone', 'option')): ?>
                        <span>Telefoonnummer: <a href="tel:<?= str_replace("-", "", $phone); ?>"><?= $phone; ?></a></span>
                    <?php endif; ?>
                    <?php if($mail = get_field('email', 'option')): ?>
                        <span>E-mail: <a href="mailto:<?= $mail; ?>"><?= $mail; ?></a></span>
                    <?php endif; ?>
                </div>

                
            </div>
            <div class="col-12 col-lg-4">
                <?php the_content(); ?>
            </div>
        </div>
    </div>
</section>



<?php get_template_part("part", "vrijblijvende-offerte"); ?>
<?php get_footer(); ?>