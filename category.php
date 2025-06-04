<?php get_header();
$term = get_queried_object();
$products_query = get_product_query_by_term_id($term->term_id); ?>

<section class="title-container">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <h1><?= $term->name; ?></h1>
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
<?php if($products_query->have_posts()): $i = 0; ?>
    <div class="products-container">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-10 offset-md-1">
                    <h2><?= _e("Type", THEME_NAME); ?> <?= $term->name; ?></h2>
                </div>
                <?php while($products_query->have_posts()): $products_query->the_post(); $product = get_post(); ?>
                    <div class="col-12 col-md-5 <?= $i % 2 === 0 ? "offset-md-1" : ""; ?> ">
                        <div class="product">
                            <div class="product-container">
                                <a class="clickable-container" href="<?php the_permalink(); ?>" title="<?= _e("Ga naar product: ", THEME_NAME).get_the_title(); ?>">
                                    <div class="img-zoom-container">
                                        <img class="product-image" src="<?= get_the_post_thumbnail_url(get_the_ID(), 'medium-thumbnail'); ?>" alt="thumbnail">
                                    </div>
                                    <h3><?php the_title(); ?></h3>
                                    <div class="description-content">
                                        <?php the_excerpt(); ?>
                                    </div>
                                </a>
                                <div class="buttons">
                                    <a href="<?php the_permalink(); ?>" class="btn btn-info"><?= _e("Meer informatie", THEME_NAME); ?></a>
                                    <a href="<?= add_query_arg( [
                                        'category' => $term->name,
                                        'product' => $product->post_name
                                    ], get_permalink(34)); ?>" class="btn btn-primary"><?= _e("Bestellen", THEME_NAME); ?></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php $i++; ?>
                <?php endwhile; ?>
            </div>
        </div>
    </div>
<?php endif; ?>


<?php get_template_part("part", "vrijblijvende-offerte"); ?>
<?php get_footer(); ?>