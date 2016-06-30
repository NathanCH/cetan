<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="description" content="Web development portfolio for Nathan Charrois.">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="<?php echo get_bloginfo('stylesheet_url');?>" />
		<?php wp_head(); ?>
	</head>
	<body <?php body_class('Body'); ?>>
		<header class="Header">
			<div class="row">
				<div class="small-12 column clearfix">
					<div class="Header__logo float-left">
						<a class="Logo" href="/">
							Cetan
						</a>
					</div>
					<div class="Header__menu float-right">
						<div class="Menu">
							<button class="Menu__toggle">
								<i class="fa fa-bars"></i>
							</button>
							<?php 
							wp_nav_menu([
								'theme_location' => 'header-menu',
								'container' => false,
								'menu_class' => 'Menu__nav'
							]); 
							?>
						</div>
					</div>
				</div>
			</div>
		</header>
	
