<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive.
 *
 * Override this template by copying it to yourtheme/woocommerce/archive-product.php
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

get_header( 'shop' ); ?>

<div id="container">
    <?php get_sidebar() ?>
    <div class="col-right">
	<?php
		/**
		 * woocommerce_before_main_content hook
		 *
		 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
		 * @hooked woocommerce_breadcrumb - 20
		 */
		do_action( 'woocommerce_before_main_content' );
	?>

		<?php if ( apply_filters( 'woocommerce_show_page_title', true ) ) : ?>

			<h1 class="page-title"><?php woocommerce_page_title(); ?></h1>

		<?php endif; ?>

		<?php do_action( 'woocommerce_archive_description' ); ?>

		<?php if ( have_posts() ) : ?>

			<?php
				/**
				 * woocommerce_before_shop_loop hook
				 *
				 * @hooked woocommerce_result_count - 20
				 * @hooked woocommerce_catalog_ordering - 30
				 */
				do_action( 'woocommerce_before_shop_loop' );
			?>
                        
			<?php woocommerce_product_loop_start(); ?>

				<?php woocommerce_product_subcategories(); ?>
                        
				<?php while ( have_posts() ) : the_post(); ?>
                        
                                                <div class="item-cat">
                                                        <?php get_sale(); ?>
                                                    <div class="thumbnail">
                                                        <?php the_post_thumbnail('', array('class'=>'image')) ?>
                                                    </div>
                                                    <div class="info">
                                                        <a href="<?php the_permalink() ?>"><h3><?php the_title() ?></h3></a>
                                                        <i>Mã hàng</i>
                                                        <div class="code"><?= get_sku(); ?></div>
                                                        <i>Trạng thái</i>
                                                        <div class="status"><?= get_status(); ?></div>
                                                        <i>Xuất xứ</i>
                                                        <div class="origin"><?= get_post_meta(get_the_ID(), 'xuat-xu', true) ?></div>
                                                        <span>Đơn giá</span>
                                                        <!--<div class="price">40.000 VNĐ/Kg</div>-->
                                                        <?php woocommerce_template_loop_price(); ?>
                                                        <a href="<?php the_permalink() ?>" class="more">Xem thêm</a>
                                                    </div>
                                                </div>

				<?php endwhile; // end of the loop. ?>

			<?php woocommerce_product_loop_end(); ?>

			<?php
				/**
				 * woocommerce_after_shop_loop hook
				 *
				 * @hooked woocommerce_pagination - 10
				 */
				do_action( 'woocommerce_after_shop_loop' );
			?>

		<?php elseif ( ! woocommerce_product_subcategories( array( 'before' => woocommerce_product_loop_start( false ), 'after' => woocommerce_product_loop_end( false ) ) ) ) : ?>

			<?php wc_get_template( 'loop/no-products-found.php' ); ?>

		<?php endif; ?>
                        
                        <?php // woocommerce_pagination(); ?>

	<?php
		/**
		 * woocommerce_after_main_content hook
		 *
		 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
		 */
		do_action( 'woocommerce_after_main_content' );
	?>

	<?php
		/**
		 * woocommerce_sidebar hook
		 *
		 * @hooked woocommerce_get_sidebar - 10
                 * 
                 */
	?>
        </div>
</div>
                        
<?php get_footer( 'shop' ); ?>
