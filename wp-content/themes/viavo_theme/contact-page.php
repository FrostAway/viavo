<?php
/*
 * Template Name: Contact page
 */
?>

<?php get_header() ?>

<div id="container">
    <?php get_sidebar(); ?>
    <div class="col-right">
        <div class="wrapper">
            <h3 class="box-title">Liên hệ Viavo</h3>
            
            <div style="padding: 15px;">
            <p> Địa chỉ: <?= get_option('viavo-address') ?></p>
            <p>    Điện thoại: <?= get_option('viavo-phone') ?></p>
            </div>
            
            
            <script src="https://maps.googleapis.com/maps/api/js"></script>
        <script>
            function initialize() {
                var myLatlng = new google.maps.LatLng(20.99549,105.844354);
                var mapOptions = {
                    zoom: 17,
                    center: myLatlng
                };
                var map = new google.maps.Map(document.getElementById('contact-ggmap'), mapOptions);
                var contentString = '<p class="location"><?php echo get_option('viavo-address') ?></p>';
                var infowindow = new google.maps.InfoWindow({
                    content: contentString,
                    width: 200
                });
                var marker = new google.maps.Marker({
                    position: myLatlng,
                    map: map,
                    title: 'Viavo'
                });
                infowindow.open(map, marker);
            }
            google.maps.event.addDomListener(window, 'load', initialize);
        </script>
            
        <div style="width: 90%; margin: 10px auto; height: 300px;" id="contact-ggmap">
                
            </div>
            
        <div id="respond">
            <form id="contact-form" method="post" action="">
                <p>
                <label>Họ tên</label>
                <input type="text" placeholder="Họ tên" name="contact-name" required="" />
                </p>
                <p>
                <label>Số điện thoại</label>
                <input type="text" placeholder="SĐT" name="contact-phone" required="" />
                </p>
                <p>
                <label>Email</label>
                <input type="text" placeholder="Email" name="contact-email" required="" />
                </p>
                <p>
                <label></label>
                <textarea name="contact-content" placeholder="Nội dung" required=""></textarea>
                </p>
                <input type="hidden" name="vote" id="vote" />
                <input style="margin-top: 20px;" type="submit" name="btn-send-contact" value="Gửi Liên hệ" />
            </form>
        </div>
        </div>
    </div>
</div>

<?php get_footer() ?>

