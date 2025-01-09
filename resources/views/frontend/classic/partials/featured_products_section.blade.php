@if (count(get_featured_products()) > 0)
    @php
        $sections = [
            'Featured Products 1',
            'Featured Products 2',
            'Featured Products 3',
            'Featured Products 4',
            'Featured Products 5'
        ];
    @endphp

    @foreach ($sections as $index => $section)
        <section id="section_featured_{{ $index + 1 }}" class="mb-2 mb-md-3 mt-2 mt-md-3">
            <div class="container" style="margin-top: -31px;">
                <!-- Top Section -->
                <div class="d-flex mb-2 mb-md-3 align-items-baseline justify-content-between">
                    <!-- Title - Display only for the first section -->
                    @if ($index == 0)
                        <div id="featured-section"
                            style="position: relative; width: 100%; border-bottom: 3px solid #118B50; padding: 10px 0;">
                            <span
                                style="background: #53c861; font-weight: bold; font-size: 16px; padding: 13px; color: white; border-top-right-radius: 5px; border-bottom-right-radius: 1px;">
                                Featured Products
                            </span>
                            <div
                                style="position: absolute; top: -5px; left: 1px; width: 0; height: 0; border-style: solid; border-width: 0 16px 10px 0; border-color: transparent #296e31 transparent transparent; transform: rotate(-31deg);">
                            </div>
                        </div>
                        <style>
                            @media (max-width: 768px) {

                                /* Target mobile screens (768px or smaller) */
                                #featured-section {
                                    margin-bottom: 10px;
                                    /* Add the desired bottom margin for mobile */
                                }
                            }
                        </style>


                    @endif
                    <!-- Links - Display only for the first section -->
                    <!--@if ($index == 0)-->
                    <!--    <div class="d-flex">-->
                    <!--        <a type="button" class="arrow-prev slide-arrow link-disable text-secondary mr-2" onclick="clickToSlide('slick-prev','section_featured_{{ $index + 1 }}')">-->
                    <!--            <i class="las la-angle-left fs-20 fw-600"></i>-->
                    <!--        </a>-->
                    <!--        <a type="button" class="arrow-next slide-arrow text-secondary ml-2" onclick="clickToSlide('slick-next','section_featured_{{ $index + 1 }}')">-->
                    <!--            <i class="las la-angle-right fs-20 fw-600"></i>-->
                    <!--        </a>-->
                    <!--    </div>-->
                    <!--@endif-->
                </div>
                <!-- Products Section -->
                <div class="px-sm-3">
                    <div class="aiz-carousel sm-gutters-16 arrow-none" data-items="6" data-xl-items="5" data-lg-items="4"
                        data-md-items="3" data-sm-items="2" data-xs-items="2" data-arrows='true' data-infinite='false'
                        data-autoplay="true" data-autoplay-speed="2000" data-pause-on-hover="false" style="margin-top: -16px;">
                        @foreach (get_featured_products() as $key => $product)
                            <div
                                class="carousel-box position-relative px-0 has-transition hov-animate-outline border-right border-top border-bottom @if($key == 0) border-left @endif">
                                <div class="px-3">
                                    @include('frontend.' . get_setting('homepage_select') . '.partials.product_box_1', ['product' => $product])
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>
    @endforeach
    <div style="display: flex; justify-content: center; align-items: center; margin: 0;">
        <a href="https://www.amaderbazar.net/search" style="text-decoration: none;">
            <button
                style="margin-bottom:20px; padding: 12px 24px; background-color: var(--primary); color: white; border: none; border-radius: 5px; font-size: 16px; cursor: pointer; font-weight: 600; transition: all 0.3s ease;">
                {{ translate('See More') }}

            </button>
        </a>
    </div>
@endif
