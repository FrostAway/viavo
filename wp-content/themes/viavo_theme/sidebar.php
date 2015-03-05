<div class="col-left">
    <div class="about">
        <div class="about-it">
            <img src="<?= get_template_directory_uri() ?>/assets/images/ps/body/anh-bo-16.png" />
            <h3>VỀ CHÚNG TÔI</h3>
            <p>
                Tiệp Bùi Quang là doanh nghiệp kinh doanh các sản phẩm hoa quả tươi 100% có chất lượng
            </p>
        </div>
        <div class="about-it">
            <h3>THỜI GIAN GIAO HÀNG</h3>
            <p>Thứ 2 - Chủ Nhật</p>
            <p>8:00 sáng đến 6:00 tối</p>
            <h3 class="hotline">HOTLINE</h3>
            <h4 class="num">0983 05 05 91</h4>
        </div>
    </div>

    <div class="reviews" id="review_form">
        <h3>PHẢN HỒI KHÁCH HÀNG</h3>
        <div id="respond">
            <form id="commentform" method="post" action="">
                <label>Họ tên</label>
                <input type="text" placeholder="Họ tên" name="name" />
                <label>Công việc hiện tại</label>
                <input type="text" placeholder="Nghề nghiệp" name="job" />
                <label>Đánh giá của khách hàng</label>
                <textarea name="content" placeholder="Nội dung đánh giá"></textarea>
                <span class="vote">Xếp loại</span>
                <!--<span class="rating"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i></span>-->

                <div class="comment-form-rating">
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
                </div>

                <input type="hidden" name="vote" id="vote" />
                <input type="submit" name="btn-send-review" value="Gửi đánh giá" />
            </form>
        </div>

        <div class="separator">
            <img src="<?= get_template_directory_uri() ?>/assets/images/ps/body/chiec-la-16.png" title="chiếc lá" />
            <img src="<?= get_template_directory_uri() ?>/assets/images/ps/body/chiec-la-16.png" title="chiếc lá" />
            <img src="<?= get_template_directory_uri() ?>/assets/images/ps/body/chiec-la-16.png" title="chiếc lá" />
        </div>

        <div class="customer-say">
            <ul>
                <li>
                    <div class="line1">
                        <img class="avatar" src="<?= get_template_directory_uri() ?>/assets/images/ps/body/khach-hang-17.png" title="khách hàng nói gì" />
                        <div class="name">
                            <h4>Hà Lạc Luộc</h4>
                            <i class="des">Nhân viên ngân hàng Techcom Bank</i>
                        </div>
                    </div>
                    <p class="say-content">
                        <img class="narrow" src="<?= get_template_directory_uri() ?>/assets/images/ps/body/arrow.png" />
                        <i>
                            "But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete" 
                        </i>
                    </p>
                </li>
                <li>
                    <div class="line1">
                        <img class="avatar" src="<?= get_template_directory_uri() ?>/assets/images/ps/body/khach-hang-17.png" title="khách hàng nói gì" />
                        <div class="name">
                            <h4>Hà Lạc Luộc</h4>
                            <i class="des">Nhân viên ngân hàng Techcom Bank</i>
                        </div>
                    </div>

                    <p class="say-content">
                        <img class="narrow" src="<?= get_template_directory_uri() ?>/assets/images/ps/body/arrow.png" />
                        <i>
                            "But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete" 
                        </i>
                    </p>
                </li>
            </ul>
        </div>
    </div>
</div>
<!-- end left column -->
