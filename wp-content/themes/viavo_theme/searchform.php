
<form action="<?php bloginfo('siteurl') ?>" id="searchform" method="get">
    <input type="text" placeholder="Tìm kiếm" name="s" id="s" value="" />
    <input type="hidden" name="post_type[]" value="post" />
    <input type="hidden" name="post_type[]" value="product" />
    <button type="submit" id="searchsubmit" class="fa fa-search"></button>
</form>