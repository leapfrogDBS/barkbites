<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package barkbites
 */

?>

	<footer id="colophon" class="site-footer bg-copper text-white">
		<div class="container py-14 md:pt-20 pb-7 z-0">
			<div class="flex flex-col lg:flex-row gap-14 justify-between">
				<div class="site-branding lg:order-3">
					<a href="<?php bloginfo('url');?>" class="site-logo">
						<img class="w-[200px]" src="<?= get_stylesheet_directory_uri();?>/assets/img/footer/footer-logo.png" alt="<?php bloginfo('name');?> Logo"/>
					</a>
					<div class="flex items-center gap-x-4 mt-6 text-2xl">
						<a href="https://www.facebook.com/people/Bark-Bites-Natural-Treats/100086821017309/"><i class="fa-brands fa-facebook"></i></a>
						<a href="https://www.instagram.com/barkbitesnaturaltreats/"><i class="fa-brands fa-instagram"></i></a>
					</div>
				</div><!-- .site-branding -->

				<div class="contact-details text-[15px] lg:text-[16px] flex flex-col gap-y-5 md:order-1">
					<h4 class="font-medium text-2xl">Contact Us</h4>
					<div class="phone flex gap-x-5">
						<?php include(locate_template('assets/img/footer/phone.svg'));?>
						<a href="tel:01708 855 777">07399061063</a>
					</div>
					<div class="email flex gap-x-5">
						<?php include(locate_template('assets/img/footer/mail.svg'));?>
						<a href="mailto:info@barkbites.co.uk">info@barkbites.co.uk</a>
					</div>
					<div class="location flex gap-x-5">
						<?php include(locate_template('assets/img/footer/location-marker.svg'));?>
						<span>Bark Bites Ltd<br>42 Medway<br>Crowborough<br>East Sussex<br>TN6 2DN</span>
					</div>
				</div>

				<?php if( have_rows('useful_links', 'option') ): ?>
					<div class="useful-links text-[15px] lg:text-[16px] tracking-[-0.32px] flex flex-col gap-y-5 md:order-2">
						<h4 class="font-medium text-2xl">Useful Links</h4>
						<div class="links grid grid-cols-3 underline gap-y-2.5 gap-x-10">
							<?php while( have_rows('useful_links', 'option') ): the_row(); 
								$post_object = get_sub_field('page_link');
								if( $post_object ): 
									// Get the post object and then retrieve the title and permalink
									$post = $post_object;
									setup_postdata( $post ); ?>

									<a href="<?= esc_url( get_permalink() ); ?>"><?php the_title(); ?></a>

									<?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
								<?php endif; ?>
							<?php endwhile; ?>
						</div>
					</div>
				<?php endif; ?>

			
			</div>
			<?php if( have_rows('policy_pages', 'option') ): ?>										
				<div class="policy-links flex items-center justify-between gap-6 flex-wrap underline text-[14px] my-12">
					<?php while( have_rows('policy_pages', 'option') ): the_row(); 
						$post_object = get_sub_field('policy_page');
						if( $post_object ): 
							// Get the post object and then retrieve the title and permalink
							$post = $post_object;
							setup_postdata( $post ); ?>

							<a href="<?= esc_url( get_permalink() ); ?>"><?php the_title(); ?></a>

							<?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
						<?php endif; ?>
					<?php endwhile; ?>
				</div>
			<?php endif; ?>

			<div class="credit text-sm mt-14 md:flex md:justify-between">
				<p class="text-white">Copyright &copy; <?= date('Y'); ?> Bark Bites Ltd</p>
				<p class="mt-0 text-white">Site by <a href="https://www.leapfrogdbs.co.uk/" class="underline">Leapfrog Digital Business Solutions</a></p>
			</div>

		</div>
		
		<div id="lightbox" class="hidden fixed inset-0 z-50 flex items-center justify-center p-4 bg-black bg-opacity-75">
    <!-- Close button outside the video container -->
    <span class="absolute top-32 right-4 text-white text-4xl font-bold cursor-pointer z-60 lightbox-close">&times;</span>
    
    <div class="relative w-full max-w-3xl" style="padding-top: 56.25%;">
        <iframe id="lightbox-video" class="absolute top-0 left-0 w-full h-full z-50" frameborder="0" allowfullscreen></iframe>
    </div>
</div>
		
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php get_template_part('template-parts/search'); ?>

<?php wp_footer(); ?>

</body>
</html>
