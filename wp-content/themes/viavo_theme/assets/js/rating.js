$(document).ready(function () {

    $('body')
            .on('click', '#respond p.stars a', function () {
                var num = parseInt($(this).text());
                $(this).prevAll().andSelf().addClass(('rate-set'));
                $(this).nextAll().removeClass('rate-set');
                $('#rating').val(num);
                return false;
            })
            .on('mouseenter', '#respond p.stars a', function () {
                $(this).prevAll().andSelf().addClass('rate-hover');
                $(this).nextAll().removeClass('rate-hover');
            })
            .on('mouseleave', '#respond p.stars a', function () {
                $(this).prevAll().andSelf().removeClass('rate-hover');
            });
});


