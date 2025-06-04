<?php if( !isset($category_terms) ): ?>
    <?php $category_terms = get_theme_categories([ 'taxonomy' => 'category' ]); ?>
<?php endif; ?>
<?php if( !empty( $category_terms ) ): ?>
    <section class="product-categories">
        <div class="container">
            <div class="row">
            <div class="col-12 col-lg-10 offset-lg-1">
                <h2><?= _e("Product categorieën", THEME_NAME); ?></h2>
            </div>
            
            <?php foreach($category_terms as $i => $term): ?>
                <?php $products = get_product_query_by_term_id($term->term_id, 1);
                if($products->have_posts()): $products->the_post(); ?>
                    <?php $image = get_field('image', $term->taxonomy.'_'.$term->term_id); ?>
                    
                    <div class="col-12 col-lg-5 <?= $i % 2 === 0 ? "offset-lg-1" : "" ?>">
                        <div class="category">
                            <div class="category-container">
                                <a class="clickable-container" href="<?= get_term_link($term); ?>">
                                    <div class="img-zoom-container">
                                        <?php $image = $image !== null ? $image['sizes']['medium-thumbnail'] : get_the_post_thumbnail_url(get_the_ID(), 'medium-thumbnail'); ?>
                                        <img class="category-image" src="<?= $image ?>" alt="thumbnail">
                                    </div>
                                    <h3><?= $term->name; ?></h3>
                                    <div class="description-content">
                                        <?= $term->description; ?>
                                    </div>
                                </a>
                                <div class="buttons">
                                    <a href="<?= get_term_link($term); ?>" class="btn"><?= _e("Bekijk producten", THEME_NAME); ?></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endif; ?>
                <?php endforeach; wp_reset_postdata(); ?>
            </div>
        </div>
    </section>
<?php endif; ?>