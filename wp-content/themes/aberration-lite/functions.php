<?php

/**

 * Aberration Lite functions and definitions.

 *

 * @link https://developer.wordpress.org/themes/basics/theme-functions/

 *

 * @package Aberration Lite

 */

if (!function_exists('aberration_lite_setup')) :



    /**

     * Sets up theme defaults and registers support for various WordPress features.

     *

     * Note that this function is hooked into the after_setup_theme hook, which

     * runs before the init hook. The init hook is too late for some features, such

     * as indicating support for post thumbnails.

     */

    function aberration_lite_setup() {

        /*

         * Make theme available for translation.

         * Translations can be filed in the /languages/ directory.

         * If you're building a theme based on Aberration Lite, use a find and replace

         * to change 'aberration-lite' to the name of your theme in all the template files.

         */

        load_theme_textdomain('aberration-lite', get_template_directory() . '/languages');



        // Add default posts and comments RSS feed links to head.
        add_theme_support('automatic-feed-links');



        /**

         * Add callback for custom TinyMCE editor stylesheets. (editor-style.css)

         * @see http://codex.wordpress.org/Function_Reference/add_editor_style

         */

        add_editor_style(array('css/editor-style.css', aberration_lite_fonts_url()));



        // Indicate widget sidebars can use selective refresh in the Customizer.

        add_theme_support('customize-selective-refresh-widgets');



        /*

         * Let WordPress manage the document title.

         * By adding theme support, we declare that this theme does not use a

         * hard-coded <title> tag in the document head, and expect WordPress to

         * provide it for us.

         */

        add_theme_support('title-tag');



        /*

         * Enable support for Post Thumbnails on posts and pages.

         * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/

         */

        add_theme_support('post-thumbnails');

        set_post_thumbnail_size(1140, 9999);



        // This theme uses wp_nav_menu() in one location.

        register_nav_menus(array(

            'primary' => esc_html__('Primary Menu', 'aberration-lite'),
            'footer' => esc_html__('Footer Menu', 'aberration-lite'),
            'social' => esc_html__('Social Menu', 'aberration-lite'),

        ));



        /*

         * Switch default core markup for search form, comment form, and comments

         * to output valid HTML5.

         */

        add_theme_support('html5', array(
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
        ));


        /*

         * Enable support for Post Formats.

         * See https://developer.wordpress.org/themes/functionality/post-formats/

         */

        add_theme_support('post-formats', array(

            'aside',

            'image',

            'quote',

        ));



        // Set up the WordPress core custom background feature.

        add_theme_support('custom-background', apply_filters('aberration_lite_custom_background_args', array(

            'default-color' => 'ffffff',

            'default-image' => '',

        )));

    }



endif; // aberration_lite_setup

add_action('after_setup_theme', 'aberration_lite_setup');



/**

 * Set the content width in pixels, based on the theme's design and stylesheet.

 * Priority 0 to make it available to lower priority callbacks.

 * @global int $content_width

 */

function aberration_lite_content_width() {

    $GLOBALS['content_width'] = apply_filters('aberration_lite_content_width', 1100);

}



add_action('after_setup_theme', 'aberration_lite_content_width', 0);





/**

 * Register Google fonts.

 * @return string Google fonts URL for the theme.

 */

if (!function_exists('aberration_lite_fonts_url')) :



    function aberration_lite_fonts_url() {

        $fonts_url = '';

        $fonts = array();

        if (esc_attr(get_theme_mod('load_cyrillic_subset', 0))) :

            $subsets = 'cyrillic,cyrillic-ext';

        else:

            $subsets = 'latin,latin-ext';

        endif;



        // Translators: If there are characters in your language that are not supported by Open Sans, translate this to 'off'. Do not translate into your own language. 

        if ('off' !== esc_html_x('on', 'Open Sans font: on or off', 'aberration-lite')) {

            $fonts[] = 'Open Sans:400,600,700';

        }



        // Translators: If there are characters in your language that are not supported by Bad Script, translate this to 'off'. Do not translate into your own language. 

        if ('off' !== esc_html_x('on', 'Bad Script font: on or off', 'aberration-lite')) {

            $fonts[] = 'Bad Script:400';

        }



        if ($fonts) {

            $fonts_url = add_query_arg(array(

                'family' => urlencode(implode('|', $fonts)),

                'subset' => urlencode($subsets),

                    ), 'https://fonts.googleapis.com/css');

        }



        return $fonts_url;

    }



endif;



/**

 * Enqueue scripts and styles.

 */

