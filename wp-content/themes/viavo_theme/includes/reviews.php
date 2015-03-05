<?php

if(isset($_POST['btn-send-review'])){
    $name = $_POST['name'];
    $job = $_POST['job'];
    $content = $_POST['content'];
    $rating = $_POST['rating'];
    
    $contact = array(
        'post_title' => 'Đánh giá '.rand(0, 9999),
        'post_excerpt' => $_POST['content'],
        'post_status' => 'pending',
        'post_type' => 'mycontact'
    );
    $post_id = wp_insert_post($contact);
    
    add_post_meta($post_id, 'contact-name', $name, true);
    add_post_meta($post_id, 'contact-job', $name, true);
    
    echo '<script>alert("Gửi thành công, Cãm ơn bạn đã đóng góp ý kiến!")</script>';
    echo '<script>window.location"'.home_url().'"</script>';
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
</table>
    <?php
}



