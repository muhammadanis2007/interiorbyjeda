<?php
class Ids_Sl_Widget extends WP_Widget {

	/**
	 * Sets up the widgets name etc
	 */
	public function __construct() {
		parent::__construct(
			'Ids_Sl_Widget', // Base ID
			esc_html__( 'Social Widget', 'Ids_Sl_Domain' ), // Name
			array( 'description' => esc_html__( 'Outputs Soical Icons link to profile.', 'Ids_Sl_Domain' ), ) // Args
		);
    }
    


	/**
	 * Outputs the content of the widget
	 *
	 * @param array $args
	 * @param array $instance
	 */
	public function widget( $args, $instance ) {
        // outputs the content of the widget
        
        $links = array(
            'facebook' => esc_attr($instance['facebook_link']),
            'twitter' => esc_attr($instance['twitter_link']),
            'linkedin' => esc_attr($instance['linkedin_link']),
            'googleplus' => esc_attr($instance['googleplus_link']),
            'youtube' => esc_attr($instance['youtube_link']),
            'pinterest' => esc_attr($instance['pinterest_link']),
            'rss' => esc_attr($instance['rss_link']),
           

        );
        $icons = array(
            'facebook' => esc_attr($instance['facebook_icon']),
            'twitter' => esc_attr($instance['twitter_icon']),
            'linkedin' => esc_attr($instance['linkedin_icon']),
            'googleplus' => esc_attr($instance['googleplus_icon']),
            'youtube' => esc_attr($instance['youtube_icon']),
            'pinterest' => esc_attr($instance['pinterest_icon']),
            'rss' => esc_attr($instance['rss_icon']),

        );
        $icon_width = $instance['icon_width'];

        echo $args['before_widget'];

        $this->getSocialLinks($links, $icons, $icon_width);

        echo $args['after_widget'];

	}

	/**
	 * Outputs the options form on admin
	 *
	 * @param array $instance The widget options
	 */
	public function form( $instance ) {
        // outputs the options form on admin
        
        $this->getForm($instance);
        
        
	}

	/**
	 * Processing widget options on save
	 *
	 * @param array $new_instance The new options
	 * @param array $old_instance The previous options
	 *
	 * @return array
	 */
	public function update( $new_instance, $old_instance ) {
        // processes widget options to be saved

     
        $instance = array( 
            'facebook_link' => (!empty($new_instance['facebook_link']))? strip_tags($new_instance['facebook_link']) :  '',
            'twitter_link' => (!empty($new_instance['twitter_link']))? strip_tags($new_instance['twitter_link']) : '',
            'linkedin_link' => (!empty($new_instance['linkedin_link']))? strip_tags($new_instance['linkedin_link']) : '',
            'googleplus_link' => (!empty($new_instance['googleplus_link']))? strip_tags($new_instance['googleplus_link']) : '',
            'youtube_link' => (!empty($new_instance['youtube_link']))? strip_tags($new_instance['youtube_link']) : '',
            'pinterest_link' => (!empty($new_instance['pinterest_link']))? strip_tags($new_instance['pinterest_link']) : '',
            'rss_link' => (!empty($new_instance['rss_link']))? strip_tags($new_instance['rss_link']) : '',
            'facebook_icon' => (!empty($new_instance['facebook_icon']))? strip_tags($new_instance['facebook_icon']) : '',
            'twitter_icon' => (!empty($new_instance['twitter_icon']))? strip_tags($new_instance['twitter_icon']) : '',
            'linkedin_icon' => (!empty($new_instance['linkedin_icon']))? strip_tags($new_instance['linkedin_icon']) : '',
            'googleplus_icon' => (!empty($new_instance['googleplus_icon']))? strip_tags($new_instance['googleplus_icon']) : '',
            'youtube_icon' => (!empty($new_instance['youtube_icon']))? strip_tags($new_instance['youtube_icon']) : '',
            'pinterest_icon' => (!empty($new_instance['pinterest_icon']))? strip_tags($new_instance['pinterest_icon']) : '',
            'rss_icon' => (!empty($new_instance['rss_icon']))? strip_tags($new_instance['rss_icon']) : '',
            'icon_width' => (!empty($new_instance['icon_width']))? strip_tags($new_instance['icon_width']) : '',
    
           );
    
     
          return  $instance;

    }
    




