<?php
/**
 * Hero Block template.
 *
 * @param array $block The block settings and attributes.
 */

// Load values and assign defaults.
$title = get_field('hero_title') ?: 'Your title here...';

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

<section <?= esc_attr( $anchor ); ?> class="<?= esc_attr( $class_name ); ?> hero-section bg-[#302B5F] min-h-screen md:h-screen relative">
    <div class="container grid md:grid-cols-2 items-center gap-x-24 gap-y-12 h-full"> 
        <div class="flex flex-col items-center justify-center h-full">  
            <!-- Text Content -->
            <div class="flex heading-four">
                <div id="typewriter" class="text-turquoise">&nbsp;</div>
            </div>
            <div class="heading-one text-center text-white max-w-[1013px] z-10 relative slide-up">
                <?php if ($title): ?>
                    <?= do_shortcode($title); ?>
                <?php endif; ?>
            </div>
            <a href="#" class="btn-purple mt-6 throb-element" onclick="Calendly.initPopupWidget({url: 'https://calendly.com/leapfrogdbs/15-minute-consultation'});return false;">Let's talk</a>
            <div class="scroll-to-next cursor-pointer mt-[7vh] z-40">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                    <path d="M19 14L12 21M12 21L5 14M12 21L12 3" stroke="#45E8C9" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
            </div>
        </div>
        <div class="h-2/3 max-w-[600px] md:max-w-none md:w-full mx-auto">
            <div class="flex items-end h-full relative">
                <div class="vertical-rect h-full w-[40px] sm:w-[65px] bg-turquoise text-white rotate-anticlock flex flex-col items-center justify-evenly text-2xl md:text-4xl">
                    <a href="https://github.com/leapfrogDBS" target="_blank"><i class="fa-brands fa-github hover:text-purple"></i></a>
                    <a href="https://www.linkedin.com/in/david-mcdonagh/" target="_blank"><i class="fa-brands fa-linkedin hover:text-purple"></i></a>
                    <a href="mailto:david@leapfrogdbs.co.uk" target="_blank"><i class="fa-solid fa-envelope hover:text-purple"></i></a>
                    <a href="#" target="_blank"><i class="fa-solid fa-calendar hover:text-purple"></i></a>
                </div>
                <img class="h-[300px] sm:h-[400px] md:h-[55vh] w-auto rotate-me" src="<?= get_template_directory_uri(); ?>/assets/img/davidmcdonagh.png">
            </div>
            <div class="horizontal-rect h-[40px] sm:h-[50px] w-full bg-purple rotate-clock"></div>
        </div>
    </div>
</section>




