<div class="col-left">
    <div class="about">
        <div class="about-it">
            <img src="<?= get_template_directory_uri() ?>/assets/images/ps/body/anh-bo-16.png" />
            <h3>VỀ CHÚNG TÔI</h3>
            <p>
                <?= get_option('about-us') ?>
            </p>
        </div>
        <div class="about-it">
            <h3>THỜI GIAN GIAO HÀNG</h3>
            <p><?= get_option('time-shipping-day') ?></p>
            <p><?= get_option('time-shipping-hour') ?></p>
            <h3 class="hotline">HOTLINE</h3>
            <h4 class="num"><?= get_option('hotline') ?></h4>
        </div>
    </div>

    <div class="reviews" id="review_form">
        <h3>PHẢN HỒI KHÁCH HÀNG</h3>
        
        <?php if(!is_page(19)){ ?>
        <div id="respond">
            <form id="commentform" method="post" action="">
                <label>Họ tên</label>
                <input type="text" placeholder="Họ tên" name="name" required="" />
                <label>Công việc hiện tại</label>
                <input type="text" placeholder="Nghề nghiệp" name="job" required="" />
                <label>Đánh giá của khách hàng</label>
                <textarea name="content" placeholder="Nội dung đánh giá" required=""></textarea>
                <!--<span class="vote">Xếp loại</span>-->
                <!--<span class="rating"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i></span>-->

<!--                <div class="comment-form-rating">
                    <label for="rating">Đánh giá của bạn</label>
                    <p class="stars">
                        <span>
                            <a href="#" class="star-1">1</a>
                            <a href="#" class="star-2">2</a>
                            <a href="#" class="star-3">3</a>
                            <a href="#" class="star-4">4</a>
                            <a href="#" class="star-5">5</a>
                        </span>
                    </p>
                    <select id="rating" name="rating" style="display: none;">
                        <option value="">Đánh giá…</option>
                        <option value="5">Rất tốt</option>
                        <option value="4">Tốt</option>
                        <option value="3">Trung bình</option>
                        <option value="2">Không tệ</option>
                        <option value="1">Rất Xấu</option>
                    </select>
                </div>-->

                <input type="hidden" name="vote" id="vote" />
                <input style="margin-top: 20px;" type="submit" name="btn-send-review" value="Gửi đánh giá" />
            </form>
        </div>
        
        <?php } ?>

        <div class="separator">
            <img src="<?= get_template_directory_uri() ?>/assets/images/ps/body/chiec-la-16.png" title="chiếc lá" />
            <img src="<?= get_template_directory_uri() ?>/assets/images/ps/body/chiec-la-16.png" title="chiếc lá" />
            <img src="<?= get_template_directory_uri() ?>/assets/images/ps/body/chiec-la-16.png" title="chiếc lá" />
        </div>
        
        
        <div class="customer-say">
            <?php query_posts(array('post_type'=>'mycontact', 'showposts'=>2)); ?>
            <ul>
                <?php if(have_posts()): while(have_posts()): the_post(); ?>
                <li>
                    <div class="line1">
                        <img class="avatar" src="<?= get_template_directory_uri() ?>/assets/images/ps/body/khach-hang-17.png" title="khách hàng nói gì" />
                        <div class="name">
                            <h4><?= get_post_meta(get_the_ID(), 'contact-name', true) ?></h4>
                            <i class="des"><?= get_post_meta(get_the_ID(), 'contact-job', true); ?></i>
                        </div>
                    </div>
                    <p class="say-content">
                        <img class="narrow" src="<?= get_template_directory_uri() ?>/assets/images/ps/body/arrow.png" />
                        <i>
                            <?= get_the_excerpt(); ?>
                        </i>
                    </p>
                </li>
                <?php endwhile; wp_reset_postdata(); wp_reset_query(); ?>
            <?php endif; ?>
            </ul>
        </div>
    </div>
    
    <div class="fb-like-box" data-href="https://www.facebook.com/iziweb.vn" data-width="255" data-colorscheme="light" data-show-faces="true" data-header="true" data-stream="false" data-show-border="true"></div>
</div>
<!-- end left column -->
