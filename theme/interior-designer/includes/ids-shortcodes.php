<?php 

function ids_parallex($content){
return '<div du-parallax y="background" >"'.$content.'"</div>';

}

add_shortcode('ids-parallex','ids_parallex');
//do_shortcode( '[ids-parralax]' );


function companycr_sc($content){
    $datastr =     get_bloginfo( 'name' ).  "©"  .   date('Y');
    $content = "<span class='copy-right-style' ><p>". $datastr ."</p></span>";
    return $content;  

}

add_shortcode('companycr','companycr_sc');
//do_shortcode( '[companycr]' );


add_filter('widget_text','do_shortcode');

function companyname_sc($content){
    $datastr =     get_bloginfo( 'name' );
    $content = "<h1 class='company-name' >". $datastr ."</h1>";
    return $content;  

}

add_shortcode('company-name','companyname_sc');



function toolbartag_func(  ) {
	return "<div class='toolbar-container' >
    <div class='btn-toolbar dark-blue-sea' toolbar-tip='{content: '#toolbar-options', position: 'right}' id='format-toolbar'>
        <i class='fa fa-cog'></i>
    </div>
    <div id='toolbar-options' class='glass-white green-sea-color'>
    <a href='#'><i class='fa fa-money'></i></a> 
    <a href='#'><i class='fa fa-user'></i></a>
    <a  href='#'><i class='fa fa-book'></i></a>
    <a  href='#'><i class='fa fa-envelope'></i></a>
    <a  href='#'><i class='fa fa-calendar'></i></a>
    </div>
</div>";
}


add_shortcode('toolbar','toolbartag_func');
//do_shortcode( '[toolbar]' );




function gallery_lists()
{
   global $post;

   
   // $todaysDate = date('m/d/Y H:i:s');
    
    $posts=null;
    $args = array(
                'post_type' => 'attachment',
				'post_mime_type' => 'image',
				'orderby' => 'post_date',
				'order' => 'asc',
				'posts_per_page' => -1,
				'post_status'    => 'inherit',
				'category_name' => 'Gallery'
       
    );
    

    $posts = get_posts($args); 

    $return = array();
    
    $content = '<div class="container"><div class="grid" >';
    foreach ( $posts as $post ) {
        setup_postdata($post);
       // print_r($post);
       //echo $post->post_title;
       $image = wp_get_attachment_image_src($post->ID, 'full' );
       //$thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'thumbnail' ); // Thumbnail size 
       $thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID),'thumbnail');
       $content .= '<figure class="cell" ><img src="'.$thumb[0].'" class="responsive" ><figcaption><div><h2>'.the_title_attribute( array( 'echo' => 0 ) ).'</h2></div><div><p>'.$post->post_content.'</p></div><a href="#" ></a></figcaption></figure>';
        
    }
    $content .= "</div></div>";
   return $content;
    
    wp_reset_postdata();
    

}


add_shortcode('gallery-lists', 'gallery_lists');


do_shortcode('gallery-lists');



function row_fluid($atts, $content, $tag){
   
    

return '<div class="row-fluid" >'.do_shortcode($content).'</div>';

}

add_shortcode('row-fluid', 'row_fluid');





add_shortcode( 'card-box', 'card_box_shortcode' );

function card_box_shortcode( $atts ) {
      extract( shortcode_atts(
              array(
                      'title' => 'Title',
                      'subtitle' => 'subtitle',
                      'url' => '',
                      'iconclass' => '',
                      'shortdescription' => ''
              ),
              $atts
      ));
      return '<div class="span3 ghost-white">
      <section class="animated" >
      <div class="service-box ">
      <div class="extrabox">
      <figure class="icon"><i class="'.$iconclass.'"></i></figure>
      </div>
      <div class="service-box_body"><h2 class="title"><a href="'.$url.'" title="'.$title.'" target="_self">'.$title.'</a></h2>
      <h5 class="sub-title">'.$subtitle.'</h5>
      <div class="service-box_txt">'.$shortdescription.'</div>
      <div class="btn-align"><a href="'.$shortdescription.'" title="More info" class="button" target="_self">More info</a></div>
      </div>
      </div><!-- /Service Box -->
      </section>
      </div>';
}



add_shortcode('parallex-head','parallexheader');
function parallexheader($atts){

    extract( shortcode_atts(
        array(
                'title' => 'Title',
                'subtitle' => 'subtitle',
                'bgimgurl' => ''
        ),
        $atts
    ));

    return '<header class="header" style="background-image:url('.$bgimgurl.') !important;"><div class="header-branding-box"><h1>'.$title.'</h1><h5>'.$subtitle.'</h5></div></header>';
}




function register_shortdodes(){ 
    do_shortcode('row-fluid');
    do_shortcode('companycr');
    do_shortcode('card-box');
    do_shortcode('parallex-head');
    do_shortcode('ids-parallex');
  
   
}

add_action('init','register_shortdodes');



?>