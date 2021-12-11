
<?php if ( get_option( 'comment_delete' ) ) : ?>

<div id="comment-box">
	<?php if(have_comments()): ?>
		<section id="comment-section">
			<article id="comment-area">
				<div id="comment-box">
					<h3 id="comment-title"><span class="fa-headline ef"><i class="jic jin-ifont-comment" aria-hidden="true"></i>POSTED COMMENT</span></h3>
					<ol class="comment-list">
					<?php wp_list_comments('avatar_size=48'); ?>
					</ol>
				</div>
			</article>
		</section>
	<?php endif; ?>
	<?php
		$commenter = wp_get_current_commenter();
		$req = get_option( 'require_name_email' );
		$aria_req = ( $req ? " aria-required='true'" : '' );
		$comments_args = array(
			'title_reply' => '<span class="fa-headline ef"><i class="jic jin-ifont-comment" aria-hidden="true"></i>COMMENT</span>',
			'label_submit' => '送信する',
			'comment_field' => '<div class="comment-flexbox"><p class="comment-form-comment">' .
			'<textarea id="comment" name="comment" aria-required="true">' .
			'</textarea></p>',
			'fields' => array(
			'author' => '<div class="comment-child-flex"><p class="comment-form-author">'.
								'<input id="author" placeholder="ニックネーム" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '"' . $aria_req . ' /></p>',
			'email'  => '<p class="comment-form-email">' .
								'<input id="email" placeholder="メールアドレス" name="email" type="email" value="' . esc_attr(  $commenter['comment_author_email'] ) . '"' . $aria_req . ' /></p></div></div>',
			'url'    => '',
			),
		);
		comment_form($comments_args);
	?>

	<?php if(get_comment_pages_count() > 1) : ?>
		<div>
			<span><?php previous_comments_link('前のコメント'); ?></span>
			<span><?php next_comments_link('次のコメント'); ?></span>
		</div>
	<?php endif; ?>
</div>
<?php endif; ?>
