<?php $form = array(
	'title_reply'		=> 'Join the Discussion',
	);
?>

<?php comment_form($form); ?>

<?php $arg = array(
	'walker'            => null,
	'max_depth'         => '',
	'style'             => 'ul',
	'callback'          => null,
	'end-callback'      => null,
	'type'              => 'all',
	'reply_text'        => 'Post a Reply',
	'page'              => '',
	'per_page'          => '',
	'avatar_size'       => 64,
	'reverse_top_level' => null,
	'reverse_children'  => '',
	'format'            => 'xhtml', //or html5 @since 3.6
	'short_ping'        => false // @since 3.6)
	);
?>

<?php wp_list_comments($arg, $comments); ?> 