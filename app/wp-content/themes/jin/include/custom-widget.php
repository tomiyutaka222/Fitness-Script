<?php
/* アイキャッチ付き最新の投稿リスト*/
class My_Widget_Recent_Posts extends WP_Widget {

    public function __construct() {
		$widget_options = array(
			'classname'                     => 'widget-recent-post',
			'customize_selective_refresh'   => FALSE,
		);

		parent::__construct( 'widget-recent-post', '最新の投稿【アイキャッチ画像付き】', $widget_options );
	}
	
	public function widget( $args, $instance ) {
		
		$title = apply_filters( 'widget_title', empty( $instance['title'] ) ? '' : $instance['title'], $instance, $this->id_base );

        $numbers = apply_filters( 'widget_body', empty( $instance['numbers'] ) ? '' : $instance['numbers'], $instance, $this->id_base );

        $show_date = isset( $instance['show_date'] ) ? $instance['show_date'] : false;
		
		$r = new WP_Query( apply_filters( 'widget_posts_args', array( 'posts_per_page' => $numbers, 'no_found_rows' => true, 'post_status' => 'publish', 'ignore_sticky_posts' => true ) ) );
		
		
		if ( $r->have_posts() ) {
			echo $args['before_widget'];
			if ( ! empty( $title ) ) {
				echo $args['before_title'] . $title . $args['after_title'];
			} ?>
		<div id="new-entry-box">
				<ul>
				<?php while ( $r->have_posts() ) : $r->the_post(); ?>
					<li class="new-entry-item">
						<a href="<?php the_permalink() ?>" rel="bookmark">
							<div class="new-entry" itemprop="image" itemscope itemtype="https://schema.org/ImageObject">
								<figure class="eyecatch">
									<?php if (has_post_thumbnail()): ?>
										<?php the_post_thumbnail('cps_thumbnails',array('width ' => '96','height ' => '54','alt' => jin_image_alt('cps_thumbnails'))); ?>
										<meta itemprop="url" content="<?php cps_thumb_info('url'); ?>">
										<meta itemprop="width" content="<?php cps_thumb_info('width'); ?>">
										<meta itemprop="height" content="<?php cps_thumb_info('height'); ?>">
									<?php else: ?>
										<img src="<?php echo get_jin_noimage_url(); ?>" width="96" height="54" alt="no image" />
									<?php endif; ?>
								</figure>
							</div>
							<div class="new-entry-item-meta">
							<?php if ( $show_date ) : ?>
								<span class="date updated" itemprop="datePublished dateModified" datetime="<?php the_time('Y-m-d'); ?>" content="<?php the_time('Y-m-d'); ?>"><i class="far fa-clock" aria-hidden="true"></i>&nbsp;<?php the_time( get_option( 'date_format' )) ?></span>
							<?php endif; ?>
								<h3 class="new-entry-item-title" itemprop="headline"><?php esc_html(the_title()); ?></h3>
							</div>
						</a>
					</li>
				<?php endwhile; ?>
				</ul>
			</div>
		<?php
		echo $args['after_widget'];
			wp_reset_postdata();
		}
	}
	
	
	public function form( $instance ) {
		
		$defaults = array(
			'title' => '',
			'numbers' => 10,
			'show_date' => false
		);
		$instance   = wp_parse_args( (array) $instance, $defaults );
		$title  = sanitize_text_field( $instance['title'] );
		$numbers  = sanitize_text_field( $instance['numbers'] );
		$show_date = $instance['show_date'];
		?>

		<p>
			<label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('タイトル'); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
        </p>

		<p>
			<label for="<?php echo $this->get_field_id( 'numbers' ); ?>"><?php _e( 'Number of posts to show:' ); ?></label>
			<input id="<?php echo $this->get_field_id( 'numbers' ); ?>" name="<?php echo $this->get_field_name( 'numbers' ); ?>" type="text" value="<?php echo $numbers; ?>" size="5" />
		</p>

		<p>
			<input class="checkbox" type="checkbox" <?php checked( $show_date ); ?> id="<?php echo $this->get_field_id( 'show_date' ); ?>" name="<?php echo $this->get_field_name( 'show_date' ); ?>" />
			<label for="<?php echo $this->get_field_id( 'show_date' ); ?>"><?php _e( 'Display post date?' ); ?></label>
		</p>

		<?php
	}
	
	public function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['title']  = sanitize_text_field( $new_instance['title'] );
		$instance['numbers']  = sanitize_text_field( $new_instance['numbers'] );
		$instance['show_date'] = (bool) $new_instance['show_date'];

		return $instance;
	}
}



/* おすすめ記事 */
class My_Widget_Reccomend_Posts extends WP_Widget {
	
	public function __construct() {
		$widget_options = array(
			'classname'                     => 'widget-recommend',
			'customize_selective_refresh'   => FALSE,
		);

		parent::__construct( 'widget-recommend', 'おすすめ記事', $widget_options );
	}
	
	public function widget( $args, $instance ) {
		/** This filter is documented in wp-includes/widgets/class-wp-widget-pages.php */
		$title = apply_filters( 'widget_title', empty( $instance['title'] ) ? '' : $instance['title'], $instance, $this->id_base );
		$numbers = apply_filters( 'widget_body', empty( $instance['numbers'] ) ? '' : $instance['numbers'], $instance, $this->id_base );

		echo $args['before_widget'];
		if ( ! empty( $title ) ) {
			echo $args['before_title'] . $title . $args['after_title'];
		} ?>
		<div id="new-entry-box">
			<ul>
				<?php
					$rec = Array(
						'post_type' => 'post', //投稿記事から
						'orderby' => 'rand', //ランダム表示
						'posts_per_page' => $numbers, //表示件数
						'meta_key' => 'recommend_posts', //カスタムフィールド名
						'meta_value' => 'おすすめ記事にする' //カスタムフィールド値
               		);
					$recommend_item = new WP_Query($rec);
				?>
				<?php if( $recommend_item -> have_posts()) : ?>
     			<?php while ( $recommend_item -> have_posts()) : $recommend_item -> the_post(); ?>
					<li class="new-entry-item">
						<a href="<?php the_permalink() ?>" rel="bookmark">
							<div class="new-entry" itemprop="image" itemscope itemtype="https://schema.org/ImageObject">
								<figure class="eyecatch">
									<?php if (has_post_thumbnail()): ?>
										<?php the_post_thumbnail('cps_thumbnails',array('width ' => '96','height ' => '54','alt' => jin_image_alt('cps_thumbnails'))); ?>
										<meta itemprop="url" content="<?php cps_thumb_info('url'); ?>">
										<meta itemprop="width" content="<?php cps_thumb_info('width'); ?>">
										<meta itemprop="height" content="<?php cps_thumb_info('height'); ?>">
									<?php else: ?>
										<img src="<?php echo get_jin_noimage_url(); ?>" width="96" height="54" alt="no image" />
									<?php endif; ?>
								</figure>
							</div>
							<div class="new-entry-item-meta">
								<h3 class="new-entry-item-title" itemprop="headline"><?php esc_html(the_title()); ?></h3>
							</div>
						</a>
					</li>
				<?php endwhile; ?>
				<?php else: ?>
					<li>おすすめの投稿がありません</li>
				<?php endif; ?>
			</ul>
		</div>
		<?php wp_reset_query(); ?>
		<?php
		echo $args['after_widget'];

	}
	
