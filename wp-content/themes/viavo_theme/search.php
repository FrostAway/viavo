<?php get_header(); ?>
<div id="container">
    <?php get_sidebar(); ?>
    <div class="col-right">
        <?php if (have_posts()) : ?>
            <div id="wrapper">
                <h3 class="search-title">Kết quả tìm kiếm</h3>
                <?php if (get_post_type() == 'post') ; { ?>
                    <h3 class="box-title">Blog</h3>
                    <div class="news-cat">
                        <ul>
                            <?php while (have_posts()) : the_post(); ?>
                                <li>
                                    <div class="thumbnail">
                                        <?php the_post_thumbnail(); ?>
                                    </div>
                                    <div class="content">
                                        <a href="<?php the_permalink() ?>"><h4><?php the_title(); ?></h4></a>
                                        <p>
                                            <?= the_content(); ?>
                                        </p>
                                        <a class="more" href="<?php the_permalink(); ?>">Xem thêm</a>
                                    </div>
                                </li>
                            <?php endwhile; ?>
                        </ul>
                    </div>
                <?php } ?>

                <?php if (get_post_type() == 'product') { ?>
                    <div class="products">
                    <?php while (have_posts()) : the_post(); ?>
                        <div class="item-cat">
                            <div class="thumbnail">
                                <?php the_post_thumbnail('', array('class' => 'image')) ?>
                            </div>
                            <div class="info">
                                <a href="<?php the_permalink() ?>"><h3><?php the_title() ?></h3></a>
                                <i>Mã hàng</i>
                                <div class="code">BO_DL_1</div>
                                <i>Trạng thái</i>
                                <div class="status">Còn hàng</div>
                                <i>Xuất xứ</i>
                                <div class="origin">Đà lạt, Lâm đồng</div>
                                <span>Đơn giá</span>
                                <!--<div class="price">40.000 VNĐ/Kg</div>-->
                                <?php woocommerce_template_loop_price(); ?>
                                <a href="<?php the_permalink() ?>" class="more">Xem thêm</a>
                            </div>
                        </div>
                    <?php endwhile; // end of the loop. ?>
                    </div>
                <?php } ?>

            <?php else : ?>

                <h4>Không có kết quả nào</h4>

            <?php endif; ?>
        </div>
    </div>
</div>
<?php get_footer(); ?>