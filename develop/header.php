<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package barkbites
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<!-- TrustBox script -->
		<script type="text/javascript" src="//widget.trustpilot.com/bootstrap/v5/tp.widget.bootstrap.min.js" async></script>
	<!-- End TrustBox script -->

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'barkbites' ); ?></a>

	<header id="masthead" class="site-header top-0 z-40 sticky shadow-[0_4px_4px_0_rgba(0,0,0,0.25)] bg-white">
		<div class="top-bar bg-copper text-white">	
			<div class="container py-1">
				<h4 class="heading-four text-center">Promotional message</h4>
			</div>
		</div>
		<div class="container flex items-center justify-between z-40 gap-x-6 py-4 sm:py-6">	
			<div class="site-branding z-50">
				<a href="<?php bloginfo('url');?>" class="site-logo">
					<img class="w-[260px]" src="<?php echo get_stylesheet_directory_uri();?>/assets/img/logo.png" alt="<?php bloginfo('name');?> Logo"/>
				</a>
			</div><!-- .site-branding -->

			<div id="menu-right" class="flex items-center gap-x-4 z-50">

				<nav id="site-navigation" class="main-navigation md:flex justify-end mr-4 hidden">
					<?php
						wp_nav_menu(
							array(
								'theme_location' => 'menu-1',
								'container' => false,
								'menu_id' => false,
								'items_wrap' => '<ul class="menu-links flex flex-col md:flex-row items-center flex-wrap gap-y-4 gap-x-8">%3$s</ul>',
								'fallback_cb' => false,
								'depth' => 3,
							)
						);
					?>
				</nav><!-- #site-navigation -->
			
			
				<?php 
					// Basket icon
					if ( function_exists('wc_get_cart_url') ) :?>
					<div>
						<a class="relative block" href="<?php echo wc_get_cart_url();?>">
							<?php include(locate_template('assets/img/global/icon-cart.svg'));?>

							<div class="cart-contents header-cart-count transition-opacity rounded-sm px-1 font-sans absolute text-[10px] font-bold right-1/2 translate-x-1/2 -mr-[4px] bottom-full leading-none
								<?php echo ( WC()->cart->get_cart_contents_count() > 0 ) ? 'opacity-100' : 'opacity-0';?>
								"><?php echo WC()->cart->get_cart_contents_count(); ?>
							</div>
						</a>
						
					</div>
				<?php endif;?>

				<div>
					<button data-searchtoggle class="relative [&_svg]:transition-opacity outline-0 float-left">
						<?php include(locate_template('assets/img/global/icon-search.svg'));?>
					</button>
				</div>

				
					<div id="hamburger" data-navtoggle class="mobile-menu-icon md:hidden z-50">
						<svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" viewBox="0 0 26 26" fill="none">
							<path id="top-line" d="M4.33337 6.5L21.6667 6.5" stroke="#943D24" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
							<path id="middle-line" d="M4.33337 13H21.6667" stroke="#943D24" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
							<path id="bottom-line" d="M4.33337 19.5H21.6667" stroke="#943D24" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
						</svg>
					</div>
				
			</div>

			<div id="curtain-menu" class="curtain-menu invisible fixed inset-0 z-40 opacity-0 transition-[opacity,visibility] duration-300">
				<div class="curtain-menu-content absolute top-0 right-0 h-full w-full bg-white grid place-items-center transition-transform duration-300 ease-in-out translate-x-full">
					<div>
						<?php
						// Get the main WordPress menu
						wp_nav_menu(array(
						'theme_location' => 'menu-1',
						'menu_id'        => 'menu-1',
						'menu_class' => 'text-lg leading-none font-bold flex flex-col gap-y-4 items-center justify-center h-full w-full text-center',
						));
						?>
					</div>
				</div>
			</div>

		</div>
	</header><!-- #masthead -->


	<script>
		let lastScrollTop = 0;
	const header = document.getElementById('masthead'); // Adjust this if your header ID is different

	window.addEventListener("scroll", function(){
	let currentScroll = window.pageYOffset || document.documentElement.scrollTop;
	if (currentScroll > lastScrollTop){
		// Scrolling down
		header.classList.add("hide-header");
	} else {
		// Scrolling up
		header.classList.remove("hide-header");
	}
	lastScrollTop = currentScroll <= 0 ? 0 : currentScroll; // For Mobile or negative scrolling
	}, false);
	</script>