<?php if(have_rows('offerte_aanvragen', 'option')): ?>
<section class="obligation-free-quote">
    <div class="container">
        <div class="row">
            <div class="col-12 col-lg-5 offset-lg-1">
                <div class="obligation-content">
                    <?php while (have_rows('offerte_aanvragen', 'option')): the_row(); ?>
                        <?php if($title = get_sub_field('titel')): ?>
                            <h2><?= $title; ?></h2>
                        <?php endif; ?>
                        <?php if($content = get_sub_field('beschrijving')): ?>
                            <?= $content; ?>
                        <?php endif; ?>
                        <a class="btn" href="<?= get_permalink(34); ?>">Offerte aanvragen</a>
                    <?php endwhile; ?>
                </div>
            </div>
            <div class="col-12 col-lg-5 offset-lg-1">
                <img class="girls" src="<?= get_template_directory_uri(); ?>/img/bouwliften-plaat-meiden.png" loading="lazy" alt="Holland verhuur meiden" />
            </div>
        </div>
    </div>
</section>
<?php endif; ?>