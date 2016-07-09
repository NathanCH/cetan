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
	add_image_size('post-screen', 758, 447, ['center', 'center']);

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

function schoolbus_register_sidebars()
{
	register_sidebar([
		'name' => __('Contact Sidebar'),
		'id' => 'Contact-Sidebar',
		'before_widget' => '<div id="%1$s" class="Widget">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="Widget__title">',
		'after_title' => '</h3>'
	]);

	register_sidebar([
		'name' => __('About Sidebar'),
		'id' => 'About-Sidebar',
		'before_widget' => '<div id="%1$s" class="Widget">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="Widget__title">',
		'after_title' => '</h3>'
	]);
}

add_action('init', 'schoolbus_register_sidebars');

function custom_wp_nav_menu_objects($objects, $args)
{
	foreach($objects as $key => $item)
	{
		$objects[$key]->classes[] = 'Menu__item';
	}

	return $objects;
}

add_filter('wp_nav_menu_objects', 'custom_wp_nav_menu_objects', 10, 2);

function enqueue_dependency()
{
	wp_enqueue_script("jquery");
}

add_action('wp_enqueue_scripts', 'enqueue_dependency');

function get_category_name()
{
	$category_id = get_query_var('cat');

	return get_category($category_id)->name;
}

function get_post_tags()
{
	echo '<ul class="Post__tag">';

	foreach (get_the_tags() as $tag) {
		echo '<li class="Post__tag-item">' . $tag->name . '</li>';
	}

	echo '</ul>';
}

function send_mail()
{
	$params = [];

	parse_str($_POST['data'], $params);

	$recipient = 'nathancharrois@gmail.com';
	$from = $params['email'];
	$subject = 'Cetan Contact Form: ' . $params['subject'];
	$message = $params['message'];
	$header = 'From:' . $from;

	mail($recipient, $subject, $message, $header);

	wp_die();
}

add_action('wp_ajax_send_mail', 'send_mail');
add_action('wp_ajax_nopriv_send_mail', 'send_mail');