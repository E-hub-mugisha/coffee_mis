@extends('layouts.app')
@section('title', 'Coffee Product Detail ')
@section('content')

<div class="title-banner">
    <div class="container-fluid">
        <div class="title-text">
            <h1 class="color-primary">@yield('title')</h1>
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
                                <div class="hr-line mb-32"></div>
                                <div class="function-bar mb-32">
                                    <div class="d-flex align-items-center gap-16">
                                        <p class="medium-black">Quality:</p>
                                        <div class="quantity quantity-wrap">
                                            <div class="input-area quantity-wrap">
                                                <input type="number" name="quantity" value="1" min="1" maxlength="2" size="1" class="number">
                                            </div>
                                        </div>
                                    </div>
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
                                            @foreach ($coffeeProduct->feedbacks as $feedback)
                                            <div class="comment-block-1 mb-24">
                                                <div>
                                                    <img src="assets/media/user/user-1.png" alt="">
                                                </div>
                                                <div>
                                                    <div class="d-flex align-items-center gap-8 mb-8">
                                                        <p class="dark-gray fw-600">{{ $feedback->user->name }}</p>
                                                        <div class="user-dot"></div>
                                                        <p>{{ $feedback->created_at->format('d M Y') }}</p>
                                                    </div>
                                                    <h6 class="color-ter mb-16">
                                                        @for ($i = 0; $i < $feedback->rating; $i++)
                                                            ★
                                                            @endfor
                                                            @for ($i = $feedback->rating; $i < 5; $i++)
                                                                ☆
                                                                @endfor
                                                                {{ $feedback->rating }} Stars
                                                                </h6>
                                                                <p>{{ $feedback->comment }}</p>
                                                </div>
                                            </div>
                                            @endforeach
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div>
                                            <h6 class="fw-700 dark-gray mb-32">Write a Review</h6>
                                            <form action="{{ route('buyer.feedback.create') }}" method="POST">
                                                @csrf
                                                <input type="text" hidden name="coffee_product_id" id="coffee_product_id" class="form-control mb-24" value="{{ $coffeeProduct->id }}" required>
                                                <div class="form-group mt-2">
                                                    <label for="rating">Rating</label>
                                                    <select name="rating" id="rating" class="form-control mb-24" required>
                                                        <option value="">Select a rating</option>
                                                        @for($i = 1; $i <= 5; $i++)
                                                            <option value="{{ $i }}">{{ $i }} Star{{ $i > 1 ? 's' : '' }}</option>
                                                            @endfor
                                                    </select>
                                                </div>
                                                <textarea name="comment" id="comment" placeholder="Your comment"
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