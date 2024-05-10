<?php
/**
* Template Name: Policy Page 
* @package barkbites
*/

get_header();
?>

	<main id="primary" class="site-main policy-template">
        <div class="container space-y-6">
		<?php
            while ( have_posts() ) :
                the_post();

                // display the title of the page    
                the_title( '<h1 class="heading-two">', '</h1>' );

                get_template_part( 'template-parts/content', 'page' );

                // If comments are open or we have at least one comment, load up the comment template.
                if ( comments_open() || get_comments_number() ) :
                    comments_template();
                endif;

            endwhile; // End of the loop.
            ?>
        </div>
	</main><!-- #main -->

<?php
get_footer();
