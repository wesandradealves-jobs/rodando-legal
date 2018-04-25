<?php get_header(); ?>
<main>
	<?php 

		if ( have_posts () ) : while (have_posts()):the_post(); 

			if(is_front_page()||$post->post_name=="blog") :

				include(get_template_directory()."/".get_post( $post )->post_name.".php");

			else : ?>
			<section id="webdoor" style="background-image:url(<?php echo wp_get_attachment_url(get_post_thumbnail_id($post->ID), full); ?>);">
				<div class="container">
					<div class="text-center">
						<h1><?php echo get_the_title(); ?></h1>
					</div>
				</div>             
			</section>
		<?php

				the_content(); 

			endif;

		endwhile; 

		endif;

	?>
</main>
<?php get_footer(); ?>