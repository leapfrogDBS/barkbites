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
	
	<!-- Hotjar Tracking Code for https://barkbites.co.uk/ -->
	<script>
		(function(h,o,t,j,a,r){
			h.hj=h.hj||function(){(h.hj.q=h.hj.q||[]).push(arguments)};
			h._hjSettings={hjid:3636762,hjsv:6};
			a=o.getElementsByTagName('head')[0];
			r=o.createElement('script');r.async=1;
			r.src=t+h._hjSettings.hjid+j+h._hjSettings.hjsv;
			a.appendChild(r);
		})(window,document,'https://static.hotjar.com/c/hotjar-','.js?sv=');
	</script>

	<!-- Meta Pixel Code -->
	<script>
	!function(f,b,e,v,n,t,s)
	{if(f.fbq)return;n=f.fbq=function(){n.callMethod?
	n.callMethod.apply(n,arguments):n.queue.push(arguments)};
	if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
	n.queue=[];t=b.createElement(e);t.async=!0;
	t.src=v;s=b.getElementsByTagName(e)[0];
	s.parentNode.insertBefore(t,s)}(window, document,'script',
	'https://connect.facebook.net/en_US/fbevents.js');
	fbq('init', '886988296117313');
	fbq('track', 'PageView');
	</script>
	<noscript><img height="1" width="1" style="display:none"
	src="https://www.facebook.com/tr?id=886988296117313&ev=PageView&noscript=1"
	/></noscript>
	<!-- End Meta Pixel Code -->
	
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<?php wp_body_open(); ?>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'barkbites' ); ?></a>

	<header id="masthead" class="site-header top-0 z-40 sticky shadow-[0_4px_4px_0_rgba(0,0,0,0.25)] bg-white">
		<?php if (get_acf('show_promtional_bar', 'option')):?>
			<?php include(locate_template('template-parts/promotional-bar.php'));?>
		<?php endif;?>

		<div class="container flex items-center justify-between z-40 gap-x-6 py-4 sm:py-6">	
			<div class="site-branding z-50">
				<a href="<?php bloginfo('url');?>" class="site-logo">
					<img class="w-[260px]" src="<?= get_stylesheet_directory_uri();?>/assets/img/logo.png" alt="<?php bloginfo('name');?> Logo"/>
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
						<a class="relative block" href="<?= wc_get_cart_url();?>">
							<?php include(locate_template('assets/img/global/icon-cart.svg'));?>

							<div class="cart-contents header-cart-count transition-opacity rounded-sm px-1 font-sans absolute text-[10px] font-bold right-1/2 translate-x-1/2 -mr-[4px] bottom-full leading-none
								<?= ( WC()->cart->get_cart_contents_count() > 0 ) ? 'opacity-100' : 'opacity-0';?>
								"><?= WC()->cart->get_cart_contents_count(); ?>
							</div>
						</a>
						
					</div>
				<?php endif;?>

				<div>
					<a href="#search-container" data-fancybox class="relative [&_svg]:transition-opacity outline-0 float-left">
						<?php include(locate_template('assets/img/global/icon-search.svg'));?>
					</a>
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