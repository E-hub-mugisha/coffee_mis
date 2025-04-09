@extends('layouts.app')
@section('title', 'Coffee Product Detail ')
@section('content')

<div class="title-banner">
    <div class="container-fluid">
        <img class="title-cup-img" src="{{ asset('front-pages/assets/media/banner/title-img-1.png') }}" alt="">
        <div class="title-text">
            <h1 class="color-primary">{{ $coffeeProduct->name }}</h1>
        </div>
    </div>
</div>

<!-- Product Detail Start -->
<section class="product-detail pt-80">
    <div class="container-fluid">
        <div class="detail-wrapper">
            <div class="row justify-content-center">
                <div class="col-xl-10">
                    <div class="row row-gap-3">
                        <div class="col-xxl-6 col-xl-7">
                            <div class="product-main-wrapper">
                                <div class="row row-gap-3">
                                    <div class="col-lg-2 col-sm-2 order-sm-1 order-2">
                                        <div class="product-slider-asnav">
                                            <div class="nav-image">
                                                <img src="{{ asset('front-pages/assets/media/images/product-asnav-1.png') }}" alt="">
                                            </div>
                                            <div class="nav-image">
                                                <img src="{{ asset('front-pages/assets/media/images/product-asnav-2.png') }}" alt="">
                                            </div>
                                            <div class="nav-image">
                                                <img src="{{ asset('front-pages/assets/media/images/product-asnav-3.png') }}" alt="">
                                            </div>
                                            <div class="nav-image">
                                                <img src="{{ asset('front-pages/assets/media/images/product-asnav-4.png') }}" alt="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-10 col-sm-10 order-sm-2 order-1">
                                        <div class="product-slider bg-color-sec br-10">
                                            <div class="detail-image">
                                                <img src="{{ asset('front-pages/assets/media/images/product-detail-1.png') }}" alt="">
                                            </div>
                                            <div class="detail-image">
                                                <img src="{{ asset('front-pages/assets/media/images/product-detail-2.png') }}" alt="">
                                            </div>
                                            <div class="detail-image">
                                                <img src="{{ asset('front-pages/assets/media/images/product-detail-3.png') }}" alt="">
                                            </div>
                                            <div class="detail-image">
                                                <img src="{{ asset('front-pages/assets/media/images/product-detail-4.png') }}" alt="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xxl-6 col-xl-5">
                            <div class="product-text-container br-20">
                                <h3 class="color-primary fw-700 mb-12">{{ $coffeeProduct->name }}</h3>
                                <h6 class="color-ter mb-12">★ ★ ★ ★ ★</h6>
                                <h6 class="color-ter fw-700 mb-12">${{ $coffeeProduct->price }}</h6>
                                <p class=" mb-32">
                                    {{ $coffeeProduct->description }}
                                </p>
                                <div class="d-flex align-items-center gap-12 mb-32">
                                    <p class="medium-black fw-500">Add to Wish List:</p>
                                    <a href="#" class="wishlist-icon"><i class="fa-light fa-heart"></i></a>
                                </div>
                                <div class="hr-line mb-32"></div>
                                <div class="function-bar mb-32">
                                    <div class="d-flex align-items-center gap-16">
                                        <p class="medium-black">Quality:</p>
                                        <div class="quantity quantity-wrap">
                                            <div class="input-area quantity-wrap">
                                                <input class="decrement" type="button" value="-">
                                                <input type="text" name="quantity" value="1" maxlength="2" size="1"
                                                    class="number">
                                                <input class="increment" type="button" value="+">
                                            </div>
                                        </div>
                                    </div>
                                    <a href="#" class="cus-btn transparent textd-16 p-8-16" data-bs-toggle="modal" data-bs-target="#productQuickView{{ $coffeeProduct->id }}">
                                        <span class="text">
                                            ADD TO CART
                                        </span>
                                        <span class="text">
                                            <i class="far fa-shopping-cart"></i>
                                        </span>
                                    </a>

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
                                </div>
                                <div class="hr-line mb-32"></div>

                                <div class="d-flex align-items-center gap-16 mb-24">
                                    <p class="medium-black">Share Product:</p>
                                    <div class="social-links-block">
                                        <a href="#" class="social-links">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="17" height="17"
                                                viewBox="0 0 17 17" fill="none">
                                                <g clip-path="url(#clip0_43576_866)">
                                                    <path
                                                        d="M12.416 4.0332C12.6748 4.0332 12.8848 3.8232 12.8848 3.56445V0.751953C12.8848 0.493203 12.6748 0.283203 12.416 0.283203H9.60352C7.79414 0.283203 6.32227 1.75508 6.32227 3.56445V5.9082H4.91602C4.65727 5.9082 4.44727 6.1182 4.44727 6.37695V9.18945C4.44727 9.4482 4.65727 9.6582 4.91602 9.6582H6.32227V15.8145C6.32227 16.0732 6.53227 16.2832 6.79102 16.2832H9.60352C9.86227 16.2832 10.0723 16.0732 10.0723 15.8145V9.6582H11.9473C12.1763 9.6582 12.372 9.49258 12.4098 9.26664L12.8785 6.45414C12.901 6.3182 12.8629 6.17914 12.7738 6.07383C12.6848 5.96883 12.5538 5.9082 12.416 5.9082H10.0723V4.0332H12.416ZM9.60352 6.8457H11.8626L11.5501 8.7207H9.60352C9.34477 8.7207 9.13477 8.9307 9.13477 9.18945V15.3457H7.25977V9.18945C7.25977 8.9307 7.04977 8.7207 6.79102 8.7207H5.38477V6.8457H6.79102C7.04977 6.8457 7.25977 6.6357 7.25977 6.37695V3.56445C7.25977 2.27227 8.31133 1.2207 9.60352 1.2207H11.9473V3.0957H9.60352C9.34477 3.0957 9.13477 3.3057 9.13477 3.56445V6.37695C9.13477 6.6357 9.34477 6.8457 9.60352 6.8457Z"
                                                        fill="#ECD6D0" />
                                                </g>
                                                <defs>
                                                    <clipPath>
                                                        <rect width="16" height="16" fill="white"
                                                            transform="translate(0.666016 0.283203)" />
                                                    </clipPath>
                                                </defs>
                                            </svg>
                                        </a>
                                        <a href="#" class="social-links">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="17" height="17"
                                                viewBox="0 0 17 17" fill="none">
                                                <g clip-path="url(#clip0_43576_868)">
                                                    <path
                                                        d="M8.82348 16.2832C8.77051 16.2832 8.71753 16.2832 8.66418 16.2829C7.41003 16.286 6.25122 16.2541 5.12427 16.1855C4.09106 16.1226 3.14795 15.7656 2.39673 15.153C1.67187 14.562 1.17688 13.7628 0.925537 12.7779C0.706787 11.9205 0.69519 11.0788 0.684082 10.2647C0.676025 9.68062 0.667725 8.98848 0.666016 8.28462C0.667725 7.57784 0.676025 6.8857 0.684082 6.30159C0.69519 5.48763 0.706787 4.64595 0.925537 3.78841C1.17688 2.80354 1.67187 2.00435 2.39673 1.41329C3.14795 0.800736 4.09106 0.443681 5.12439 0.380814C6.25134 0.312333 7.4104 0.280351 8.66723 0.283402C9.92175 0.280717 11.0802 0.312333 12.2072 0.380814C13.2404 0.443681 14.1835 0.800736 14.9347 1.41329C15.6597 2.00435 16.1545 2.80354 16.4059 3.78841C16.6246 4.64583 16.6362 5.48763 16.6473 6.30159C16.6554 6.8857 16.6638 7.57784 16.6654 8.28169V8.28462C16.6638 8.98848 16.6554 9.68062 16.6473 10.2647C16.6362 11.0787 16.6248 11.9204 16.4059 12.7779C16.1545 13.7628 15.6597 14.562 14.9347 15.153C14.1835 15.7656 13.2404 16.1226 12.2072 16.1855C11.1279 16.2512 10.0193 16.2832 8.82348 16.2832ZM8.66418 15.2919C9.89795 15.2949 11.0308 15.2636 12.1312 15.1967C12.9125 15.1492 13.834 14.6368 14.3889 14.1843C14.9019 13.7659 15.2552 13.1888 15.4389 12.4688C15.621 11.7551 15.6315 10.9887 15.6416 10.2476C15.6496 9.66743 15.6579 8.98018 15.6596 8.28316C15.6579 7.58601 15.6496 6.89888 15.6416 6.31868C15.6315 5.57759 15.621 4.81123 15.4389 4.09737C15.2552 3.3774 14.9019 2.80025 14.3889 2.38191C13.834 1.92952 12.9125 1.43208 12.1312 1.38459C11.0308 1.31758 9.89795 1.28669 8.66711 1.28938C7.43359 1.28645 6.30066 1.32125 5.20019 1.38826C4.41894 1.43575 3.58286 1.7708 3.02793 2.22319C2.51499 2.64153 2.06672 3.3774 1.883 4.09737C1.70087 4.81123 1.69038 5.57747 1.68024 6.31868C1.67231 6.89937 1.66401 7.58699 1.6623 8.28462C1.66401 8.9792 1.67231 9.66695 1.68024 10.2476C1.69038 10.9887 1.70087 11.7551 1.883 12.4688C2.06672 13.1888 2.41999 13.7659 2.93293 14.1843C3.48786 14.6367 4.41894 15.1492 5.20019 15.1967C6.30066 15.2637 7.43384 15.295 8.66418 15.2919ZM8.6344 12.1894C6.48059 12.1894 4.72815 10.4371 4.72815 8.28316C4.72815 6.12923 6.48059 4.37691 8.6344 4.37691C10.7883 4.37691 12.5406 6.12923 12.5406 8.28316C12.5406 10.4371 10.7883 12.1894 8.6344 12.1894ZM8.66711 5.28646C6.9108 5.28646 5.67477 6.52249 5.67477 8.28169C5.67477 9.74629 6.78225 11.2919 8.64984 11.2919C10.1146 11.2919 11.6374 9.90426 11.6374 8.28169C11.6374 6.81709 10.52 5.28646 8.66711 5.28646ZM12.9781 3.12691C12.4604 3.12691 12.0406 3.54659 12.0406 4.06441C12.0406 4.58223 12.4604 5.00191 12.9781 5.00191C13.496 5.00191 13.9156 4.58223 13.9156 4.06441C13.9156 3.54659 13.496 3.12691 12.9781 3.12691Z"
                                                        fill="#ECD6D0" />
                                                </g>
                                                <defs>
                                                    <clipPath>
                                                        <rect width="16" height="16" fill="white"
                                                            transform="translate(0.666016 0.283203)" />
                                                    </clipPath>
                                                </defs>
                                            </svg>
                                        </a>
                                        <a href="#" class="social-links">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="17" height="17"
                                                viewBox="0 0 17 17" fill="none">
                                                <g clip-path="url(#clip0_43576_870)">
                                                    <path
                                                        d="M10.1612 7.05811L15.9895 0.283203H14.6083L9.54764 6.16576L5.50568 0.283203H0.84375L6.95599 9.17867L0.84375 16.2832H2.22494L7.56917 10.071L11.8378 16.2832H16.4997L10.1608 7.05811H10.1612ZM8.26944 9.25704L7.65014 8.37125L2.72261 1.32294H4.84404L8.82062 7.01116L9.43992 7.89694L14.609 15.2907H12.4876L8.26944 9.25738V9.25704Z"
                                                        fill="#ECD6D0" />
                                                </g>
                                                <defs>
                                                    <clipPath>
                                                        <rect width="16" height="16" fill="white"
                                                            transform="translate(0.666016 0.283203)" />
                                                    </clipPath>
                                                </defs>
                                            </svg>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Product Detail End -->

