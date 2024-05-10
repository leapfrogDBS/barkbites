<?php
/**
 * News Block template.
 *
 * @param array $block The block settings and attributes.
 */
// Check if 'all_categories' is true/false
$all_categories = get_field('all_categories');

// Get the selected category term ID
$selected_category_id = get_field('posts_section_category');

// Fetch additional fields
$button_label = get_field('posts_section_button_label');
$section_title = get_field('posts_section_heading');
$section_text = get_field('posts_section_text');

// Default args for WP_Query
$args = array(
    'post_type' => 'post',
    'posts_per_page' => 4, // Adjust the number of posts you'd like to display
);

// If 'all_categories' is not checked and there is a selected category
if (!$all_categories && $selected_category_id) {
    // Get the category slug from the term ID
    $category = get_term($selected_category_id);
    if ($category && !is_wp_error($category)) {
        $args['category_name'] = $category->slug;
    }
}

// The Query
$the_query = new WP_Query($args);


// Define the blog page URL
$blog_page_url = get_permalink(get_option('page_for_posts'));

// Define the button link
$button_link = $all_categories ? $blog_page_url : $blog_page_url . '?category=' . $selected_category_id;

// Support custom "anchor" values.
$anchor = '';
if (!empty($block['anchor'])) {
    $anchor = 'id="' . esc_attr($block['anchor']) . '" ';
}

// Create class attribute allowing for custom "className" and "align" values.
$class_name = 'news';
if (!empty($block['className'])) {
    $class_name .= ' ' . $block['className'];
}
?>

<section <?= esc_attr( $anchor ); ?> class="<?= esc_attr( $class_name ); ?> relative">
    <div class="container">
        <div class="flex items-center justify-between">
            <?php if ($section_title): ?>
                <h2 class="heading-two"><?php echo esc_html($section_title); ?></h2>
            <?php endif; ?>
            <?php if ($button_label): ?>
                <a href="<?php echo esc_url($button_link); ?>" class="btn btn-copper hidden sm:flex">
                    <?php echo esc_html($button_label); ?>
                </a>
            <?php endif; ?>
        </div>
        <?php if ($section_text): ?>
            <p class="max-w-[630px] mt-5"><?php echo esc_html($section_text); ?></p>
        <?php endif; ?>
        <a href="<?php echo esc_url($button_link); ?>" class="btn btn-copper mt-7 sm:hidden">
            <?php echo esc_html($button_label); ?>
        </a>

        <div class="posts mt-8 md:mt-20 grid grid-cols-2 md:grid-cols-4 gap-5">
            <?php if ($the_query->have_posts()) : ?>
                <?php while ($the_query->have_posts()) : $the_query->the_post(); ?>
                    <div class="post-item flex flex-col justify-between h-full">
                        <?php if (has_post_thumbnail()): ?>
                            <div class="post-image mb-8">
                                <?php the_post_thumbnail('custom-size', ['class' => 'post-thumbnail']); ?>
                            </div>
                        <?php endif; ?>
                        <div class="post-title">
                            <h4><?php the_title(); ?></h4>
                        </div>
                        <div class="post-excerpt mt-6 text-[18px] hidden md:block">
                            <?php the_excerpt(); ?>
                        </div>
                        <a href="<?php the_permalink(); ?>" class="btn btn-copper mt-4 self-start">
                            Read more
                        </a>
                    </div>
                <?php endwhile; ?>
                <?php wp_reset_postdata(); ?>
            <?php else : ?>
                <p>No posts found.</p>
            <?php endif; ?>
        </div>
    </div>
</section>




