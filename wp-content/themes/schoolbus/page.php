<?php
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
	<div class="small-12 medium-8 large-9 columns">
		<section class="Page">
			<?php
			while (have_posts()) : the_post(); 
								
				the_content('');
				
			endwhile;
			?>		
		</section>
	</div>
	<div class="small-12 medium-4 large-3 columns">
		<?php get_sidebar(); ?>
	</div>
</div>
<?php
}

get_footer();
?>