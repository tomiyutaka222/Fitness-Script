<div id="main-image" class="main-image <?php is_animation_style(); ?>">
				
	<?php if ( is_mobile() ) : ?>
		<?php if( get_the_top_image_url_sp() ): ?>
		
			<?php if( ! empty(get_theme_mod( 'top_image_link' ))): ?>
				<a href="<?php echo get_theme_mod( 'top_image_link' ); ?>" class="jin-sp-design"><img src="<?php echo get_the_top_image_url_sp(); ?>" alt="<?php jin_attach_alt(get_the_top_image_url_sp()); ?>" class="jin-sp-design" /></a>
			<?php else: ?>
				<img src="<?php echo get_the_top_image_url_sp(); ?>" class="jin-sp-design" />
			<?php endif; ?>
			
		<?php else: ?>
		
			<?php if( ! empty(get_theme_mod( 'top_image_link' ))): ?>
				<a href="<?php echo get_theme_mod( 'top_image_link' ); ?>" class="jin-sp-design"><img src="<?php echo get_the_top_image_url(); ?>" class="jin-sp-design" /></a>
			<?php else: ?>
				<img src="<?php echo get_the_top_image_url(); ?>" alt="<?php jin_attach_alt(get_the_top_image_url()); ?>" class="jin-sp-design" />
			<?php endif; ?>
			
		<?php endif; ?>
	
	<div class="top-image-meta jin-sp-design">
		<?php if( ! is_top_image_hl() == "" ) :?>
		<div class="main-image-text ef <?php is_animation_style(); ?> <?php echo is_top_image_text_option(); ?>"><?php echo is_top_image_hl(); ?></div>
		<?php endif; ?>
		<?php if( ! is_top_image_text() == "" ) :?>
		<div class="main-image-text-sub ef <?php is_animation_style(); ?> <?php echo is_top_image_subtext_option(); ?>"><?php echo is_top_image_text(); ?></div>
		<?php endif; ?>
		<?php if( ! is_top_image_btn_text() == "" ) :?>
		<div class="top-image-btn-color <?php is_animation_style(); ?>"><a href="<?php is_top_image_btn_link() ?>"><?php echo is_top_image_btn_text(); ?></a></div>
		<?php endif; ?>
	</div>
	
	<?php else: ?>
		<?php if( get_the_top_image_url() ): ?>
			<?php if( ! empty(get_theme_mod( 'top_image_link' ))): ?>
				<a href="<?php echo get_theme_mod( 'top_image_link' ); ?>"><img src="<?php echo get_the_top_image_url(); ?>" /></a>
			<?php else: ?>
				<img src="<?php echo get_the_top_image_url();?>" alt="<?php jin_attach_alt(get_the_top_image_url()); ?>" />
			<?php endif; ?>

		<div class="top-image-meta">
			<?php if( ! is_top_image_hl() == "" ) :?>
			<div class="main-image-text ef <?php is_animation_style(); ?> <?php echo is_top_image_text_option(); ?>"><?php echo is_top_image_hl(); ?></div>
			<?php endif; ?>
			<?php if( ! is_top_image_text() == "" ) :?>
			<div class="main-image-text-sub ef <?php is_animation_style(); ?> <?php echo is_top_image_subtext_option(); ?>"><?php echo is_top_image_text(); ?></div>
			<?php endif; ?>
			<?php if( ! is_top_image_btn_text() == "" ) :?>
			<div class="top-image-btn-color <?php is_animation_style(); ?>"><a href="<?php is_top_image_btn_link() ?>"><?php echo is_top_image_btn_text(); ?></a></div>
			<?php endif; ?>
		</div>
		<?php endif; ?>
	<?php endif; ?>
	
</div>