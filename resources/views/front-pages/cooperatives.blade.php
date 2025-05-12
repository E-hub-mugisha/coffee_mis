@extends('layouts.app')
@section('title', 'Cooperatives')
@section('content')

<div class="title-banner">
    <div class="container-fluid">
        <div class="title-text">
            <h1 class="color-primary">@yield('title')</h1>
        </div>
    </div>
</div>

<section class="shop-sec py-80">
    <div class="container-fluid">
        <div class="row align-content-center row-gap-4 mb-64">
            @foreach($cooperatives as $cooperative)
            <div class="col-xxl-3 col-lg-4 col-md-6">
                <div class="product-itme-1">
                    <div class="item-image mb-24">
                        <a href="{{ route('front.cooperative.detail', $cooperative->id) }}">
                            <img src="{{ asset('front-pages/assets/media/images/item-1.png')}}" alt="">
                        </a>
                        
                    </div>
                    <div class="item-detail">
                        <div class="rating mb-16">
                            <i class="fa-solid fa-star-sharp"></i>
                            <i class="fa-solid fa-star-sharp"></i>
                            <i class="fa-solid fa-star-sharp"></i>
                            <i class="fa-solid fa-star-sharp"></i>
                            <i class="fa-solid fa-star-sharp"></i>
                        </div>
                        <a href="{{ route('front.cooperative.detail', $cooperative->id) }}" class="h5 fw-700 mb-16 color-primary mb-8">
                        {{ $cooperative->name }}
                        </a>

                        <p class=" light-gray mb-12 fw-700">{{ Str::limit($cooperative->description, 100) }}</p>
                        <a href="{{ route('front.cooperative.detail', $cooperative->id) }}" class="cus-btn transparent textd-16 p-8-16">
                            <span class="text">View Details</span>
                            <span class="text">
                                <i class="far fa-eye"></i>
                            </span>
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <div class="pagination">
            {{ $cooperatives->links() }}
        </div>
    </div>
</section>


@endsection