	public function form( $instance ) {
		$defaults = array(
			'title' => '',
			'numbers' => '5'
		);
		$instance   = wp_parse_args( (array) $instance, $defaults );
		$title  = sanitize_text_field( $instance['title'] );
		$numbers  = sanitize_text_field( $instance['numbers'] );
		?>
		<p>
			<label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('タイトル'); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
        </p>
        <p>
			<label for="<?php echo $this->get_field_id('numbers'); ?>"><?php _e('表示件数'); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id('numbers'); ?>" name="<?php echo $this->get_field_name('numbers'); ?>" type="text" value="<?php echo esc_attr( $numbers ); ?>" />
        </p>
		<?php
	}
	
	public function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['title']  = sanitize_text_field( $new_instance['title'] );
		$instance['numbers']  = sanitize_text_field( $new_instance['numbers'] );

		return $instance;
	}
}



/* profile */
class My_Widget_Profile extends WP_Widget {
	
	public function __construct() {
		$widget_options = array(
			'classname'                     => 'widget-profile',
			'customize_selective_refresh'   => FALSE,
		);

		parent::__construct( 'widget-profile', 'プロフィール', $widget_options );
	}
	
	public function widget( $args, $instance ) {
		/** This filter is documented in wp-includes/widgets/class-wp-widget-pages.php */
		

		$name = apply_filters( 'widget_body', empty( $instance['name'] ) ? '' : $instance['name'], $instance, $this->id_base );
		$job = apply_filters( 'widget_text', empty( $instance['job'] ) ? '' : $instance['job'], $instance, $this->id_base );
		$desc = apply_filters( 'widget_text', empty( $instance['desc'] ) ? '' : $instance['desc'], $instance, $this->id_base );
		$sns = apply_filters( 'widget_text', empty( $instance['sns'] ) ? '' : $instance['sns'], $instance, $this->id_base );
		$cps_ranking01_img = apply_filters( 'widget_body', empty( $instance['cps_ranking01_img'] ) ? '' : $instance['cps_ranking01_img'], $instance, $this->id_base );
		$cps_ranking01_img_check = apply_filters( 'widget_body', empty( $instance['cps_ranking01_img_check'] ) ? '' : $instance['cps_ranking01_img_check'], $instance, $this->id_base );
		
		$myprofile_id = get_id_by_post_name('profile');
		$myprofile_url = get_the_permalink($myprofile_id);

		$alt_img_url = str_replace('-150x150', '', $instance['cps_ranking01_img']);
		$img_id = attachment_url_to_postid($alt_img_url);
		$alt = get_post_meta($img_id, '_wp_attachment_image_alt', true);

		echo $args['before_widget'];
?>
		<div class="my-profile">
			<div class="myjob"><?php echo $job; ?></div>
			<div class="myname"><?php echo $name; ?></div>
			<div class="my-profile-thumb">		
				<a href="<?php echo $myprofile_url; ?>"><img src="<?php echo $cps_ranking01_img; ?>" alt="<?php echo $alt; ?>" width="110" height="110" /></a>
			</div>
			<div class="myintro"><?php echo $desc; ?></div>
			<?php if( $sns == '表示' ) :?>
			<div class="profile-sns-menu">
				<div class="profile-sns-menu-title ef">＼ Follow me ／</div>
				<ul>
					<?php if ( get_option('tw_page_url') ): ?>
					<li class="pro-tw"><a href="<?php echo get_option('tw_page_url'); ?>" target="_blank"><i class="jic-type jin-ifont-twitter"></i></a></li>
					<?php endif; ?>
					<?php if ( get_option('fb_page_url') ): ?>
					<li class="pro-fb"><a href="<?php echo get_option('fb_page_url'); ?>" target="_blank"><i class="jic-type jin-ifont-facebook" aria-hidden="true"></i></a></li>
					<?php endif; ?>
					<?php if ( get_option('insta_page_url') ): ?>
					<li class="pro-insta"><a href="<?php echo get_option('insta_page_url'); ?>" target="_blank"><i class="jic-type jin-ifont-instagram" aria-hidden="true"></i></a></li>
					<?php endif; ?>
					<?php if ( get_option('youtube_page_url') ): ?>
					<li class="pro-youtube"><a href="<?php echo get_option('youtube_page_url'); ?>" target="_blank"><i class="jic-type jin-ifont-youtube" aria-hidden="true"></i></a></li>
					<?php endif; ?>
					<?php if ( get_option('line_page_url') ): ?>
					<li class="pro-line"><a href="<?php echo get_option('line_page_url'); ?>" target="_blank"><i class="jic-type jin-ifont-line" aria-hidden="true"></i></a></li>
					<?php endif; ?>
					<?php if ( get_option('contact_page_url') ): ?>
					<li class="pro-contact"><a href="<?php echo get_option('contact_page_url'); ?>" target="_blank"><i class="jic-type jin-ifont-mail" aria-hidden="true"></i></a></li>
					<?php endif; ?>
				</ul>
			</div>
			<style type="text/css">
				.my-profile{
					<?php if( is_mobile() ): ?>
					padding-bottom: 105px;
					<?php else: ?>
					padding-bottom: 85px;
					<?php endif; ?>
				}
			</style>
			<?php endif; ?>
		</div>
		<?php
		echo $args['after_widget'];
	}
	
