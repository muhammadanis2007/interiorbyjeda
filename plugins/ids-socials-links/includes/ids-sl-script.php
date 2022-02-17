<?php 
add_action( 'wp_enqueue_scripts', 'ids_sm_add_my_stylesheet' );
/**
 * Enqueue plugin style-file
 */
function ids_sm_add_my_stylesheet() {
    // Respects SSL, Style.css is relative to the current file
   // wp_enqueue_style( 'idssmfont', plugins_url('/css/font-awesome.min.css', __FILE__));
    wp_enqueue_style( 'idssmstyle', plugins_url('/css/ids-sm-style.css', __FILE__));
    /*echo plugins_url('/css/ids-sm-style.css', __FILE__);
       echo die;*/
       wp_enqueue_script('su_shorcodes', plugins_url('/js/galleries-shortcodes.js', __FILE__),'', 'in_footer', true );
       wp_enqueue_script('su_owl', plugins_url('/js/owl-carousel.js', __FILE__),'', 'in_footer', true );
       wp_enqueue_script('su_simpleslider', plugins_url('/js/simpleslider.js', __FILE__),'', 'in_footer', true );
       wp_register_script('su_shorcodes', plugins_url('js/galleries-shortcodes.js'  , __FILE__ ),'','1.0', 'in_footer', true);
       wp_register_script('su_owl', plugins_url('js/owl-carousel.js'  , __FILE__ ),'','1.0', 'in_footer', true);
       wp_register_script('su_simpleslider', plugins_url('js/simpleslider.js'  , __FILE__ ),'','1.0', 'in_footer', true);
}

?>