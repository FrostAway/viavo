<?php get_header(); ?>
<div id="container">
    <?php get_sidebar(); ?>
    <div class="col-right">
	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
        <script>
            jQuery(document).ready(function(){
               jQuery('#main-menu a[href="<?php echo get_category_link(get_the_category()[0]) ?>"]').css('color', '#acbd0f'); 
            });
        </script>
		<div <?php post_class() ?> id="post-<?php the_ID(); ?>">
			
                    <h3 class="box-title"><?php the_title(); ?></h3>

			<div class="entry">
				
				<?php the_content() ?>

				<?php wp_link_pages(array('before' => 'Pages: ', 'next_or_number' => 'number')); ?>
				
				<?php the_tags( 'Tags: ', ', ', ''); ?>

			</div>
			
			<?php edit_post_link('Edit this entry','','.'); ?>
		</div>

        <div id="respond">
            <div class="fb-comments" data-href="<?php the_permalink() ?>" data-width="800" data-numposts="5" data-colorscheme="light"></div>
        </div>

	<?php endwhile; endif; ?>

    </div>
</div>
<?php get_footer(); ?>