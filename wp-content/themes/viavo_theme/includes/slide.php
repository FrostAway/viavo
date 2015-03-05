
<div id="slide">
    <?php if (is_home()) { ?>
        <div class="cycle-slideshow"
             data-cycle-fx="fadeout"
             data-cycle-pause-on-hover="true"
             data-cycle-speed="300"
             data-cycle-timeout=6000
             >
            <div class="cycle-pager"></div>
            <?php
            query_posts(array('post_type' => 'myslide'));
            ?>
            <?php if (have_posts()):while (have_posts()):the_post(); ?>
                    <?php the_post_thumbnail(); ?>
                    <?php
                endwhile;
                wp_reset_postdata();
                ?>

            </div>
        <?php endif ?>

    <?php }else { ?>
        <img id="banner-page" src="<?= get_option('banner-page') ?>" title="banner" />
    <?php } ?>
</div>

