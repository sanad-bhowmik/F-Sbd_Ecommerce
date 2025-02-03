<div class="card-columns">
    @foreach ($categories->childrenCategories as $key => $category)
        @php
            // Fetch products for the category
            $products = $category->products()->where('approved', 1)->where('published', 1)->get();
        @endphp
        <div class="card shadow-none border-0">
            <ul class="list-unstyled mb-3">
                <li class="fs-14 fw-700 mb-3">
                    <a href="javascript:void(0);" class="text-reset hov-text-primary"
                        onmouseenter="loadCategoryProducts(this, @json($products))">
                        {{ $category->getTranslation('name') }}
                    </a>
                </li>
                @if($category->childrenCategories->count())
                    @foreach ($category->childrenCategories as $key => $child_category)
                        <li class="mb-2 fs-14 pl-2">
                            <a href="javascript:void(0);" class="text-reset hov-text-primary animate-underline-primary"
                                onmouseenter="loadCategoryProducts(this, @json($child_category->products))">
                                {{ $child_category->getTranslation('name') }}
                            </a>
                        </li>
                    @endforeach
                @endif
            </ul>
            <div class="sub-cat-menu c-scrollbar-light border p-4 shadow-none">
                <div class="c-preloader text-center absolute-center">
                    <i class="las la-spinner la-spin la-3x opacity-70"></i>
                </div>
                <div class="product-list-container"></div>
            </div>
        </div>
    @endforeach
</div>

<script>
    function loadCategoryProducts(categoryElement, products) {
        const subCatMenu = categoryElement.closest('.card').querySelector('.sub-cat-menu');
        const preloader = subCatMenu.querySelector('.c-preloader');
        const productListContainer = subCatMenu.querySelector('.product-list-container');

        // Show the preloader while loading
        preloader.style.display = 'block';

        // Clear the previous product list
        productListContainer.innerHTML = '';

        // Check if there are products
        if (Array.isArray(products) && products.length > 0) {
            // Create the list of products dynamically
            products.forEach(product => {
                // Create a product card
                const productCard = document.createElement('div');
                productCard.classList.add('card', 'mb-3', 'shadow-none', 'border');

                productCard.innerHTML = `
                    <img src="${product.image ? my_asset(product.image) : '/assets/img/placeholder.jpg'}"
                         class="card-img-top" alt="${product.name}" width="100%">
                    <div class="card-body">
                        <h5 class="card-title fs-14 text-center">${product.name}</h5>
                        <a href="/products/${product.slug}" class="btn btn-primary btn-sm btn-block">View Details</a>
                    </div>
                `;

                productListContainer.appendChild(productCard);
            });
        } else {
            productListContainer.innerHTML = '<p>No products available</p>';
        }

        // Hide the preloader once products are loaded
        preloader.style.display = 'none';
    }

    // Ensure data is loaded correctly after hover event
    document.addEventListener('DOMContentLoaded', function () {
        const categories = document.querySelectorAll('.category-nav-element');
        categories.forEach(category => {
            category.addEventListener('mouseenter', function () {
                const subCatMenu = category.querySelector('.sub-cat-menu');
                if (subCatMenu) {
                    const preloader = subCatMenu.querySelector('.c-preloader');
                    const productListContainer = subCatMenu.querySelector('.product-list-container');
                    if (productListContainer && productListContainer.innerHTML === '') {
                        // If products are not loaded yet, trigger the load action
                        loadCategoryProducts(category, @json($category->products));
                    }
                }
            });
        });
    });
</script>
