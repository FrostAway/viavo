<?php get_header(); ?>

<div id="container">
    <?php get_sidebar(); ?>

    <div class="col-right">
        <?php if (have_posts()) : ?>

            <?php $post = $posts[0]; // Hack. Set $post so that the_date() works. ?>

            <?php /* If this is a category archive */ if (is_category()) { ?>
                <h3 class="box-title"><?php single_cat_title(); ?></h3>

                <?php /* If this is a tag archive */
            } elseif (is_tag()) {
                ?>
                <h3 class="box-title"><?php single_tag_title(); ?></h3>

                <?php /* If this is a daily archive */
            } elseif (is_day()) {
                ?>
                <h3 class="box-title"><?php the_time('F jS, Y'); ?></h3>

        <?php /* If this is a monthly archive */
    } elseif (is_month()) {
        ?>
                <h3 class="box-title"><?php the_time('F, Y'); ?></h3>

                <?php /* If this is a yearly archive */
            } elseif (is_year()) {
                ?>
                <h3 class="box-title"><?php the_time('Y'); ?></h3>

                <?php /* If this is an author archive */
            } elseif (is_author()) {
                ?>
                <h3 class="box-title">Author</h3>

        <?php /* If this is a paged archive */
    } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) {
        ?>
                <h3 class="box-title">Blog</h3>

                            <?php } ?>

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
                                    <?php
                                    if (get_the_excerpt() == '') {
                                        echo wp_trim_words(get_the_content(), 70, ' .....');
                                    } else {
                                        echo wp_trim_words(get_the_excerpt(), '70', '.....');
                                    }
                                    ?>
                                </p>
                                <a class="more" href="<?php the_permalink(); ?>">Xem thêm</a>
                            </div>
                        </li>
    <?php endwhile; ?>
                </ul>
            </div>

            <?php else : ?>

            <h3 class="box-title">Nothing found</h3>

            <?php endif; ?>
        <div class="pagination">
            <?php
            global $wp_query;

            $big = 999999999; // need an unlikely integer

            echo paginate_links(array(
                'base' => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
                'format' => '?paged=%#%',
                'current' => max(1, get_query_var('paged')),
                'total' => $wp_query->max_num_pages
            ));
            ?>
        </div>        
    </div>
</div>

<?php get_footer(); ?>