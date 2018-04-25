<?php /* Template Name: Fullpage */ ?>
<?php get_header(); ?>
<main>
	<?php if ( have_posts () ) : while (have_posts()):the_post(); ?>
        <section id="webdoor" style="background-image:url(<?php echo wp_get_attachment_url(get_post_thumbnail_id($post->ID), full); ?>);">
            <div class="container">
                <div class="text-center">
                    <h1><?php echo get_the_title(); ?></h1>
                </div>
            </div>             
        </section>
        <section id="content">
            <div class="container">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <?php the_content(); ?>
                </div>
            </div>
        </section>
        <?php get_template_part( 'form', 'contato' ); ?>
    <?php endwhile; endif; ?>
</main>
<?php get_footer(); ?>