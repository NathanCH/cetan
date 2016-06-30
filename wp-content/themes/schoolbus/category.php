<?php
get_header();
?>
<div class="row">
	<div class="small-12 column">
		<div class="Heading">
			<h1 class="Heading__text">Work</h1>
		</div>
	</div>
</div>
<div class="row">
	<div class="small-12 column">
		<section class="Page">
			<?php
			if(have_posts()) {

				get_template_part('templates/content-all');

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