<!-- Product Description Start -->
<section class="product-description py-80">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="description-wrapper br-20">
                    <nav class="mb-32">
                        <div class="nav nav-tabs" id="nav-tab" role="tablist">
                            <button class="nav-link button-1" id="nav-desc-tab" data-bs-toggle="tab"
                                data-bs-target="#nav-desc" type="button" role="tab" aria-controls="nav-desc"
                                aria-selected="true">Overview</button>

                            <button class="nav-link button-2 active" id="nav-review-tab" data-bs-toggle="tab"
                                data-bs-target="#nav-review" type="button" role="tab" aria-controls="nav-review"
                                aria-selected="false">Review</button>
                        </div>
                    </nav>
                    <div class="tab-content" id="nav-tabContent">
                        <div class="tab-pane fade" id="nav-desc" role="tabpanel" aria-labelledby="nav-desc-tab">
                            <h3 class="color-primary  mb-16">{{ $coffeeProduct->name }}</h3>
                            <p class="mb-16">
                                {{ $coffeeProduct->description }}
                            </p>
                        </div>

                        <div class="tab-pane fade show active" id="nav-review" role="tabpanel"
                            aria-labelledby="nav-review-tab">
                            <!-- REVIEW AREA -->
                            <div class="review-area">
                                <div class="row row-gap-4">
                                    <div class="col-lg-6">
                                        <div>
                                            <h6 class="fw-700 dark-gray mb-32">Reviews</h6>
                                            <div class="comment-block-1 mb-24">
                                                <div>
                                                    <img src="assets/media/user/user-1.png" alt="">
                                                </div>
                                                <div>
                                                    <div class="d-flex align-items-center gap-8 mb-8">
                                                        <p class="dark-gray fw-600">Michael Brown</p>
                                                        <div class="user-dot"></div>
                                                        <p>26 June, 2024</p>
                                                    </div>
                                                    <h6 class="color-ter mb-16">★ ★ ★ ★ ★</h6>
                                                    <p>Lorem ipsum dolor sit amet consectetur. Lectus massa
                                                        massa et
                                                        nisl<br> ornare amet sed. Venenatis egestas massa
                                                        pharetra
                                                        nunc quam<br>
                                                        urna donec in.</p>
                                                </div>
                                            </div>
                                            <div class="hr-line mb-24"></div>
                                            <div class="comment-block-1 mb-32">
                                                <div>
                                                    <img src="assets/media/user/user-2.png" alt="">
                                                </div>
                                                <div>
                                                    <div class="d-flex align-items-center gap-8 mb-8">
                                                        <p class="dark-gray fw-600">Michael Brown</p>
                                                        <div class="user-dot"></div>
                                                        <p>26 June, 2024</p>
                                                    </div>
                                                    <h6 class="color-ter mb-16">★ ★ ★ ★ ★</h6>
                                                    <p>Lorem ipsum dolor sit amet consectetur. Lectus massa
                                                        massa et
                                                        nisl<br> ornare amet sed. Venenatis egestas massa
                                                        pharetra
                                                        nunc quam<br>
                                                        urna donec in.</p>
                                                </div>
                                            </div>
                                            <div class="hr-line mb-24"></div>
                                            <div class="text-center">
                                                <a href="#" class="lead-16 fw-600 color-ter">Lord More
                                                    Reviews</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div>
                                            <h6 class="fw-700 dark-gray mb-32">Write a Review</h6>
                                            <form>
                                                <input type="text" name="name" id="fname" class="form-control mb-24"
                                                    placeholder="Name" required>
                                                <input type="email" name="email" id="remail" class="form-control mb-24"
                                                    placeholder="Email" required>
                                                <textarea name="message" id="message" placeholder="Your Message"
                                                    class="form-control required review-message mb-24"></textarea>
                                                <button type="submit" class="border-0 cus-btn">
                                                    <span class="text">submit</span>
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- REVIEW AREA -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Product Description End -->

@endsection