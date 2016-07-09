<?php 
get_header(); 
get_template_part('templates/hero');
?>
<div class="row">
	<div class="small-12 column">
		<hr class="Divider" />
		<section class="Featured Section">
			<?php
			if(have_posts()) {

				get_template_part('templates/content-spotlight-alt');

			}

			else{

				get_template_part('templates/content-none');

			}
			?>
		</section>
		<hr class="Divider Divider--dots" />
		<section class="Clients Section">
			<?php get_template_part('templates/content-clients'); ?>
		</section>
	</div>
</div>
<?php
get_footer(); 
?>