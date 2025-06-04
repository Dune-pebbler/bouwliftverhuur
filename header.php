<!DOCTYPE html>
<html <?php language_attributes(); ?>>
  <head>
    <!-- Google Tag Manager -->
    <script>(function (w, d, s, l, i) {
        w[l] = w[l] || [];
        w[l].push({'gtm.start':
                  new Date().getTime(), event: 'gtm.js'});
        var f = d.getElementsByTagName(s)[0],
                j = d.createElement(s), dl = l != 'dataLayer' ? '&l=' + l : '';
        j.async = true;
        j.src =
                'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
        f.parentNode.insertBefore(j, f);
      })(window, document, 'script', 'dataLayer', 'GTM-W7KP767');</script>
    <!-- End Google Tag Manager -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title><?= wp_title(); ?></title>

    <!-- Bootstrap core CSS -->
    <link href="<?= get_stylesheet_directory_uri(); ?>/stylesheets/bootstrap/bootstrap.css" rel="stylesheet"> 
    <!-- this will be manageable. -->
    <link href="<?= get_stylesheet_directory_uri(); ?>/assets/fontawesome/css/all.css" rel="stylesheet" type="text/css"/>
    <link href="<?= get_stylesheet_directory_uri(); ?>/assets/owlcarousel/owl.carousel.min.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="<?= get_stylesheet_directory_uri(); ?>/stylesheets/style.css?v=<?= filemtime(get_template_directory() . "/stylesheets/style.css"); ?>" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,400;0,700;1,500&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css">
    <script>
      let ajaxurl = '<?= get_template_directory_uri(); ?>/ajax-handler.php';/*'<?= admin_url('admin-ajax.php'); ?>';*/

    </script>
    <?php wp_head(); ?> 
  </head>

  <body <?php body_class(); ?>>
    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-W7KP767"
                      height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->
    <header>
      <div class="container">
        <div class="row">
          <div class="col-6 col-xl-4">
            <div class="logo">
              <a href="<?= site_url(); ?>">
                <img src="<?= get_template_directory_uri() . '/img/logo-meiden.png';?>">
              </a>
            </div>
          </div>
          <div class="col-12 col-xl-6 order-1 order-xl-0">
            <nav class="menu-nav">
              <?php
              wp_nav_menu(array(
                  'theme_location' => 'primary',
                  'container_class' => 'main-nav'
              ));
              ?>
            </nav>

          </div>
          <div class="col-6 col-xl-2">
            <div class="contact-options">
              <button class="launch-search">
                <i class="fa fa-search"></i>
              </button>
              <?php if ($phone = get_field('phone', 'option')): ?>
                <a href="tel:<?= str_replace("-", "", $phone); ?>" title="<?= _e("Bel ons", THEME_NAME); ?>"><i class="fa fa-phone"></i></a>
              <?php endif; ?>
              <?php if ($mail = get_field('email', 'option')): ?>
                <a href="mailto:<?= $mail; ?>" title="<?= _e("Mail ons", THEME_NAME); ?>"><i class="fa fa-envelope"></i></a>
              <?php endif; ?>



              <div class="hamburger hamburger--squeeze">
                <div class="hamburger-box">
                  <div class="hamburger-inner"></div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <?php if (get_queried_object_id() !== 34): ?>
          <div class="offerte-container">
            <a class="btn" href="<?= get_permalink(34); ?>"><?= _e("Offerte aanvragen", THEME_NAME); ?></a>
          </div>
        <?php endif; ?>
      </div>
    </header>
    <main>