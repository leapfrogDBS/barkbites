<?php 
    $message = get_acf('promo_messsage', 'option');
    $link = get_acf('promo_link_to', 'option');
?>

<div class="top-bar bg-copper text-white">	
    <div class="container py-1">
        <?php if ($link) : ?>
            <a href="<?= $link['url']; ?>" class="underline">
        <?php endif; ?>
            <h4 class="heading-four text-center font-light"><?= $message; ?></h4>
        <?php if ($link) : ?>
            </a>
        <?php endif; ?>
    </div>
</div>