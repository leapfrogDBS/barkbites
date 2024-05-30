<?php
/**
 * Reviews Block template.
 *
 * @param array $block The block settings and attributes.
 */

// Load values and assign defaults.
$bg = get_field('reviews_background_image');


// Support custom "anchor" values.
$anchor = '';
if (!empty($block['anchor'])) {
    $anchor = 'id="' . esc_attr($block['anchor']) . '" ';
}

// Create class attribute allowing for custom "className" and "align" values.
$class_name = 'reviews';
if (!empty($block['className'])) {
    $class_name .= ' ' . $block['className'];
}
?>

<section <?= esc_attr( $anchor ); ?> class="<?= esc_attr( $class_name ); ?> relative !bg-cover !bg-center" style="background: url(<?= esc_url($bg['url']); ?>)">
    <div class="bg-black absolute inset-0 opacity-40"></div>      
    <div class="container"> 

    <?php 
    // Check rows exists.
    if( have_rows('reviews') ): ?>


        <div id="reviews-splide" class="splide overflow-visible mt-12" data-splide='{
                "type": "loop",
                "perPage": 1,
                "perMove": 1,
                "pagination": false,
                "arrows": false,
                "autoplay" : true,
                "autoScroll": false,
                "pauseOnHover": true
            }'>
            <div class="splide__track w-[80%] max-w-[838px] mx-auto ">
                <ul class="splide__list">
                    <?php
                    // Loop through rows.
                    while( have_rows('reviews') ) : the_row();

                        // Load sub field value.
                        $headline = get_sub_field('headline');
                        $review = get_sub_field('review');
                        $author = get_sub_field('author');
                        echo '<li class="splide__slide text-white text-center flex flex-col justify-center gap-y-6">';
                        echo '<div class="flex item-center justify-center gap-x-2 text-2xl text-[#FFD700]">';
                        echo '<i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i>';
                        echo '</div>';
                        echo '<h2 class="heading-two">'. $headline . '</h2>';
                        echo '<h3 class="text-xl ">"'. $review . '"</h3>';
                        echo '<h4 class="heading-four">'. $author . '</h4>';
                        echo '</li>';

                    endwhile; ?>
                </ul>
            </div>    
        </div>                        
     <?php endif;?>

    </div>
</section>




