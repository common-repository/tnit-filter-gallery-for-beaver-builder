<?php 
get_header();
 ?>
	<div class="demo-gallery">
	  <div class="container">
		 <div id="lightgallery" class="list-unstyled row">
		<?php if(have_posts()) : while(have_posts()) : the_post(); ?>
				<div class="col-xs-12 col-sm-4 col-md-3 gallery-item" data-src="<?php $post_image = wp_get_attachment_url( get_post_thumbnail_id($post->ID)); echo $post_image; ?>" data-sub-html="">
					<a href="" class="gallery-inner">
						<img class="img-responsive" src="<?php $post_image = wp_get_attachment_url( get_post_thumbnail_id($post->ID)); echo $post_image; ?>">							
						<span class="lightbox-icon">
							<i class="fa fa-search-plus" aria-hidden='true'></i>
						</span>
					</a>
				</div>
			<?php endwhile; endif; ?>
			</div>
		</div>
	</div>
<?php
get_footer(); 
?>