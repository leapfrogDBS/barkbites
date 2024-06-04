<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/archive-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 8.6.0
 */

$filtered_category = isset($_GET['filter_category']) ? $_GET['filter_category'] : '';

defined( 'ABSPATH' ) || exit;

get_header( 'shop' );

get_template_part('template-parts/hero-sections/standard-hero');

/**
 * Hook: woocommerce_before_main_content.
 *
 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
 * @hooked woocommerce_breadcrumb - 20
 * @hooked WC_Structured_Data::generate_website_data() - 30
 */
do_action( 'woocommerce_before_main_content' );

/**
 * Hook: woocommerce_shop_loop_header.
 *
 * @since 8.6.0
 *
 * @hooked woocommerce_product_taxonomy_archive_header - 10
 */
do_action( 'woocommerce_shop_loop_header' );

?>
<section class="shop-page-items">
	
	<div class="flex justify-between gap-x-12 !mt-0 pt-8 md:border-t-2 custom-border">
		
		<div class="hidden md:block shop-filers-container sticky top-[var(--dynamic-top-offset)] h-screen overflow-auto w-1/3 pb-24">
			<div class="shop-filters">
				<div class="filter-group">
					<div class="accordion-button">
						<h3 class="filter-title heading-three">Browse by benefit</h3>
					</div>
					<div class="filters-container category-filter">
						<div class="filter-terms">
							<?php
							$terms = get_terms('product_cat', array('hide_empty' => true, 'parent' => 0));
							foreach ($terms as $term) {
								echo '<div class="filter-checkbox">';
								echo '<input type="checkbox" id="cat_' . $term->term_id . '" class="product-category" value="' . $term->term_id . '">';
								echo '<label for="cat_' . $term->term_id . '">' . $term->name . '</label>';
								echo '</div>';
							}
							?>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="shop-products w-full md:w-2/3">

			<?php



			if ( woocommerce_product_loop() ) {

				/**
				 * Hook: woocommerce_before_shop_loop.
				 *
				 * @hooked woocommerce_output_all_notices - 10
				 * @hooked woocommerce_result_count - 20
				 * @hooked woocommerce_catalog_ordering - 30
				 */
				do_action( 'woocommerce_before_shop_loop' );
				

				woocommerce_product_loop_start();

				if ( wc_get_loop_prop( 'total' ) ) {
					while ( have_posts() ) {
						the_post();

						/**
						 * Hook: woocommerce_shop_loop.
						 */
						do_action( 'woocommerce_shop_loop' );

						wc_get_template_part( 'content', 'product' );
					}
				}

				woocommerce_product_loop_end();

				/**
				 * Hook: woocommerce_after_shop_loop.
				 *
				 * @hooked woocommerce_pagination - 10
				 */
				do_action( 'woocommerce_after_shop_loop' );
			} else {
				/**
				 * Hook: woocommerce_no_products_found.
				 *
				 * @hooked wc_no_products_found - 10
				 */
				do_action( 'woocommerce_no_products_found' );
			}
		?>
		</div>
	</div>
</section>

<?php

/**
 * Hook: woocommerce_after_main_content.
 *
 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
 */
do_action( 'woocommerce_after_main_content' );

/**
 * Hook: woocommerce_sidebar.
 *
 * @hooked woocommerce_get_sidebar - 10
 */
do_action( 'woocommerce_sidebar' );

get_footer( 'shop' );

?>

<script>
document.addEventListener('DOMContentLoaded', function() {
   
	var filteredCategory = "<?php echo esc_js($filtered_category); ?>";

	if (filteredCategory) {
		var parentCheckbox = document.querySelector('.product-category[value="' + filteredCategory + '"]');
		if (parentCheckbox) {
			parentCheckbox.checked = true;
		}
	}
});

</script>

<?php