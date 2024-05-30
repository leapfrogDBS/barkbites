<?php
/**
 * Hero Block template.
 *
 * @param array $block The block settings and attributes.
 */

// Load values and assign defaults.
$title = get_acf('hero_title') ?: 'Your title here...';
$btn_label = get_acf('hero_button_label');

// Support custom "anchor" values.
$anchor = '';
if (!empty($block['anchor'])) {
    $anchor = 'id="' . esc_attr($block['anchor']) . '" ';
}

// Create class attribute allowing for custom "className" and "align" values.
$class_name = 'hero';
if (!empty($block['className'])) {
    $class_name .= ' ' . $block['className'];
}
?>

<section <?= esc_attr( $anchor ); ?> class="<?= esc_attr( $class_name ); ?> hero-section relative">
    <div class="w-full h-full  object-cover mix-blend-multiply absolute top-0 left-0">
        <div style="background-image: url('<?= get_template_directory_uri(); ?>/assets/img/hero.jpg" class="bg-cover bg-center w-full h-full" alt="Hero Background"></div>
    </div>
    <div class="absolute top-0 left-0 w-full h-full bg-black opacity-40"></div>
    <div class="container"> 
        <div class="flex flex-col items-center justify-center h-full">  
            <!-- Text Content -->
            <h1 class="heading-one text-center text-white max-w-[1013px] z-10 relative slide-up">
                <?php if ($title): ?>
                    <?= do_shortcode($title); ?>
                <?php endif; ?>
            </h1>
            <?php if($btn_label): ?>
                <a href="<?= get_permalink( wc_get_page_id( 'shop' ) ); ?>" class="mt-6 z-10 btn btn-white"><?= $btn_label; ?></a>
            <?php endif; ?>
        </div>
    </div>
</section>