	public function form( $instance ) {

		$name  = isset( $instance['name'] ) ? $instance['name'] : '';
		$job  = isset( $instance['job'] ) ? $instance['job'] : '';
		$desc = isset( $instance['desc'] ) ? $instance['desc'] : '';
		$sns = isset( $instance['sns'] ) ? $instance['sns'] : '表示';
		$cps_ranking01_img = isset( $instance['cps_ranking01_img'] ) ? $instance['cps_ranking01_img'] : '';
		$cps_ranking01_img_check = isset( $instance['cps_ranking01_img_check'] ) ? $instance['cps_ranking01_img_check'] : '';
		
		wp_enqueue_media(); // メディアアップローダー用のスクリプトをロードする

		// カスタムメディアアップローダー用のJavaScript
		wp_enqueue_script(
			'my-media-uploader', get_bloginfo( 'template_directory' ) . '/js/cps-media-uploader.js', array('jquery'), false, false
		);
		?>
		<style type="text/css">
			#media{
				margin-top: 10px;
			}
			#media1 img{
				max-width: 100%;
				height: auto;
				display: block;
			}
			input, button, textarea, select {
				-webkit-appearance: none;
				-moz-appearance: none;
				appearance: none;
				cursor: pointer;
			}
			input[type="button"]{
				padding: 10px;
				font-size: 12px;
				background: #eee;
				border: 3px #aaa solid;
			}
		</style>

		<input class="widefat cps-ranking01" id="<?php echo $this->get_field_id('cps_ranking01_img'); ?>" name="<?php echo $this->get_field_name('cps_ranking01_img'); ?>" type="hidden" value="<?php echo esc_attr($cps_ranking01_img); ?>" />

		<p>
            <label for="<?php echo $this->get_field_id( 'name' ); ?>"><?php _e( 'プロフィール名' ); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'name' ); ?>" name="<?php echo $this->get_field_name( 'name' ); ?>" type="text" value="<?php echo esc_attr( $name ); ?>" />
        </p>
		<p>
            <label for="<?php echo $this->get_field_id( 'job' ); ?>"><?php _e( '肩書き' ); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'job' ); ?>" name="<?php echo $this->get_field_name( 'job' ); ?>" type="text" value="<?php echo esc_attr( $job ); ?>" />
        </p>
		<p>
            <label for="<?php echo $this->get_field_id( 'desc' ); ?>"><?php _e( '説明' ); ?></label>
            <textarea rows="6" cols="10" class="widefat" id="<?php echo $this->get_field_id( 'desc' ); ?>" name="<?php echo $this->get_field_name( 'desc' ); ?>" type="text"><?php echo esc_attr( $desc ); ?></textarea>
        </p>
		<div id="media1"><?php echo '<img src="'.$cps_ranking01_img.'" />' ?></div>
		<div style="margin-top: 10px">
			<input type="button" widgetid="<?php echo $this->id ?>" name="media1" value="画像を選択" />
			<input type="button" widgetid="<?php echo $this->id ?>" name="media1-clear" value="画像をクリア" />
		</div>
		<div style="margin-top: 10px; background: #eee; padding: 5px;">
		<input class="widefat cps-ranking01-check" id="<?php echo $this->get_field_id('cps_ranking01_img_check'); ?>" name="<?php echo $this->get_field_name('cps_ranking01_img_check'); ?>" type="checkbox" checked value="ok" />この画像で確定</div>

<?php
		
        $f_radio_id   = $this->get_field_id('sns');
        $f_radio_name = $this->get_field_name('sns');
        $mess_radio = 'SNSボタン';
 
        $data = array(
         array("表示","表示",""),
         array("非表示","非表示","checked"),
         );
 
        echo <<<EOS
             <p>
              <label for="{$f_radio_id}">{$mess_radio}<br />
EOS;
        foreach($data as $akey=>$d){
        if(isset($instance['sns'])){
			$d[2]= $instance['sns'] ? checked( $instance['sns'], $d[1] ,false) : $d[2];
		}
        echo <<<EOS
        <label for ="{$f_radio_id}_{$akey}" >
        <input type="radio" name="{$f_radio_name}" id="{$f_radio_id}_{$akey}" value="{$d[1]}" {$d[2]}>{$d[0]}
        </label>　
EOS;
    }
       echo <<<EOS
    </p>
EOS;
	}

	public function update( $new_instance, $old_instance ) {
		$instance = $old_instance;

		$instance['name']  = sanitize_text_field( $new_instance['name'] );
		$instance['job']  = sanitize_text_field( $new_instance['job'] );
		$instance['desc']  = $new_instance['desc'];
		$instance['sns']  = $new_instance['sns'];
		$instance['cps_ranking01_img']  = $new_instance['cps_ranking01_img'];
		$instance['cps_ranking01_img_check']  = $new_instance['cps_ranking01_img_check'];

		return $instance;
	}
	
}



/* 人気記事ランキング */
class My_Widget_Popular_Posts extends WP_Widget {
	
	public function __construct() {
		$widget_options = array(
			'classname'                     => 'widget-popular',
			'customize_selective_refresh'   => FALSE,
		);

		parent::__construct( 'widget-popular', '人気記事ランキング', $widget_options );
	}
	
	public function widget( $args, $instance ) {
		/** This filter is documented in wp-includes/widgets/class-wp-widget-pages.php */
		$title = apply_filters( 'widget_title', empty( $instance['title'] ) ? '' : $instance['title'], $instance, $this->id_base );
		$numbers = apply_filters( 'widget_body', empty( $instance['numbers'] ) ? '' : $instance['numbers'], $instance, $this->id_base );
		$delete_post = apply_filters( 'widget_body', empty( $instance['delete_post'] ) ? '' : $instance['delete_post'], $instance, $this->id_base );
		$delete_views = apply_filters( 'widget_body', empty( $instance['delete_views'] ) ? '' : $instance['delete_views'], $instance, $this->id_base );

		echo $args['before_widget'];
		if ( ! empty( $title ) ) {
			echo $args['before_title'] . $title . $args['after_title'];
		} ?>
		<div id="new-entry-box">
				<ul>
				<?php
					$delete_post_array = explode(",", $delete_post);
					$pop = array(
						'post_type'     => 'any',  //投稿タイプ
						'posts_per_page' => $numbers, //表示件数
						'meta_key'      => 'pv_count',
						'orderby'       => 'meta_value_num',
						'order'         => 'DESC',
						'post__not_in' => $delete_post_array,
					);
					$posts = new WP_Query($pop);
					$pop_num = 0;
				?>
				<?php if( is_singular() && !is_user_logged_in() && !isBot() ): //個別記事か固定ページ かつ ログインしていない かつ 非ボット
					set_post_views(); //アクセスをカウントする
				endif; ?>
				<?php if( $posts) : ?>
   				<?php while ( $posts -> have_posts()) : $posts -> the_post(); $pop_num++ ?>
   					<?php
						if( get_the_category() != null ){
							// カテゴリー情報を取得
							$category = get_the_category();
							$cat_id   = $category[0]->cat_ID;
							$cat_name = $category[0]->cat_name;
							$cat_slug = $category[0]->category_nicename;
						}
					?>
					<li class="new-entry-item popular-item">
						<a href="<?php the_permalink() ?>" rel="bookmark">
							<div class="new-entry" itemprop="image" itemscope itemtype="https://schema.org/ImageObject">
								<figure class="eyecatch">
									<?php if (has_post_thumbnail()): ?>
										<?php the_post_thumbnail('cps_thumbnails',array('width ' => '96','height ' => '54','alt' => jin_image_alt('cps_thumbnails'))); ?>
										<meta itemprop="url" content="<?php cps_thumb_info('url'); ?>">
										<meta itemprop="width" content="<?php cps_thumb_info('width'); ?>">
										<meta itemprop="height" content="<?php cps_thumb_info('height'); ?>">
									<?php else: ?>
										<img src="<?php echo get_jin_noimage_url(); ?>" width="96" height="54" alt="no image" />
									<?php endif; ?>
								</figure>
								<span class="pop-num ef"><?php echo $pop_num; ?></span>
							</div>
							<div class="new-entry-item-meta">
								<h3 class="new-entry-item-title" itemprop="headline"><?php esc_html(the_title()); ?></h3>
							</div>
							<?php if( $delete_views == "する" ) :?>
                            <div class="popular-meta">
                                <div class="popular-count ef"><div><span><?php echo get_post_meta(get_the_ID(),'pv_count',true); ?></span> view</div></div>
                                <div class="clearfix"></div>
                            </div>
							<?php else: ?>
							<?php endif; ?>
						</a>
					</li>
					<?php endwhile; wp_reset_postdata(); ?>
					<?php else: ?>
						<li>アクセス数の集計がありません</li>
					<?php endif; ?>
				</ul>
			</div>
		<?php
		echo $args['after_widget'];
	}
	
