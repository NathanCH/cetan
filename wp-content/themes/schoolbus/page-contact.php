<?php
/**
 * Template Name: Contact
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
		<div class="Page Callout text-center">
			<h3 class="Callout__heading">Let's get in touch.</h3>
			<p class="Callout__lead">
				<?php
				while (have_posts()) : the_post(); 
									
					the_content('');
					
				endwhile;
				?>
			</p>
		</div>
	</div>
</div>
<div class="row">
	<div class="small-12 medium-8 large-9 columns">
		<section class="Page">
			<form class="Form" method="POST" action="/contact/">
				<div class="Form__input-container">
					<input type="email" 
						   name="email"
						   class="Form__input small-12 medium-6 large-4" 
						   placeholder="Email" />
				</div>
				<div class="Form__input-container">
					<input type="text" 
						   name="subject"
						   class="Form__input small-12 medium-6 large-4" 
						   placeholder="Subject" />
				</div>
				<div class="Form__input-container">
					<textarea name="message"
							  class="Form__textarea small-12 medium-9" 
							  placeholder="Message"
							  rows="4"></textarea>
				</div>
				<div class="Form__input-container">
					<input type="submit"
						   class="Button" 
						   value="Submit" />
				</div>
			</form>
		</section>
	</div>
	<div class="small-12 medium-4 large-3 columns text-right">
		<?php get_sidebar(); ?>
	</div>
</div>
<?php
}

get_footer();
?>