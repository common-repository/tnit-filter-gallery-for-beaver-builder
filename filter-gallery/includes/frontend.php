<?php
/**
 * This file should be used to render each module instance.
 * You have access to two variables in this file: 
 * 
 * $module An instance of your module class.
 * $settings The module's settings.
 *
 * Example: 
 */
global $count; 
if($count == '') {
	$count = 0;
}		
?>
<div class="fl-example-text">
    <?php $settings->textarea_field; ?>
    <?php $module->example_method(); ?>
	
	<?php $filter_show = $settings->select_field; ?>
    <?php $module->example_method(); ?>
	
	<?php $posts_count = $settings->no_of_posts; ?>
    <?php $module->example_method(); ?>
	<?php 
	$cols_count = $settings->no_of_cols; 
	if($cols_count == 'option-1') {
		$grid_col = 'col-md-6';
	} else if($cols_count == 'option-2') {
		$grid_col = 'col-md-4';
	} else if($cols_count == 'option-3') {
		$grid_col = 'col-md-3';
	} else {
		$grid_col = 'col-md-2';
	}
	?>
	<?php $show_overlay = $settings->show_overlay; ?>
    <?php $module->example_method(); 
		$show_lightbox = $settings->show_lightbox;
		$show_lightbox_link = $settings->show_lightbox_link;
		$show_title = $settings->show_title;
		$show_title_link = $settings->show_title_link;
		$show_content = $settings->show_content;
		$show_link = $settings->show_link;
	?>
</div>

<!-- testing goes here now -->
<!---Wrapper Content Start-->
		<div class="wrapper">
			<?php //$count = $count + 1; ?>
			<!--Main Content Start-->
			<div id="main-content">

				<section class="masonary-layout_v5">
				<?php 
				
				$args = array(
					'orderby'           => 'name', 
					'order'             => 'ASC',
					'hide_empty'        => true, 
					'exclude'           => array(), 
					'exclude_tree'      => array(), 
					'include'           => array(),
					'number'            => '', 
					'fields'            => 'all', 
					'slug'              => '',
					'parent'            => '',
					'hierarchical'      => true, 
					'child_of'          => 0,
					'childless'         => false,
					'get'               => '', 
					'name__like'        => '',
					'description__like' => '',
					'pad_counts'        => false, 
					'offset'            => '', 
					'search'            => '', 
					'cache_domain'      => 'core'
				); 

				$terms = get_terms('portfolio_category', $args);
			
			?>
			<?php 
			global $paged;
			if ( get_query_var('paged') ) {
				$paged = get_query_var('paged');
			} else if ( get_query_var('page') ) {
				$paged = get_query_var('page');
			} else {$paged = 1;}
			$args = array(
				'post_type' => 'portfolio',
				'posts_per_page' => $posts_count,
				'post_status' => 'publish',
				'paged' => $paged
			);
			$gallery_posts = new WP_Query($args); ?>
			<?php if($filter_show == 'option-1'){ ?>
					<div class="filter-outer">
					<div id="filterlist_v5<?php echo $count;?>" class="filterlist_v5" filter-id="filter-count">
						<div data-option-key="filter" class="filter_testing container">
							<a href="#" data-filter="*" class="current"><?php echo __('All', 'tnit-filter-gallery'); ?></a>
							<?php 
								foreach($terms as $term) { ?>
									<a href="#" data-filter=".<?php $links = $term->name; $links = str_replace(' ', '-', $links); echo $links; ?>"><?php echo $term->name; ?></a>
								<?php }
							?>
						</div>				
					</div>
					</div>
			<?php } ?>
					
					 <div class="container">
				        <!--Gallery Metro Start-->
				        <div class="masonaryContainer_v5<?php echo $count;?> pretty-gallery">
				          <ul id="gallery-listed<?php echo $count;?>" class="row gallery-listed isotope items">
						  <?php $gallery_posts = new WP_Query($args);
							if($gallery_posts->have_posts()): while($gallery_posts->have_posts()): $gallery_posts->the_post(); global $post;?>
							<?php 
							$terms = get_the_terms( $post->ID, 'portfolio_category' );
								$links = array();
								foreach($terms as $term) {
									$links[] = $term->name;									
									$data2 = get_term_meta($term->term_id, 'ba_image_field_id');
									$data3 = get_term_meta($term->term_id, 'ba_text_field_id');
								}
								$links = str_replace(' ', '-', $links); 
									$tax = join( " ", $links );
							?>
							  <li class="item gallery-box width2 height2 <?php echo $grid_col; ?> <?php echo $tax;?>">
				              <!--Gallery Item Start-->
				              <figure class="gallery-item">
				                <img src="<?php $post_image = wp_get_attachment_url( get_post_thumbnail_id($post->ID)); echo $post_image; ?>" alt="">
								<?php if($show_overlay == 'option-1'){?>
				                 <figcaption class="caption-outer">
				                  <div class="caption">
				                    <div class="cp-inner">
				                      <!--<h3>Wedding Arrangement</h3>-->
									  <?php if($show_lightbox == 'option-1'){ ?>
				                      <a href="<?php $post_image = wp_get_attachment_url( get_post_thumbnail_id($post->ID)); echo $post_image; ?>"" data-rel="prettyPhoto"><i class="fa fa-search-plus"></i></a>
									  <?php } ?>
									  <?php if($show_lightbox_link == 'option-1'){ ?>
				                      <a href="<?php echo get_the_permalink(); ?>"><i class="fa fa-link"></i></a>
									  <?php } ?>
				                    </div>
				                  </div>
				                </figcaption>
								<?php } ?>
				              </figure><!--Gallery Item End-->
							  <?php if($show_title == 'option-1' && $show_title_link =='option-2'){?>
								<div class="overlay-content"><h3><?php the_title(); ?></h3>
							  <?php } ?>
							   <?php if($show_title == 'option-1' && $show_title_link =='option-1'){?>
								<div class="overlay-content"><h3><a href="<?php the_permalink();?>"><?php the_title(); ?></a></h3>
							  <?php } ?>
							  <?php if($show_content == 'option-1'){ ?>
							  <p class="overlay-p"><?php $content = substr(get_the_content(), 0, 100); if($content){echo $content; echo '...'; }?></p>
							  <?php } ?>
							   <?php if($show_link == 'option-1'){ ?>
							  <a href="<?php the_permalink();?>" class="read-more">Read More</a>
							  <?php } ?>
							  <?php if($show_title == 'option-1' && $show_title_link =='option-2'){?>
								</div>
							  <?php } ?>
							   <?php if($show_title == 'option-1' && $show_title_link =='option-1'){?>
								</div>
							  <?php } ?>
				            </li>
							<div class="new-content"></div>
							<?php endwhile; endif;?>
				          </ul>
						 <?php $big = 999999999; ?>
						<div class="portfolio-pagination">
						<?php echo paginate_links(array(
								'base' => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
								'format' => '?paged=%#%',
								'current' => max(1, get_query_var('paged')),
								'total' => $gallery_posts->max_num_pages
							)); ?>
						</div> 
				        </div><!--Gallery Metro End-->
						<div id="content"></div>
				      </div>
				</section>	
			</div>
			<!--Main Content End-->
		</div>
    	<!--Wrapper Content End-->
		<?php $count++;?>