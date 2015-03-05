<?php
/*
 * Template Name: Redirect
 */
?>
<?php get_header(); ?>
<div id="container">
    <?php get_sidebar(); ?>
    <div id="col-right">
        <h3 style="padding-left: 20px;" class="box-title"><?= get_the_title(103) ?></h3>
        <h4 style="background: #fff; text-align: center; padding-bottom: 30px;">Quay về <a href="<?= home_url() ?>">Trang chủ</a> <span id="cutdown"> 5 </span></h4>
        <script>
            var time = 5;
            var interval = setInterval(function () {
                jQuery('#cutdown').html(time--);
                if (time === 0) {
                    window.location.href = '<?= home_url() ?>';
                    clearInterval(interval);
                }
                ;
            }, 1000);
        </script>

    </div>
</div>
<?php get_footer() ?>
