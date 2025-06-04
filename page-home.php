<?php
/*
 * Template name: Page home
 */
get_header();
?>
<?php if (have_rows('slides')): ?>
  <section class="slider owl-theme owl-carousel">
    <?php while (have_rows('slides')): the_row(); ?>
      <div class="slide">
        <?php if ($image = get_sub_field('afbeelding')): ?>
          <img src="<?= $image['url']; ?>" alt="<?php the_title(); ?>" loading="lazy">
        <?php else: ?>
          <img src='https://picsum.photos/720/720' alt='Placeholder image' loading="lazy"/>
        <?php endif; ?>
      </div>
    <?php endwhile; ?>
  </section>
<?php endif; ?>

<section class="introduction">
  <div class="container">
    <div class="row">
      <img class="girls" src="<?= get_template_directory_uri(); ?>/img/bouwliften-plaat-meiden.png" loading="lazy" alt="Holland verhuur meiden" />
      <div class="col-12 col-xl-6 offset-xl-6">
        <div class="intro-content">
          <?php if ($title = get_field("titel_intro")): ?> 
            <h2><?= $title; ?></h2>
          <?php endif; ?>
          
          <?php the_field('content_intro'); ?>
          
          <?php if ($btn_intro = get_field("knop_intro")): ?> 
            <a href="<?= $btn_intro['url']; ?>" class="btn" target="<?= $btn_intro['target']; ?>" title="<?= $btn_intro['title']; ?>"><?= $btn_intro['title']; ?></a>
          <?php endif; ?>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="main-content">
  <div class="container">
    <div class="row">
      <div class="col-12 col-lg-5 offset-lg-1">
        <div class="text-container">
          <h1><?php the_title(); ?></h1>
          <?php the_content(); ?>
        </div>
      </div>
      <div class="col-12 col-lg-4 offset-lg-1">
        <div class="main-content-img">
          <?php $thumbnail_id = get_post_thumbnail_id($post->ID); ?>
          <img src="<?= get_the_post_thumbnail_url(null, 'medium'); ?>" loading="lazy" alt="<?= get_post_meta($thumbnail_id, '_wp_attachment_image_alt', true); ?>" />
        </div>
      </div>
    </div>
  </div>
</section>


<?php get_template_part("part", "show-categories"); ?>


<?php if (have_rows('content_blokken')): ?>
  <section class="repeater-content">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <?php while (have_rows('content_blokken')): the_row(); ?>
            <div class="repeater-item">
              <div class='row'>
                <div class="col-xs-12 col-lg-6 image">
                  <figure>
                    <?php if ($image_details = get_sub_field('afbeelding')): ?>
                      <img src='<?= $image_details['url']; ?>' alt='<?= $image_details['alt']; ?>'/>
                    <?php else: ?>
                      <img src='https://picsum.photos/720/720' alt='Placeholder image'/>
                    <?php endif; ?>
                  </figure>
                </div>

                <div class="col-xs-12 col-lg-6 d-flex">
                  <div class='text-container'>
                    <h2><?php the_sub_field('titel'); ?></h2>
                    
                    <?php the_sub_field('content'); ?>
                  </div>
                </div>

              </div>
            </div>
          <?php endwhile; ?> 
        </div>
      </div>
    </div>
  </section>
<?php endif ?>



<?php get_template_part("part", "vrijblijvende-offerte"); ?>
<?php get_footer(); ?>