<?php if ( is_date_style() == 'pub_mod' ) : ?>
	<?php if (get_modtime('c') == null) : ?>
	<span class="cps-post-date"><i class="jic jin-ifont-watch" aria-hidden="true"></i>&nbsp;<time class="entry-date date published updated" datetime="<?php the_time('c') ;?>"><?php the_time( get_option( 'date_format' ) ) ;?></time></span>
	<?php elseif (get_modtime('c') != null) : ?>
	<span class="cps-post-date"><i class="jic jin-ifont-watch" aria-hidden="true"></i>&nbsp;<time class="entry-date date published" datetime="<?php the_time('c') ;?>"><?php the_time( get_option( 'date_format' ) ) ;?></time></span>
	<span class="timeslash"> /</span>
	<time class="entry-date date updated" datetime="<?php if ($modtime = get_modtime('c')) echo $modtime; ?>"><?php if ($modtime = get_modtime(get_option( 'date_format' ))) echo '<span class="cps-post-date"><i class="jic jin-ifont-reload" aria-hidden="true"></i>&nbsp;' . $modtime.'</span>'; ?></time>
	<?php endif; ?>
<?php elseif( is_date_style() == 'pub' ) : ?>
	<span class="cps-post-date"><i class="jic jin-ifont-watch" aria-hidden="true"></i>&nbsp;<time class="entry-date date published updated" datetime="<?php the_time('c') ;?>"><?php the_time( get_option( 'date_format' ) ) ;?></time></span>
<?php elseif( is_date_style() == 'mod' ) : ?>
	<?php if (get_modtime('c') == null) : ?>
		<span class="cps-post-date"><i class="jic jin-ifont-watch" aria-hidden="true"></i>&nbsp;<time class="entry-date date published updated" datetime="<?php the_time('c') ;?>"><?php the_time( get_option( 'date_format' ) ) ;?></time></span>
	<?php endif; ?>
	<?php if (get_modtime('c') != null) : ?>
		<span class="cps-post-date"><time class="entry-date date published updated" datetime="<?php if ($modtime = get_modtime('c')) echo $modtime; ?>"><?php if ($modtime = get_modtime(get_option( 'date_format' ))) echo '<i class="jic jin-ifont-reload" aria-hidden="true"></i>&nbsp;' , $modtime; ?></time></span>
	<?php endif; ?>
<?php elseif( is_date_style() == 'none' ) : ?>
	<div style="display: none;">
		<span class="cps-post-date"><i class="jic jin-ifont-watch" aria-hidden="true"></i>&nbsp;<time class="entry-date date published" datetime="<?php the_time('c') ;?>"><?php the_time( get_option( 'date_format' ) ) ;?></time></span>
		<time class="entry-date date updated" datetime="<?php if ($modtime = get_modtime('c')) echo $modtime; ?>"><?php if ($modtime = get_modtime('Y.m.d')) echo '<span class="cps-post-date"><i class="jic jin-ifont-reload" aria-hidden="true"></i>&nbsp;' . $modtime.'</span>'; ?></time>
	</div>
<?php endif; ?>