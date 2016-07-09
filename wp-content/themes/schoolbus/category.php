<?php
get_header();
?>
<div class="row">
	<div class="small-12 column">
		<div class="Heading clearfix">
			<h1 class="Heading__text">
				<?php echo get_category_name(); ?>
			</h1>
			<ul class="Breadcrumb">
				<li class="Breadcrumb__item">
					<a href="/" class="Breadcrumb__link">Home</a> /
				</li>
				<li class="Breadcrumb__item">
					<a href="#" class="Breadcrumb__link Breadcrumb__link--active">
						<?php echo get_category_name(); ?>
					</a>
				</li>
			</ul>
		</div>
	</div>
</div>
<div class="row">
	<div class="small-12 column">
		<section class="Page Page--detail">
			<?php get_template_part('templates/content-spotlight'); ?>
		</section>
		<hr class="Divider Divider--dots" />
	</div>
</div>
<div class="row">
	<div class="small-12 column">
		<section class="Page">
			<?php
			if(have_posts()) {

				get_template_part('templates/content-featured');

			}

			else{

				get_template_part('templates/content-none');

			}
			?>
		</section>
	</div>
</div>
<?php
get_footer();
?>