@extends('layouts.app')
@section('title', 'Shop | Coffee Shop')
@section('meta-description', 'Shop page of Coffee Shop. Explore our wide range of coffee products and accessories.')
@section('content')

<div class="title-banner">
    <div class="container-fluid">
        <img class="title-cup-img" src="assets/media/banner/title-img-1.png" alt="">
        <div class="title-text">
            <h1 class="color-primary">Shop</h1>
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
                        <a href="#" class="visual-box active">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <g clip-path="url(#clip0_7819_28489)">
                                    <path
                                        d="M8.28713 0H2.77537C1.24505 0 0 1.24505 0 2.77538V8.28712C0 9.81745 1.24505 11.0625 2.77537 11.0625H8.28713C9.81745 11.0625 11.0625 9.81745 11.0625 8.28712V2.77538C11.0625 1.24505 9.81745 0 8.28713 0ZM9.57841 8.28712C9.57841 9.12359 9.06189 9.55049 8.28713 9.55049H2.77537C1.97667 9.55049 1.51201 9.03237 1.51201 8.28712V2.77538C1.51201 2.05357 1.88548 1.5539 2.77537 1.5539H8.3007C9.21393 1.5539 9.57841 1.87112 9.57841 2.77538V8.28712Z"
                                        fill="#92949F" />
                                    <path
                                        d="M21.2246 0H15.7129C14.1825 0 12.9375 1.24505 12.9375 2.77538V8.28712C12.9375 9.81745 14.1825 11.0625 15.7129 11.0625H21.2246C22.755 11.0625 24 9.81745 24 8.28712V2.77538C24 1.24505 22.755 0 21.2246 0ZM22.5159 8.28712C22.5159 9.12359 21.9994 9.55049 21.2246 9.55049H15.7129C14.9142 9.55049 14.4495 9.03237 14.4495 8.28712V2.77538C14.4495 2.05357 14.823 1.5539 15.7129 1.5539H21.2382C22.1514 1.5539 22.5159 1.87112 22.5159 2.77538V8.28712Z"
                                        fill="#92949F" />
                                    <path
                                        d="M8.28713 12.9375H2.77537C1.24505 12.9375 0 14.1825 0 15.7129V21.2246C0 22.755 1.24505 24 2.77537 24H8.28713C9.81745 24 11.0625 22.755 11.0625 21.2246V15.7129C11.0625 14.1825 9.81745 12.9375 8.28713 12.9375ZM9.57841 21.2246C9.57841 22.0611 9.06189 22.488 8.28713 22.488H2.77537C1.97667 22.488 1.51201 21.9699 1.51201 21.2246V15.7129C1.51201 14.9911 1.88548 14.4914 2.77537 14.4914H8.3007C9.21393 14.4914 9.57841 14.8086 9.57841 15.7129V21.2246Z"
                                        fill="#92949F" />
                                    <path
                                        d="M21.2246 12.9375H15.7129C14.1825 12.9375 12.9375 14.1825 12.9375 15.7129V21.2246C12.9375 22.755 14.1825 24 15.7129 24H21.2246C22.755 24 24 22.755 24 21.2246V15.7129C24 14.1825 22.755 12.9375 21.2246 12.9375ZM22.5159 21.2246C22.5159 22.0611 21.9994 22.488 21.2246 22.488H15.7129C14.9142 22.488 14.4495 21.9699 14.4495 21.2246V15.7129C14.4495 14.9911 14.823 14.4914 15.7129 14.4914H21.2382C22.1514 14.4914 22.5159 14.8086 22.5159 15.7129V21.2246Z"
                                        fill="#92949F" />
                                </g>
                                <defs>
                                    <clipPath id="clip0_7819_28489">
                                        <rect width="24" height="24" fill="white" />
                                    </clipPath>
                                </defs>
                            </svg>
                        </a>
                        <a href="shop-sidebar.html" class="visual-box">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <g clip-path="url(#clip0_7819_28490)">
                                    <path
                                        d="M1.5 4.5C2.32837 4.5 3 3.82844 3 3C3 2.17156 2.32837 1.5 1.5 1.5C0.671631 1.5 0 2.17156 0 3C0 3.82844 0.671631 4.5 1.5 4.5Z"
                                        fill="#92949F" />
                                    <path
                                        d="M6.75 2.25C6.33545 2.25 6 2.58579 6 3C6 3.41421 6.33545 3.75 6.75 3.75H23.25C23.6646 3.75 24 3.41421 24 3C24 2.58579 23.6646 2.25 23.25 2.25H6.75Z"
                                        fill="#92949F" />
                                    <path
                                        d="M1.5 13.5C2.32843 13.5 3 12.8284 3 12C3 11.1716 2.32843 10.5 1.5 10.5C0.671573 10.5 0 11.1716 0 12C0 12.8284 0.671573 13.5 1.5 13.5Z"
                                        fill="#92949F" />
                                    <path
                                        d="M6.75 11.25C6.33579 11.25 6 11.5858 6 12C6 12.4142 6.33579 12.75 6.75 12.75H23.25C23.6642 12.75 24 12.4142 24 12C24 11.5858 23.6642 11.25 23.25 11.25H6.75Z"
                                        fill="#92949F" />
                                    <path
                                        d="M3 21C3 21.8284 2.32843 22.5 1.5 22.5C0.671573 22.5 0 21.8284 0 21C0 20.1716 0.671573 19.5 1.5 19.5C2.32843 19.5 3 20.1716 3 21Z"
                                        fill="#92949F" />
                                    <path
                                        d="M6 21C6 20.5858 6.33579 20.25 6.75 20.25H23.25C23.6642 20.25 24 20.5858 24 21C24 21.4142 23.6642 21.75 23.25 21.75H6.75C6.33579 21.75 6 21.4142 6 21Z"
                                        fill="#92949F" />
                                </g>
                                <defs>
                                    <clipPath id="clip0_7819_28490">
                                        <rect width="24" height="24" fill="white" />
                                    </clipPath>
                                </defs>
                            </svg>
                        </a>
                    </div>
                    <div class="results d-xl-block d-none">
                        <p class="color-primary fw-300">Showing 01 - 09 of 30 Results</p>
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
            <div class="hr-line mb-sm-12 mb-24"></div>
            <div class="shop-grid-bottombar">
                <p class="color-primary fw-300">Selected filters:</p>
                <a href="#" class="filter-tag">
                    <span>Wireless Headphones</span>
                    <i class="fa-thin fa-xmark"></i>
                </a>
                <a href="#" class="filter-tag">
                    <span>Min $30 - Max $300</span>
                    <i class="fa-thin fa-xmark"></i>
                </a>
                <a href="#" class="  color-primary fw-500">
                    Clear All
                </a>
            </div>

        </div>
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

@endsection