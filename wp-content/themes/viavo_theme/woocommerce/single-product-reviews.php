<?php
/**
 * Display single product reviews (comments)
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.3.2
 */
global $product;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

if ( ! comments_open() ) {
	return;
}

?>
<div id="reviews">
    <div class="fb-comments" data-href="<?php the_permalink() ?>" data-width="750" data-numposts="5" data-colorscheme="light"></div>
	<div class="clear"></div>
</div>
