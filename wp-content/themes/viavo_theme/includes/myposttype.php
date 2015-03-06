<?php

function register_my_post_type() {
    register_post_type('mypartner', array(
        'labels' => array(
            'name' => 'Đối tác',
            'singular_name' => 'Đối tác',
            'add_new' => 'Đối tác mới',
            'edit_item' => 'Chỉnh sửa Đối tác',
            'all_items' => 'Tất cả Đối tác',
            'new_item_name' => 'Đối tác mới',
            'view_item' => 'Xem Đối tác',
            'menu_name' => 'Đối tác',
            'add_new_item' => 'Thêm Đối tác mới',
        ),
        'description' => 'Đối tác của chúng tôi',
        'supports' => array(
            'title', 'thumbnail', 'editor', 'revisions'
        ),
        'hierarchical' => false,
        'has_archive' => false,
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'show_in_nav_menus' => false,
        'show_in_admin_bar' => false,
        'menu_position' => 5,
        'menu_icon' => 'dashicons-businessman',
    ));
    register_post_type('myslide', array(
        'labels' => array(
            'name' => 'Slide',
            'singular_name' => 'Slide',
            'add_new' => 'Slide mới',
            'edit_item' => 'Chỉnh sửa Slide',
            'all_items' => 'Tất cả Slide',
            'new_item_name' => 'Slide mới',
            'view_item' => 'Xem Slide',
            'menu_name' => 'Slide',
            'add_new_item' => 'Thêm Slide mới',
        ),
        'description' => 'Slide trang web',
        'supports' => array(
            'title', 'thumbnail', 'excerpt', 'revisions'
        ),
        'hierarchical' => false,
        'has_archive' => false,
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'show_in_nav_menus' => false,
        'show_in_admin_bar' => false,
        'menu_position' => 6,
        'menu_icon' => 'dashicons-images-alt2',
    ));
    register_post_type('mycontact', array(
        'labels' => array(
            'name' => 'Đánh giá',
            'singular_name' => 'Đánh giá',
            'add_new' => 'Đánh giá mới',
            'edit_item' => 'Chỉnh sửa Đánh giá',
            'all_items' => 'Tất cả Đánh giá',
            'new_item_name' => 'Đánh giá mới',
            'view_item' => 'Xem Đánh giá',
            'menu_name' => 'Đánh giá',
            'add_new_item' => 'Thêm Đánh giá mới',
        ),
        'description' => 'Đánh giá của khách hàng về sản phẩm, website',
        'supports' => array(
            'title', 'thumbnail', 'excerpt', 'revisions'
        ),
        'hierarchical' => false,
        'has_archive' => false,
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'show_in_nav_menus' => false,
        'show_in_admin_bar' => false,
        'menu_position' => 6,
        'menu_icon' => 'dashicons-images-alt2',
    ));

    register_post_type('mybanner', array(
        'labels' => array(
            'name' => 'Banner',
            'singular_name' => 'Banner',
        ),
        'description' => 'Banner quảng cáo hoặc giới thiệu sản phẩm',
        'supports' => array(
            'title', 'thumbnail', 'excerpt', 'revisions', 'comments'
        ),
        'hierarchical' => false,
        'has_archive' => false,
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'show_in_nav_menus' => false,
        'show_in_admin_bar' => false,
        'menu_position' => 6,
        'menu_icon' => 'dashicons-images-alt2',
    ));
}

add_action('init', 'register_my_post_type');

add_action('add_meta_boxes', 'add_mybanner_fields');

function add_mybanner_fields() {
    add_meta_box('show-hot-banner', 'Banner hiện thị trang chủ', 'show_mybanner_box', 'mybanner', 'normal', 'high', array());
}

function show_mybanner_box($post) {
    $ctbanner = get_post_custom($post->ID);
    ?>
    <table id="list-table">
        <tr>
            <td>Thứ tự hiển thị trang chủ: </td>
            <td>
                <?php
                $order = 1000;
                if (isset($ctbanner['show-banner'][0])) {
                    $order = $ctbanner['show-banner'][0];
                }
                ?>
                <input name="show-banner" value="<?= $order ?>" type="text" size="78" />
            </td>
        </tr>
    </table>
    <?php
}

add_action('save_post', 'update_show_banner');

function update_show_banner($post_id) {
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }
    if (!current_user_can('edit_post', $post_id)) {
        return;
    }
    if (isset($_REQUEST['post_type']) && $_REQUEST['post_type'] == 'banner') {
        update_post_meta($post_id, 'show-banner', $_POST['show-banner']);
    } else {
        delete_post_meta($post_id, 'show-banner');
    }
    if(isset($_POST['show-banner'])){
        update_post_meta($post_id, 'show-banner', $_POST['show-banner']);
    }
}


add_filter('manage_mybanner_posts_columns', 'banner_image_column');
add_filter('manage_myslide_posts_columns', 'banner_image_column');
add_filter('manage_mypartner_posts_columns', 'banner_image_column');
function banner_image_column($columns){
    $columns['banner_image'] = 'Banner Image';
    return $columns;
}

function banner_get_image($post_ID){
    $banner_image_id = get_post_thumbnail_id($post_ID);
    if($banner_image_id){
        $banner_image = wp_get_attachment_image_src($banner_image_id);
        return $banner_image[0];
    }
}
add_action('manage_mybanner_posts_custom_column', 'banner_image_content', 10, 2);
add_action('manage_myslide_posts_custom_column', 'banner_image_content', 10, 2);
add_action('manage_mypartner_posts_custom_column', 'banner_image_content', 10, 2);
function banner_image_content($column_name, $post_ID){
    if($column_name == 'banner_image'){
        $banner_image = banner_get_image($post_ID);
        if($banner_image){
        echo '<img src="'.$banner_image.'" />';
        }else{
            echo 'None';
        }
    }
}
