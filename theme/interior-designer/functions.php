<?php
if(!defined('ABSPATH')){ exit;} 
require_once(dirname(__FILE__).'/includes/init.scripts.php');
require_once(dirname(__FILE__).'/includes/ids_extend_menu.php');
require_once(dirname(__FILE__).'/includes/config.theme.php');

require_once(dirname(__FILE__).'/includes/restapi-init.php');
require_once(dirname(__FILE__).'/includes/ids-shortcodes.php');



add_action('wpcf7_before_send_mail', 'my_wpcf7_choose_recipient');    
function my_wpcf7_choose_recipient($WPCF7_ContactForm)
{
    // use $submission to access POST data
    $submission = WPCF7_Submission::get_instance();
    $data = $submission->get_posted_data();
    $subject = $data['subject'];

    // use WPCF7_ContactForm->prop() to access form settings
    $mail = $WPCF7_ContactForm->prop('mail');
    $recipient = $mail['recipient'];

    // update a form property
    $WPCF7_ContactForm->set_properties(array('mail' => $mail));
}



