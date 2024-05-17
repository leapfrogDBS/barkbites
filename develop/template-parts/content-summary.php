<div class="flex flex-col h-full">
    <?php if (has_post_thumbnail()): ?>
        <div class="post-image mb-8">
            <?php the_post_thumbnail('custom-size', ['class' => 'post-thumbnail']); ?>
        </div>
    <?php endif; ?>
    <div class="post-title">
        <h4 class="heading-four"><?php the_title(); ?></h4>
    </div>
    <div class="post-excerpt mt-6 text-[18px] hidden md:block">
        <?php the_excerpt(); ?>
    </div>
    <a href="<?php the_permalink(); ?>" class="btn btn-copper mt-4 self-start">
        Read more
    </a>
</div>