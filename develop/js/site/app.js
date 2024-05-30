let App;

App = {

    hamburgerToggle: function() {
        const hamburger = document.getElementById('hamburger');
        const curtainMenu = document.getElementById('curtain-menu');
        const curtainMenuContent = document.querySelector('.curtain-menu-content');
        if (hamburger && curtainMenu && curtainMenuContent) {
            hamburger.addEventListener('click', function() {
                this.classList.toggle('toggle');
                curtainMenu.classList.toggle('invisible');
                curtainMenu.classList.toggle('opacity-0');
                curtainMenuContent.classList.toggle('!translate-x-0');
                document.body.classList.toggle('overflow-hidden');
            });
        }
    }, 

    shopSearchHandler: function() {
        let inputTimer;
        const searchForm = document.querySelector('#search-container form');
        const searchInput = document.querySelector('#search-container [name="s"]');
        const searchLoader = document.querySelector('#search-container .search-loader');
        const clearButton = document.querySelector('#clear-search');
        const searchContent = document.querySelector('[data-searchproducts]');
        const newsContent = document.querySelector('[data-searchposts]');
        const categoryContent = document.querySelector('[data-searchcategories]');
        const closeButton = document.querySelector('#close-search');

        closeButton.addEventListener('click', function() {
            // Close the Fancybox
            Fancybox.close();
            clearSearch();
        });
    
        searchInput.addEventListener('keyup', function() {
            searchLoader.classList.add('!opacity-100');
            clearButton.classList.add('hidden'); // Hide the 'X' button when loading starts
            clearTimeout(inputTimer);
            inputTimer = setTimeout(function() {
                App.shopSearch();
                setTimeout(() => clearButton.classList.remove('hidden'), 300); // Slight delay to show the 'X' button
            }, 500);
        });
    
        searchForm.addEventListener('submit', function(e) {
            e.preventDefault();
            searchLoader.classList.add('!opacity-100');
            clearButton.classList.add('hidden'); // Hide the 'X' button when loading starts
            App.shopSearch();
            setTimeout(() => clearButton.classList.remove('hidden'), 1000); // Slight delay to show the 'X' button
        });
    
        // Clear search input and results when 'X' button is clicked
        clearButton.addEventListener('click', function() {
            clearSearch();
        });

        function clearSearch() {
            searchInput.value = ''; // Clear the search input
            searchContent.innerHTML = ''; // Clear the product search results
            newsContent.innerHTML = ''; // Clear the news search results
            const productControls = document.querySelector('.search-products-container').previousElementSibling;
            const postControls = document.querySelector('.post-results-container').previousElementSibling;
            productControls.classList.add('invisible');
            postControls.classList.add('invisible');
        }
    },

    shopSearch: function() {
        const searchInput = document.querySelector('#search-container [name="s"]');
        const searchContent = document.querySelector('[data-searchproducts]');
        const newsContent = document.querySelector('[data-searchposts]');
        const categoryContent = document.querySelector('[data-searchcategories]');
        const searchLoader = document.querySelector('#search-container .search-loader');
        const clearButton = document.querySelector('#clear-search');

        const data = new FormData();
        data.append('action', 'barkbites_combined_search');
        data.append('search', searchInput.value);

        fetch(my_ajax_object.ajax_url, {
            method: "POST",
            credentials: 'same-origin',
            body: data
        })
        .then((response) => response.json())
        .then((data) => {
            if (data) {
                const productResults = data.products || '';
                const postResults = data.posts || '';
                const categoryResults = data.categories || ''
                const productControls = document.querySelector('.search-products-container').previousElementSibling;
                const postControls = document.querySelector('.post-results-container').previousElementSibling;
                const categoryControls = document.querySelector('.category-results-container').previousElementSibling;

                searchContent.innerHTML = productResults;
                newsContent.innerHTML = postResults;
                categoryContent.innerHTML = categoryResults;

                // Toggle 'invisible' class based on search results
                productControls.classList.toggle('invisible', productResults.trim() === '');
                postControls.classList.toggle('invisible', postResults.trim() === '');
                categoryControls.classList.toggle('invisible', postResults.trim() === '');

                searchLoader.classList.remove('!opacity-100');
            }
        });
       
    },


    init: function() {
        this.hamburgerToggle();
        this.shopSearchHandler();
    }
};

document.addEventListener("DOMContentLoaded", () => App.init());