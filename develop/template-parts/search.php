<div class="w-full lg:max-w-[60%] !text-shop-front-blue" id="search-container" style="display:none;">
    
    <div class="search-container flex flex-col gap-y-8">
        <div class="flex justify-between items-center">
            <h2 class="heading-two">Search</h2>
            <div class="cursor-pointer" id="close-search"><?php include(locate_template('assets/img/global/close.svg'));?></div>
        </div>

        <form class="text-center relative input-container flex justify-center w-full" method="get" action="/" autocomplete="off">
            <?php
            // get a string of comma seperated product names
            $product_names = implode(',', array_map(function($product) {
                return $product->get_name();
            }, wc_get_products(array(
                'limit' => -1,
                'status' => 'publish',
                'orderby' => 'title',
                'order' => 'ASC'
            ))));?>
            <span class="search-loader opacity-0 transition-opacity duration-500 pointer-events-none absolute top-1/2 right-4 bg-[url(assets/img/global/search-loader.gif)] h-[50px] w-[50px] bg-contain -translate-y-1/2"></span>
            <input class="!outline-none bg-transparent text-left w-full border-2 border-grey-300 p-one placeholder:text-[#C2C2C2] text-off-black py-4 px-16" type="text" name="s" placeholder="What are you looking for?" data-suggestions="<?php echo $product_names;?>">
            <button type="button" class="absolute right-4 top-1/2 transform -translate-y-1/2 text-black text-[60px]" id="clear-search"><?php include(locate_template('assets/img/global/refresh.svg'));?></button>
            <button type="button" class="absolute left-4 top-1/2 transform -translate-y-1/2 text-black text-[60px]"><?php include(locate_template('assets/img/global/search.svg'));?></button>
            <span class="search-loader opacity-0 transition-opacity duration-500 pointer-events-none absolute top-1/2 right-4 bg-[url(assets/img/global/loader.gif)] h-[50px] w-[50px] bg-contain -translate-y-1/2"></span>
        </form>

        <div>
            <div class="flex items-center justify-between mb-6 pb-5 border-b-2 custom-border invisible">
                <h3 class="heading-three">Products</h3>
                <a href="<?php echo get_permalink(wc_get_page_id('shop')); ?>" class="font-bold">View all ></a>
            </div>
            <div class="search-products-container grid " data-searchproducts></div>
        </div>
   
        
        <div>
            <div class="controls flex items-center justify-between mb-6 pb-5 border-b-2 custom-border invisible">
                <h3 class="heading-three">Categories</h3>
            </div>
            <div class="category-results-container grid" data-searchcategories></div>
        </div>

      
        
        <div>
            <div class="controls flex items-center justify-between mb-6 pb-5 border-b-2 custom-border invisible">
                <h3 class="heading-three">Insights</h3>
                <a href="<?php echo get_permalink(get_option('page_for_posts')); ?>" class="font-bold">View all ></a>
            </div>
            <div class="post-results-container grid" data-searchposts></div>
        </div>

    </div>

</div>