<?php
/**
 * Categories Block template.
 *
 * @param array $block The block settings and attributes.
 */

// Support custom "anchor" values.
$anchor = '';
if (!empty($block['anchor'])) {
    $anchor = 'id="' . esc_attr($block['anchor']) . '" ';
}

// Create class attribute allowing for custom "className" and "align" values.
$class_name = 'categories-block';
if (!empty($block['className'])) {
    $class_name .= ' ' . $block['className'];
}
?>

<section <?= esc_attr( $anchor ); ?> class="<?= esc_attr( $class_name ); ?> relative">

    <div class="container pb-0 max-w-none">

        <h2 class="heading-two text-center mb-6">Browse by benefit</h2>
        <p class="text-lg mb-12 text-center">Find the perfect natural treats for your dog's unique needs. From dental health to natural dewormers, our selection helps keep your furry friend healthy and happy. Explore now and discover the benefits today!</p>

        <div id="categories-splide" class="splide overflow-visible" data-splide='{
            "type": "loop",
            "perPage": 4,
            "perMove": 1,
            "gap": "3vw",
            "pagination": true,
            "arrows": true,
            "pauseOnHover": true,
            "autoplay": false,
            "autoScroll": false,
            "breakpoints": {
                "1024": {"perPage": 3},
                "768": {"perPage": 2},
                "480": {"perPage": 1, "pagination": true}
            }
        }'>
            <div class="splide__track ">
                <ul class="splide__list">
                    <?php
                    $categories = get_terms('product_cat', array('hide_empty' => false, 'parent' => 0));

                    if (empty($categories)) {
                        echo 'No categories found.';
                    } else {
                        foreach ($categories as $category) {
                            $thumbnail_id = get_term_meta($category->term_id, 'thumbnail_id', true);
                            $image = wp_get_attachment_image_src($thumbnail_id, 'product-square');

                            if ($image) {
                                // Generate the URL to the shop page with a category filter
                                $category_link = get_term_link($category->term_id, 'product_cat');

                                echo '<li class="splide__slide">';
                                echo '<a href="' . esc_url($category_link) . '" class="category-image-link group">';
                                echo '<div class="category-image relative group overflow-hidden">';
                                echo '<img class="w-full aspect-square object-cover transition-transform duration-500 ease-in-out transform group-hover:scale-110" src="' . $image[0] . '" alt="' . $category->name . '">';
                                echo '</div>';
                                echo '<div class="category-overlay mt-4 text-center"><span class="overlay-text heading-four text-center">' . $category->name . '</span></div>';
                                echo '</a>';
                                echo '</li>';
                            }
                        }
                    }
                    ?>
                </ul>
            </div>
        </div>
    </div>
</section>




