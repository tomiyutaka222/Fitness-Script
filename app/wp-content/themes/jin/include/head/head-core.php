

<!--デザインスタイルによるCSS分岐-->
<?php $header_style = get_theme_mod( 'header_design'); $sidebar_style = get_theme_mod( 'sidebar_design'); $h2_style = get_theme_mod( 'h2_style'); $h3_style = get_theme_mod( 'h3_style'); $h4_style = get_theme_mod( 'h4_style'); $sns_style = get_theme_mod( 'sns_design_type' ); $post_list_style = get_theme_mod( 'post_list_style'); ?>
<?php if( $header_style == 'header_style10' ): ?>
<!--ヘッダーのスタイル１０-->
<link href="<?php echo get_template_directory_uri() . '/scss/header/header-style10.css' ?>" rel="stylesheet" />
<?php elseif( $header_style == 'header_style11' ): ?>
<!--ヘッダーのスタイル１１-->
<link href="<?php echo get_template_directory_uri() . '/scss/header/header-style11.css' ?>" rel="stylesheet" />
<?php endif; ?>

<?php if( $sidebar_style == 'sidebar_style1' ): ?>
<!--サイドバーのスタイル１-->
<link href="<?php echo get_template_directory_uri() . '/scss/sidebar/sidebar-style01.css' ?>" rel="stylesheet" />
<?php elseif( $sidebar_style == 'sidebar_style2' ): ?>
<!--サイドバーのスタイル２-->
<link href="<?php echo get_template_directory_uri() . '/scss/sidebar/sidebar-style02.css' ?>" rel="stylesheet" />
<?php elseif( $sidebar_style == 'sidebar_style3' ): ?>
<!--サイドバーのスタイル３-->
<link href="<?php echo get_template_directory_uri() . '/scss/sidebar/sidebar-style03.css' ?>" rel="stylesheet" />
<?php elseif( $sidebar_style == 'sidebar_style4' ): ?>
<!--サイドバーのスタイル４-->
<link href="<?php echo get_template_directory_uri() . '/scss/sidebar/sidebar-style04.css' ?>" rel="stylesheet" />
<?php elseif( $sidebar_style == 'sidebar_style5' ): ?>
<!--サイドバーのスタイル５-->
<link href="<?php echo get_template_directory_uri() . '/scss/sidebar/sidebar-style05.css' ?>" rel="stylesheet" />
<?php elseif( $sidebar_style == 'sidebar_style6' ): ?>
<!--サイドバーのスタイル６-->
<link href="<?php echo get_template_directory_uri() . '/scss/sidebar/sidebar-style06.css' ?>" rel="stylesheet" />
<?php endif; ?>

<?php if( $h2_style == 'h2-style01' ): ?>
<!--H2のスタイル１-->
<link href="<?php echo get_template_directory_uri() . '/scss/page/headline/h2/h2-style01.css' ?>" rel="stylesheet" />
<?php elseif( $h2_style == 'h2-style02' ): ?>
<!--H2のスタイル２-->
<link href="<?php echo get_template_directory_uri() . '/scss/page/headline/h2/h2-style02.css' ?>" rel="stylesheet" />
<?php elseif( $h2_style == 'h2-style03' ): ?>
<!--H2のスタイル３-->
<link href="<?php echo get_template_directory_uri() . '/scss/page/headline/h2/h2-style03.css' ?>" rel="stylesheet" />
<?php elseif( $h2_style == 'h2-style04' ): ?>
<!--H2のスタイル４-->
<link href="<?php echo get_template_directory_uri() . '/scss/page/headline/h2/h2-style04.css' ?>" rel="stylesheet" />
<?php elseif( $h2_style == 'h2-style05' ): ?>
<!--H2のスタイル５-->
<link href="<?php echo get_template_directory_uri() . '/scss/page/headline/h2/h2-style05.css' ?>" rel="stylesheet" />
<?php elseif( $h2_style == 'h2-style06' ): ?>
<!--H2のスタイル６-->
<link href="<?php echo get_template_directory_uri() . '/scss/page/headline/h2/h2-style06.css' ?>" rel="stylesheet" />
<?php elseif( $h2_style == 'h2-style07' ): ?>
<!--H2のスタイル７-->
<link href="<?php echo get_template_directory_uri() . '/scss/page/headline/h2/h2-style07.css' ?>" rel="stylesheet" />
<?php elseif( $h2_style == 'h2-style08' ): ?>
<!--H2のスタイル８-->
<link href="<?php echo get_template_directory_uri() . '/scss/page/headline/h2/h2-style08.css' ?>" rel="stylesheet" />
<?php elseif( $h2_style == 'h2-style09' ): ?>
<!--H2のスタイル９-->
<link href="<?php echo get_template_directory_uri() . '/scss/page/headline/h2/h2-style00.css' ?>" rel="stylesheet" />
<?php elseif( $h2_style == 'h2-style10' ): ?>
<!--H2のスタイル１０-->
<link href="<?php echo get_template_directory_uri() . '/scss/page/headline/h2/h2-style10.css' ?>" rel="stylesheet" />
<?php endif; ?>

