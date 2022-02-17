<?php get_header();
if (is_home() || is_front_page()) {
 do_shortcode('[su_tabs style="default" active="1" vertical="no" class=""]
[su_tab title="Bio" disabled="no" anchor="" url="" target="blank" class=""]Bio Content[/su_tab]
[su_tab title="Info" disabled="no" anchor="" url="" target="blank" class=""Information[/su_tab]
[su_tab title="Contacts" disabled="no" anchor="" url="" target="blank" class=""]Contact Info[/su_tab]
[/su_tabs]'); 
}
?>

<ng-view  class="animate"  ></ng-view>


<?php get_footer(); ?>