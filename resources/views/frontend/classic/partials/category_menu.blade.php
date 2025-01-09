<div class="aiz-category-menu bg-white rounded-0 border-top" id="category-sidebar" style="width:270px;">
    <ul class="list-unstyled categories no-scrollbar mb-0 text-left">
        @foreach (get_level_zero_categories()->take(10) as $key => $category)
                @php
                    $category_name = $category->getTranslation('name');
                    // Fetch products for the category
                    $products = $category->products()->where('approved', 1)->where('published', 1)->get();
                @endphp
                <li class="category-nav-element border border-top-0" data-id="{{ $category->id }}"
                    onmouseenter="loadCategoryProducts(this, {{ json_encode($products) }})">
                    <a href="{{ route('products.category', $category->slug) }}"
                        class="text-truncate text-dark px-4 fs-14 d-block hov-column-gap-1">
                        <img class="cat-image lazyload mr-2 opacity-60" src="{{ static_asset('assets/img/placeholder.jpg') }}"
                            data-src="{{ isset($category->catIcon->file_name) ? my_asset($category->catIcon->file_name) : static_asset('assets/img/placeholder.jpg') }}"
                            width="16" alt="{{ $category_name }}"
                            onerror="this.onerror=null;this.src='{{ static_asset('assets/img/placeholder.jpg') }}';">
                        <span class="cat-name has-transition">{{ $category_name }}</span>
                    </a>

                    <div class="sub-cat-menu c-scrollbar-light border p-4 shadow-none">
                        <div class="c-preloader text-center absolute-center">
                            <i class="las la-spinner la-spin la-3x opacity-70"></i>
                        </div>
                        <div class="product-list-container"></div>
                    </div>
                </li>
        @endforeach
    </ul>
</div>

<script>
    function loadCategoryProducts(categoryElement, products) {
        const subCatMenu = categoryElement.querySelector('.sub-cat-menu');
        const preloader = subCatMenu.querySelector('.c-preloader');
        const productListContainer = subCatMenu.querySelector('.product-list-container');

        // Show the preloader while fetching
        preloader.style.display = 'block';

        // Hide any previous product list
        productListContainer.innerHTML = '';

        if (products.length > 0) {
            // Create a grid of product cards
            const productList = document.createElement('div');
            productList.classList.add('row', 'g-3'); // Add Bootstrap grid classes

            products.forEach(product => {
                const productCard = document.createElement('div');
                productCard.classList.add('col-6', 'col-md-3'); // 4 products per row (2 products on smaller screens)

                productCard.innerHTML = `
                    <div class="card shadow-none border-0">
                        <img src="${product.image ? my_asset(product.image) : '/assets/img/placeholder.jpg'}"
                             class="card-img-top" alt="${product.name}" width="100%">
                        <div class="card-body text-center">
                            <h5 class="card-title fs-14">${product.name}</h5>
                        </div>
                    </div>
                `;
                productList.appendChild(productCard);
            });
            productListContainer.appendChild(productList);
        } else {
            productListContainer.innerHTML = '<p>No products available</p>';
        }

        // Hide the preloader once products are loaded
        preloader.style.display = 'none';
    }
</script>
<style>
    .card {
        border: 1px solid #e3e3e3;
        border-radius: 8px;
        overflow: hidden;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .card-img-top {
        height: 200px;
        object-fit: cover;
    }

    .card-body {
        text-align: center;
    }

    .card-title {
        font-size: 14px;
        font-weight: 600;
    }

    .c-preloader {
        display: block;
        position: absolute;
        left: 50%;
        top: 50%;
        transform: translate(-50%, -50%);
    }

    .product-list-container {
        display: flex;
        flex-wrap: wrap;
        gap: 1rem;
    }
</style>
