
<?php
the_posts_pagination(array(
	'screen_reader_text' => ' ',
	'before_page_number' => ' ',
	'prev_text'          => __('<i class="la la-arrow-left"></i>', 'trizen'),
	'next_text'          => __('<i class="la la-arrow-right"></i>', 'trizen'),
	'before_link'        => '<li>',
	'after_link'         => '</li>'
));
?>
