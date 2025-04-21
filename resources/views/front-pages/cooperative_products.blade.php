@extends('layouts.app')
@section('title', $cooperative->name . ' Products')
@section('content')

<div class="title-banner">
    <div class="container-fluid">
        <img class="title-cup-img" src="assets/media/banner/title-img-1.png" alt="">
        <div class="title-text">
            <h1 class="color-primary">Products by {{ $cooperative->name }}</h1>
        </div>
    </div>
</div>

<!-- Shop Detail Start -->
<section class="shop-sec py-80">
    <div class="container-fluid">
        <div class="shop-grid-topbar-container mb-64">
            <div class="shop-grid-topbar v-2 mb-12 p-0">
                <div class="first-block">
                    <div class="visual-btns">
                        <a href="javascript:;" class="visual-box visual-box-1 shop-filter">
                            <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <g clip-path="url(#clip0_9646_6429)">
                                    <path
                                        d="M20.1648 1.12984C20.0648 0.917602 19.8512 0.782227 19.6165 0.782227H0.82885C0.594226 0.782227 0.380697 0.917602 0.280559 1.12984C0.180503 1.34207 0.211861 1.59294 0.361138 1.77398L7.5834 10.5337V18.611C7.5834 18.8207 7.69178 19.0155 7.86991 19.126C7.96754 19.1866 8.07834 19.2171 8.18955 19.2171C8.28145 19.2171 8.37366 19.1962 8.45869 19.1541L12.5166 17.1429C12.7227 17.0407 12.8532 16.8306 12.8535 16.6005L12.8614 10.5339L20.0841 1.7739C20.2334 1.59294 20.2649 1.34199 20.1648 1.12984ZM11.788 9.93037C11.6986 10.0387 11.6497 10.1747 11.6495 10.3152L11.6417 16.2234L8.79579 17.634V10.316C8.79579 10.1753 8.7469 10.0389 8.65735 9.93037L2.11423 1.99446H18.3311L11.788 9.93037Z"
                                        fill="#FAFAFA" />
                                </g>
                                <defs>
                                    <clipPath id="clip0_9646_6429">
                                        <rect width="20" height="20" fill="white" />
                                    </clipPath>
                                </defs>
                            </svg>
                            <span>Filter</span>
                        </a>
                    </div>
                    <div class="results d-xl-block d-none">
                        <p class="color-primary fw-300">Showing Products by {{ $cooperative->name }} Results</p>
                    </div>
                </div>

                <div class="last-block">
                    <div class="d-md-flex d-none align-items-center gap-8">
                        <p class="color-primary">Short by:</p>
                        <div class="drop-container ">
                            <div class="wrapper-dropdown white" id="dropdown12">
                                <span class="selected-display" id="destination12">Price: low to high</span>
                                <svg id="drp-arrow1" width="24" height="24" viewBox="0 0 24 24" fill="none"
                                    xmlns="http://www.w3.org/2000/svg" class="arrow transition-all ml-auto rotate-180">
                                    <path d="M7 14.5l5-5 5 5" stroke="currentColor" stroke-width="1.5"
                                        stroke-linecap="round" stroke-linejoin="round"></path>
                                </svg>
                                <ul class="topbar-dropdown bg-light-gray">
                                    <li class="item white">Price: low to high</li>
                                    <li class="item white">Price: high to low</li>
                                    <li class="item white">Price: Average Rating</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="drop-container ">
                        <div class="wrapper-dropdown dark-black" id="dropdown21">
                            <span class="selected-display white" id="destination21">Show: 9</span>
                            <svg id="drp-arrow-02" width="24" height="24" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg" class="arrow transition-all ml-auto rotate-180">
                                <path d="M7 14.5l5-5 5 5" stroke="currentColor" stroke-width="1.5"
                                    stroke-linecap="round" stroke-linejoin="round"></path>
                            </svg>
                            <ul class="topbar-dropdown bg-light-gray">
                                <li class="item white">Show: 9</li>
                                <li class="item white">Show: 5</li>
                                <li class="item white">Show: 4</li>
                                <li class="item white">Show: 3</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="row align-content-center row-gap-4 mb-64">
            @foreach ( $cooperative->coffeeProducts as $coffeeProduct)
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
                        <a href="#" class="cus-btn transparent textd-16 p-8-16" data-bs-toggle="modal" data-bs-target="#productQuickView{{ $coffeeProduct->id }}">
                            <span class="text">ADD TO CART</span>
                            <span class="text">
                                <i class="far fa-shopping-cart"></i>
                            </span>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Modal -->
            <div class="modal fade" id="productQuickView{{ $coffeeProduct->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-body">
                            <div class="shop-detail">
                                <div class="detail-wrapper">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="quick-image-box">
                                                <img src="{{ asset('front-page/assets/media/images/product-quickview.png') }}" alt="">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="product-text-container bg-light-black br-20">
                                                <div class="close-content text-end">
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"><i class="fa-light fa-xmark color-white"></i></button>
                                                </div>
                                                <h5 class="color-white fw-600 mb-16">{{ $coffeeProduct->name }}</h5>
                                                <div class="d-flex align-items-center flex-wrap gap-16 mb-24">
                                                    <h6 class="color-sec">★&nbsp;★&nbsp;★&nbsp;★&nbsp;★</h6>
                                                    <div class="vr-line vr-line-2"></div>
                                                </div>
                                                <div class="d-flex align-items-center gap-16 mb-24">
                                                    <h6 class="color-sec">${{ $coffeeProduct->price }}</h6>
                                                </div>
                                                <p class="color-white mb-24">
                                                    {{ $coffeeProduct->description }}
                                                </p>
                                                <div class="hr-line mb-24"></div>
                                                <!-- Product section with quantity input and Add to Cart button -->
                                                <div class="function-bar mb-16">
                                                    <div class="quantity quantity-wrap mb-24">
                                                        <div class="input-area quantity-wrap">
                                                            <!-- Quantity input field -->
                                                            <input type="number" name="quantity" value="1" min="1" maxlength="2" size="1" class="number">
                                                        </div>
                                                    </div>

                                                    <!-- Add to Cart button with action to add the product to the cart -->
                                                    <div class="cart-btn d-flex">
                                                        <form action="{{ route('cart.add', $coffeeProduct->id) }}" method="POST">
                                                            @csrf
                                                            <input type="hidden" name="product_id" value="{{ $coffeeProduct->id }}">
                                                            <input type="hidden" name="price" value="{{ $coffeeProduct->price }}">

                                                            <!-- Quantity input field (from template) -->
                                                            <input type="hidden" name="quantity" class="product-quantity" value="1">

                                                            <!-- Add to Cart button -->
                                                            <button type="submit" class="cus-btn primary">ADD TO CART</button>
                                                        </form>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Modal -->

            @endforeach
        </div>
        <div class="pagination">
            <ul id="border-pagination">
                <li class="pagination-arrow">
                    <a href="#">
                        <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 28 28" fill="none">
                            <path
                                d="M11.5703 19.906C11.5703 17.3748 9.20781 13.9998 6.50781 13.9998M6.50781 13.9998C8.05469 13.9998 11.5703 13.156 11.5703 8.09351M6.50781 13.9998H22.5391"
                                stroke="#E8C895" stroke-width="1.6875" />
                        </svg>
                    </a>
                </li>
                <li><a href="#" class="active">1</a></li>
                <li><a href="#">2</a></li>
                <li><a href="#">3</a></li>
                <li><a href="#">...</a></li>
                <li><a href="#">9</a></li>
                <li class="pagination-arrow">
                    <a href="#">
                        <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 28 28" fill="none">
                            <path
                                d="M16.4297 19.906C16.4297 17.3748 18.7922 13.9998 21.4922 13.9998M21.4922 13.9998C19.9453 13.9998 16.4297 13.156 16.4297 8.09351M21.4922 13.9998H5.46094"
                                stroke="#E8C895" stroke-width="1.6875" />
                        </svg>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</section>
<!-- Shop Detail End -->

<div class="container py-5">
    <h2>Products by {{ $cooperative->name }}</h2>
    <div class="row">
        @foreach($cooperative->coffeeProducts as $product)
        <div class="col-md-4 mb-4">
            <div class="card h-100">
                <div class="card-body">
                    <h5 class="card-title">{{ $product->name }}</h5>
                    <p class="card-text">${{ number_format($product->price, 2) }}</p>
                    <p>{{ Str::limit($product->description, 80) }}</p>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

@endsection