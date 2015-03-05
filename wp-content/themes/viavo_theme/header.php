<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo('charset'); ?>" />
	
	<?php if (is_search()) { ?>
	   <meta name="robots" content="noindex, nofollow" /> 
	<?php } ?>

	<title>
		   <?php
		      if (function_exists('is_tag') && is_tag()) {
		         single_tag_title(); echo '&quot; - '; }
		      elseif (is_archive()) {
		         wp_title(''); echo ''; }
		      elseif (is_search()) {
		         echo 'Search for &quot;'.wp_specialchars($s).'&quot; - '; }
		      elseif (!(is_404()) && (is_single()) || (is_page())) {
		         wp_title(''); echo ' - '; }
		      elseif (is_404()) {
		         echo 'Not Found - '; }
		      if (is_home()) {
		         bloginfo('name'); echo ' - '; bloginfo('description'); }
		      else {
		          bloginfo('name'); }
		      if ($paged>1) {
		         echo ' - page '. $paged; }
		   ?>
	</title>
	
	<link rel="shortcut icon" href="/favicon.ico">
	
	<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>">
	
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
        
        <link rel="stylesheet" href="<?= get_template_directory_uri() ?>/assets/fonts/css/font-awesome.min.css" />
        <link rel="stylesheet" href="<?= get_template_directory_uri() ?>/assets/css/demo-slideshow.css" />
        <link rel="stylesheet" href="<?= get_template_directory_uri() ?>/assets/css/style.css" />

	<?php if ( is_singular() ) wp_enqueue_script('comment-reply'); ?>

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	
	<div id="header">
            <div id="logo"><img src="<?= get_template_directory_uri() ?>/assets/images/ps/header/lgo-03.png" alt="Logo" title="viavo" /></div>

            <div class="header-right">
                <div class="header-item">
                    <img class="icon" src="<?= get_template_directory_uri() ?>/assets/images/ps/header/icon-04.png" title="chất lượng" />
                    <a href="#"><h3>CHẤT LƯỢNG</h3></a>
                    <b>Hoa quả tươi 100%</b>
                </div>
                <div class="header-item">
                    <img class="icon" src="<?= get_template_directory_uri() ?>/assets/images/ps/header/icon-09.png" title="chính sách vận chuyển" />
                    <a href="#"><h3>VẬN CHUYỂN</h3></a>
                    <b>Tận nơi trong nội thành</b>
                </div>
                <div class="header-item">
                    <img class="icon" src="<?= get_template_directory_uri() ?>/assets/images/ps/header/icon-10.png" title="hotline" />
                    <a href="#"><h3>HOTLINE</h3></a>
                    <b>0983 05 05 91</b>
                </div>
            </div>
            <div class="fb-icon"><img src="<?= get_template_directory_uri() ?>/assets/images/ps/header/icon-facebook-27.png" /></div>
            
            <div class="separator"></div>
            
            <div id="main-menu">
<!--            <ul>
                <li><a href="#"><img src="<?= get_template_directory_uri() ?>/assets/images/ps/menu/icon-07.png" /></a></li>
                <li><a href="#">Sản phẩm</a></li>
                <li><a href="#">Giới thiệu</a></li>
                <li><a href="#">Blog</a></li>
                <li><a href="#">Liên hệ</a></li>
            </ul>-->
            <?php wp_nav_menu(array('theme_location'=>'main-menu', 'container'=>'')) ?>
            <div id="search-form">
                <?php get_search_form(); ?>
            </div>
        </div>
        </div>
        
        <!-- end header -->

        <div id="slide">
            <div class="cycle-slideshow"
                 data-cycle-fx="scrollHorz"
                 data-cycle-pause-on-hover="true"
                 data-cycle-speed="300"
                 data-cycle-timeout=6000
                 >
                <?php
                   query_posts(array('post_type'=>'myslide'));
                ?>
                <?php if(have_posts()):while(have_posts()):the_post(); ?>
                <?php the_post_thumbnail(); ?>
                <?php endwhile; wp_reset_postdata(); ?>
                
                <?php endif ?>
            </div>
        </div>