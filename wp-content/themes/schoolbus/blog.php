<?php
/**
 * Template Name: Blog
 */
get_header();

if (have_posts()) {
?>
<div class="row">
	<div class="small-12 column">
		<div class="Heading clearfix">
			<h1 class="Heading__text">
				<?php the_title(); ?>
			</h1>
			<ul class="Breadcrumb">
				<li class="Breadcrumb__item">
					<a href="/" class="Breadcrumb__link">Home</a> /
				</li>
				<li class="Breadcrumb__item">
					<a href="#" class="Breadcrumb__link Breadcrumb__link--active">
						<?php the_title(); ?>
					</a>
				</li>
			</ul>
		</div>
	</div>
</div>
<div class="row">
	<div class="small-12 column">
		<div class="Page Page--blog">
			<?php
			query_posts([
				'category_name' => 'Blog',
			]);
			
			if(have_posts()) {

				get_template_part('templates/content-blog');

			}

			else{

				get_template_part('templates/content-none');

			}
			?>
		</div>
	</div>
</div>
<?php
}

get_footer();
?>