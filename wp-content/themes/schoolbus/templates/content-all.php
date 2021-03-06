<div class="row small-up-1 medium-up-2 large-up-3">
	<?php
	while (have_posts()) : the_post()
	?>
		<div class="columns">
			<div class="Post">
				<a class="Post__thumbnail" href="<?php the_permalink(); ?>">
					<?php the_post_thumbnail('post-thumbnail', ['class'=> 'Post__image']); ?>
				</a>
				<h2 class="Post__title">
					<a href="<?php the_permalink(); ?>" class="Post__link"><?php the_title(); ?></a>
				</h2>
				<div class="Post__meta">
					<?php the_excerpt(); ?>
				</div>
			</div>
		</div>
	<?php
	endwhile;
	?>
</div>