<?php
/**
 * Contact Block template.
 *
 * @param array $block The block settings and attributes.
 */

// Load values and assign defaults.
$cf_code = get_field('contact_form_shortcode');



// Support custom "anchor" values.
$anchor = '';
if (!empty($block['anchor'])) {
    $anchor = 'id="' . esc_attr($block['anchor']) . '" ';
}

// Create class attribute allowing for custom "className" and "align" values.
$class_name = 'contact';
if (!empty($block['className'])) {
    $class_name .= ' ' . $block['className'];
}
?>

<section <?= esc_attr( $anchor ); ?> class="<?= esc_attr( $class_name ); ?> relative">
    <div class="container py-6 space-y-12"> 
        <h1 class="heading-one">Contact</h1>
        <?php if ($cf_code): ?>
            <?= do_shortcode($cf_code); ?>
        <?php endif; ?>
        </div>
    </div>
</section>




