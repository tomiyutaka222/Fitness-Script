<!--サイドバー-->
<?php if ( wp_isset_widets( 'sidebar',true ) || wp_isset_widets( 'sidebar-tracking',true )  ) : ?>
<div id="sidebar" class="sideber <?php echo is_sidebar_design(); ?> <?php is_animation_style(); ?>" role="complementary" itemscope itemtype="https://schema.org/WPSideBar">
	<?php if( is_mobile() ) :?>
	<div class="area-border2"></div>
	<?php endif; ?>
	
	<?php dynamic_sidebar( 'sidebar' ); ?>
	
	<?php if( ! is_mobile() ) :?>
	<?php if ( wp_isset_widets( 'sidebar-tracking',true ) ) : ?>
	<div id="widget-tracking">
	<?php dynamic_sidebar( 'sidebar-tracking' ); ?>
	</div>
	<?php endif; ?>
	<?php endif; ?>
</div>
<?php endif; ?>