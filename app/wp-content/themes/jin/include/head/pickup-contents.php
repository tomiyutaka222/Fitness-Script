<?php if( is_pickup_style() == "menu-style" || is_pickup_style() == "menu-style-notext" ) : ?>
	<?php get_template_part('include/pickupstyle/pickup-contents-menu-type'); ?>
<?php elseif( is_pickup_style() == "post-style" ) : ?>
	<?php get_template_part('include/pickupstyle/pickup-contents-post-type'); ?>
<?php endif; ?>