	public function form( $instance ) {

		$title = isset( $instance['title'] ) ? $instance['title'] : '';
		$numbers = isset( $instance['numbers'] ) ? $instance['numbers'] : '10';
		$delete_post = isset( $instance['delete_post'] ) ? $instance['delete_post'] : '';
		$delete_views = isset( $instance['delete_views'] ) ? $instance['delete_views'] : 'しない';
		
		?>
		<p>
			<label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('タイトル'); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
        </p>
        <p>
			<label for="<?php echo $this->get_field_id('numbers'); ?>"><?php _e('表示件数'); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id('numbers'); ?>" name="<?php echo $this->get_field_name('numbers'); ?>" type="text" value="<?php echo esc_attr( $numbers ); ?>" />
        </p>
		<p>
			<label for="<?php echo $this->get_field_id('delete_post'); ?>"><?php _e('除外記事ID'); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id('delete_post'); ?>" name="<?php echo $this->get_field_name('delete_post'); ?>" type="text" value="<?php echo esc_attr( $delete_post ); ?>" />
        </p>
		<?php
		
        $f_radio_id   = $this->get_field_id('delete_views');
        $f_radio_name = $this->get_field_name('delete_views');
        $mess_radio = 'view数の表示';
 
        $data = array(
         array("する","する",""),
         array("しない","しない","checked"),
         );
 
        echo <<<EOS
             <p>
              <label for="{$f_radio_id}">{$mess_radio}<br />
EOS;
        foreach($data as $akey=>$d){
        if(isset($instance['delete_views'])){
        	$d[2]= $instance['delete_views'] ? checked( $instance['delete_views'], $d[1] ,false) : $d[2];
		}
        echo <<<EOS
        <label for ="{$f_radio_id}_{$akey}" >
        <input type="radio" name="{$f_radio_name}" id="{$f_radio_id}_{$akey}" value="{$d[1]}" {$d[2]}>{$d[0]}
        </label>　
EOS;
    }
       echo <<<EOS
    </p>
EOS;
	}
	
    function update($new_instance, $old_instance) {
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['numbers'] = strip_tags($new_instance['numbers']);
		$instance['delete_post'] = strip_tags($new_instance['delete_post']);
		$instance['delete_views']  = $new_instance['delete_views'];
        return $instance;
    }
}



class Cps_Ranking_Widget extends WP_Widget {
	
	public function __construct() {
		$widget_options = array(
			'classname'                     => 'widget-ranking',
			'customize_selective_refresh'   => FALSE,
		);

		parent::__construct( 'widget-ranking', 'ランキング', $widget_options );
	}
	
