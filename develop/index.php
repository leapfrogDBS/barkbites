<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package barkbites
 */

get_header();

$posts_page_id = get_option('page_for_posts');

// Fetch the post object of the "Posts page"
$posts_page = get_post($posts_page_id);

// Fetch the title of the "Posts page"
$posts_page_title = get_the_title($posts_page_id);

// Retrieve the content of the "Posts page"
$posts_page_content = apply_filters('the_content', $posts_page->post_content);

?>

	<main id="primary" class="site-main">
		<div class="container space-y-10">
		<?php if ($posts_page_title): ?>
			<header class="page-header">
				<h1 class="page-title heading-one text-center"><?= $posts_page_title; ?></h1>
			</header>
		<?php endif;
			if ($posts_page_content): ?>
			<div class="page-content">
				<?= $posts_page_content; ?>
			</div>
		<?php endif; ?>
			
			<?php
			
			if ( have_posts() ) : ?>

			<div class="grid grid-cols-2 md:grid-cols-4 gap-12">
				
			<?php	/* Start the Loop */
				while ( have_posts() ) :
					
					the_post();

					/*
					* Include the Post-Type-specific template for the content.
					* If you want to override this in a child theme, then include a file
					* called content-___.php (where ___ is the Post Type name) and that will be used instead.
					*/
					get_template_part( 'template-parts/content', 'summary' );

				endwhile;

				?>
				</div>
				<?php

			else :

				get_template_part( 'template-parts/content', 'none' );

			endif;
			?>
			</div>
	</main><!-- #main -->

<?php
get_footer();
