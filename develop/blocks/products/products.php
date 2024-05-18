<?php
/**
 * Products Block template.
 *
 * @param array $block The block settings and attributes.
 */
$title = get_acf('fp_title');
$text = get_acf('fp_text');
$linkTo = get_acf('link_to_stop_or_category');

$label = get_acf('fp_button_label');
$btnLink = '';

if ($linkTo === 'shop') {
    $btnLink = esc_url(wc_get_page_permalink('shop'));
} elseif ($linkTo === 'category') {
    $btnLink = get_term_link(get_acf('fp_category'));
}


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
    <div class="container ">
        <div class="flex items-center justify-between">
            <?php if ($title): ?>
                <h2 class="heading-two"><?= $title; ?></h2>
            <?php endif; 
            if ($label && $btnLink): ?>
                <a href="<?= $btnLink ?>" class="btn btn-white hidden sm:flex">
                    <?= $label ?>
                </a>
            <?php endif; ?>
        </div>
        <?php if ($text): ?>
            <div class="max-w-[630px] mt-5 text-[15px] sm:text-[22px] leading-snug"><?= $text; ?></div>
        <?php endif; 
        if ($label && $btnLink): ?>
                <a href="<?= $btnLink ?>" class="inline-block btn btn-copper mt-7 sm:hidden">
                    <?= $label ?>
                </a>
        <?php endif; ?>
        
        <div id="products-splide" class="splide overflow-visible mt-12" data-splide='{
            "type": "loop",
            "perPage": 4,
            "perMove": 1,
            "gap": "3vw",
            "pagination": true,
            "arrows": true,
            "pauseOnHover": true,
            "autoplay": false,
            "breakpoints": {
                "1024": {"perPage": 3},
                "768": {"perPage": 2},
                "480": {"perPage": 1, "pagination": true}
            }
        }'>
            <div class="splide__track ">
                <ul class="splide__list">
                    <?php
                        if (have_rows('fp_products')):
                            while (have_rows('fp_products')) : the_row();
                                $product_post = get_sub_field('fp_product');
                                if ($product_post):
                                    setup_postdata($product_post);
                                    global $product; 
                                    ?>
                                    <li class="splide__slide">
                                        <a href="<?php the_permalink($product_post->ID); ?>"  class="product flex flex-col group">
                                            <?php 
                                                if (has_post_thumbnail($product_post->ID)): 
                                            ?>
                                                <div class="product-image w-full h-auto overflow-hidden">
                                                    <?php 
                                                        echo get_the_post_thumbnail($product_post->ID, 'product-square', ['class' => 'post-thumbnail group-hover:scale-110 transition-transform duration-300']);

                                                    ?>
                                                </div>
                                            <?php endif; ?>

                                            <div class="product-content mt-8">
                                                <h4 class="heading-four text-center"><?= get_the_title($product_post->ID); ?></h4>
                                            </div>
                                        </a>
                                    </li>
                                    <?php   
                                    wp_reset_postdata();
                                endif;
                            endwhile;
                        else:
                            echo '<p>No products found.</p>';
                        endif;
                    ?>
                </ul>
            </div>

        
    </div>    
</section>




