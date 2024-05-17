<?php
/**
 * WooCommerce Compatibility File
 *
 * @link https://woocommerce.com/
 *
 * @package barkbites
 */

/**
 * WooCommerce setup function.
 *
 * @link https://docs.woocommerce.com/document/third-party-custom-theme-compatibility/
 * @link https://github.com/woocommerce/woocommerce/wiki/Enabling-product-gallery-features-(zoom,-swipe,-lightbox)
 * @link https://github.com/woocommerce/woocommerce/wiki/Declaring-WooCommerce-support-in-themes
 *
 * @return void
 */
function barkbites_woocommerce_setup() {
	add_theme_support(
		'woocommerce',
		array(
			'thumbnail_image_width' => 150,
			'single_image_width'    => 300,
			'product_grid'          => array(
				'default_rows'    => 3,
				'min_rows'        => 1,
				'default_columns' => 4,
				'min_columns'     => 1,
				'max_columns'     => 6,
			),
		)
	);
	add_theme_support( 'wc-product-gallery-zoom' );
	add_theme_support( 'wc-product-gallery-lightbox' );
	add_theme_support( 'wc-product-gallery-slider' );
}
add_action( 'after_setup_theme', 'barkbites_woocommerce_setup' );

/**
 * WooCommerce specific scripts & stylesheets.
 *
 * @return void
 */
function barkbites_woocommerce_scripts() {
	
	$font_path   = WC()->plugin_url() . '/assets/fonts/';
	$inline_font = '@font-face {
			font-family: "star";
			src: url("' . $font_path . 'star.eot");
			src: url("' . $font_path . 'star.eot?#iefix") format("embedded-opentype"),
				url("' . $font_path . 'star.woff") format("woff"),
				url("' . $font_path . 'star.ttf") format("truetype"),
				url("' . $font_path . 'star.svg#star") format("svg");
			font-weight: normal;
			font-style: normal;
		}';

	wp_add_inline_style( 'barkbites-woocommerce-style', $inline_font );
}
add_action( 'wp_enqueue_scripts', 'barkbites_woocommerce_scripts' );

/**
 * Disable the default WooCommerce stylesheet.
 *
 * Removing the default WooCommerce stylesheet and enqueing your own will
 * protect you during WooCommerce core updates.
 *
 * @link https://docs.woocommerce.com/document/disable-the-default-stylesheet/
 */
add_filter( 'woocommerce_enqueue_styles', '__return_empty_array' );

/**
 * Add 'woocommerce-active' class to the body tag.
 *
 * @param  array $classes CSS classes applied to the body tag.
 * @return array $classes modified to include 'woocommerce-active' class.
 */
function barkbites_woocommerce_active_body_class( $classes ) {
	$classes[] = 'woocommerce-active';

	return $classes;
}
add_filter( 'body_class', 'barkbites_woocommerce_active_body_class' );

/**
 * Related Products Args.
 *
 * @param array $args related products args.
 * @return array $args related products args.
 */
function barkbites_woocommerce_related_products_args( $args ) {
	$defaults = array(
		'posts_per_page' => 3,
		'columns'        => 3,
	);

	$args = wp_parse_args( $defaults, $args );

	return $args;
}
add_filter( 'woocommerce_output_related_products_args', 'barkbites_woocommerce_related_products_args' );

/**
 * Remove default WooCommerce wrapper.
 */
remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10 );
remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10 );

if ( ! function_exists( 'barkbites_woocommerce_wrapper_before' ) ) {
	/**
	 * Before Content.
	 *
	 * Wraps all WooCommerce content in wrappers which match the theme markup.
	 *
	 * @return void
	 */
	function barkbites_woocommerce_wrapper_before() {
		?>
			<main id="primary" class="site-main">
		<?php
	}
}
add_action( 'woocommerce_before_main_content', 'barkbites_woocommerce_wrapper_before' );

if ( ! function_exists( 'barkbites_woocommerce_wrapper_after' ) ) {
	/**
	 * After Content.
	 *
	 * Closes the wrapping divs.
	 *
	 * @return void
	 */
	function barkbites_woocommerce_wrapper_after() {
		?>
			</main><!-- #main -->
		<?php
	}
}
add_action( 'woocommerce_after_main_content', 'barkbites_woocommerce_wrapper_after' );

/**
 * Sample implementation of the WooCommerce Mini Cart.
 *
 * You can add the WooCommerce Mini Cart to header.php like so ...
 *
	<?php
		if ( function_exists( 'barkbites_woocommerce_header_cart' ) ) {
			barkbites_woocommerce_header_cart();
		}
	?>
 */

if ( ! function_exists( 'barkbites_woocommerce_cart_link_fragment' ) ) {
	/**
	 * Cart Fragments.
	 *
	 * Ensure cart contents update when products are added to the cart via AJAX.
	 *
	 * @param array $fragments Fragments to refresh via AJAX.
	 * @return array Fragments to refresh via AJAX.
	 */
	function barkbites_woocommerce_cart_link_fragment( $fragments ) {
		ob_start();
		barkbites_woocommerce_cart_link();
		$fragments['a.cart-contents'] = ob_get_clean();

		return $fragments;
	}
}
add_filter( 'woocommerce_add_to_cart_fragments', 'barkbites_woocommerce_cart_link_fragment' );

