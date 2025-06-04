<?php get_header(); ?>
<?php get_template_part("part", "title-container"); ?>



<?php if( get_the_content() ): ?>
  <section class="main-content">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <div class="text-container">
            <?php the_content(); ?>
          </div>
        </div>
      </div>
    </div>
  </section>
<?php endif; ?>


<?php if (have_rows('content_blokken')): ?>
  <section class="repeater-content">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <h2 class="page-title"><?php the_title(); ?></h2>
        </div>
        <div class="col-12">
          <?php $use_image = ['index' => 0]; ?>
          <?php while (have_rows('content_blokken')): the_row(); ?>
            <?php $use_image['index']++; ?>
            <div class="repeater-item">
              <div class='row'>
                <?php if( $image_details = get_sub_field('afbeelding') ): ?>
                  <?php $use_image['has_image_index'] = $use_image['index']; ?>
                  <div class="col-12 col-lg-7 d-flex">
                    <div class='text-container'>
                      <h2><?php the_sub_field('titel'); ?></h2>
                      <?php the_sub_field('content'); ?>
                    </div>
                  </div>
                  <div class="col-12 col-lg-4 offset-lg-1">
                    <div class="repeater-image-container">
                      <img class="repeater-image" src='<?= $image_details['url']; ?>' alt='<?= $image_details['alt']; ?>'/>
                    </div>
                  </div>
                <?php elseif(isset($use_image['has_image_index']) && $use_image['has_image_index'] + 2 <= $use_image['index']): ?>
                  <div class="col-12 d-flex">
                    <div class='text-container'>
                      <h2><?php the_sub_field('titel'); ?></h2>
                      <?php the_sub_field('content'); ?>
                    </div>
                  </div>
                <?php else: ?>
                  <div class="col-12 col-lg-7 d-flex">
                    <div class='text-container'>
                      <h2><?php the_sub_field('titel'); ?></h2>
                      <?php the_sub_field('content'); ?>
                    </div>
                  </div>
                <?php endif; ?>
              </div>
            </div>
          <?php endwhile; ?> 
        </div>
      </div>
    </div>
  </section>
<?php endif; ?>

<?php if(get_the_ID() === 14) get_template_part("part", "show-categories"); ?>

<?php if( have_rows('slides') ): ?>
  <section class="slider-container">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <section class="slider owl-theme owl-carousel">
            <?php while( have_rows('slides') ): the_row(); ?>
              <div class="slide">
                <?php if( $image = get_sub_field('afbeelding') ): ?>
                  <img src="<?= $image['url']; ?>" alt="<?php the_title(); ?>" loading="lazy">
                <?php endif; ?>
              </div>
            <?php endwhile; ?>
          </section>
        </div>
      </div>
    </div>
  </section>
<?php endif; ?>

<?php get_template_part("part", "vrijblijvende-offerte"); ?>
<?php get_footer(); ?>