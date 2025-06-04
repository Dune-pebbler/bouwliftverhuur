<?php get_header(); ?>

<?php if(function_exists('yoast_breadcrumb')): ?>
    <section class="container">
        <div class="row">
            <div class="col-12">
                <?php yoast_breadcrumb( '<p id="breadcrumbs">','</p>' ); ?>
            </div>
        </div>
    </section>
<?php endif; ?>

<section class="main-content search">
    <div class="container">
        <h1 style="margin: 0; padding: 15px 0;">Pagina niet gevonden</h1>

        <p>We hebben de pagina die u zocht niet kunnen vinden.</p>

        <div class="buttons">
            <a href="<?= site_url(); ?>" class="btn">Terug naar homepagina</a>
        </div>
    </div>
</section>

<?php get_template_part("part", "vrijblijvende-offerte"); ?>
<?php get_footer(); ?>
