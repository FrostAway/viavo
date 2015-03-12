

<?php
query_posts(array(
    'post_type' => 'mypartner'
));
?>
<h3 class="box-title partner">Đối tác của chúng tôi</h3>
        <div id="partners">
    <div id="prev"><img src="<?= get_template_directory_uri() ?>/assets/images/ps/body/prev.png" /></div>
    <div class="cycle-slideshow" 
         data-cycle-fx=carousel
         data-cycle-timeout=2000
         data-cycle-carousel-visible=6
         data-cycle-next="#next"
         data-cycle-prev="#prev"
         >
        <?php if(have_posts()):while (have_posts()):the_post(); ?>
        <?php the_post_thumbnail(); ?>
        <?php endwhile; wp_reset_postdata(); ?>
        
        <?php endif ?>
    </div>
    <div id="next"><img src="<?= get_template_directory_uri() ?>/assets/images/ps/body/next.png" /></div>
</div>

<div id="footer">
            <div class="content">
                <div class="ft-col">
                    <h3>Địa chỉ liên hệ</h3>
                    <div class="f-item">
                        <img src="<?= get_template_directory_uri() ?>/assets/images/ps/footer/icon-20.png" title="địa chỉ" />
                        <span>Số 100 Trương Định, Hà Nội</span>
                    </div>
                    <div class="f-item">
                        <img src="<?= get_template_directory_uri() ?>/assets/images/ps/footer/icon-21.png" title="địa chỉ" />
                        <span>0983 05 05 91</span>
                    </div>
                    <div class="f-item">
                        <img src="<?= get_template_directory_uri() ?>/assets/images/ps/footer/icon-22.png" title="địa chỉ" />
                        <span>0999 999 999</span>
                    </div>
                    <div class="f-item">
                        <img src="<?= get_template_directory_uri() ?>/assets/images/ps/footer/icon-23.png" title="địa chỉ" />
                        <span>bohaitiep@gmail.com</span>
                    </div>
                    <div class="f-item">
                        <img src="<?= get_template_directory_uri() ?>/assets/images/ps/footer/icon-24.png" title="địa chỉ" />
                        <a href="www.facebook.com/bohaitiep"><span>www.facebook.com/bohaitiep</span></a>
                    </div>
                </div>
                <div class="ft-col">
                    <h3>Website</h3>
                    <div class="f-item"><a href="<?= get_page_link(17) ?>">Về chúng tôi</a></div>
                    <div class="f-item"><a href="<?= get_page_link(woocommerce_get_page_id('shop')) ?>">Sản phẩm</a></div>
                    <div class="f-item"><a href="<?= get_category_link(3) ?>">Bài viết</a></div>
                    <div class="f-item"><a href="<?= get_page_link(19) ?>">Liên hệ</a></div>
                </div>
                
                <!--script google map-->
        <script src="https://maps.googleapis.com/maps/api/js"></script>
        <script>
            function initialize() {
                var myLatlng = new google.maps.LatLng(20.99549,105.844354);
                var mapOptions = {
                    zoom: 17,
                    center: myLatlng
                };
                var map = new google.maps.Map(document.getElementById('google-map'), mapOptions);
                var contentString = '<p class="location">Cầu giấy, Hà Nội</p>';
                var infowindow = new google.maps.InfoWindow({
                    content: contentString,
                    width: 200
                });
                var marker = new google.maps.Marker({
                    position: myLatlng,
                    map: map,
                    title: 'Iziweb'
                });
                infowindow.open(map, marker);
            }
            google.maps.event.addDomListener(window, 'load', initialize);
        </script>
        <style>
            .location{
                color: #000;
            }
        </style>
                
                <div class="ft-col">
                    <h3>Google Map</h3>
                    <div id="google-map">
                        
                    </div>
                </div>
            </div>

        </div>

        <div id="end">
            <img src="<?= get_template_directory_uri() ?>/assets/images/ps/footer/logo-iziweb-25.png" />
            <span>Thiết kế bởi iziweb.vn. Bản quyền Tiệp Bòi 2015</span>
        </div>

<script src="<?= get_template_directory_uri() ?>/assets/js/jquery.min.js"></script>
<script src="<?= get_template_directory_uri() ?>/assets/js/jquery-ui.min.js"></script>
<script src="<?= get_template_directory_uri() ?>/assets/js/jquery.cycle2.min.js"></script>
<script src="<?= get_template_directory_uri() ?>/assets/js/jquery.cycle2.carousel.min.js"></script>
<script src="<?= get_template_directory_uri() ?>/assets/js/rating.js"></script>
<script src="<?= get_template_directory_uri() ?>/assets/js/load_image.js"></script>

	<?php wp_footer(); ?>
	
	<!-- Don't forget analytics -->
	
</body>

</html>
