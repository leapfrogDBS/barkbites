<?php
/**
 * Products Block template.
 *
 * @param array $block The block settings and attributes.
 */
$title = get_field('fp_title');
$text = get_field('fp_text');
// Support custom "anchor" values.
$anchor = '';
if (!empty($block['anchor'])) {
    $anchor = 'id="' . esc_attr($block['anchor']) . '" ';
}

// Create class attribute allowing for custom "className" and "align" values.
$class_name = 'product-block';
if (!empty($block['className'])) {
    $class_name .= ' ' . $block['className'];
}
?>

<section <?= esc_attr( $anchor ); ?> class="<?= esc_attr( $class_name ); ?> relative">
    <div class="container py-12 md:py-28">
        <div class="flex items-center justify-between">
            <?php if ($title): ?>
                <h2 class="heading-two"><?php echo $title; ?></h2>
            <?php endif; ?>
            <a href="<?php echo esc_url(wc_get_page_permalink('shop')); ?>" class="btn btn-white hidden sm:flex">
                See all products
            </a>
        </div>
        <?php if ($text): ?>
            <div class="max-w-[630px] mt-5 text-[15px] sm:text-[22px] leading-snug"><?php echo $text; ?></div>
        <?php endif; ?>
        <a href="<?php echo esc_url(wc_get_page_permalink('shop')); ?>" class="btn btn-copper mt-7 sm:hidden">
            See all products
        </a>
        <div class="products mt-14 md:mt-20 grid grid-cols-1 sm:grid-cols-3 gap-x-5 gap-y-12">
            <?php
                if (have_rows('fp_products')):
                    while (have_rows('fp_products')) : the_row();
                        $product_post = get_sub_field('fp_product');
                        if ($product_post):
                            setup_postdata($product_post);
                            global $product; 
                            ?>
                            <div class="product flex flex-col justify-between h-full">
                                <?php 
                                    if (has_post_thumbnail($product_post->ID)): 
                                ?>
                                    <div class="product-image w-full h-auto">
                                        <?php 
                                            echo get_the_post_thumbnail($product_post->ID, 'product-square', ['class' => 'post-thumbnail']);

                                        ?>
                                    </div>
                                <?php endif; ?>

                                <div class="product-content mt-8">
                                    <div class="text-off-black flex justify-between">
                                        <h4><?php echo get_the_title($product_post->ID); ?></h4>
                                        <h4 class="self-end"><?php echo $product->get_price_html(); ?></h4>
                                    </div>
                                    <div class="mt-4">
                                        <?php echo apply_filters('woocommerce_short_description', $product->get_short_description()); ?>
                                    </div>
                                    <a href="<?php the_permalink($product_post->ID); ?>" class="btn btn-copper mt-4">
                                        Learn more
                                    </a>
                                </div>
                            </div>
                            <?php   
                            wp_reset_postdata();
                        endif;
                    endwhile;
                else:
                    echo '<p>No products found.</p>';
                endif;
            ?>
        </div>
    </div>    
</section>




