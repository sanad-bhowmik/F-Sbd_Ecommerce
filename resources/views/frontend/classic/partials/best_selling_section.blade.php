@php
    $best_selling_products = get_best_selling_products(20);
@endphp

@if (get_setting('best_selling') == 1 && count($best_selling_products) > 0)
    <!-- Title appears only once -->
    <section id="section_best_selling" class="mb-2 mb-md-3 mt-2 mt-md-3">
        <div class="container" style="margin-bottom: 49px;">
            <!-- Top Section -->
            <div class="d-flex mb-2 mb-md-3 align-items-baseline justify-content-between">
                <!-- Title -->
                <div style="position: relative; width: 100%; border-bottom: 3px solid #53C861; padding: 10px 0;">
                    <span
                        style="background: #53C861;font-weight: bold;font-size: 16px;padding: 13px;color: white;border-top-right-radius: 5px; border-bottom-right-radius: 1px;">
                        Best Selling
                    </span>
                    <div
                        style="position: absolute;top: -5px;left: 1px;width: 0;height: 0;border-style: solid;border-width: 0 16px 10px 0;border-color: transparent #296e31 transparent transparent;transform: rotate(-31deg);">
                    </div>
                </div>

                <!-- Links -->
                <!--<div class="d-flex">-->
                <!--    <a type="button" class="arrow-prev slide-arrow link-disable text-secondary mr-2" onclick="clickToSlide('slick-prev','section_best_selling')"><i class="las la-angle-left fs-20 fw-600"></i></a>-->
                <!--    <a type="button" class="arrow-next slide-arrow text-secondary ml-2" onclick="clickToSlide('slick-next','section_best_selling')"><i class="las la-angle-right fs-20 fw-600"></i></a>-->
                <!--</div>-->
            </div>
        </div>
    </section>

    <!-- 5 Product Sections with Randomized Products -->
    @for ($i = 1; $i <= 3; $i++)
        @php
            // Shuffle the products to display a random set of products for each section
            $random_products = collect($best_selling_products)->shuffle();
        @endphp
        <section id="section_best_selling_{{ $i }}" class="mb-2 mb-md-3 mt-2 mt-md-3">
            <div class="container" style="margin-top: -31px;">
                <!-- Product Section -->
                <div class="px-sm-3">
                    <div class="aiz-carousel sm-gutters-16 arrow-none" id="carousel_{{ $i }}" data-items="6" data-xl-items="5"
                        data-lg-items="4" data-md-items="3" data-sm-items="2" data-xs-items="2" data-arrows="true"
                        data-infinite="false" style="margin-top: -49px;">
                        @foreach ($random_products as $key => $product)
                            <div
                                class="carousel-box px-3 position-relative has-transition hov-animate-outline border-right border-top border-bottom @if($key == 0) border-left @endif">
                                @include('frontend.' . get_setting('homepage_select') . '.partials.product_box_1', ['product' => $product])
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>
    @endfor
    <div style="display: flex; justify-content: center; align-items: center; margin: 0;">
        <a href="https://www.amaderbazar.net/search" style="text-decoration: none;">
            <button
                style="margin-bottom:20px; padding: 12px 24px; background-color: var(--primary); color: white; border: none; border-radius: 5px; font-size: 16px; cursor: pointer; font-weight: 600; transition: all 0.3s ease;">
                {{ translate('See More') }}
            </button>
        </a>
    </div>


    <!-- JavaScript for Auto Slide every 3 seconds -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            @for ($i = 1; $i <= 5; $i++)
                // Initialize Slick Carousel with autoplay settings
                $('#carousel_{{ $i }}').slick({
                    autoplay: true,         // Enable auto slide
                    autoplaySpeed: 3000,    // 3 seconds interval
                    arrows: true,           // Show arrows for navigation
                    infinite: false,        // Prevent infinite loop
                });
            @endfor
        });
    </script>
@endif
