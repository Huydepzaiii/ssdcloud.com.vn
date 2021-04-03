<?php
function theme_setup(){
	add_theme_support('menus');
	add_editor_style();
	add_theme_support('automatic-feed-links');
	add_theme_support( 'post-formats', array( 'aside', 'image', 'link', 'quote', 'status' ) );
	register_nav_menu( 'primary', 'Primary Menu' );
	register_nav_menu( 'mobile-menu', 'Mobile menu');
	add_theme_support( 'post-thumbnails' );
}
add_action( 'after_setup_theme', 'theme_setup' );

/*
add_filter('wp_handle_upload_prefilter', 'custom_upload_filter' );
function custom_upload_filter($file){
    $file['name'] = sanitize_title($file['name']);
    return $file;
}*/
add_filter( 'wp_title', 'theme_wp_title', 10, 2 );
function theme_wp_title( $title, $sep ) {
    global $paged, $page;
    if ( is_feed() )
        return $title;
    $title .= get_bloginfo( 'name', 'display' );
    $site_description = get_bloginfo( 'description', 'display' );
    if ( $site_description && ( is_home() || is_front_page() ) )
        $title = "$title $sep $site_description";
    if ( $paged >= 2 || $page >= 2 )
        $title = "$title $sep " . sprintf('Page %s', max( $paged, $page ) );
    return $title;
}
add_filter( 'wp_page_menu_args', 'page_menu_args' );
function page_menu_args( $args ) {
    if ( ! isset( $args['show_home'] ) )
        $args['show_home'] = true;
    return $args;
}
add_action('wp_head','pluginname_ajaxurl');
function pluginname_ajaxurl(){
    ?>
    <script type="text/javascript">
    var ajaxurl = "<?php echo admin_url('admin-ajax.php'); ?>";
    var home_url = "<?php echo home_url(); ?>";
    var THEME_URL = "<?php echo THEME_URL; ?>";
    </script>
    <?php
}
function GET_IMG($post_id,$thumbnail="thumbnail"){
    $post_thumbnail_id = get_post_thumbnail_id( $post_id);
    if($thumbnail=="full"){
        $img_url=wp_get_attachment_url($post_thumbnail_id);
    }else{
        $img_url=wp_get_attachment_thumb_url($post_thumbnail_id,$thumbnail);
    }
    if($img_url == "")
        $img_url = THEME_URL."/images/no_image.jpg";
    return $img_url;
}
function GET_INT($number){
    return number_format($number, 0, ',', '.');
}
function get_img_alt($image_url) {
    global $wpdb;
    $attachment = $wpdb->get_col($wpdb->prepare("SELECT * FROM $wpdb->posts WHERE guid='%s';", $image_url ));
    $alt=get_post_meta($attachment[0], '_wp_attachment_image_alt', true);
    if($alt==""){
        $alt=get_the_title($attachment[0]);
    }
    echo $alt;
}
/*function lttEmail($title,$content,$form_name,$form_email,$to_email,$bcc = ""){
    $header = "From: ".$form_name." <".$form_email.">\r\n";
    $header .= "Reply-To: ".$form_email."\r\n";
    $header .= ($bcc!="") ? "Bcc: " .$bcc. "\r\n" : "";
    $header .= "X-Mailer: PHP/" . phpversion();
    $header .= "Content-Type: text/html; charset=UTF-8\r\n";

    add_filter( 'wp_mail_content_type', function({return 'text/html';});

    $lttEmail = wp_mail($to_email,$title,$content,$header);
    remove_filter( 'wp_mail_content_type', 'wpdocs_set_html_mail_content_type' );
}*/
//lttEmail("title","content","Tịnh","madtrollpy@gmail.com","locdp@dts.com.vn");
/*if ( function_exists('register_sidebar') ){
    register_sidebar(array(
        'name' => 'Widget Left',
        'id' => 'widget-left',
        'description' => 'Widget Left',
        'before_widget' => '<div id="%1$s" class="widget %2$s pd-lr-15 mg-b-10">',
        'after_widget' => '</div>',
        'before_title' => '<div class="title_for_term widget-left-title">',
        'after_title' => '</div>'
    ));
}

if ( function_exists('register_sidebar') ){
    register_sidebar(array(
        'name' => 'Widget Right',
        'id' => 'widget-right',
        'description' => 'Widget Right',
        'before_widget' => '<div id="%1$s" class="widget %2$s pd-lr-15 mg-b-10">',
        'after_widget' => '</div>',
        'before_title' => '<div class="title_for_term widget-left-title">',
        'after_title' => '</div>'
    ));
}
*/
/* call widget
	dynamic_sidebar('widget-left');
*/
?>
