<?php

function schoolbus_setup()
{
	add_theme_support('title-tag');

	add_theme_support('post-thumbnails');
	set_post_thumbnail_size(800, 800, ['center', 'center']);

	add_image_size( 'single-post-thumbnail', 800, 9999 );
}

add_action('init', 'schoolbus_setup');