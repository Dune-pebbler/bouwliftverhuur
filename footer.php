    </main>
    <footer>
      <div class="footer">
        <div class="container">
          <div class="reference">
            <div class="row">
              <div class="col-12 col-lg-4 col-xl-3 offset-xl-1 offset-lg-0">
                <div class="pb-5">  
                  <h3><?= _e("Holland Verhuur", THEME_NAME); ?></h3>
                  <div class="contact-options">
                    <?php if($content = get_field('street', 'option')): ?>
                      <span><?= $content; ?></span>
                    <?php endif; ?>
                    <?php if($content = get_field('location', 'option')): ?>
                      <span><?= $content; ?></span>
                    <?php endif; ?>
                  </div>
                
                  <div class="contact-options">
                    <?php if($content = get_field('phone', 'option')): ?>
                      <a href="tel:<?= str_replace("-", "", $content); ?>"><i class="fa fa-phone"></i> <?= $content; ?></a>
                    <?php endif; ?>
                    <?php if($content = get_field('email', 'option')): ?>
                      <a href="mailto:<?= $content; ?>"><i class="fa fa-envelope"></i> <?= $content; ?></a>
                    <?php endif; ?>
                  </div>
                </div> 
              </div>
               
              <div class="col-12 col-lg-4">
                <div class="pb-5">
                  <h3><?= _e("Bouwliften", THEME_NAME); ?></h3>
                  <?php wp_nav_menu([
                    'theme_location' => 'footer-1',
                    'menu_class' => 'menu footer-nav-menu'
                  ]); ?>
                </div>
              </div>

              
              <div class="col-12 col-lg-4">
                <div class="pb-5">
                  <h3><?= _e("Links", THEME_NAME); ?></h3>
                  <?php wp_nav_menu([
                    'theme_location' => 'footer-2',
                    'menu_class' => 'menu footer-nav-menu'
                  ]); ?> 
                </div> 
              </div>
            </div>
          </div>
        </div>
        
        <div class="container">
          <div class="row">
            <div class="col-12">
              <div class="footer-copyright">
                <span>
                  <?= get_bloginfo('name'); ?> &copy; <?= get_current_year(); ?> - alle rechten voorbehouden -  
                  <a href="<?= get_page_link(3); ?>">
                    <?= _e("privacy statement", THEME_NAME); ?>
                  </a>
                </span>
                <div class="build-by-container">
                  <span><?= _e("website door", THEME_NAME); ?></span>
                  <a class="logo-dp" title="<?= _e("Ga naar de website van Dune Pebbler", THEME_NAME); ?>" href="https://dunepebbler.nl" target="_blank">
                    <?= get_svg(__DIR__."/img/dp.svg"); ?>
                  </a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="search-screen">
        <div class="container">
          <div class="row">
            <div class="col-12">
              <form id="searchform" role="search" method="get" action="/">
                <div class="input-group"><input class="form-control" id="s" type="text" placeholder="<?php _e('Zoeken naar...', 'dp'); ?>" name="s" /><span class="input-group-btn"><button class="btn-search-close" type="button"><i class="fa fa-times" aria-hidden="true"></i></button>
                  </span><span class="input-group-btn"><button class="btn-search" type="submit"><i class="fa fa-search"></i></button>
                  </span>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    
      <script src="<?= get_stylesheet_directory_uri(); ?>/assets/owlcarousel/owl.carousel.min.js" type="text/javascript"></script>
      <script src="<?= get_stylesheet_directory_uri(); ?>/js/in-view.js" type="text/javascript"></script>
      <script src="<?= get_stylesheet_directory_uri(); ?>/js/masonry.js" type="text/javascript"></script>
      <script src="<?= get_stylesheet_directory_uri(); ?>/js/main.js" type="text/javascript"></script>
      <?php wp_footer(); ?>
  </body> 
</html>