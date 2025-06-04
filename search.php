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
    <div class="col">
      <div class="page-header">
        <h1><?php _e('Zoeken naar:', 'search'); ?> '<?php the_search_query(); ?>'</h1>
      </div>
      <?php if (have_posts()): ?>
        <?php while (have_posts()): the_post(); ?>
          <div class="result">
            <?php $post_type = get_post_type(get_the_ID()); ?>

            <?php $post_type = $post_type == 'page' ? __('Pagina', 'search') : ($post_type == 'post' ? __('Nieuws', 'search') : ($post_type == 'producten' ? __('Product', 'search') : __('Overig', 'search'))); ?>
            <h2>
              <span class="post-type">
                <?= $post_type; ?>:
              </span>
              <?php the_title(); ?>
            </h2>
            <p class="clearfix">
              <?php if ($content = get_field('intro')): ?>
                <?= $content; ?>
              <?php else: ?>
                <?php $content = get_the_content(); ?>
                <?php $content = !str_contains($content, 'gravityform') ? $content : ''; ?>
                <?= wp_trim_words($content, $num_words = 75, '...'); ?>
              <?php endif; ?>
            </p>
            <p>
              <a class="btn btn-primary" href="<?php the_permalink(); ?>" role="button">
                <?php _e('Lees meer', 'search'); ?>
              </a>
            </p>
          </div>
          <hr>
        <?php endwhile; wp_reset_query(); ?>
      <?php else: ?>
        <div class="result">
          <p><?php _e('Sorry, we hebben helaas geen resultaten gevonden.', 'search'); ?></p>
        </div>
      <?php endif; ?>
    </div>
  </div>
</section>

<?php get_footer(); ?>