	public function widget( $args, $instance ) {

		$title = apply_filters( 'widget_title', empty( $instance['title'] ) ? '' : $instance['title'], $instance, $this->id_base );
		$cps_ranking_style = apply_filters( 'widget_radio', empty( $instance['cps_ranking_style'] ) ? 'simple-style' : $instance['cps_ranking_style'], $instance, $this->id_base );

		$cps_ranking01_adtag = apply_filters( 'widget_body', empty( $instance['cps_ranking01_adtag'] ) ? '' : $instance['cps_ranking01_adtag'], $instance, $this->id_base );
		$cps_ranking01_url = apply_filters( 'widget_body', empty( $instance['cps_ranking01_url'] ) ? 'https://example.com' : $instance['cps_ranking01_url'], $instance, $this->id_base );
		$cps_ranking01_info = apply_filters( 'widget_body', empty( $instance['cps_ranking01_info'] ) ? 'ここに説明文を入力してください。' : $instance['cps_ranking01_info'], $instance, $this->id_base );
		$cps_ranking01_title = apply_filters( 'widget_text', empty( $instance['cps_ranking01_title'] ) ? 'タイトルを入力してください' : $instance['cps_ranking01_title'], $instance, $this->id_base );
		$cps_ranking01_btn = apply_filters( 'widget_text', empty( $instance['cps_ranking01_btn'] ) ? '詳細ページ' : $instance['cps_ranking01_btn'], $instance, $this->id_base );
		$cps_ranking01_btn_ocl = apply_filters( 'widget_text', empty( $instance['cps_ranking01_btn_ocl'] ) ? '公式ページ' : $instance['cps_ranking01_btn_ocl'], $instance, $this->id_base );
		$cps_ranking01_url_ocl = apply_filters( 'widget_body', empty( $instance['cps_ranking01_url_ocl'] ) ? 'https://example.com' : $instance['cps_ranking01_url_ocl'], $instance, $this->id_base );

		$cps_ranking02_adtag = apply_filters( 'widget_body', empty( $instance['cps_ranking02_adtag'] ) ? '' : $instance['cps_ranking02_adtag'], $instance, $this->id_base );
		$cps_ranking02_url = apply_filters( 'widget_body', empty( $instance['cps_ranking02_url'] ) ? 'https://example.com' : $instance['cps_ranking02_url'], $instance, $this->id_base );
		$cps_ranking02_info = apply_filters( 'widget_body', empty( $instance['cps_ranking02_info'] ) ? 'ここに説明文を入力してください。' : $instance['cps_ranking02_info'], $instance, $this->id_base );
		$cps_ranking02_title = apply_filters( 'widget_text', empty( $instance['cps_ranking02_title'] ) ? 'タイトルを入力してください' : $instance['cps_ranking02_title'], $instance, $this->id_base );
		$cps_ranking02_btn = apply_filters( 'widget_text', empty( $instance['cps_ranking02_btn'] ) ? '詳細ページ' : $instance['cps_ranking02_btn'], $instance, $this->id_base );
		$cps_ranking02_btn_ocl = apply_filters( 'widget_text', empty( $instance['cps_ranking02_btn_ocl'] ) ? '公式ページ' : $instance['cps_ranking02_btn_ocl'], $instance, $this->id_base );
		$cps_ranking02_url_ocl = apply_filters( 'widget_body', empty( $instance['cps_ranking02_url_ocl'] ) ? 'https://example.com' : $instance['cps_ranking02_url_ocl'], $instance, $this->id_base );
		
		$cps_ranking03_adtag = apply_filters( 'widget_body', empty( $instance['cps_ranking03_adtag'] ) ? '' : $instance['cps_ranking03_adtag'], $instance, $this->id_base );
		$cps_ranking03_url = apply_filters( 'widget_body', empty( $instance['cps_ranking03_url'] ) ? 'https://example.com' : $instance['cps_ranking03_url'], $instance, $this->id_base );
		$cps_ranking03_info = apply_filters( 'widget_body', empty( $instance['cps_ranking03_info'] ) ? 'ここに説明文を入力してください。' : $instance['cps_ranking03_info'], $instance, $this->id_base );
		$cps_ranking03_title = apply_filters( 'widget_text', empty( $instance['cps_ranking03_title'] ) ? 'タイトルを入力してください' : $instance['cps_ranking03_title'], $instance, $this->id_base );
		$cps_ranking03_btn = apply_filters( 'widget_text', empty( $instance['cps_ranking03_btn'] ) ? '詳細ページ' : $instance['cps_ranking03_btn'], $instance, $this->id_base );
		$cps_ranking03_btn_ocl = apply_filters( 'widget_text', empty( $instance['cps_ranking03_btn_ocl'] ) ? '公式ページ' : $instance['cps_ranking03_btn_ocl'], $instance, $this->id_base );
		$cps_ranking03_url_ocl = apply_filters( 'widget_body', empty( $instance['cps_ranking03_url_ocl'] ) ? 'https://example.com' : $instance['cps_ranking03_url_ocl'], $instance, $this->id_base );

		echo $args['before_widget'];
		if ( ! empty( $title ) ) {
			echo $args['before_title'] . $title . $args['after_title'];
		} ?>
		<?php
			$simple01 = get_template_directory_uri().'/img/rank01.png';
			$simple02 = get_template_directory_uri().'/img/rank02.png';
			$simple03 = get_template_directory_uri().'/img/rank03.png';

			$luxe01 = get_template_directory_uri().'/img/rank01-rich.png';
			$luxe02 = get_template_directory_uri().'/img/rank02-rich.png';
			$luxe03 = get_template_directory_uri().'/img/rank03-rich.png';

			$girly01 = get_template_directory_uri().'/img/rank01-girly.png';
			$girly02 = get_template_directory_uri().'/img/rank02-girly.png';
			$girly03 = get_template_directory_uri().'/img/rank03-girly.png';
		?>
            <div class="wide-layout">
				<ul class="<?php echo $cps_ranking_style; ?>">
					<li>
						<h3 class="side-ranking-title" itemprop="headline">
							<?php if( $cps_ranking_style == 'simple-style' ) : ?>
								<?php echo '<img class="ranking-number" src="'.$simple01.'" />'; ?>
							<?php elseif( $cps_ranking_style == 'luxe-style' ) : ?>
								<?php echo '<img class="ranking-number-luxe" src="'.$luxe01.'" />'; ?>
							<?php elseif( $cps_ranking_style == 'girly-style' ) : ?>
								<?php echo '<img class="ranking-number-girly" src="'.$girly01.'" />'; ?>
							<?php endif; ?>
							<?php echo $cps_ranking01_title; ?>
						</h3>
						<div class="side-ranking-meta" itemprop="image" itemscope itemtype="https://schema.org/ImageObject">
							<figure class="side-ranking-img">
								<?php echo $cps_ranking01_adtag; ?>
							</figure>
							<div class="side-ranking-info">
								<?php echo $cps_ranking01_info; ?>
							</div>
						</div>
						<div class="side-btn-box">
							<?php if( ! empty($cps_ranking01_url) ): ?>
								<div class="color-button01 side-ranking-btn">
									<a href="<?php echo $cps_ranking01_url; ?>"><?php echo $cps_ranking01_btn; ?></a>
								</div>
							<?php elseif( empty($cps_ranking01_url) ): ?>
								<?php echo $cps_ranking01_btn; ?>
							<?php endif; ?>
							<?php if( ! empty($cps_ranking01_url_ocl) ): ?>
								<div class="color-button02 side-ranking-btn">
									<a href="<?php echo $cps_ranking01_url_ocl; ?>"><?php echo $cps_ranking01_btn_ocl; ?></a>
								</div>
							<?php elseif( empty($cps_ranking01_url_ocl) ): ?>
								<?php echo $cps_ranking01_btn_ocl; ?>
							<?php endif; ?>
						</div>
					</li>

					<li>
						<h3 class="side-ranking-title" itemprop="headline">
							<?php if( $cps_ranking_style == 'simple-style' ) : ?>
								<?php echo '<img class="ranking-number" src="'.$simple02.'" />'; ?>
							<?php elseif( $cps_ranking_style == 'luxe-style' ) : ?>
								<?php echo '<img class="ranking-number-luxe" src="'.$luxe02.'" />'; ?>
							<?php elseif( $cps_ranking_style == 'girly-style' ) : ?>
								<?php echo '<img class="ranking-number-girly" src="'.$girly02.'" />'; ?>
							<?php endif; ?>
							<?php echo $cps_ranking02_title; ?>
						</h3>
						<div class="side-ranking-meta" itemprop="image" itemscope itemtype="https://schema.org/ImageObject">
							<figure class="side-ranking-img">
								<?php echo $cps_ranking02_adtag; ?>
							</figure>
							<div class="side-ranking-info">
								<?php echo $cps_ranking02_info; ?>
							</div>
						</div>
						<div class="side-btn-box">
							<?php if( ! empty($cps_ranking02_url) ): ?>
								<div class="color-button01 side-ranking-btn">
									<a href="<?php echo $cps_ranking02_url; ?>"><?php echo $cps_ranking02_btn; ?></a>
								</div>
							<?php elseif( empty($cps_ranking02_url) ): ?>
								<?php echo $cps_ranking02_btn; ?>
							<?php endif; ?>
							<?php if( ! empty($cps_ranking02_url_ocl) ): ?>
								<div class="color-button02 side-ranking-btn">
									<a href="<?php echo $cps_ranking02_url_ocl; ?>"><?php echo $cps_ranking02_btn_ocl; ?></a>
								</div>
							<?php elseif( empty($cps_ranking02_url_ocl) ): ?>
								<?php echo $cps_ranking02_btn_ocl; ?>
							<?php endif; ?>
						</div>
					</li>

					<li>
						<h3 class="side-ranking-title" itemprop="headline">
							<?php if( $cps_ranking_style == 'simple-style' ) : ?>
								<?php echo '<img class="ranking-number" src="'.$simple03.'" />'; ?>
							<?php elseif( $cps_ranking_style == 'luxe-style' ) : ?>
								<?php echo '<img class="ranking-number-luxe" src="'.$luxe03.'" />'; ?>
							<?php elseif( $cps_ranking_style == 'girly-style' ) : ?>
								<?php echo '<img class="ranking-number-girly" src="'.$girly03.'" />'; ?>
							<?php endif; ?>
							<?php echo $cps_ranking03_title; ?>
						</h3>
						<div class="side-ranking-meta" itemprop="image" itemscope itemtype="https://schema.org/ImageObject">
							<figure class="side-ranking-img">
								<?php echo $cps_ranking03_adtag; ?>
							</figure>
							<div class="side-ranking-info">
								<?php echo $cps_ranking03_info; ?>
							</div>
						</div>
						<div class="side-btn-box">
							<?php if( ! empty($cps_ranking03_url) ): ?>
								<div class="color-button01 side-ranking-btn">
									<a href="<?php echo $cps_ranking03_url; ?>"><?php echo $cps_ranking03_btn; ?></a>
								</div>
							<?php elseif( empty($cps_ranking03_url) ): ?>
								<?php echo $cps_ranking03_btn; ?>
							<?php endif; ?>
							<?php if( ! empty($cps_ranking03_url_ocl) ): ?>
								<div class="color-button02 side-ranking-btn">
									<a href="<?php echo $cps_ranking03_url_ocl; ?>"><?php echo $cps_ranking03_btn_ocl; ?></a>
								</div>
							<?php elseif( empty($cps_ranking03_url_ocl) ): ?>
								<?php echo $cps_ranking03_btn_ocl; ?>
							<?php endif; ?>
						</div>
					</li>
				</ul>
			</div>
		<?php
		echo $args['after_widget'];
	}
	
