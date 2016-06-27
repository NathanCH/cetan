<div class="row small-up-1 medium-up-2 large-up-3">
	<?php
	query_posts('posts_per_page=3&cat=3');

	while (have_posts()) : the_post()
	?>
		<div class="columns">
			<div class="Post">
				<a href="<?php the_permalink(); ?>">
				<?php the_post_thumbnail('post-thumbnail', ['class'=> 'Post__image']); ?>
				</a>
				<h2 class="Post__title">
					<a href="<?php the_permalink(); ?>" class="Post__link"><?php the_title(); ?></a>
				</h2>
				<div class="Post__Meta">
					<?php the_excerpt(); ?>
				</div>
			</div>
		</div>
	<?php
	endwhile;
	?>
</div>