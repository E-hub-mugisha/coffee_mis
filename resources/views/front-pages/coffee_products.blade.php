@extends('layouts.app')
@section('title', 'Product | Coffee Product')
@section('content')


<div class="title-banner">
    <div class="container-fluid">
        <div class="title-text">
            <h1 class="color-primary">@yield('title')</h1>
        </div>
    </div>
</div>
<!-- Shop Detail Start -->
<section class="shop-sec py-80">
    <div class="container-fluid">
        <div class="row align-content-center row-gap-4 mb-64">
            @foreach ( $coffeeProducts as $coffeeProduct)
            <div class="col-xxl-3 col-lg-4 col-md-6">
                <div class="product-itme-1">
                    <div class="item-image mb-24">
                        <a href="{{ route('coffee.product.show', $coffeeProduct->id )}}">
                            <img src="{{ asset('front-pages/assets/media/images/item-1.png') }}" alt="">
                        </a>
                        <div class="icon">
                            <a href="#">
                                <i class="far fa-heart"></i>
                            </a>

                            <a href="#" class="btn" data-bs-toggle="modal" data-bs-target="#productQuickView{{ $coffeeProduct->id }}">
                                <i class="fa-solid fa-eye"></i>
                            </a>
                        </div>
                    </div>
                    <div class="item-detail">
                        <div class="rating mb-16">
                            <i class="fa-solid fa-star-sharp"></i>
                            <i class="fa-solid fa-star-sharp"></i>
                            <i class="fa-solid fa-star-sharp"></i>
                            <i class="fa-solid fa-star-sharp"></i>
                            <i class="fa-solid fa-star-sharp"></i>
                        </div>
                        <a href="{{ route('coffee.product.show', $coffeeProduct->id )}}" class="h5 fw-700 mb-16 color-primary mb-8">
                            {{ $coffeeProduct->name }}
                        </a>

                        <h6 class="text-decoration-line-through light-gray mb-12 fw-700">${{ $coffeeProduct->price }} <span
                                class="black">${{ $coffeeProduct->price }}</span></h6>
                        <a href="{{ route('coffee.product.show', $coffeeProduct->id )}}" class="cus-btn transparent textd-16 p-8-16">
                            <span class="text">View Details</span>
                            <span class="text">
                                <i class="far fa-arrow-right"></i>
                            </span>
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <!-- Pagination Start -->
        <div class="row row-gap-4 justify-item-center">
            <div class="col-xxl-12 col-lg-12 col-md-12">
                <div class="pagination">
                    {{ $coffeeProducts->links() }}
                </div>
            </div>
        </div>
</section>
<!-- Shop Detail End -->

@endsection