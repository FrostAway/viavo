<?php get_header(); ?>

	<div id="container">
            
            <?php get_sidebar(); ?>

            <div class="col-right">
                
                <?php query_posts(array(
                    'post_type' => 'product',
                    'meta_key' => '_featured',
                    'meta_value' => 'yes',
                    'showposts' => 2
                )); ?>
                
                <div class="featured">
                    <?php if(have_posts()):while(have_posts()):the_post(); ?>
                    <div id="post-<?php the_ID() ?>" class="ft-item">
                        <a href="<?php the_permalink() ?>"><?php the_post_thumbnail(); ?></a>
                        <div class="it-text">
                            <h3><?php the_title(); ?></h3>
                            <div><?php echo get_post_meta(get_the_ID(), 'desc', true); ?></div>
                            <?php woocommerce_template_loop_price(); ?>
                        </div>
                    </div>
                    <?php endwhile; wp_reset_postdata(); ?>
                    <?php endif; ?>
                </div>

                <h3 class="box-title">Sản phẩm của chúng tôi <a class="view-all" href="<?= get_permalink( woocommerce_get_page_id( 'shop' ) ); ?>">Xem tất cả</a></h3>
                <?php 
                query_posts(array(
                    'post_type' => 'product',
                    'posts_per_page' => 8,
                    'meta_key' => '_featured',
                    'meta_value' => 'no'
                ));
                ?>
                <div class="products">
                    <?php if(have_posts()):while(have_posts()):the_post(); ?>
                        <div class="item">
                            <a href="<?php the_permalink() ?>"><?php the_post_thumbnail(); ?></a>
                            <div class="info">
                                <h3><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h3>
                                <?php woocommerce_template_loop_price(); ?>
                                <a href="<?php the_permalink() ?>" class="more">Xem thêm</a>
                            </div>
                        </div>
                    <?php endwhile; wp_reset_postdata(); ?>
                    <?php endif; ?>
                </div>

                <h3 class="box-title">Blog <a class="view-all" href="<?= get_category_link(3); ?>">Xem tất cả</a></h3>
                
                <?php query_posts(array('post_type'=>'post', 'cat'=>3)); ?>
                <div class="news">
                    <ul>
                        <?php if(have_posts()):while(have_posts()):the_post(); ?>
                        <li id="post-<?php the_ID() ?>">
                                <div class="thumbnail">
                                    <?php the_post_thumbnail(); ?>
                                </div>
                                <div class="content">
                                    <a href="<?php the_permalink(); ?>"><h4><?php the_title(); ?></h4></a>
                                    <p>
                                        <?= the_excerpt(); ?>
                                    </p>
                                    <a class="more" href="<?php the_permalink(); ?>">Xem thêm</a>
                                </div>
                            </li>
                        <?php endwhile; wp_reset_postdata(); ?>
                        <?php endif; ?>
                    </ul>
                </div>
            </div>
            <!-- end right column -->
        </div>
        <!-- end container -->

<?php get_footer(); ?>