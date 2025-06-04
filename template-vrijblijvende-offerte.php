<section class="top-footer-extension">
<div class="container">
    <div class="row">
        <div class="col-12 col-lg-12 col-xl-6 col-xxl-5 offset-lg-0 offset-xl-1 offset-xxl-1">
            <div class="intro-content">
                <?php $btnIntro = get_field('knop_intro'); ?>
                <h2><?php the_field('titel_intro'); ?></h2>
                <p><?php the_field('content_intro'); ?></p>
                <?php if (!empty($btnIntro['url'])) { ?> 
                    <a href="<?= $btnIntro['url']; ?>" class="btn" target="<?= $btnIntro['target']; ?>" title="<?= $btnIntro['title']; ?>"><?= $btnIntro['title']; ?></a>
                    <?php } ?>
                </div>
            </div>
        </div>
        <div class="col-12 col-lg-12 col-xl-5 col-xxl-4 offset-xl-0 offset-xxl-2">
            <img class="girls" src="<?php echo get_template_directory_uri(); ?>/img/meiden.webp" loading="lazy" alt="Holland verhuur meiden" />
        </div>
    </div>
</section>