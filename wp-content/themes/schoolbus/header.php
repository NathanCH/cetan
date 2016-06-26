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
						<a class="Logo" href="#">
							Cetan
						</a>
					</div>
					<div class="Header__menu float-right">
						<div class="Menu">
							<button class="Menu__toggle">
								<i class="fa fa-bars"></i>
							</button>
							<ul class="Menu__nav">
								<li class="Menu__item">
									<a class="Menu__link" href="#">Web</a>
								</li>
								<li class="Menu__item">
									<a class="Menu__link" href="#">Photo</a>
								</li>
								<li class="Menu__item">
									<a class="Menu__link" href="#">Blog</a>
								</li>
								<li class="Menu__item">
									<a class="Menu__link" href="#">Contact</a>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</header>
	
