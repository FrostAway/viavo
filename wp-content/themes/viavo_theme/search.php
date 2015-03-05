<?php get_header(); ?>
<div id="container">
    <?php get_sidebar(); ?>
    <div class="col-right">
        <?php if (have_posts()) : ?>
            <?php $blogs = array();
            $products = array()
            ?>
            <?php while (have_posts()) : the_post(); ?>
                <?php
                if (get_post_type() == 'post') {
                    $blog = array(
                        'thumbnail' => get_the_post_thumbnail(),
                        'title' => get_the_title(),
                        'excerpt' => wp_trim_words(get_the_content(), 70, ' ... '),
                        'link' => get_permalink()
                    );
                    $blogs[] = $blog;
                } elseif (get_post_type() == 'product') {
                    $prod = array(
                        'thumbnail' => get_the_post_thumbnail(),
                        'title' => get_the_title(),
                        'price' => get_cv_price(),
                        'link' => get_permalink()
                    );
                    $products[] = $prod;
                }
                ?>
            <?php endwhile; ?>

            <?php endif; ?>
        
        
        <div id="wrapper">
            <h3 class="search-title">Kết quả tìm kiếm từ khóa '<?= $_GET['s'] ?>'</h3>
            
        <?php if (have_posts()) : ?>
        
            <h3 class="box-title">Sản phẩm</h3>
            <div class="products">
                    <?php foreach ($products as $bl) { ?>
                        <div class="item">
                            <div class="it-image">
                                <a href="<?= $bl['link'] ?>"><?= $bl['thumbnail'] ?></a>
                            </div>
                            <div class="info">
                                <h3><a href="<?= $bl['link'] ?>"><?= $bl['title'] ?></a></h3>
                                <div class="price"><?= $bl['price'] ?></div>
                                <a href="<?= $bl['link'] ?>" class="more">Xem thêm</a>
                            </div>
                        </div>
                        <?php } ?>
            </div>
            
            <h3 class="box-title">Blog</h3>
            <div class="news-cat">
                <ul>
                    <?php foreach ($blogs as $bl) { ?>
                        <li>
                            <div class="thumbnail">
                                 <?= $bl['thumbnail'] ?>
                            </div>
                            <div class="content">
                                <a href="<?= $bl['link'] ?>"><h4><?= $bl['title'] ?></h4></a>
                                <p>
                                    <?= $bl['excerpt'] ?>
                                </p>
                                <a class="more" href="<?= $bl['link'] ?>">Xem thêm</a>
                            </div>
                        </li>
                        <?php } ?>
                </ul>
            </div>
        <?php else:
            echo 'Không có kết quả nào';
        endif; ?>
        </div>
    </div>
</div>
<?php get_footer(); ?>