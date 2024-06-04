document.addEventListener('DOMContentLoaded', function() {
    const categoryCheckboxes = document.querySelectorAll('.product-category');
    const productsContainer = document.querySelector('.shop-products');

    categoryCheckboxes.forEach(checkbox => {
        checkbox.addEventListener('change', function() {
            filterProducts();
        });
    });

    function filterProducts() {
        const selectedCategories = Array.from(categoryCheckboxes)
            .filter(checkbox => checkbox.checked)
            .map(checkbox => checkbox.value);

        const data = new FormData();
        data.append('action', 'filter_products');
        data.append('nonce', ajax_params.nonce);
        selectedCategories.forEach(category => {
            data.append('categories[]', category);
        });

        fetch(ajax_params.ajax_url, {
            method: 'POST',
            body: data,
        })
        .then(response => response.text())
        .then(html => {
            productsContainer.innerHTML = html;
        })
        .catch(error => {
            console.error('Error:', error);
        });
    }
});