    public function getForm( $instance ) {
        

       if(isset($instance['facebook_link']))
        {
            $facebook_link = esc_attr($instance['facebook_link']);
        }
        else
        {
            $facebook_link ='http://www.facebook.com';

        }

       // $facebook_link = esc_attr($instance['facebook_link']);

        if(isset($instance['twitter_link']))
        {
            $twitter_link = esc_attr($instance['twitter_link']);
        }
        else
        {
            $twitter_link ='http://www.twitter.com';

        }

     

        if(isset($instance['linkedin_link']))
        {
            $linkedin_link = esc_attr($instance['linkedin_link']);
        }
        else
        {
            $linkedin_link ='http://www.linkedin.com';

        }


        if(isset($instance['googleplus_link']))
        {
            $googleplus_link = esc_attr($instance['googleplus_link']);
        }
        else
        {
            $googleplus_link ='https://plus.google.com';

        }


        if(isset($instance['youtube_link']))
        {
            $youtube_link = esc_attr($instance['youtube_link']);
        }
        else
        {
            $youtube_link ='http://www.youtube.com';

        }


        if(isset($instance['pinterest_link']))
        {
            $pinterest_link = esc_attr($instance['pinterest_link']);
        }
        else
        {
            $pinterest_link ='http://www.pinterest.com';

        }


        if(isset($instance['rss_link']))
        {
            $rss_link = esc_attr($instance['rss_link']);
        }
        else
        {
            $rss_link ='http://www.rss.com';

        }
        


       /* SOCIAL ICONS Settings */

       if(isset($instance['facebook_icon']))
       {
           $facebook_icon = esc_attr($instance['facebook_icon']);
           
       }
       else
       {
           $facebook_icon ='fa fa-facebook';
           
       }

       if(isset($instance['twitter_icon']))
       {
           $twitter_icon = esc_attr($instance['twitter_icon']);
           
       }
       else
       {
           $twitter_icon ='fa fa-twitter';
           

       }

       if(isset($instance['linkedin_icon']))
       {
           $linkedin_icon = esc_attr($instance['linkedin_icon']);
       }
       else
       {
           $linkedin_icon ='fa fa-linkedin';

       }

      
       if(isset($instance['googleplus_icon']))
       {
           $googleplus_icon = esc_attr($instance['googleplus_icon']);
       }
       else
       {
           $googleplus_icon ='fa fa-google';

       }

       

       if(isset($instance['youtube_icon']))
       {
           $youtube_icon = esc_attr($instance['youtube_icon']);
       }
       else
       {
           $youtube_icon ='fa fa-youtube';

       }


       if(isset($instance['pinterest_icon']))
       {
           $pinterest_icon = esc_attr($instance['pinterest_icon']);
       }
       else
       {
           $pinterest_icon ='fa fa-pinterest';

       }


       if(isset($instance['rss_icon']))
       {
           $rss_icon = esc_attr($instance['rss_icon']);
       }
       else
       {
           $rss_icon ='fa fa-rss';

       }



       if(isset($instance['icon_width']))
       {
        $icon_width = esc_attr($instance['icon_width']);
       }
       else
       {
        $icon_width = 32;
       }
       
       ?>
       
       <h4>Facebook</h4>
       <p>
       <label for="<?php echo $this->get_field_id('facebook_link'); ?>" ><?php _e('Facebook Link') ?></label>
       <input class="widefat" id="<?php echo $this->get_field_id('facebook_link'); ?>" name="<?php echo $this->get_field_name('facebook_link') ?> " type="text" value="<?php echo esc_attr($facebook_link) ?> " >
       
       </p>

       <p>
       <label for="<?php echo $this->get_field_id('facebook_icon'); ?>" ><?php _e('Facebook Icon') ?></label>
       <input class="widefat" id="<?php echo $this->get_field_id('facebook_icon'); ?>" name="<?php echo $this->get_field_name('facebook_icon') ?> " type="text" value="<?php echo esc_attr($facebook_icon) ?> " >
       </p>

       <h4>Twitter</h4>
       <p>
       <label for="<?php echo $this->get_field_id('twitter_link'); ?>" ><?php _e('Twitter Link') ?></label>
       <input class="widefat" id="<?php echo $this->get_field_id('twitter_link'); ?>" name="<?php echo $this->get_field_name('twitter_link') ?> " type="text" value="<?php echo esc_attr($twitter_link) ?> " >
       </p>
       <p>
       <label for="<?php echo $this->get_field_id('twitter_icon'); ?>" ><?php _e('Twitter Icon') ?></label>
       <input class="widefat" id="<?php echo $this->get_field_id('twitter_icon'); ?>" name="<?php echo $this->get_field_name('twitter_icon') ?> " type="text" value="<?php echo esc_attr($twitter_icon) ?> " >
       </p>


       <h4>Linkedin</h4>
       <p>
       <label for="<?php echo $this->get_field_id('linkedin_link'); ?>" ><?php _e('Linkedin Link') ?></label>
       <input class="widefat" id="<?php echo $this->get_field_id('linkedin_link'); ?>" name="<?php echo $this->get_field_name('linkedin_link') ?> " type="text" value="<?php echo esc_attr($linkedin_link) ?> " >
       </p>
       <p>
       <label for="<?php echo $this->get_field_id('linkedin_icon'); ?>" ><?php _e('Linkedin Icon') ?></label>
       <input class="widefat" id="<?php echo $this->get_field_id('linkedin_icon'); ?>" name="<?php echo $this->get_field_name('linkedin_icon') ?> " type="text" value="<?php echo esc_attr($linkedin_icon) ?> " >
       </p>


       <h4>GooglePlus</h4>
       <p>
       <label for="<?php echo $this->get_field_id('googleplus_link'); ?>" ><?php _e('GooglePlus Link') ?></label>
       <input class="widefat" id="<?php echo $this->get_field_id('googleplus_link'); ?>" name="<?php echo $this->get_field_name('googleplus_link') ?> " type="text" value="<?php echo esc_attr($googleplus_link) ?> " >
       </p>
       <p>
       <label for="<?php echo $this->get_field_id('googleplus_icon'); ?>" ><?php _e('Googleplus Icon') ?></label>
       <input class="widefat" id="<?php echo $this->get_field_id('googleplus_icon'); ?>" name="<?php echo $this->get_field_name('googleplus_icon') ?> " type="text" value="<?php echo esc_attr($googleplus_icon) ?> " >
       </p>



       <h4>Youtube</h4>
       <p>
       <label for="<?php echo $this->get_field_id('youtube_link'); ?>" ><?php _e('Youtube Link') ?></label>
       <input class="widefat" id="<?php echo $this->get_field_id('youtube_link'); ?>" name="<?php echo $this->get_field_name('youtube_link') ?> " type="text" value="<?php echo esc_attr($youtube_link) ?> " >
       </p>
       <p>
       <label for="<?php echo $this->get_field_id('youtube_icon'); ?>" ><?php _e('Youtube Icon') ?></label>
       <input class="widefat" id="<?php echo $this->get_field_id('youtube_icon'); ?>" name="<?php echo $this->get_field_name('youtube_icon') ?> " type="text" value="<?php echo esc_attr($youtube_icon) ?> " >
       </p>


      

       <h4>Pinterest <span class="fa fa-pinterest"></span></h4>
       <p>
       <label for="<?php echo $this->get_field_id('pinterest_link'); ?>" ><?php _e('Pinterest Link') ?></label>
       <input class="widefat" id="<?php echo $this->get_field_id('pinterest_link'); ?>" name="<?php echo $this->get_field_name('pinterest_link') ?> " type="text" value="<?php echo esc_attr($pinterest_link) ?> " >
       </p>
       <p>
       <label for="<?php echo $this->get_field_id('pinterest_icon'); ?>" ><?php _e('Pinterest Icon') ?></label>
       <input class="widefat" id="<?php echo $this->get_field_id('pinterest_icon'); ?>" name="<?php echo $this->get_field_name('pinterest_icon') ?> " type="text" value="<?php echo esc_attr($pinterest_icon) ?> " >
       </p>


       <h4>RSS</h4>
       <p>
       <label for="<?php echo $this->get_field_id('rss_link'); ?>" ><?php _e('RSS Link') ?></label>
       <input class="widefat" id="<?php echo $this->get_field_id('rss_link'); ?>" name="<?php echo $this->get_field_name('rss_link') ?> " type="text" value="<?php echo esc_attr($rss_link) ?> " >
       </p>

       <p>
       <label for="<?php echo $this->get_field_id('rss_icon'); ?>" ><?php _e('RSS Icon') ?></label>
       <input class="widefat" id="<?php echo $this->get_field_id('rss_icon'); ?>" name="<?php echo $this->get_field_name('rss_icon') ?> " type="text" value="<?php echo esc_attr($rss_icon) ?> " >
       </p>
       
       <hr>
       <p>
       <label for="<?php echo $this->get_field_id('icon_width'); ?>" ><?php _e('Icons Width') ?></label>
       <input class="widefat" id="<?php echo $this->get_field_id('icon_width'); ?>" name="<?php echo $this->get_field_name('icon_width') ?> " type="text" value="<?php echo esc_attr($icon_width) ?> " >
       </p>

       
      

<?php

        
    }
    


