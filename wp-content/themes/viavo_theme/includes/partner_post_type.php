<?php

function partner_post_type(){
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
}
add_action('init', 'partner_post_type');

function slide_post_type(){
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
}

add_action('init', 'slide_post_type');

function contact_post_type(){
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
}

add_action('init', 'contact_post_type');
