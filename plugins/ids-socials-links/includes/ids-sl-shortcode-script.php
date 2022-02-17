<?php 





add_shortcode('idssocial','ids_social_links');



function ids_social_links($atts, $content, $smtype )
{

    

    $atts = shortcode_atts(
        array(
            'smtype' =>  !empty($smtype) ? $smtype:'', 
            'surl' =>  !empty($surl) ? $surl:' ',
            'content' => !empty($content) ? $content:' ', 
            'styleclass' => !empty($styleclass) ? $styleclass:' ',
        ), $atts
        );

        try {
        extract($atts);
        //echo "Social Network: " .$smtype;
        $output = '<a href="'.$surl.'" class="'.$styleclass.'" ><span>'.$content.'<span></a>';
        
        return $output;
        
}
catch(Exception $e) {
    echo 'Message: <h1>' .$e->getMessage(). '</h1>';
    throw $e->getMessage();
  }

        
}