	public function form( $instance ) {
		$defaults = array(
			'title' => '',
			'cps_ranking_style' => 'simple-style',
			'cps_ranking01_adtag' => '',
			'cps_ranking01_url' => 'https://example.com',
			'cps_ranking01_info' => 'ここに説明文を入力してください。',
			'cps_ranking01_title' => 'タイトルを入力してください',
			'cps_ranking01_btn' => '詳細ページ',
			'cps_ranking01_btn_ocl' => '公式ページ',
			'cps_ranking01_url_ocl' => 'https://example.com',
			'cps_ranking02_adtag' => '',
			'cps_ranking02_url' => 'https://example.com',
			'cps_ranking02_info' => 'ここに説明文を入力してください。',
			'cps_ranking02_title' => 'タイトルを入力してください',
			'cps_ranking02_btn' => '詳細ページ',
			'cps_ranking02_btn_ocl' => '公式ページ',
			'cps_ranking02_url_ocl' => 'https://example.com',
			'cps_ranking03_adtag' => '',
			'cps_ranking03_url' => 'https://example.com',
			'cps_ranking03_info' => 'ここに説明文を入力してください。',
			'cps_ranking03_title' => 'タイトルを入力してください',
			'cps_ranking03_btn' => '詳細ページ',
			'cps_ranking03_btn_ocl' => '公式ページ',
			'cps_ranking03_url_ocl' => 'https://example.com',
		);
		$instance   = wp_parse_args( (array) $instance, $defaults );
		$title  = sanitize_text_field( $instance['title'] );
		$cps_ranking_style  = $instance['cps_ranking_style'];
		
		$cps_ranking01_adtag  = $instance['cps_ranking01_adtag'];
		$cps_ranking01_url  = $instance['cps_ranking01_url'];
		$cps_ranking01_info  = $instance['cps_ranking01_info'];
		$cps_ranking01_title  = $instance['cps_ranking01_title'];
		$cps_ranking01_btn  = $instance['cps_ranking01_btn'];
		$cps_ranking01_btn_ocl  = $instance['cps_ranking01_btn_ocl'];
		$cps_ranking01_url_ocl  = $instance['cps_ranking01_url_ocl'];
		
		$cps_ranking02_adtag  = $instance['cps_ranking02_adtag'];
		$cps_ranking02_url  = $instance['cps_ranking02_url'];
		$cps_ranking02_info  = $instance['cps_ranking02_info'];
		$cps_ranking02_title  = $instance['cps_ranking02_title'];
		$cps_ranking02_btn  = $instance['cps_ranking02_btn'];
		$cps_ranking02_btn_ocl  = $instance['cps_ranking02_btn_ocl'];
		$cps_ranking02_url_ocl  = $instance['cps_ranking02_url_ocl'];
		
		$cps_ranking03_adtag  = $instance['cps_ranking03_adtag'];
		$cps_ranking03_url  = $instance['cps_ranking03_url'];
		$cps_ranking03_info  = $instance['cps_ranking03_info'];
		$cps_ranking03_title  = $instance['cps_ranking03_title'];
		$cps_ranking03_btn  = $instance['cps_ranking03_btn'];
		$cps_ranking03_btn_ocl  = $instance['cps_ranking03_btn_ocl'];
		$cps_ranking03_url_ocl  = $instance['cps_ranking03_url_ocl'];

		
		?>
		<style type="text/css">
			.caption label{
				font-weight: bold;
				font-size: 0.8rem!important;
			}
			#media{
				margin-top: 10px;
			}
¥
			input, button, textarea, select {
				-webkit-appearance: none;
				-moz-appearance: none;
				appearance: none;
				cursor: pointer;
			}
			input[type="button"]{
				padding: 10px;
				font-size: 12px;
				background: #eee;
				border: 3px #aaa solid;
			}

