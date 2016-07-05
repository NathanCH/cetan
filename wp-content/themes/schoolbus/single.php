<?php
get_header();

if (have_posts()) {
?>
<div class="row">
	<div class="small-12 column">
		<div class="Heading">
			<h1 class="Heading__text"><?php the_title(); ?></h1>
		</div>
	</div>
</div>
<div class="row">
	<div class="small-12 column">
		<section class="Page">
			<?php
			while (have_posts()) : the_post(); 
								
				the_content('');
				
			endwhile;
			?>		
		</section>
	</div>
</div>
<?php
}

get_footer();
?>