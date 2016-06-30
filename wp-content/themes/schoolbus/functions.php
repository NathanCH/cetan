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

	wp_insert_term('Work', 'category', [
		'description' => 'Completed work.',
		'slug' => 'work'
	]);

	wp_insert_term('Featured', 'category', [
		'description' => 'Featured posts for index page.',
		'slug' => 'featured'
	]);

	wp_insert_term('Blog', 'category', [
		'description' => 'Blog posts for blog.',
		'slug' => 'blog'
	]);
}

add_action('after_setup_theme', 'schoolbus_post_setup');

function schoolbus_register_menus()
{
	register_nav_menus([
		'header-menu' => __('Header_Menu')
	]);
}

add_action('init', 'schoolbus_register_menus');

function custom_wp_nav_menu_objects($objects, $args)
{
	foreach($objects as $key => $item)
	{
		$objects[$key]->classes[] = 'Menu__item';
	}

	return $objects;
}

add_filter('wp_nav_menu_objects', 'custom_wp_nav_menu_objects', 10, 2);