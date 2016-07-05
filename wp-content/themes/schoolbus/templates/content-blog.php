<?php
while (have_posts()) : the_post()
?>
<div class="Post Post--blog">
	<div class="row">
		<div class="small-12 medium-4 large-3 columns">
			<div class="Post__date">
				<i class="fa fa-calendar-o"></i> <?php the_date(); ?>
			</div>
		</div>
		<div class="small-12 medium-8 large-9 columns">
			<a href="<?php the_permalink(); ?>" class="Post__link Post__link--large">
				<?php the_title(); ?>
			</a>
		</div>
	</div>
</div>
<?php
endwhile;
?>