<?php 
get_header(); 
$category_details = wp_get_post_terms(get_the_ID(), 'category', ['fields' => 'all'])[0];
$product = get_queried_object();
// print_pre($product); die;
?>

<section class="title-container">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <h1><?php the_title(); ?></h1>
      </div>
    </div>
  </div>
</section>

<?php if(function_exists('yoast_breadcrumb')): ?>
    <section class="container">
        <div class="row">
            <div class="col-12">
                <?php yoast_breadcrumb( '<p id="breadcrumbs">','</p>' ); ?>
            </div>
        </div>
    </section>
<?php endif; ?>


<?php if(have_posts()): ?>
  <section class="product-page-container">
    <div class="container">
      <div class="row">
        <div class="col-12 col-md-10 col-lg-6 offset-md-1 offset-lg-0">
          <h2><?= _e("Product", THEME_NAME); ?> <?php the_title(); ?></h2>
          <?php the_content(); ?>
        </div>
        <div class="col-12 col-md-10 col-lg-5 offset-md-1 offset-lg-1">
          <img class="product-image" src="<?= get_the_post_thumbnail_url(get_the_ID(), 'overview-thumbnail'); ?>" alt="thumbnail">
          <div class="buttons">
            <?php if($file = get_field("specification_document")): ?>
              <div class="show-specification-container">
                <a class="btn btn-blue show-front" href="<?= $file ?>" target="_blank" rel="noopener noreferrer"><?= _e("Specificaties", THEME_NAME); ?></a>
                <a class="btn btn-lightblue download-btn" href="<?= $file ?>" target="_blank" rel="noopener noreferrer" download><i class="fa fa-download" aria-hidden="true"></i></a>
              </div>
            <?php //else: ?>
<!--              <div class="show-specification-container">
                <span>Er zijn (nog) geen specificaties voor dit product.</span>
              </div>-->
            <?php endif; ?>
            <a href="<?= add_query_arg([
              'category' => $category_details->name,
              'product' => $product->post_name
            ],  get_permalink(34)); ?>" class="btn btn-primary"><?= _e("Bestellen", THEME_NAME); ?></a>
          </div>
        </div>
      </div>
    </div>
  </section>
<?php endif; ?>


<?php get_template_part("part", "vrijblijvende-offerte"); ?>
<?php get_footer(); ?>