@extends('frontend.layouts.app')

@section('content')
    <section class="pb-4 pt-5">
        <div class="container">
            <div class="row gutters-16">
                <!-- Contents -->
                <div class="col-xl-9 order-xl-1">
                    <!-- Breadcrumb -->
                    <div class="row gutters-16 mb-4">
                        <div class="col-5 col-xl-6">
                            <h1 class="fw-700 fs-20 fs-md-24 text-dark mb-0">{{ translate('FAQ')}}</h1>
                        </div>
                        <div class="col-5 col-xl-6">
                            <ul class="breadcrumb bg-transparent p-0 justify-content-end">
                                <li class="breadcrumb-item has-transition opacity-60 hov-opacity-100">
                                    <a class="text-reset" href="{{ route('home') }}">
                                        {{ translate('Home')}}
                                    </a>
                                </li>
                                <li class="text-dark fw-600 breadcrumb-item">
                                    "{{ translate('Faq') }}"
                                </li>
                            </ul>
                        </div>
                        <div class="col d-xl-none mb-lg-3 text-right">
                            <button type="button" class="btn btn-icon p-0 active" data-toggle="class-toggle" data-target=".aiz-filter-sidebar">
                                <i class="la la-filter la-2x"></i>
                            </button>
                        </div>
                    </div>
                    <!-- Blogs -->

                </div>



            </div>
        </div>
    </section>
@endsection

@section('script')
    <script type="text/javascript">
        function filter(){
            $('#search-form').submit();
        }
    </script>
@endsection
