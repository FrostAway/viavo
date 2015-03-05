<?php

if(isset($_POST['btn-send-review'])){
    $name = $_POST['name'];
    $job = $_POST['job'];
    $content = $_POST['content'];
    $rating = $_POST['rating'];
    
    $contact = array(
        'post_title' => 'Đánh giá của '.$name,
        'post_excerpt' => $_POST['content'],
        'post_status' => 'pending',
        'post_type' => 'mycontact'
    );
    $post_id = wp_insert_post($contact);
    
    add_post_meta($post_id, 'contact-name', $name, true);
    add_post_meta($post_id, 'contact-job', $job, true);
   
    echo '<script>alert("Cám ơn bạn đã đóng góp ý kiến!")</script>';
    wp_redirect(get_page_link(103));
    exit();
}

if(isset($_POST['btn-send-contact'])){
    $contact = array(
        'post_title' => 'Liên hệ của '.$_POST['contact-name'],
        'post_excerpt' => $_POST['contact-content'],
        'post_status' => 'pending',
        'post_type' => 'mycontact'
    );
    $post_id = wp_insert_post($contact);
    add_post_meta($post_id, 'contact-name',  $_POST['contact-name'], true);
    add_post_meta($post_id, 'contact-phone', $_POST['contact-phone'], true);
    add_post_meta($post_id, 'contact-email', $_POST['contact-email'], true);
    
    wp_redirect(home_url());
    exit();
}

add_action('add_meta_boxes', 'add_my_contact_field');
function add_my_contact_field(){
    add_meta_box('contact-box', 'Thông tin Thêm', 'show_contact_box', 'mycontact', 'normal', 'low', array());
}
function show_contact_box(){
    global $post;
    $contact = get_post_custom($post->ID);
    ?>
<table>
    <tr>
        <td><label>Họ tên</label></td>
        <td><input type="text" name="contact-name" size="80" value="<?php if(isset($contact)) echo $contact['contact-name'][0] ?>"</td>
    </tr>
    <tr>
        <td><label>Công việc hiện tại</label></td>
        <td><input type="text" name="contact-job" size="80" value="<?php if(isset($contact)) echo $contact['contact-job'][0] ?>"</td>
    </tr>
    <tr>
        <td><label>Điện thoại</label></td>
        <td><input type="text" name="contact-phone" size="80" value="<?php if(isset($contact)) echo $contact['contact-phone'][0] ?>"</td>
    </tr>
    <tr>
        <td><label>Địa chỉ Email</label></td>
        <td><input type="text" name="contact-email" size="80" value="<?php if(isset($contact)) echo $contact['contact-email'][0] ?>"</td>
    </tr>
    
</table>
    <?php
}



function show_pending_number($menu) {    
    $types = array("post", "mycontact");
    $status = "pending";
    foreach($types as $type) {
        $num_posts = wp_count_posts($type, 'readable');
        $pending_count = 0;
        if (!empty($num_posts->$status)) $pending_count = $num_posts->$status;

        if ($type == 'post') {
            $menu_str = 'edit.php';
        } else {
            $menu_str = 'edit.php?post_type=' . $type;
        }

        foreach( $menu as $menu_key => $menu_data ) {
            if( $menu_str != $menu_data[2] )
                continue;
            $menu[$menu_key][0] .= " <span class='update-plugins count-$pending_count'><span class='plugin-count'>" . number_format_i18n($pending_count) . '</span></span>';
            }
        }
    return $menu;
}
add_filter('add_menu_classes', 'show_pending_number');


