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

add_filter('woocommerce_enqueue_styles', '__return_false');
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

//get product fields
function get_sku() {
    global $product;
    return $product->get_sku();
}

function get_status() {
    global $product;
//    if(get_post_meta($product->ID, '_stock_status', true) == 'instock'){
    if ($product->is_in_stock()) {
        return 'Còn hàng';
    } else {
        return 'Hết hàng';
    }
}

function get_sale() {
    global $post, $product;
    if ($product->is_on_sale()) :
        ?>

        <?php echo apply_filters('woocommerce_sale_flash', '<span class="onsale">' . __('Sale!', 'woocommerce') . '</span>', $post, $product); ?>
        <?php
    endif;
}

function get_sale_out($post_id, $echo=null) {
    if (get_post_meta($post_id, '_sale_price', true) != '') {
        if (get_post_meta($post_id, '_regular_price', true) != get_post_meta($post_id, '_sale_price', true)) {
            if($echo == true){
                echo '<div class="onsale">' . __('Sale!', 'woocommerce') . '</div>';
            }else{
                return '<div class="onsale">' . __('Sale!', 'woocommerce') . '</div>';
            }
        }
    }
}

//pagination
add_action('pre_get_posts', 'my_post_query_function');

function my_post_query_function($query) {
    if (!is_admin() && $query->is_main_query()) {
        if (is_archive()) {
            $query->set('posts_per_page', get_option('news-num'));
        }
        if (is_post_type_archive('product')) {
            $query->set('posts_per_page', get_option('product-num'));
        }
    }
}

function get_cv_price() {
    global $product;
    return $product->get_price_html();
}

add_action('admin_menu', 'register_viavo_param_option');

//theme setting

function register_viavo_param_option() {
    add_theme_page('Viavo Cài đặt', 'Viavo Cài đặt', 'manage_options', 'viavo-setting', 'home_page_setting');
}

add_action('admin_init', 'decleare_param_option');

function decleare_param_option() {
    register_setting('home_page_group', 'viavo-logo');
    register_setting('home_page_group', 'about-us');
    register_setting('home_page_group', 'time-shipping-day');
    register_setting('home_page_group', 'time-shipping-hour');
    register_setting('home_page_group', 'hotline');
    register_setting('home_page_group', 'product-num');
    register_setting('home_page_group', 'news-num');
    register_setting('home_page_group', 'viavo-address');
    register_setting('home_page_group', 'viavo-phone');
    register_setting('home_page_group', 'banner-page');

    register_setting('home_page_group', 'test-array');
}

function home_page_setting() {
    wp_enqueue_media();
    ?>
    <div class="wrap">
            <?php screen_icon(); ?>
        <form id="viavo_theme_setting" method="post" action="options.php">
    <?php settings_fields('home_page_group') ?>
            <table>
                <h2>Cài đặt giao diện</h2>
                <tr>
                    <td><label>Logo:</label></td>
                    <td><input type="text" name="viavo-logo" size="80" id="viavo-logo" value="<?= get_option('viavo-logo') ?>"/>
                        <button id="btn-viavo-logo" class="button">Upload</button></td>
                </tr>
                <tr>
                    <td><label>Banner các trang <br />(hiển thị đầu các trang):</label></td>
                    <td><input type="text" name="banner-page" size="80" id="banner-page" value="<?= get_option('banner-page') ?>"/>
                        <button id="btn-banner-page" class="button">Upload</button></td>
                </tr>
                <tr>
                    <td><label>Về chúng tôi: </label></td>
                    <td> <textarea cols="86" rows="5" name="about-us"><?= get_option('about-us') ?></textarea></td>
                </tr>
                <tr>
                    <td><label>Thời gian giao hàng</label></td>
                    <td><input type="text" size="89" placeholder="Ngày" name="time-shipping-day" value="<?= get_option('time-shipping-day') ?>" /></td>
                </tr>
                <tr>
                    <td></td>
                    <td><input type="text" size="89" placeholder="Giờ" name="time-shipping-hour" value="<?= get_option('time-shipping-hour') ?>" /></td>
                </tr>
                <tr>
                    <td><label>Hotline</label></td>
                    <td><input size="89" type="text" name="hotline" value="<?= get_option('hotline') ?>" /></td>
                </tr>
                <tr>
                    <td><label>Địa chỉ</label></td>
                    <td><input size="89" type="text" name="viavo-address" value="<?= get_option('viavo-address') ?>" /></td>
                </tr>
                <tr>
                    <td><label>Điện thoại</label></td>
                    <td><input size="89" type="text" name="viavo-phone" value="<?= get_option('viavo-phone') ?>" /></td>
                </tr>
                <tr>
                    <td><label>Số sản phẩm ở trang chủ</label></td>
                    <td><input size="89" type="text" name="product-num" value="<?= get_option('product-num') ?>" /></td>
                </tr>
                <tr>
                    <td><label>Số bài viết ở trang chủ</label></td>
                    <td><input size="89" type="text" name="news-num" value="<?= get_option('news-num') ?>" /></td>
                </tr>
            </table>
    <?php submit_button('Lưu lại') ?>
        </form>
    </div>
    <script>
        jQuery(document).ready(function ($) {
            var custom_uploader;
            $('#btn-viavo-logo').click(function (e) {
                e.preventDefault();
                if (custom_uploader) {
                    custom_uploader.open();
                    return;
                }
                custom_uploader = wp.media.frames.file_frame = wp.media({
                    title: 'Choose Image',
                    button: {
                        text: 'Choose Image'
                    },
                    multiple: false
                });
                custom_uploader.on('select', function () {
                    attachment = custom_uploader.state().get('selection').first().toJSON();
                    $('#viavo-logo').val(attachment.url);
                    custom_uploader.close();
                });
                custom_uploader.open();
            });
            $('#btn-banner-page').click(function (e) {
                e.preventDefault();
                if (custom_uploader) {
                    custom_uploader.open();
                    return;
                }
                custom_uploader = wp.media.frames.file_frame = wp.media({
                    title: 'Choose Image',
                    button: {
                        text: 'Choose Image'
                    },
                    multiple: false
                });
                custom_uploader.on('select', function () {
                    attachment = custom_uploader.state().get('selection').first().toJSON();
                    $('#banner-page').val(attachment.url);
                    custom_uploader.close();
                });
                custom_uploader.open();
            });
        });

    </script>
    <?php
}

//partner
include_once 'includes/myposttype.php';
include_once 'includes/reviews.php';
?>