		</style>
		<p class="caption">
			<label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('ランキングタイトル'); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" />
		</p>
		<p class="caption">
			<label for="<?php echo $this->get_field_id('cps_ranking_style'); ?>"><?php _e('スタイル'); ?></label><br>
			<div style="padding: 5px; margin-top: -12px; background: #eee;" >
				<input class="widefat" id="<?php echo $this->get_field_id('cps_ranking_style'); ?>" name="<?php echo $this->get_field_name('cps_ranking_style'); ?>" type="radio"<?php checked('simple-style', $cps_ranking_style); ?> value="simple-style" />シンプル&nbsp;&nbsp;&nbsp;
				<input class="widefat" id="<?php echo $this->get_field_id('cps_ranking_style'); ?>" name="<?php echo $this->get_field_name('cps_ranking_style'); ?>" type="radio"<?php checked('luxe-style', $cps_ranking_style); ?> value="luxe-style" />リッチ&nbsp;&nbsp;&nbsp;
				<input class="widefat" id="<?php echo $this->get_field_id('cps_ranking_style'); ?>" name="<?php echo $this->get_field_name('cps_ranking_style'); ?>" type="radio"<?php checked('girly-style', $cps_ranking_style); ?> value="girly-style" />プリティ
			</div>
		</p>


		<div style="border-bottom: 2px dashed #888; height: 15px;"></div>
		<!--ランキング１-->

		<div style="background:#fcc800; font-size: 16px; font-weight: bold; color: #fff; margin-top: 30px!important; padding: 10px">ランキング１位</div>
		
		<p class="caption">
			<label for="<?php echo $this->get_field_id('cps_ranking01_title'); ?>"><?php _e('タイトル'); ?></label>
			<textarea class="widefat" id="<?php echo $this->get_field_id('cps_ranking01_title'); ?>" name="<?php echo $this->get_field_name('cps_ranking01_title'); ?>" type="text" rows="1"><?php echo $cps_ranking01_title; ?></textarea>
		</p>
		
		<p class="caption">
			<label for="<?php echo $this->get_field_id('cps_ranking01_adtag'); ?>"><?php _e('広告タグ'); ?></label>
			<textarea rows="5" class="widefat" id="<?php echo $this->get_field_id('cps_ranking01_adtag'); ?>" name="<?php echo $this->get_field_name('cps_ranking01_adtag'); ?>" type="text"><?php echo $cps_ranking01_adtag; ?></textarea>
		</p>
		
		<p class="caption">
			<label for="<?php echo $this->get_field_id('cps_ranking01_info'); ?>"><?php _e('説明'); ?></label>
			<textarea rows="5" class="widefat" id="<?php echo $this->get_field_id('cps_ranking01_info'); ?>" name="<?php echo $this->get_field_name('cps_ranking01_info'); ?>" type="text"><?php echo $cps_ranking01_info; ?></textarea>
		</p>

		<p class="caption">
			<label for="<?php echo $this->get_field_id('cps_ranking01_url'); ?>"><?php _e('詳細ページのURL'); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id('cps_ranking01_url'); ?>" name="<?php echo $this->get_field_name('cps_ranking01_url'); ?>" type="text" value="<?php echo $cps_ranking01_url; ?>" />
		</p>
		<p class="caption">
			<label for="<?php echo $this->get_field_id('cps_ranking01_btn'); ?>"><?php _e('詳細ページのボタン文字'); ?></label>
			<textarea class="widefat" id="<?php echo $this->get_field_id('cps_ranking01_btn'); ?>" name="<?php echo $this->get_field_name('cps_ranking01_btn'); ?>" type="text" rows="2"><?php echo $cps_ranking01_btn; ?></textarea>
		</p>
		<p class="caption">
			<label for="<?php echo $this->get_field_id('cps_ranking01_url_ocl'); ?>"><?php _e('公式ページのURL'); ?></label>
			<textarea class="widefat" id="<?php echo $this->get_field_id('cps_ranking01_url_ocl'); ?>" name="<?php echo $this->get_field_name('cps_ranking01_url_ocl'); ?>" type="text" rows="2"><?php echo $cps_ranking01_url_ocl; ?></textarea>
		</p>
		</p>
		<p class="caption">
			<label for="<?php echo $this->get_field_id('cps_ranking01_btn_ocl'); ?>"><?php _e('公式ページのボタン文字'); ?></label>
			<textarea class="widefat" id="<?php echo $this->get_field_id('cps_ranking01_btn_ocl'); ?>" name="<?php echo $this->get_field_name('cps_ranking01_btn_ocl'); ?>" type="text" rows="2"><?php echo $cps_ranking01_btn_ocl; ?></textarea>
		</p>


		<!--ランキング２-->

		<div style="background:#c9caca; font-size: 16px; font-weight: bold; color: #fff; margin-top: 30px!important; padding: 10px">ランキング２位</div>

		<p class="caption">
			<label for="<?php echo $this->get_field_id('cps_ranking02_title'); ?>"><?php _e('タイトル'); ?></label>
			<textarea class="widefat" id="<?php echo $this->get_field_id('cps_ranking02_title'); ?>" name="<?php echo $this->get_field_name('cps_ranking02_title'); ?>" type="text" rows="1"><?php echo $cps_ranking02_title; ?></textarea>
		</p>
		
		<p class="caption">
			<label for="<?php echo $this->get_field_id('cps_ranking02_adtag'); ?>"><?php _e('広告タグ'); ?></label>
			<textarea rows="5" class="widefat" id="<?php echo $this->get_field_id('cps_ranking02_adtag'); ?>" name="<?php echo $this->get_field_name('cps_ranking02_adtag'); ?>" type="text"><?php echo $cps_ranking02_adtag; ?></textarea>
		</p>
		
		<p class="caption">
			<label for="<?php echo $this->get_field_id('cps_ranking02_info'); ?>"><?php _e('説明'); ?></label>
			<textarea rows="5" class="widefat" id="<?php echo $this->get_field_id('cps_ranking02_info'); ?>" name="<?php echo $this->get_field_name('cps_ranking02_info'); ?>" type="text"><?php echo $cps_ranking02_info; ?></textarea>
		</p>
		
		<p class="caption">
			<label for="<?php echo $this->get_field_id('cps_ranking02_url'); ?>"><?php _e('詳細ページのURL'); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id('cps_ranking02_url'); ?>" name="<?php echo $this->get_field_name('cps_ranking02_url'); ?>" type="text" value="<?php echo $cps_ranking02_url; ?>" />
		</p>
		<p class="caption">
			<label for="<?php echo $this->get_field_id('cps_ranking02_btn'); ?>"><?php _e('詳細ページのボタン文字'); ?></label>
			<textarea class="widefat" id="<?php echo $this->get_field_id('cps_ranking02_btn'); ?>" name="<?php echo $this->get_field_name('cps_ranking02_btn'); ?>" type="text" rows="2"><?php echo $cps_ranking02_btn; ?></textarea>
		</p>
		<p class="caption">
			<label for="<?php echo $this->get_field_id('cps_ranking02_url_ocl'); ?>"><?php _e('公式ページのURL'); ?></label>
			<textarea class="widefat" id="<?php echo $this->get_field_id('cps_ranking02_url_ocl'); ?>" name="<?php echo $this->get_field_name('cps_ranking02_url_ocl'); ?>" type="text" rows="2"><?php echo $cps_ranking02_url_ocl; ?></textarea>
		</p>
		<p class="caption">
			<label for="<?php echo $this->get_field_id('cps_ranking02_btn_ocl'); ?>"><?php _e('公式ページのボタン文字'); ?></label>
			<textarea class="widefat" id="<?php echo $this->get_field_id('cps_ranking02_btn_ocl'); ?>" name="<?php echo $this->get_field_name('cps_ranking02_btn_ocl'); ?>" type="text" rows="2"><?php echo $cps_ranking02_btn_ocl; ?></textarea>
		</p>



