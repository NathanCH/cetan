<?php

function schoolbus_setup()
{
	add_theme_support('title-tag');
	add_theme_support('post-thumbnails');
}

add_action('init', 'schoolbus_setup');

function schoolbus_post_setup()
{
	add_image_size('post-thumbnail', 600, 500, ['center', 'center']);
}

add_action('after_setup_theme', 'schoolbus_post_setup');