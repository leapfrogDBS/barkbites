<div class="hidden left-0 right-0 absolute mega-menu-content bg-white shadow-2xl">
    <div class="container">
        <div class="columns-4">
            <?php
            $menu_name = 'mega-menu-categories'; // Replace with your menu's slug
            $locations = get_nav_menu_locations();
            $menu = wp_get_nav_menu_object($locations[$menu_name]);
            $menu_items = wp_get_nav_menu_items($menu->term_id);

            foreach ($menu_items as $item) {
                if ('product_cat' === $item->object) {
                    $category = get_term($item->object_id, 'product_cat');
                    if (!$category) continue;
                    $category_link = get_permalink(wc_get_page_id('shop')) . '?filter_category=' . $category->term_id;

                    echo '<div class="mb-6 break-inside-avoid">';
                    echo '<a href="' . esc_url($category_link) . '" class="text-sm font-medium pb-3">' . esc_html($category->name) . '</a>';

                    echo '</div>';
                }
            }
            ?>
        </div>
    </div>
</div>
<script>
document.addEventListener('DOMContentLoaded', function() {
    var shopMenuItem = document.querySelector('.shop-item');
    var megaMenu = document.querySelector('.mega-menu-content');
    var hideTimeout;

    shopMenuItem.addEventListener('mouseenter', function() {
        clearTimeout(hideTimeout);
        megaMenu.classList.remove('hidden');
        shopMenuItem.classList.add('mega-menu-open'); 
    });

    shopMenuItem.addEventListener('mouseleave', function() {
        hideTimeout = setTimeout(function() {
            if (!megaMenu.matches(':hover')) {
                megaMenu.classList.add('hidden');
                shopMenuItem.classList.remove('mega-menu-open');
            }
        }, 300); // Delay in milliseconds
    });

    megaMenu.addEventListener('mouseenter', function() {
        clearTimeout(hideTimeout);
    });

    megaMenu.addEventListener('mouseleave', function() {
        megaMenu.classList.add('hidden');
        shopMenuItem.classList.remove('mega-menu-open');
    });
});

</script>