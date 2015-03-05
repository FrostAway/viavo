<?php

// Add RSS links to <head> section
automatic_feed_links();

// Load jQuery
//	if ( !is_admin() ) {
//	   wp_deregister_script('jquery');
//	   wp_register_script('jquery', ("http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"), false);
//	   wp_enqueue_script('jquery');
//	}
// Clean up the <head>
function removeHeadLinks() {
    remove_action('wp_head', 'rsd_link');
    remove_action('wp_head', 'wlwmanifest_link');
}


//add_filter( 'woocommerce_enqueue_styles', '__return_false' );
add_theme_support('post_thumbnails');
add_image_size('small', 177, 145);

add_action('init', 'removeHeadLinks');
remove_action('wp_head', 'wp_generator');


//add currency VND
add_filter('woocommerce_currencies', function($currencies) {
    $currencies['Đồng'] = __('VN Đồng', 'woocommerce');
    return $currencies;
});
add_filter('woocommerce_currency_symbol', function($currency_symbol, $currency) {
    switch ($currency) {
        case 'Đồng': $currency_symbol = ' VNĐ';
            break;
    }
    return $currency_symbol;
}, 10, 2);

//add woocommerce support
add_action('after_theme_setup', 'woocommerce_support');

function woocommerce_support() {
    add_theme_support('woocommerce');
}


// Declare sidebar widget zone
if (function_exists('register_sidebar')) {
    register_sidebar(array(
        'name' => 'Sidebar Widgets',
        'id' => 'sidebar-widgets',
        'description' => 'These are widgets for the sidebar.',
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h2>',
        'after_title' => '</h2>'
    ));
}

// menu
if (function_exists('register_nav_menu')) {
    register_nav_menu('main-menu', 'Main Menu');
}

//partner
include_once 'includes/partner_post_type.php';
include_once 'includes/reviews.php';
?>