    public function getSocialLinks($links, $icons, $icon_width){

?>
    <div class="social-links" >
    <a href="<?php echo esc_attr($links['facebook']); ?>" target="_blank" class="<?php echo esc_attr($icons['facebook']); ?>" style="width:<?php echo $icon_width; ?>px; height:<?php echo $icon_width; ?>px;" ></a>
    <a href="<?php echo esc_attr($links['twitter']); ?>" target="_blank" class="<?php echo esc_attr($icons['twitter']); ?>" style="width:<?php echo $icon_width; ?>px; height:<?php echo $icon_width; ?>px;" ></a>
    <a href="<?php echo esc_attr($links['linkedin']); ?>" target="_blank" class="<?php echo esc_attr($icons['linkedin']); ?>" style="width:<?php echo $icon_width; ?>px; height:<?php echo $icon_width; ?>px;" ></a>
    <a href="<?php echo esc_attr($links['googleplus']); ?>" target="_blank" class="<?php echo esc_attr($icons['googleplus']); ?>" style="width:<?php echo $icon_width; ?>px; height:<?php echo $icon_width; ?>px;" ></a>
    <a href="<?php echo esc_attr($links['youtube']); ?>" target="_blank" class="<?php echo esc_attr($icons['youtube']); ?>" style="width:<?php echo $icon_width; ?>px; height:<?php echo $icon_width; ?>px;" ></a>
    <a href="<?php echo esc_attr($links['pinterest']); ?>" target="_blank" class="<?php echo esc_attr($icons['pinterest']); ?>" style="width:<?php echo $icon_width; ?>px; height:<?php echo $icon_width; ?>px;" ></a>
    <a href="<?php echo esc_attr($links['rss']); ?>" target="_blank" class="<?php echo esc_attr($icons['rss']); ?>" style="width:<?php echo $icon_width; ?>px; height:<?php echo $icon_width; ?>px;" ></a>
    
    </div>



<?php

    }



}
    ?>