if ( ! function_exists( 'barkbites_woocommerce_cart_link' ) ) {
	/**
	 * Cart Link.
	 *
	 * Displayed a link to the cart including the number of items present and the cart total.
	 *
	 * @return void
	 */
	function barkbites_woocommerce_cart_link() {
		?>
		<a class="cart-contents" href="<?= esc_url( wc_get_cart_url() ); ?>" title="<?php esc_attr_e( 'View your shopping cart', 'barkbites' ); ?>">
			<?php
			$item_count_text = sprintf(
				/* translators: number of items in the mini cart. */
				_n( '%d item', '%d items', WC()->cart->get_cart_contents_count(), 'barkbites' ),
				WC()->cart->get_cart_contents_count()
			);
			?>
			<span class="amount"><?= wp_kses_data( WC()->cart->get_cart_subtotal() ); ?></span> <span class="count"><?= esc_html( $item_count_text ); ?></span>
		</a>
		<?php
	}
}

if ( ! function_exists( 'barkbites_woocommerce_header_cart' ) ) {
	/**
	 * Display Header Cart.
	 *
	 * @return void
	 */
	function barkbites_woocommerce_header_cart() {
		if ( is_cart() ) {
			$class = 'current-menu-item';
		} else {
			$class = '';
		}
		?>
		<ul id="site-header-cart" class="site-header-cart">
			<li class="<?= esc_attr( $class ); ?>">
				<?php barkbites_woocommerce_cart_link(); ?>
			</li>
			<li>
				<?php
				$instance = array(
					'title' => '',
				);

				the_widget( 'WC_Widget_Cart', $instance );
				?>
			</li>
		</ul>
		<?php
	}
}


/* Remove Sidebar from Woocommerce Pages */
remove_action( 'woocommerce_sidebar', 'woocommerce_get_sidebar', 10 );


// Remove existing WooCommerce hooks
function theme_customize_product_summary() {
    // Remove breadcrumbs from original position
    remove_action('woocommerce_before_main_content', 'woocommerce_breadcrumb', 20);

    // Remove the original add to cart form to reposition it later
    remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 30);

	// Remove the original product rating to reposition it later
    remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_rating', 10);
}

add_action('init', 'theme_customize_product_summary');

// Re-hook the breadcrumbs to appear above the title
add_action('woocommerce_single_product_summary', 'woocommerce_breadcrumb', 4);

// Add the custom product description after the title
add_action('woocommerce_single_product_summary', 'custom_product_description', 11);

// Re-hook the add to cart form to appear after the description
add_action('woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 21);

// Re-hook the product rating to appear at the bottom of the summary
add_action('woocommerce_single_product_summary', 'woocommerce_template_single_rating', 25);

function custom_product_description() {
    global $post;
    echo '<div class="woocommerce-product-details__description my-6">';
    the_content();
    echo '</div>';
}

/* Remove Product Tabs - Conditionaly show reviews if there are any for the product */
add_filter( 'woocommerce_product_tabs', 'theme_modify_product_tabs_show_reviews', 98 );

function theme_modify_product_tabs_show_reviews( $tabs ) {
    global $product;

    // Only keep the 'reviews' tab if there are reviews
    if ( $product->get_review_count() == 0 ) {
        unset($tabs['reviews']);
    }

    // Unset other unwanted tabs
    unset($tabs['description']);
    unset($tabs['additional_information']);

    return $tabs;
}




/* Remove add to cart button from related products */
add_action( 'woocommerce_after_shop_loop_item', 'remove_related_products_add_to_cart', 1 );

function remove_related_products_add_to_cart() {
    if (is_product()) {
        remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart');
    }
}

/*Remove add to cart from category and shop page */
add_action( 'woocommerce_after_shop_loop_item', 'remove_add_to_cart_buttons', 1 );
function remove_add_to_cart_buttons() {
  if (is_product_category() || is_shop()) {
    remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart' );
  }
}

/* Show all products on the shop and category pages - wihtout pagination */
add_filter( 'loop_shop_per_page', 'show_all_products_on_shop_page', 20 );
function show_all_products_on_shop_page() {
  return -1;  // -1 means show all products
}

/* Apply shipping rates based on cart weight */
add_filter( 'woocommerce_package_rates', 'quadlayers_woocommerce_tiered_shipping', 9999, 2 );
function quadlayers_woocommerce_tiered_shipping( $rates, $package ) {
if ( WC()->cart->get_cart_contents_weight() < 2000 ) {
if ( isset( $rates['flat_rate:4'] ) ) unset( $rates['flat_rate:5'], $rates['flat_rate:6'] );
} elseif ( WC()->cart->get_cart_contents_weight() < 10000 ) {
if ( isset( $rates['flat_rate:5'] ) ) unset( $rates['flat_rate:4'], $rates['flat_rate:6'] );
} else {
if ( isset( $rates['flat_rate:6'] ) ) unset( $rates['flat_rate:4'], $rates['flat_rate:5'] );
}
return $rates;
}


// Use custom image size for WooCommerce thumbnails
function mytheme_custom_woocommerce_thumbnail_size() {
    return array(
        'width'  => 450,
        'height' => 450,
        'crop'   => 1,
    );
}
add_filter('woocommerce_get_image_size_thumbnail', 'mytheme_custom_woocommerce_thumbnail_size');

// Use custom image size for WooCommerce single product images