<?php if( $h3_style == 'h3-style01' ): ?>
<!--H3のスタイル１-->
<link href="<?php echo get_template_directory_uri() . '/scss/page/headline/h3/h3-style01.css' ?>" rel="stylesheet" />
<?php elseif( $h3_style == 'h3-style02' ): ?>
<!--H3のスタイル２-->
<link href="<?php echo get_template_directory_uri() . '/scss/page/headline/h3/h3-style02.css' ?>" rel="stylesheet" />
<?php elseif( $h3_style == 'h3-style03' ): ?>
<!--H3のスタイル３-->
<link href="<?php echo get_template_directory_uri() . '/scss/page/headline/h3/h3-style03.css' ?>" rel="stylesheet" />
<?php elseif( $h3_style == 'h3-style04' ): ?>
<!--H3のスタイル４-->
<link href="<?php echo get_template_directory_uri() . '/scss/page/headline/h3/h3-style04.css' ?>" rel="stylesheet" />
<?php elseif( $h3_style == 'h3-style05' ): ?>
<!--H3のスタイル５-->
<link href="<?php echo get_template_directory_uri() . '/scss/page/headline/h3/h3-style05.css' ?>" rel="stylesheet" />
<?php elseif( $h3_style == 'h3-style06' ): ?>
<!--H3のスタイル６-->
<link href="<?php echo get_template_directory_uri() . '/scss/page/headline/h3/h3-style06.css' ?>" rel="stylesheet" />
<?php elseif( $h3_style == 'h3-style07' ): ?>
<!--H3のスタイル７-->
<link href="<?php echo get_template_directory_uri() . '/scss/page/headline/h3/h3-style07.css' ?>" rel="stylesheet" />
<?php endif; ?>

<?php if( $h4_style == 'h4-style01' ): ?>
<!--H4のスタイル１-->
<link href="<?php echo get_template_directory_uri() . '/scss/page/headline/h4/h4-style01.css' ?>" rel="stylesheet" />
<?php elseif( $h4_style == 'h4-style02' ): ?>
<!--H4のスタイル２-->
<link href="<?php echo get_template_directory_uri() . '/scss/page/headline/h4/h4-style02.css' ?>" rel="stylesheet" />
<?php elseif( $h4_style == 'h4-style03' ): ?>
<!--H4のスタイル３-->
<link href="<?php echo get_template_directory_uri() . '/scss/page/headline/h4/h4-style03.css' ?>" rel="stylesheet" />
<?php elseif( $h4_style == 'h4-style04' ): ?>
<!--H4のスタイル４-->
<link href="<?php echo get_template_directory_uri() . '/scss/page/headline/h4/h4-style04.css' ?>" rel="stylesheet" />
<?php endif; ?>

<?php if( $sns_style == 'sns-design-type01' ): ?>
<!--SNSボタンのデザイン１-->
<link href="<?php echo get_template_directory_uri() . '/scss/page/sns/sns-button-style01.css' ?>" rel="stylesheet" />
<?php elseif( $sns_style == 'sns-design-type02' ): ?>
<!--SNSボタンのデザイン２-->
<link href="<?php echo get_template_directory_uri() . '/scss/page/sns/sns-button-style02.css' ?>" rel="stylesheet" />
<?php endif; ?>

<?php if( ! get_option( 'related_entries_delete' ) == '記事下の関連記事を非表示にする' ): ?>
<!--関連記事のスタイル-->
<link href="<?php echo get_template_directory_uri() . '/scss/page/related-post.css' ?>" rel="stylesheet" />
<?php endif; ?>

<?php if ( get_option( 'comment_delete' ) ) : ?>
<!--コメントエリアのスタイル-->
<link href="<?php echo get_template_directory_uri() . '/scss/page/comment.css' ?>" rel="stylesheet" />
<?php endif; ?>

<?php if( ! get_option( 'prevnext_entries_delete' ) == '記事下の「次の記事」「前の記事」を非表示にする' ): ?>
<!--次を見る・前を見るのスタイル-->
<link href="<?php echo get_template_directory_uri() . '/scss/page/prevnext.css' ?>" rel="stylesheet" />
<?php endif; ?>

<?php if( is_font_style() == 'nts-style' ): ?>
<!--notoSansフォント-->
<link href="<?php echo get_template_directory_uri() . '/scss/font/nts.css' ?>" rel="stylesheet" />
<?php elseif( is_font_style() == 'rm-style' ): ?>
<!--MplusRound1cフォント-->
<link href="<?php echo get_template_directory_uri() . '/scss/font/rm.css' ?>" rel="stylesheet" />
<?php endif; ?>