<?php get_header(); ?>
<div class="fl-content-full container">
	<div class="row">
		<div class="fl-content col-md-12">
			<?php if(have_posts()) : while(have_posts()) : the_post(); ?>
				<?php get_template_part('content', 'page'); ?>
			<?php endwhile; endif; ?>
		</div>
	</div>
</div>
<?php get_footer(); ?>