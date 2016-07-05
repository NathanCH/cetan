<?php
/**
 * Template Name Posts: Blog Post
 */
get_header();

if (have_posts()) {
?>
<div class="row">
	<div class="small-12 column">
		<div class="Heading clearfix">
			<h1 class="Heading__text pull-left">
				Blog
			</h1>
			<ul class="Breadcrumb pull-right">
				<li class="Breadcrumb__item">
					<a href="/blog" class="Breadcrumb__link Breadcrumb__link--active">
						Back to Posts
					</a>
				</li>
			</ul>
		</div>
	</div>
</div>
<div class="row">
	<div class="small-12 column">
		<section class="Page Page--blog">
			<div class="row">
				<div class="small-10 small-offset-1 medium-8 medium-offset-2">
					<?php
					while (have_posts()) : the_post();
					?>
						<h2 class="Post__title Post__title--large">
							<?php the_title(); ?>
						</h2>
						<?php the_content(''); ?>
					<?php
					endwhile;
					?>	
				</div>
			</div>
		</section>
	</div>
</div>
<?php
}

get_footer();
?>