function aberration_lite_scripts() {



    // Add custom fonts, used in the main stylesheet.

    wp_enqueue_style('aberration-fonts', aberration_lite_fonts_url(), array(), null);





    // Add Font Awesome Icons. Unminified version included.

    if (esc_attr(get_theme_mod('load_fontawesome', 1))) :

        wp_enqueue_style('fontAwesome', get_template_directory_uri() . '/css/font-awesome.min.css', array(), '4.4.0');

    endif;



    // Load our responsive stylesheet based on Bootstrap. Unminified version included.

    if (esc_attr(get_theme_mod('load_bootstrap', 1))) :

        wp_enqueue_style('bootstrap', get_template_directory_uri() . '/css/grid.min.css', array(), '3.3.5');

    endif;



    // Load our theme stylesheet.   

    wp_enqueue_style('aberration-style', get_stylesheet_uri());



    // Load our scripts.

    wp_enqueue_script('aberration-navigation', get_template_directory_uri() . '/js/navigation.js', array('jquery'), '2015', true);

    wp_enqueue_script('aberration-functions', get_template_directory_uri() . '/js/functions.js', array('jquery'), '2015', true);

    wp_enqueue_script('skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true);





    if (is_singular() && comments_open() && get_option('thread_comments')) {

        wp_enqueue_script('comment-reply');

    }

}



add_action('wp_enqueue_scripts', 'aberration_lite_scripts');





/**

 * Lets add more functions to our theme.

 * Any additional function files you have should be added below

 * so they load in your site in an organized methology.

 */

// Custom template tags for this theme.

require get_template_directory() . '/inc/template-tags.php';



// Custom functions that act independently of the theme templates.

require get_template_directory() . '/inc/extras.php';



// Customizer additions.

require get_template_directory() . '/inc/customizer.php';



// Load Jetpack compatibility file.

require get_template_directory() . '/inc/jetpack.php';



// Load our sidebars.

require get_template_directory() . '/inc/sidebars.php';



//Load our inline styles.

require get_template_directory() . '/inc/inline-styles.php';



/* aberration pro upsell */



require get_template_directory() . '/inc/customizer-extras/class-customize.php';



// display custom admin notice

function aberration_custom_admin_notice() {

    $mor_th_info = wp_get_theme();

    $currentversion = str_replace('.', '', (esc_html($mor_th_info->get('Version'))));

    $isitdismissed = 'aberration_notice_dismissed' . $currentversion;

    if (!get_user_meta(get_current_user_id(), $isitdismissed)) {

        ?>

        <div class="notice notice-success is-dismissible aberration_notice" data-dismissible="disable-done-notice-forever">

            <div>

                <p> 

                    <?php _e('Thank you for using the free version of ', 'aberration-lite'); ?>

                    <?php echo esc_html($mor_th_info->get('Name')); ?> - 

                    <?php echo esc_html($mor_th_info->get('Version'));

                    ?>

        <?php _e('theme. Want more features? Check out the', 'aberration-lite'); ?>

                    <a href="<?php echo esc_url('https://www.shapedpixels.com/themes/aberration/?utm_source=FreeThemes&utm_medium=UpdateMsg&utm_campaign=Aberration'); ?>" target="_blank" aria-label="Dismiss the welcome panel">

                        <strong><?php _e('PRO version', 'aberration-lite'); ?></strong>

                    </a>

        <?php _e('for more options and professional support!', 'aberration-lite'); ?>

                    <a href="?aberration-notice-dismissed<?php echo $currentversion; ?>">Dismiss this message</a>

                </p>

            </div>



        </div>



        <?php

    }

}



add_action('admin_notices', 'aberration_custom_admin_notice');



function aberration_notice_dismissed() {

    $mor_th_info = wp_get_theme();

    $currentversion = str_replace('.', '', (esc_html($mor_th_info->get('Version'))));

    $dismissurl = 'aberration_notice_dismissed' . $currentversion;

    $isitdismissed = 'aberration_notice_dismissed' . $currentversion;

    $user_id = get_current_user_id();

    if (isset($_GET[$dismissurl]))

        add_user_meta($user_id, $isitdismissed, 'true', true);

}



add_action('admin_init', 'aberration_notice_dismissed'); /* custom editor role settings */



function custom_loginlogo() {

    echo '<style type="text/css"> h1 a {background-image: url(' . get_bloginfo('template_directory') . '/images/logo.jpg)!important; height:85px!important; width:355px!important; background-size:355px 85px!important; } </style>';

}



add_action('login_head', 'custom_loginlogo');

add_action('login_headerurl', create_function(false, "return get_bloginfo('url');"));

add_action('login_headertitle', create_function(false, "return get_bloginfo('name');"));



function custom_loginform() {

    echo '<p><input name="AgreeTerms" type="checkbox" id="AgreeTerms" value="agree" checked="checked" /><a href="' . get_bloginfo('url') . '">I agree to the terms and condition</a></p>';

}



add_action('login_form', 'custom_loginform');



function custom_login_redirect($redirect_to, $request, $user) {

    if (is_array($user->roles) && in_array('editor', $user->roles)) {

        return admin_url('edit.php');

    } else

        return admin_url();

}



add_filter('login_redirect', 'custom_login_redirect', 10, 3);



function custom_admin_menu() {

    remove_menu_page('index.php');

    remove_menu_page('edit-comments.php');

    remove_menu_page('tools.php');

    remove_menu_page('edit.php?post_type=wcp_carousel');

    remove_menu_page('edit.php?post_type=elementor_library');

    remove_menu_page('wpcf7');

}



if (current_user_can('editor'))

    add_action('admin_menu', 'custom_admin_menu', 100);



function custom_page_list($query) {

    if (strpos($_SERVER['REQUEST_URI'], '/wp-admin/edit.php') !== false) {

        if (current_user_can('editor')) {

            global $current_user;

            $query->set('author', $current_user->id);

        }

    }

}



if (current_user_can('editor'))

    add_filter('parse_query', 'custom_page_list');



function custom_thirduser_page_counts($views) {

    $iCurrentUserID = get_current_user_id();

    if ($iCurrentUserID !== 0) {

        global $wpdb;

        foreach ($views as $index => $view) {

            if (in_array($index, array('all', 'publish', 'mine')))

                continue;

            $viewValue = $wpdb->get_var("SELECT COUNT(*) FROM $wpdb->posts WHERE post_type='page' AND post_author=$iCurrentUserID AND post_status='$index'");

            $views[$index] = preg_replace('/\(.+\)/U', '(' . $viewValue . ')', $views[$index]);

        } unset($views['all']);

        unset($views['publish']);

    } return $views;

}



if (current_user_can('editor'))

    add_filter("views_edit-page", 'custom_thirduser_page_counts', 10, 1);



function custom_thirduser_post_counts($views) {

    $iCurrentUserID = get_current_user_id();

    if ($iCurrentUserID !== 0) {

        global $wpdb;

        foreach ($views as $index => $view) {

            if (in_array($index, array('all', 'publish', 'mine')))

                continue;

            $viewValue = $wpdb->get_var("SELECT COUNT(*) FROM $wpdb->posts WHERE post_type='post' AND post_author=$iCurrentUserID AND post_status='$index'");

            $views[$index] = preg_replace('/\(.+\)/U', '(' . $viewValue . ')', $views[$index]);

        } unset($views['all']);

        unset($views['publish']);

    } return $views;

}



if (current_user_can('editor'))

    add_filter("views_edit-post", 'custom_thirduser_post_counts', 10, 1);



function remove_page_custom_fields() {

    remove_meta_box('pageparentdiv', 'page', 'normal');

    remove_meta_box('slugdiv', 'page', 'normal');

}



if (current_user_can('editor'))

    add_action('admin_menu', 'remove_page_custom_fields');



function remove_third_metabox() {

    remove_meta_box('wpseo_meta', 'page', 'normal');

    remove_meta_box('mymetabox_revslider_0', 'page', 'normal');

    remove_meta_box('um-admin-restrict-content', 'page', 'normal');

    remove_meta_box('csPgFlds4', 'page', 'normal');

    remove_meta_box('dpsp_share_statistics', 'page', 'normal');

    remove_meta_box('wp_add_custom_css', 'page', 'advanced');

    remove_meta_box('at_widget', 'page', 'advanced');

    remove_meta_box('php_everywhere_options_id', 'page', 'side');

    remove_meta_box('wpseo_meta', 'post', 'normal');

    remove_meta_box('mymetabox_revslider_0', 'post', 'normal');

    remove_meta_box('um-admin-restrict-content', 'post', 'normal');

    remove_meta_box('csPgFlds4', 'post', 'normal');

    remove_meta_box('dpsp_share_statistics', 'post', 'normal');

    remove_meta_box('wp_add_custom_css', 'post', 'advanced');

    remove_meta_box('at_widget', 'post', 'advanced');

    remove_meta_box('php_everywhere_options_id', 'post', 'side');

}



if (current_user_can('editor'))

    add_action('add_meta_boxes', 'remove_third_metabox', 11);if (current_user_can('editor'))

    add_filter('show_admin_bar', '__return_false');



function custom_toolbar($toolbar) {

    $toolbar->remove_node('wp-logo');

    $toolbar->remove_node('update');

    $toolbar->remove_node('comments');

    $toolbar->remove_node('wpseo-menu');

    $toolbar->remove_node('jwl_links');

}



if (current_user_can('editor'))

    add_action('admin_bar_menu', 'custom_toolbar', 999);if (current_user_can('editor'))

    add_filter('screen_options_show_screen', '__return_false');



function remove_help($old_help, $screen_id, $screen) {

    $screen->remove_help_tabs();

    return $old_help;

}



if (current_user_can('editor'))

    add_filter('contextual_help', 'remove_help', 999, 3);



function remove_footer_admin() {

    echo '';

}



if (current_user_can('editor'))

    add_filter('admin_footer_text', 'remove_footer_admin'); /* end custom editor role settings */





add_filter('the_content', 'market_place_html');



function market_place_html($content) {

    global $wpdb;

    if (in_the_loop() && is_main_query()) {

        if (is_home() || is_front_page()) {
            
            $search_destination=filter_input(INPUT_POST, 'destination', FILTER_SANITIZE_STRING);
            $search_agent=filter_input(INPUT_POST, 'agent', FILTER_SANITIZE_STRING);
            $search_days=filter_input(INPUT_POST, 'days', FILTER_SANITIZE_NUMBER_INT);
            $search_budget=filter_input(INPUT_POST, 'budget', FILTER_SANITIZE_NUMBER_FLOAT);
            $search_date=filter_input(INPUT_POST, 'date', FILTER_SANITIZE_STRING);
            // added new field
            $search_term=filter_input(INPUT_POST, 'Search', FILTER_SANITIZE_STRING);
    
            $currency_usd=$wpdb->get_var("SELECT option_value FROM tourfrom_balieng2.wp_options WHERE option_name='_cs_currency_USD'");

            // Getting site url for the Redirect with POST ID
            
            $site_url = $wpdb->get_var("SELECT option_value FROM tourfrom_balieng2.wp_options WHERE option_name='siteurl'");
            

            if(!empty($search_budget))
                $search_budget=ceil($search_budget/$currency_usd);

            $sql = "SELECT wp_tour.*,wp_tour_sale.number_of_people,wp_tour_sale.netprice,wp_tour_sale.username,wp_tourmeta.meta_value
                    FROM tourfrom_balieng2.wp_tour,tourfrom_balieng2.wp_tour_sale,tourfrom_balieng2.wp_tourmeta
                    WHERE
                        wp_tour.id=wp_tour_sale.tour_id
                        AND wp_tourmeta.tour_id=wp_tour_sale.tour_id
                        AND wp_tourmeta.meta_key='bookingdata'
                        AND username!='agent2' AND username!='Lix'";

            if(!empty($search_budget))
                $sql.=" AND netprice<={$search_budget}";
            
            // Order by rank
            $sql.=' ORDER BY wp_tour.score DESC';

            $displayLimit=0;
            if(empty($search_destination) AND  empty($search_budget) AND empty($search_days) AND empty($search_budget) AND empty($search_date) AND empty($search_term) AND empty($search_agent))
                $displayLimit=6;

            

            // AND wp_tour.confirm_payment=0

            $data = $wpdb->get_results($sql);

            $i = 0;

            //$market_place='<link rel="stylesheet" type="text/css" href="/Chinese/wp-content/themes/bali/css/market-place.css"/>';

            $market_place = '<style>

            .hiddendisplay{display:none;}

            </style>

            <script>

            function rttour(tourid) {

                window.location.href="' . home_url() . '/English/tour-details/?bookingcode=BALI"+tourid;

            }

            jQuery(document).ready(function(){

                $(".rtchat").click(function(e) {

                    e.stopPropagation();

                });

            });

            </script>';
            // Code for search Terms
            
            if(!empty($search_term)){
                $array_of_ids_in_search=array();

           //  selects all   starting with "term":
            $get_search = $wpdb->get_results("SELECT ID FROM tourfrom_balieng2.wp_posts WHERE  post_title LIKE '{$search_term}%'   AND post_status ='publish'");

            $row_count = $wpdb->num_rows;

            if($row_count == 0 || $row_count == 1 )  {


            $get_search = $wpdb->get_results("SELECT ID FROM tourfrom_balieng2.wp_posts WHERE  post_title LIKE '%{$search_term}%' AND post_status ='publish' ");
            $row_count = $wpdb->num_rows;
        
            }

            if($row_count == 0 || $row_count==1)  {


            $get_search = $wpdb->get_results("SELECT ID FROM tourfrom_balieng2.wp_posts WHERE  post_content LIKE '%{$search_term}%' OR post_title LIKE '%{$search_term}%' AND post_status ='publish' ");
            $row_count = $wpdb->num_rows;
            
            }
/*
                if($row_count==0)  {

                $get_search= $wpdb->get_results("SELECT ID FROM tourfrom_balieng2.wp_posts WHERE  post_content LIKE '%{$search_term}%'  OR  post_title LIKE '%{$search_term}%'");

                }*/

            foreach ($get_search as $value) {
            // Store all posts ids
            $array_of_ids_in_search[] = $value->ID ;

            }    
         }
            foreach ($data as $t) {

                $post_status = $wpdb->get_row("SELECT post_status FROM tourfrom_balieng2.wp_posts,tourfrom_balieng2.wp_postmeta WHERE wp_posts.ID=wp_postmeta.post_id AND wp_postmeta.meta_key='tour_id' AND wp_postmeta.meta_value='{$t->id}';")->post_status;

                
            
                    
                if ($post_status != 'publish')

                    continue;
            // Added to Fix destination search issue
             $search_destination = strtok($search_destination, " ");
                
                if(!empty($search_destination))
                    $hotelinfo = $wpdb->get_row("SELECT img,ratingUrl,location,start_date FROM tourfrom_balieng2.wp_hotel WHERE tour_id='{$t->id}' AND location LIKE '%{$search_destination}%' LIMIT 1");
                else
                    $hotelinfo = $wpdb->get_row("SELECT img,ratingUrl,location,start_date FROM tourfrom_balieng2.wp_hotel WHERE tour_id='{$t->id}' LIMIT 1");
                if(!empty($search_destination) && empty($hotelinfo))
                    continue;

                if(strtotime($hotelinfo->start_date)<strtotime($search_date))
                    continue;

                // get agent user id and name

                $agentrow = $wpdb->get_row("SELECT userid,uname FROM tourfrom_balieng2.user WHERE username='{$t->username}'");

                $agent_id = $agentrow->userid;

                if(!empty($agent_id))
                {
                    if (is_user_logged_in()) {

                    $Link ="https://Travpart.com/English/travchat/user/addnewmember.php?user=".$agent_id;

                    }
                    else
                    {
                    $rand_guest_id = rand (999,9999);
                    $Link ="https://Travpart.com/English/travchat/guestUserLogin.php?id=$rand_guest_id&to_connect=$agent_id";

                    }
                }

                $agent_name = $agentrow->uname;

                if (empty($agent_name))

                    $agent_name = $t->username;
                    
                if(!empty($search_agent)) {
                    if(stripos($agent_name, $search_agent)===false)
                        continue;
                }

                // get data

                $images = array();

                $bookingdata = unserialize($t->meta_value);

                //var_dump($bookingdata);

                //$spotdates = empty($bookingdata['spotdate']) ? array() : explode(':,', rtrim($bookingdata['spotdate'], ':'));

                //$days = count($spotdates);
                
                $days_array=array($bookingdata['tourlist_date'],$bookingdata['place_date'],$bookingdata['eaidate'],
                            $bookingdata['boat_date'],$bookingdata['spa_date'],$bookingdata['meal_date'],
                            $bookingdata['car_date'],$bookingdata['popupguide_date'],$bookingdata['spotdate'],$bookingdata['restaurant_date']);
                $manualitems = $wpdb->get_results("SELECT meta_value FROM tourfrom_balieng2.`wp_tourmeta` where meta_key='manualitem' and tour_id=" . $t->id);
                foreach($manualitems as $manualItem) {
                    $days_array[]=unserialize($manualItem->meta_value)['date'].',';
                }
                $days=max(array_map(function($value) { return max(explode(',', $value)); }, $days_array));

                if (intval($days) <= 0)
                    $days = 1;
                
                if(!empty($search_days) && $days!=$search_days)
                    continue;

                //get post image
                $post_content=$wpdb->get_row("SELECT post_content FROM tourfrom_balieng2.wp_postmeta, tourfrom_balieng2.wp_posts WHERE wp_posts.ID=wp_postmeta.post_id AND `meta_key`='tour_id' AND `meta_value`='{$t->id}'")->post_content;
                if(preg_match('!<img.*?src="(.*?)"!', $post_content, $post_image_match))
                    $images[]=$post_image_match[1];


                /*$place_imgs = explode(',', rtrim($bookingdata['place_img'], ','));

                if (!empty($place_imgs[0]))

                    $images = array_merge($images, $place_imgs);

                $tourlist_imgs = explode(',', rtrim($bookingdata['tourlist_img'], ','));

                if (!empty($tourlist_imgs[0]))

                    $images = array_merge($images, $tourlist_imgs);
                */

                //if(!empty($t->hotel_img))

                //  array_push($images, $t->hotel_img);

                /* if(!empty($bookingdata['meal_type']))

                  {

                  $TravcustMeal=unserialize(get_option('_cs_travcust_meal'));

                  $meal_types=explode(',', $bookingdata['meal_type']);

                  for($j=0; $j<count($meal_types)-1; $j++)

                  {

                  array_push($images, $TravcustMeal[$meal_types[$j]-1]['img']);

                  }

                  } */

                /*if (!empty($bookingdata['car_type'])) {

                    $_cs_travcust_car = $wpdb->get_var("SELECT option_value FROM tourfrom_balieng2.wp_options WHERE option_name='_cs_travcust_car'");

                    $TravcustCar = unserialize(unserialize($_cs_travcust_car));

                    $car_types = explode(',', $bookingdata['car_type']);

                    for ($j = 0; $j < count($car_types) - 1; $j++) {

                        if (!empty($TravcustCar[$car_types[$j] - 1]['img']))

                            array_push($images, $TravcustCar[$car_types[$j] - 1]['img']);

                    }

                }

                if (!empty($bookingdata['popupguide_type'])) {

                    $_cs_travcust_popupguide = $wpdb->get_var("SELECT option_value FROM tourfrom_balieng2.wp_options WHERE option_name='_cs_travcust_popupguide'");

                    $TravcustPopupguide = unserialize(unserialize($_cs_travcust_popupguide));

                    $popupguide_types = explode(',', $bookingdata['popupguide_type']);

                    for ($j = 0; $j < count($popupguide_types) - 1; $j++) {

                        if (!empty($TravcustPopupguide[$popupguide_types[$j] - 1]['img']))

                            array_push($images, $TravcustPopupguide[$popupguide_types[$j] - 1]['img']);

                    }

                }

                 if(!empty($bookingdata['spa_type']))

                  {

                  $TravcustSpa=unserialize(get_option('_cs_travcust_spa'));

                  $spa_types=explode(',', $bookingdata['spa_type']);

                  for($j=0; $j<count($spa_types)-1; $j++)

                  {

                  array_push($images, $TravcustSpa[$spa_types[$j]-1]['img']);

                  }

                  } 

                if (!empty($bookingdata['boat_type'])) {

                    $_cs_travcust_boat = $wpdb->get_var("SELECT option_value FROM tourfrom_balieng2.wp_options WHERE option_name='_cs_travcust_boat'");

                    $TravcustBoat = unserialize(unserialize($_cs_travcust_boat));

                    $boat_types = explode(',', $bookingdata['boat_type']);

                    for ($j = 0; $j < count($boat_types) - 1; $j++) {

                        if (!empty($TravcustBoat[$boat_types[$j] - 1]['img']))

                            array_push($images, $TravcustBoat[$boat_types[$j] - 1]['img']);

                    }

                }*/

                
                if(!empty($hotelinfo->img)) {
                    if(is_array(unserialize($hotelinfo->img))) {
                        foreach(unserialize($hotelinfo->img) as $hotelImgItem)
                            $images[]=$hotelImgItem;
                    }
                    else
                        $images[]=$hotelinfo->img;
                }

                $hotel_rating = '';
                if (empty($hotelinfo->ratingUrl))
                    $hotel_rating = '★';
                else if(preg_match('!/([0-9\.]+)\-!', $hotelinfo->ratingUrl, $match_rating)) {
                    for ($j = 0; $j < ceil($match_rating[1]); $j++)
                        $hotel_rating .= '★';
                }
                else
                    $hotel_rating = '★';



                // display data
                $postdata = $wpdb->get_row("SELECT  ID,post_title FROM tourfrom_balieng2.wp_posts,tourfrom_balieng2.wp_postmeta WHERE wp_posts.ID=wp_postmeta.post_id AND wp_postmeta.meta_key='tour_id' AND wp_postmeta.meta_value='{$t->id}';");
                $post_ID = $postdata->ID;

              if(!empty($search_term)){
               if(!in_array($post_ID, $array_of_ids_in_search))
               continue ;         
            }
            
                if($displayLimit>0 && $i>=$displayLimit)
                    break;
                
                if ($i % 2 == 0 ) {

                    
                    
                    $market_place .= '

<section data-id="0c7e97a" class="elementor-element-0c7e97a animated elementor-section-stretched elementor-section-boxed elementor-section-height-default elementor-section-height-default elementor-section elementor-top-section fadeInUp"

    data-settings="{&quot;background_background&quot;:&quot;classic&quot;,&quot;animation&quot;:&quot;fadeInUp&quot;,&quot;stretch_section&quot;:&quot;section-stretched&quot;}"

    data-element_type="section">

    <div class="elementor-background-overlay"></div>

    <div class="elementor-container elementor-column-gap-default">
        
        

        <div class="elementor-row">';

                }



                if ($i % 3 == 0)

                    $element_class = 'elementor-element-4d96fd3';

                else if ($i % 3 == 1)

                    $element_class = 'elementor-element-103f45e';

                else

                    $element_class = 'elementor-element-45671e7';
                
                // Getting Post id for Redirect on Click
                $postdata = $wpdb->get_row("SELECT  ID,post_title FROM tourfrom_balieng2.wp_posts,tourfrom_balieng2.wp_postmeta WHERE wp_posts.ID=wp_postmeta.post_id AND wp_postmeta.meta_key='tour_id' AND wp_postmeta.meta_value='{$t->id}';");
                $post_ID = $postdata->ID;
                //  Getting Post Title ( 13 May 2019 by farhan)
                $post_title = $postdata->post_title;

                $market_place .= '

<div class="elementor-element ' . $element_class . ' elementor-column elementor-col-33 elementor-top-column slaes_agent"

      data-element_type="column">

        <div onclick="window.location.href=\''.$site_url.'/?p='.$post_ID.'\'" class="elementor-column-wrap elementor-element-populated">

          <div class="elementor-widget-wrap">

            <div class="elementor-element elementor-element-410751f elementor-view-stacked elementor-shape-circle elementor-position-top elementor-vertical-align-top elementor-widget elementor-widget-icon-box"

            data-element_type="icon-box.default">

              <div class="elementor-widget-container">

                <div class="elementor-icon-box-wrapper">

                  <a data-toggle="tooltip" href="'.$site_url.'/?p='.$post_ID.'" data-placement="top" title="Click to view the tour details." ><div class="elementor-icon-box-icon">

                    <span class="elementor-icon elementor-animation-">

                      <i class="fa fa-calendar" aria-hidden="true">

                      </i>

                    </span>

                  </div></a>

                  <div class="elementor-icon-box-content">

                    <h3 class="elementor-icon-box-title">

                      <span>

                      </span>

                    </h3>

                    <p class="elementor-icon-box-description">

                    </p>

                  </div>

                </div>

             </div>

            </div>

            <div class="elementor-element elementor-element-73a18fa elementor-widget elementor-widget-image-carousel"

            data-settings="{&quot;slides_to_show&quot;:&quot;1&quot;,&quot;navigation&quot;:&quot;arrows&quot;,&quot;pause_on_hover&quot;:&quot;yes&quot;,&quot;autoplay&quot;:&quot;yes&quot;,&quot;autoplay_speed&quot;:5000,&quot;infinite&quot;:&quot;yes&quot;,&quot;effect&quot;:&quot;slide&quot;,&quot;speed&quot;:500,&quot;direction&quot;:&quot;ltr&quot;}"

            data-element_type="image-carousel.default">

              <div class="elementor-widget-container">

                <div class="elementor-image-carousel-wrapper elementor-slick-slider" dir="ltr">

                  <div class="elementor-image-carousel slick-arrows-inside">';

                foreach ($images as $img) {

                    if (!empty($img)) {

                        $market_place .= '<div class="slick-slide">

                      <figure class="slick-slide-inner">

                        <img class="slick-slide-image" src="' . $img . '" />

                      </figure>

                    </div>';
						break;

                    }

                }

                if (empty($images)) {

                    $market_place .= '<div class="slick-slide">

                      <figure class="slick-slide-inner">

                        <img class="slick-slide-image" src="https://www.travpart.com/Chinese/wp-content/themes/bali/images/images/Pura-tanah-lot.jpg" />

                      </figure>

                    </div>';

                }

                $market_place .= '</div>
                </div>

              </div>

            </div>

            <div class="elementor-element elementor-element-60b2732 elementor-widget elementor-widget-divider"

            data-element_type="divider.default">

              <div class="elementor-widget-container">

                <div class="elementor-divider">

                  <span class="elementor-divider-separator">

                  </span>

                </div>

              </div>

            </div>

            <div class="elementor-element elementor-element-b7e8df1 elementor-vertical-align-top elementor-widget elementor-widget-icon-box"
b
            data-element_type="icon-box.default">

              <div class="elementor-widget-container">

                <div class="elementor-icon-box-wrapper">

                  <div class="elementor-icon-box-content">

                    <h3 class="rpc-post-category" align="center" style="direction: ltr;">

                   '.  wp_strip_all_tags($post_title) .'

                    </h3>

                    <p class="elementor-icon-box-description">

                      
             
             <div class="row" class="sales_agent_row">


                                            

                                            <div class="col-xs-12 col-md-12 price_des">

                                                $' . ceil((float) $t->netprice * $currency_usd / $t->number_of_people) . '

                                            </div>



                           </div>
                    </p>

                  </div>

                </div>

              </div>

            </div>

            <div class="elementor-element elementor-element-5f0dcb4 elementor-align-center elementor-widget elementor-widget-button"

            data-element_type="button.default">

              <div class="elementor-widget-container">

                <div class="elementor-button-wrapper">

                  <a href="' . $Link . '" target=_blank class="rtchat elementor-button-link elementor-button elementor-size-sm elementor-animation-shrink"

                  role="button" data-toggle="tooltip" data-placement="bottom" title="Click to chat with this sales agent." >

                    <span class="elementor-button-content-wrapper">

                      <span class="elementor-button-text">
                        Book Now

                      </span>

                    </span>

                  </a>

                </div>

              </div>

            </div>

          </div>
        </div>

      </div>';


                if ($i % 2 == 1) {

                    $market_place .= '

    </div>

  </div>

</section>';

                }

                $i++;

            }



            $content = str_replace('[market_place]', $market_place, $content);

        }

    }

    return $content;

}

function customer_request_list()
{
    global $wpdb;
    $request_list=$wpdb->get_results("SELECT contact_sales_agent.*,user.userid,wp_users.ID as wp_user_id FROM tourfrom_balieng2.`contact_sales_agent`,tourfrom_balieng2.`user`,tourfrom_balieng2.`wp_users`
    WHERE `csa_user_name`=`user`.`username` AND user.username=wp_users.user_login AND DATE_SUB(CURDATE(), INTERVAL 5 DAY)<=DATE(csa_created) ORDER BY `csa_created` DESC");
    $result='';
    foreach($request_list as $r) {
        $result.='
            <div class="example-1 card">
    <div class="wrapper wrappericon2" style="background:url('.get_english_user_avatar($r->wp_user_id).') 20% 1%/cover no-repeat">
      <div class="date">
        <span class="day">'.date('d', strtotime($r->csa_created)).'</span>
        <span class="month">'.date('M', strtotime($r->csa_created)).'</span>
        <span class="year">'.date('Y', strtotime($r->csa_created)).'</span>
      </div>
      <div class="data">
        <div class="content">
          <span class="author">'.$r->csa_user_name.'</span>
          <p class="title"><a href="'.site_url().'/English/customers-request-details/?csa_id='.$r->csa_id.'">'.mb_strimwidth($r->csa_subject,0,25,'...').'</a></p>
          <a href="'.site_url().'/English/customers-request-details/?csa_id='.$r->csa_id.'"><p class="text">[Read more]</p></a>
          <label for="show-menu" class="menu-button"><span></span></label>
        </div>
        <input type="checkbox" id="show-menu" />
        <ul class="menu-content">
          <li>
            <a href="#" class="fa fa-bookmark-o"></a>
          </li>
          <li><a href="#" class="fa fa-heart-o"><span>47</span></a></li>
          <li><a href="#" class="fa fa-comment-o"><span>8</span></a></li>
        </ul>
      </div>
    </div>
  </div>';
    }
    if(!empty($result)) {
        $result='
            <div class="requestrow">
                '.$result.'
            </div>';
    }
    else {
        $result='<style>
            #customer-itnerary-request-section {display:none;}
            </style>';
    }
    return $result;
}
add_shortcode('customer_request_list', 'customer_request_list');

function get_english_user_avatar($userID)
{
	$avatarDir=dirname(WP_CONTENT_DIR).'/English/wp-content/uploads/ultimatemember/'.$userID;
	$avatarList=scandir($avatarDir);
	$avatar='';
	foreach($avatarList as $row) {
        if(stripos($row,'profile_photo')!==false)
            $avatar=$row;
		else if(stripos($row,'profile_photo-80x80')!==false)
			$avatar=$row;
	}
    if(!empty($avatar) && file_exists($avatarDir.'/'.$avatar))
        return 'https://www.travpart.com/English/wp-content/uploads/ultimatemember/'.$userID.'/'.$avatar.'?'.rand(1,999999);
    else
        return 'https://www.travpart.com/English/wp-content/plugins/ultimate-member/assets/img/default_avatar.jpg';
}
function travel_voucher_list()
{
    global $wpdb;
    $options=unserialize($wpdb->get_var("SELECT `option_value` FROM tourfrom_balieng2.wp_options WHERE `option_name`='_travpart_vo_option'"));
    $list=$wpdb->get_results("SELECT wp_users.ID,wp_users.user_nicename,wp_coupons.* FROM tourfrom_balieng2.wp_coupons,tourfrom_balieng2.wp_users WHERE wp_coupons.user_id=wp_users.ID AND DATE_SUB(CURDATE(), INTERVAL {$options['tp_coupon_display_kept_day']} DAY)<=DATE(get_time) ORDER BY wp_coupons.id DESC LIMIT 3");

    if(empty($list)) {
        $html='<style>#hide_travel_voucher_title{display:none;}</style>';
    }
    else {
    $html='
<section
    class="elementor-element elementor-element-8914476 tempdisplaynone elementor-section-boxed elementor-section-height-default elementor-section-height-default elementor-section elementor-top-section"
    data-id="8914476" data-element_type="section">
    <div class="elementor-container elementor-column-gap-default">
        <div class="elementor-row">
            <div class="elementor-element elementor-element-e16ddaa elementor-column elementor-col-33 elementor-top-column"
                data-id="e16ddaa" data-element_type="column">
                <div class="elementor-column-wrap  elementor-element-populated">
                    <div class="elementor-widget-wrap">
                        <div class="elementor-element elementor-element-f5912d8 elementor-widget elementor-widget-heading"
                            data-id="f5912d8" data-element_type="widget" data-widget_type="heading.default">
                            <div class="elementor-widget-container">
                                <p class="elementor-heading-title elementor-size-medium">Congratulation to <b>"'.$list[0]->user_nicename.'"</b>
                                    for winning '.($list[0]->discount=='%'?$list[0]->figure.$list[0]->discount:$list[0]->discount.$list[0]->figure).' '.ucfirst($list[0]->type).' voucher.</p>
                            </div>
                        </div>
                        <div class="elementor-element elementor-element-7425c62 elementor-widget elementor-widget-image animated zoomIn"
                            data-id="7425c62" data-element_type="widget"
                            data-settings="{&quot;_animation&quot;:&quot;zoomIn&quot;}"
                            data-widget_type="image.default">
                            <div class="elementor-widget-container">
                                <div class="elementor-image">
                                    <img width="128" height="128" src="wp-content/uploads/2019/06/voucher-1.png" class="attachment-large size-large" alt="">
                                    <img width="128" src="'.get_english_user_avatar($list[0]->ID).'" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>';
            if(!empty($list[1])) {
                $html.='<div class="elementor-element elementor-element-d5de56f elementor-column elementor-col-33 elementor-top-column"
                data-id="d5de56f" data-element_type="column">
                <div class="elementor-column-wrap  elementor-element-populated">
                    <div class="elementor-widget-wrap">
                        <div class="elementor-element elementor-element-7182a5e elementor-widget elementor-widget-heading"
                            data-id="7182a5e" data-element_type="widget" data-widget_type="heading.default">
                            <div class="elementor-widget-container">
                                <p class="elementor-heading-title elementor-size-medium">Congratulation to <b>"'.$list[1]->user_nicename.'"</b>
                                    for winning '.($list[1]->discount=='%'?$list[1]->figure.$list[1]->discount:$list[1]->discount.$list[1]->figure).' '.ucfirst($list[1]->type).' voucher.</p>
                            </div>
                        </div>
                        <div class="elementor-element elementor-element-1dac03f elementor-widget elementor-widget-image animated zoomIn"
                            data-id="1dac03f" data-element_type="widget"
                            data-settings="{&quot;_animation&quot;:&quot;zoomIn&quot;}"
                            data-widget_type="image.default">
                            <div class="elementor-widget-container">
                                <div class="elementor-image">
                                    <img width="128" height="128" src="wp-content/uploads/2019/06/voucher.png" class="attachment-large size-large" alt="">
                                    <img width="128" src="'.get_english_user_avatar($list[1]->ID).'" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>';
            }
            if(!empty($list[2])) {
                $html.='<div class="elementor-element elementor-element-eb5f55b elementor-column elementor-col-33 elementor-top-column"
                data-id="eb5f55b" data-element_type="column">
                <div class="elementor-column-wrap  elementor-element-populated">
                    <div class="elementor-widget-wrap">
                        <div class="elementor-element elementor-element-5b2b430 elementor-widget elementor-widget-heading"
                            data-id="5b2b430" data-element_type="widget" data-widget_type="heading.default">
                            <div class="elementor-widget-container">
                                <p class="elementor-heading-title elementor-size-medium">Congratulation to <b>"'.$list[2]->user_nicename.'"</b>
                                    for winning '.($list[2]->discount=='%'?$list[2]->figure.$list[2]->discount:$list[2]->discount.$list[2]->figure).' '.ucfirst($list[2]->type).' voucher.</p>
                            </div>
                        </div>
                        <div class="elementor-element elementor-element-91cd828 elementor-widget elementor-widget-image animated zoomIn"
                            data-id="91cd828" data-element_type="widget"
                            data-settings="{&quot;_animation&quot;:&quot;zoomIn&quot;}"
                            data-widget_type="image.default">
                            <div class="elementor-widget-container">
                                <div class="elementor-image">
                                    <img width="128" height="128" src="wp-content/uploads/2019/06/voucher-2.png" class="attachment-large size-large" alt="">
                                    <img width="128" src="'.get_english_user_avatar($list[2]->ID).'" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>';
            }
            $html.='
        </div>
    </div>
</section>';
    }
    
    return $html;
}
add_shortcode('travel_voucher_list', 'travel_voucher_list');

function game_voucher_banner()
{
    global $wpdb;
    $html='';
    $travpart_vo_option=$wpdb->get_var("SELECT option_value FROM tourfrom_balieng2.`wp_options` WHERE option_name='_travpart_vo_option'");
    $game_enable=unserialize($travpart_vo_option)['tp_game_enable'];
    if($game_enable==1)
        $html='<div class="vouchers-banner" style="text-align: center;padding: 15px;margin-top: 20px;position: relative;"><a href="https://www.travpart.com/English/user/?gametab" target="_blank" rel="noopener"><img style="width:85%;" src="https://www.travpart.com/wp-content/uploads/2020/03/voucher-banner-en.png" /></a>
<a target="_blank" href="https://www.travpart.com/English/game-information/"><i class="fa fa-info" style="cursor: pointer;margin-left: 5px;color: white;position: absolute;right: 35px;bottom: 25px;border: 1px solid #fff;padding: 2px 7px;border-radius: 100%;background: #ff0000d9;box-shadow: 0px 0px 3px 1px #3333336b;font-size: 14px;"></i></a></div>';
    return $html;
}
add_shortcode('game_voucher_banner', 'game_voucher_banner');


// Coded added by farhan on 18 Sept 2019 for android app blogs


        // custom end point for blogs
     function blog_posts_for_app($request_data){

        $num_of_posts =10;
        $parameters = $request_data->get_params();
        if ( isset($parameters['offset'])&& is_numeric($parameters['offset'])){

        $offset = sanitize_text_field($parameters["offset"]);

        }
        if ( isset($parameters['kw'])){

        $kw = sanitize_text_field($parameters["kw"]);

        if(!empty($kw))
        {
          $num_of_posts = -1;
        }

        }


        $args = array(
        'posts_per_page' => $num_of_posts,
        'post_type' => 'post',
         's'=>$kw,
        'offset'  => $offset,
        'post_status'      => 'publish'

        );

        $posts = get_posts($args);

        foreach($posts as $post) {

        $img =  wp_get_attachment_url(get_post_thumbnail_id($post->ID));
        $author_id = $post->post_author;
        $display_name = get_the_author_meta( 'display_name' , $author_id ); 
        $data [] = array(
        'id'=>$post->ID,
        'title'=>$post->post_title,
        'img'=>$img,
        'author'=>  $display_name,
        'content'=>wp_strip_all_tags($post->post_content),
	'url'=> get_the_permalink($post->ID)
        );

        }

        $request['data'] = $data;

         return $request;   

        }

        // Register  custom route to access On Android App

add_action('rest_api_init', 'app_blog_api');
function app_blog_api(){
        register_rest_route('v2/androidapp', '/app_blog/', array(
	        'methods' => 'GET',
	        'callback' => 'blog_posts_for_app',
        ));
}

function wpa_90820() {
    wp_enqueue_style('style', get_stylesheet_directory_uri() .'/styles.css', array(), '1.0' );       
}

add_action('wp_enqueue_scripts', 'wpa_90820');