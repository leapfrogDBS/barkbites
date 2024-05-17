<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package barkbites
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<header class="entry-header">

		<?php
		// Get the post thumbnail URL
		$thumbnail_url = get_the_post_thumbnail_url();

		if ($thumbnail_url) :
		// Output the div with the background image and the post title
		echo '<div class="h-64 w-full flex items-center justify-center bg-center bg-cover container relative" style="background-image: url(\'' . esc_url($thumbnail_url) . '\');">';
		echo '<div class="absolute inset-0 bg-black opacity-30 z-10"></div>';
			the_title('<h2 class="entry-title text-white heading-two z-20 text-center">', '</h2>');
		echo '</div>';
		else :
			// Display the post title
			the_title('<h2 class="entry-title heading-two text-charcoal my-24">', '</h2>');
		endif;
		?>
		<?php

		if ( 'post' === get_post_type() ) :
			?>
		<?php endif; ?>
	</header><!-- .entry-header -->

	

	<div class="entry-content">
		<div class="container text-content">
			<?php
			the_content(
				sprintf(
					wp_kses(
						/* translators: %s: Name of current post. Only visible to screen readers */
						__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'barkbites' ),
						array(
							'span' => array(
								'class' => array(),
							),
						)
					),
					wp_kses_post( get_the_title() )
				)
			);

			wp_link_pages(
				array(
					'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'barkbites' ),
					'after'  => '</div>',
				)
			);
			?>
		</div>
	</div><!-- .entry-content -->


</article><!-- #post-<?php the_ID(); ?> -->
