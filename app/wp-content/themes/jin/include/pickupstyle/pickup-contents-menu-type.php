<?php
	$menu_name = 'pickup-contents';
	$locations = get_nav_menu_locations();
	if(isset($locations[ $menu_name ])){
		$menu = wp_get_nav_menu_object( $locations[ $menu_name ] );
	}
	if(isset($menu->term_id)){
		$menu_items = wp_get_nav_menu_items($menu->term_id);
	}
	if(isset($menu_items)):

?>
<div class="pickup-contents-box <?php is_animation_style(); ?>">
	<ul class="pickup-contents">
	<?php 
		foreach ($menu_items as $menu): 
			$page_id = $menu->object_id;
			$page_type = $menu->object;
			$menu_name = $menu->title;
			$thumbnail_id = get_post_thumbnail_id($page_id);
			$image_attributes = wp_get_attachment_image_src($thumbnail_id,'small_size'); 
			$content = get_page($page_id);
			$target = $menu->target;
	?>
		<li>
			<?php if( $page_type == 'category' ): ?>
			<?php
				$cat_class = get_category($page_id);
				$cat_option = get_option($page_id);

				$cat_eyecatch = $cat_option['cps_image_cat_pickup'];
			?>
				<a href="<?php echo get_category_link($page_id); ?>" target="<?php echo $target; ?>">
					<div class="pickup-image">
						<?php if( ! empty( $cat_eyecatch ) ) :?>
							<img src="<?php echo $cat_eyecatch; ?>" width="269" height="151" alt="<?php jin_attach_resize_alt($cat_eyecatch,"small_size"); ?>" />
						<?php else: ?>
							<img src="<?php echo get_jin_noimage_url(); ?>" width="269" height="151" alt="no image" />
						<?php endif; ?>
						<?php if( is_pickup_style() == "menu-style" ) : ?>
							<div class="pickup-title ef"><?php echo $menu_name; ?></div>
						<?php endif; ?>
					</div>
				</a>
			<?php else: ?>
				<a href="<?php echo get_permalink($page_id); ?>" target="<?php echo $target; ?>">
					<div class="pickup-image">
						<?php if ( $image_attributes ): ?>
							<img src="<?php echo $image_attributes[0]; ?>" alt="<?php jin_attach_resize_alt($image_attributes[0],"small_size"); ?>" width="269" height="151" />
						<?php else: ?>
							<img src="<?php echo get_jin_noimage_url(); ?>" width="269" height="151" alt="no image" />
						<?php endif; ?>
						<?php if( is_pickup_style() == "menu-style" ) : ?>
							<div class="pickup-title ef"><?php echo $menu_name; ?></div>
						<?php endif; ?>
					</div>
				</a>
			<?php endif; ?>
		</li>
	<?php endforeach; ?>
	</ul>
</div>
<?php endif; ?>