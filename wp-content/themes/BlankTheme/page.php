<?php

get_header();

if (have_posts()) :
	while (have_posts()) : the_post(); ?>
	
	<article class="post">

	

	<?php 

	$args = array(

		'child_of' => $post ->ID,
		'title_li' => ''

		);

   

	?> 

    <?php wp_list_pages($args); ?>


		<h2><?php the_title(); ?></a></h2>
		<?php the_content(); ?>
	</article>
	
	<?php endwhile;
	
	else :
		echo '<p>No content found</p>';
	
	endif;
	
get_footer();

?>