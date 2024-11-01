<?php 
//Custom Taxonomy Template
add_filter('template_include', 'tnit_taxonomy_template');
function tnit_taxonomy_template( $template ){
  // if portfolio_category taxonomy slug
  if( is_tax('portfolio_category')){
    $template = TNIT_FILTER_GALLERY_DIR.'includes/taxonomy-portfolio_category.php';
  } else if( is_singular('portfolio')) {
	$template = TNIT_FILTER_GALLERY_DIR.'includes/single-portfolio.php';
  }
  return $template;
 }

//Registering/Enqueing styles and scripts
 function tnit_filter_gallery_styles() {
	wp_enqueue_style( 'bootstrap-css', TNIT_FILTER_GALLERY_URL . 'assets/css/bootstrap.css', true );	
	wp_enqueue_style( 'font-awesome-css', TNIT_FILTER_GALLERY_URL .'assets/css/font-awesome.min.css', true );
	wp_enqueue_style( 'prettyPhoto', TNIT_FILTER_GALLERY_URL .'assets/css/prettyPhoto.css', true );	
	wp_enqueue_style( 'light-gallery-style', TNIT_FILTER_GALLERY_URL .'assets/css/style-gallery.css', true );
 		
}
add_action( 'wp_enqueue_scripts', 'tnit_filter_gallery_styles' );

function tnit_filter_gallery_scripts() {
	wp_enqueue_script('example-lib', TNIT_FILTER_GALLERY_URL .'assets/js/example-lib.js', array(), '', true);	
	wp_enqueue_script('isotope-jquery', TNIT_FILTER_GALLERY_URL .'assets/js/jquery.isotope.js', array(), '', true);
	wp_enqueue_script('jquery-prettyPhoto', TNIT_FILTER_GALLERY_URL .'assets/js/jquery.prettyPhoto.js', array(), '', true);
	wp_enqueue_script('custom-script', TNIT_FILTER_GALLERY_URL .'assets/js/custom-script.js', array(), '', true);	
}
add_action( 'wp_enqueue_scripts', 'tnit_filter_gallery_scripts' );
?>