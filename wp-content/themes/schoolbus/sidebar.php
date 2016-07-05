<aside class="Sidebar">
	<?php
	if(is_page('Contact'))
	{
		dynamic_sidebar( 'Contact-Sidebar' ); 
	}

	else{
		dynamic_sidebar( 'About-Sidebar' ); 
	}
	?>
</aside>