		<!--ランキング３-->

		<div style="background:#ba8b40; font-size: 16px; font-weight: bold; color: #fff; margin-top: 30px!important; padding: 10px">ランキング３位</div>

		<p class="caption">
			<label for="<?php echo $this->get_field_id('cps_ranking03_title'); ?>"><?php _e('タイトル'); ?></label>
			<textarea class="widefat" id="<?php echo $this->get_field_id('cps_ranking03_title'); ?>" name="<?php echo $this->get_field_name('cps_ranking03_title'); ?>" type="text" rows="1"><?php echo $cps_ranking03_title; ?></textarea>
		</p>
		
		<p class="caption">
			<label for="<?php echo $this->get_field_id('cps_ranking03_adtag'); ?>"><?php _e('広告タグ'); ?></label>
			<textarea rows="5" class="widefat" id="<?php echo $this->get_field_id('cps_ranking03_adtag'); ?>" name="<?php echo $this->get_field_name('cps_ranking03_adtag'); ?>" type="text"><?php echo $cps_ranking03_adtag; ?></textarea>
		</p>
		
		<p class="caption">
			<label for="<?php echo $this->get_field_id('cps_ranking03_info'); ?>"><?php _e('説明'); ?></label>
			<textarea rows="5" class="widefat" id="<?php echo $this->get_field_id('cps_ranking03_info'); ?>" name="<?php echo $this->get_field_name('cps_ranking03_info'); ?>" type="text"><?php echo $cps_ranking03_info; ?></textarea>
		</p>
		
		<p class="caption">
			<label for="<?php echo $this->get_field_id('cps_ranking03_url'); ?>"><?php _e('詳細ページのURL'); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id('cps_ranking03_url'); ?>" name="<?php echo $this->get_field_name('cps_ranking03_url'); ?>" type="text" value="<?php echo $cps_ranking03_url; ?>" />
		</p>
		<p class="caption">
			<label for="<?php echo $this->get_field_id('cps_ranking03_btn'); ?>"><?php _e('詳細ページのボタン文字'); ?></label>
			<textarea class="widefat" id="<?php echo $this->get_field_id('cps_ranking03_btn'); ?>" name="<?php echo $this->get_field_name('cps_ranking03_btn'); ?>" type="text" rows="2"><?php echo $cps_ranking03_btn; ?></textarea>
		</p>
		<p class="caption">
			<label for="<?php echo $this->get_field_id('cps_ranking03_url_ocl'); ?>"><?php _e('公式ページのURL'); ?></label>
			<textarea class="widefat" id="<?php echo $this->get_field_id('cps_ranking03_url_ocl'); ?>" name="<?php echo $this->get_field_name('cps_ranking03_url_ocl'); ?>" type="text" rows="2"><?php echo $cps_ranking03_url_ocl; ?></textarea>
		</p>
		<p class="caption">
			<label for="<?php echo $this->get_field_id('cps_ranking03_btn_ocl'); ?>"><?php _e('公式ページのボタン文字'); ?></label>
			<textarea class="widefat" id="<?php echo $this->get_field_id('cps_ranking03_btn_ocl'); ?>" name="<?php echo $this->get_field_name('cps_ranking03_btn_ocl'); ?>" type="text" rows="2"><?php echo $cps_ranking03_btn_ocl; ?></textarea>
		</p>

		<?php
	}
	
	public function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['title']  = sanitize_text_field( $new_instance['title'] );
		$instance['cps_ranking_style'] = $new_instance['cps_ranking_style'];
		
		$instance['cps_ranking01_adtag'] = $new_instance['cps_ranking01_adtag'];
		$instance['cps_ranking01_url'] = $new_instance['cps_ranking01_url'];
		$instance['cps_ranking01_info'] = $new_instance['cps_ranking01_info'];
		$instance['cps_ranking01_title'] = $new_instance['cps_ranking01_title'];
		$instance['cps_ranking01_btn'] = $new_instance['cps_ranking01_btn'];
		$instance['cps_ranking01_btn_ocl'] = $new_instance['cps_ranking01_btn_ocl'];
		$instance['cps_ranking01_url_ocl'] = $new_instance['cps_ranking01_url_ocl'];

		$instance['cps_ranking02_adtag'] = $new_instance['cps_ranking02_adtag'];
		$instance['cps_ranking02_url'] = $new_instance['cps_ranking02_url'];
		$instance['cps_ranking02_info'] = $new_instance['cps_ranking02_info'];
		$instance['cps_ranking02_title'] = $new_instance['cps_ranking02_title'];
		$instance['cps_ranking02_btn'] = $new_instance['cps_ranking02_btn'];
		$instance['cps_ranking02_btn_ocl'] = $new_instance['cps_ranking02_btn_ocl'];
		$instance['cps_ranking02_url_ocl'] = $new_instance['cps_ranking02_url_ocl'];

		$instance['cps_ranking03_adtag'] = $new_instance['cps_ranking03_adtag'];
		$instance['cps_ranking03_url'] = $new_instance['cps_ranking03_url'];
		$instance['cps_ranking03_info'] = $new_instance['cps_ranking03_info'];
		$instance['cps_ranking03_title'] = $new_instance['cps_ranking03_title'];
		$instance['cps_ranking03_btn'] = $new_instance['cps_ranking03_btn'];
		$instance['cps_ranking03_btn_ocl'] = $new_instance['cps_ranking03_btn_ocl'];
		$instance['cps_ranking03_url_ocl'] = $new_instance['cps_ranking03_url_ocl'];

		return $instance;
	}
}




function theme_register_widget() {
	register_widget( 'My_Widget_Profile' );
	register_widget( 'My_Widget_Reccomend_Posts' );
	register_widget( 'My_Widget_Recent_Posts' );
	register_widget( 'My_Widget_Popular_Posts' );
	register_widget( 'Cps_Ranking_Widget' );
}
add_action( 'widgets_init', 'theme_register_widget' );
