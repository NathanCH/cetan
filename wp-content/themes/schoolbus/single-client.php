<?php
/**
 * Template Name Posts: Client Post
 */
get_header();

if ( have_posts() ) {
?>
	<div class="row">
		<div class="small-12 column">
			<div class="Heading clearfix">
				<h1 class="Heading__text">
					<?php echo the_title(); ?>
				</h1>
				<ul class="Breadcrumb">
					<li class="Breadcrumb__item">
						<a href="/" class="Breadcrumb__link">Home</a> /
					</li>
					<li class="Breadcrumb__item">
						<a href="/work" class="Breadcrumb__link">Work</a> /
					</li>
					<li class="Breadcrumb__item">
						<a href="#" class="Breadcrumb__link Breadcrumb__link--active">
							<?php echo the_title(); ?>
						</a>
					</li>
				</ul>
			</div>
		</div>
	</div>
	<div class="column row">
		<section class="Page Page--detail">
		 	<div class="row">
		 	 	<div class="small-12 medium-6 large-5 columns">
					<h2 class="Post__title">
						<?php echo get_post_meta($post->ID, 'lead_1', true); ?>
					</h2>
					<?php 
					get_post_tags();

					while (have_posts()) : the_post(); 
										
						the_content('');
						
					endwhile;
					?>
				</div>
				<div class="small-12 medium-5 medium-offset-1 large-6 large-offset-1 columns">
					<div class="Client">
						<div class="Client__logo">
							<img src="<?php echo get_template_directory_uri() . get_post_meta($post->ID, 'logo', true); ?>" />
						</div>
					</div>
		 	 	</div>
		 	</div>
		</section>
	</div>
	<section class="Section Section--white">
		<div class="column row text-center">
			<h3 class="Post__title">
				<?php echo get_post_meta($post->ID, 'lead_2', true); ?>
			</h3>
			<div class="Laptop">
				<?php the_post_thumbnail('post-screen', ['class'=> 'Laptop__screen']); ?>
			</div>
			<div class="column row">
				<a class="Button Button--primary" hook="open-gallery">
					Open Gallery
					<i class="fa fa-external-link" style="margin-left:10px;"></i>
				</a>
				<a class="Button" href="<?php echo get_post_meta($post->ID, 'link', true); ?>">View Site</a>
			</div>
		</div>
	</section>
	<script>
	$(document).ready(function() {
		var photos =  [
			{
				src: 'http://i.imgur.com/DD1JBrf.png',
				caption: 'Before entering through the doors.'
			},
			{
				src: 'http://i.imgur.com/AArLutn.jpg',
				caption: 'Somewhere in Toronto'
			},
			{
				src: 'http://i.imgur.com/rCYhHyK.jpg',
				caption: 'A cool van.'
			}
		];

		$('[hook="open-gallery"]').on('click', function(e) {
			new Gallery('body', photos);
		});
	});
	</script>
<?php
}

get_footer('grey');
?>
