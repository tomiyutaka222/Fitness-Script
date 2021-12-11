<?php
	$twitter = get_the_author_meta('twitter');
	$facebook = get_the_author_meta('facebook');
	$instagram = get_the_author_meta('instagram');
	$line = get_the_author_meta('line');
	$youtube = get_the_author_meta('youtube');
	$contact = get_the_author_meta('contact');
?>

<?php if( ! get_post_meta( $post->ID, "custom_postprofile_off", true) == 'この記事でプロフィールを表示しない' ) : ?>
<?php if( ! empty( get_the_author_meta( 'user_description' ) ) ) : ?>
<div class="profile-card">
	<div class="profile-title ef">ABOUT ME</div>
	<div class="profile-flexbox">
		<div class="profile-thumbnail-box">
			<div class="profile-thumbnail"><?php echo get_avatar( get_the_author_meta( 'ID' ), 100 ); ?></div>
		</div>
		<div class="profile-meta">
			<div class="profile-name"><?php the_author(); ?></div>
			<div class="profile-desc"><?php the_author_meta( 'user_description' ); ?></div>
		</div>
	</div>
	<div class="profile-link-box">
		<?php if( ! empty( get_the_author_meta( 'user_url' ) ) ) : ?>
		<div class="profile-link ef"><span><i class="jic jic-type jin-ifont-blogtext"></i>BLOG：</span><a href="<?php the_author_meta( 'user_url' ); ?>" target="_blank"><?php the_author_meta( 'user_url' ); ?></a></div>
		<?php endif; ?>
		<div <?php if( ! empty( get_the_author_meta( 'user_url' ) ) ){ echo 'class="profile-follow"'; }else{ echo 'class="profile-follow center-pos"'; }?>>
			<?php if( ! empty( $twitter ) ) : ?>
				<span class="twitter-sns"><a href="<?php echo $twitter; ?>" target="_blank"><i class="jic-type jin-ifont-twitter" aria-hidden="true"></i></a></span>
			<?php endif; ?>
			<?php if( ! empty( $facebook ) ) : ?>
				<span class="facebook-sns"><a href="<?php echo $facebook; ?>" target="_blank"><i class="jic-type jin-ifont-facebook" aria-hidden="true"></i></a></span>
			<?php endif; ?>
			<?php if( ! empty( $instagram ) ) : ?>
				<span class="instagram-sns"><a href="<?php echo $instagram; ?>" target="_blank"><i class="jic-type jin-ifont-instagram" aria-hidden="true"></i></a></span>
			<?php endif; ?>
			<?php if( ! empty( $youtube ) ) : ?>
				<span class="youtube-sns"><a href="<?php echo $youtube; ?>" target="_blank"><i class="jic-type jin-ifont-youtube" aria-hidden="true"></i></a></span>
			<?php endif; ?>	
			<?php if( ! empty( $line ) ) : ?>
				<span class="line-sns"><a href="<?php echo $line; ?>" target="_blank"><i class="jic-type jin-ifont-line" aria-hidden="true"></i></a></span>
			<?php endif; ?>
			<?php if( ! empty( $contact ) ) : ?>
				<span class="contact-sns"><a href="<?php echo $contact; ?>" target="_blank"><i class="jic-type jin-ifont-mail" aria-hidden="true"></i></a></span>
			<?php endif; ?>
		</div>
	</div>
</div>
<?php endif; ?>
<?php endif; ?>