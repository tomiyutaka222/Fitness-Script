<?php
$defaults = array(
	'before'           => '<div class="nextpage">',
	'after'            => '</div>',
	'link_before'      => '<span>',
	'link_after'       => '</span>',
	'next_or_number'   => 'number',
	'separator'        => ' ',
	'nextpagelink'     => __( 'Next page' ),
	'previouspagelink' => __( 'Previous page' ),
	'pagelink'         => '%',
	'echo'             => 1
);
wp_link_pages( $defaults );
?>