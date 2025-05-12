@extends('layouts.app')
@section('title', 'Coffee Tip' )
@section('content')

<div class="title-banner">
    <div class="container-fluid">
        <div class="title-text">
            <h1 class="color-primary">{{ $tip->title}}</h1>
        </div>
    </div>
</div>

<!-- BLOG START -->
<section class="blog-sec py-80">
    <div class="container-fluid">
        <div class="row row-gap-4">
            <div class="col-xl-3">
                <div class="side-bar">
                    <div>
                        <form class="mb-32">
                            <div class="search-container">
                                <input type="text" name="search" id="search-email" placeholder="Search Here">
                                <button type="submit" class="search-button">
                                    <i class="fa-solid fa-magnifying-glass"></i>
                                </button>
                            </div>
                        </form>
                        <div class="lestest-article border-block mb-32">
                            <h5 class="fw-700 dark-gray mb-24">Latest Article</h5>
                            <div class="hr-line mb-24"></div>
                            <div class="article-1 mb-24">
                                <a href="blog-detail.html">
                                    <img class="br-12" src="assets/media/blog/blog-sidebar-img-1.jpg" alt="">
                                </a>
                                <div>
                                    <a href="blog-detail.html" class="lead-16 hover-content mb-8">Coffee
                                        Cultures Around the World</a>
                                    <p class="subtitle dark-gray">18 Dec 2024</p>
                                </div>
                            </div>
                            <div class="article-1 mb-24">
                                <a href="blog-detail.html">
                                    <img class="br-12" src="assets/media/blog/blog-sidebar-img-2.jpg" alt="">
                                </a>
                                <div>
                                    <a href="blog-detail.html" class="lead-16 hover-content mb-8">Your Daily
                                        Dose of Coffee Culture</a>
                                    <p class="subtitle dark-gray">02 April 2024</p>
                                </div>
                            </div>
                            <div class="article-1">
                                <a href="blog-detail.html">
                                    <img class="br-12" src="assets/media/blog/blog-sidebar-img-3.jpg" alt="">
                                </a>
                                <div>
                                    <a href="blog-detail.html" class="lead-16 hover-content mb-8">How to Make
                                        the Perfect Cup at Home</a>
                                    <p class="subtitle dark-gray">2 Dec 2024</p>
                                </div>
                            </div>
                        </div>
                        <div class="border-block mb-32">
                            <h5 class="fw-700 dark-gray mb-24">Tags</h5>
                            <div class="hr-line mb-24"></div>
                            <div class="tags-block">
                                <a href="#" class="tag-1">
                                    Coffee
                                </a>
                                <a href="#" class="tag-1">
                                    Tea
                                </a>
                                <a href="#" class="tag-1">
                                    Making Tea
                                </a>
                                <a href="#" class="tag-1">
                                    Pastries
                                </a>
                                <a href="#" class="tag-1">
                                    Beverages
                                </a>
                                <a href="#" class="tag-1">
                                    Cookies
                                </a>
                                <a href="#" class="tag-1">
                                    Vegan Bakes
                                </a>
                            </div>
                        </div>
                        <div class="border-block mb-32">
                            <h5 class="fw-700 dark-gray mb-24">Follow Us On</h5>
                            <div class="hr-line mb-24"></div>
                            <div class="social-icon">
                                <a href="#"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none">
                                        <path
                                            d="M17.625 5.625C18.0131 5.625 18.3281 5.31 18.3281 4.92188V0.703125C18.3281 0.315 18.0131 0 17.625 0H13.4062C10.6922 0 8.48437 2.20781 8.48437 4.92188V8.4375H6.375C5.98687 8.4375 5.67188 8.7525 5.67188 9.14062V13.3594C5.67188 13.7475 5.98687 14.0625 6.375 14.0625H8.48437V23.2969C8.48437 23.685 8.79937 24 9.1875 24H13.4062C13.7944 24 14.1094 23.685 14.1094 23.2969V14.0625H16.9219C17.2655 14.0625 17.5589 13.8141 17.6156 13.4752L18.3188 9.25641C18.3525 9.0525 18.2953 8.84391 18.1617 8.68594C18.0281 8.52844 17.8317 8.4375 17.625 8.4375H14.1094V5.625H17.625ZM13.4062 9.84375H16.7948L16.3261 12.6562H13.4062C13.0181 12.6562 12.7031 12.9713 12.7031 13.3594V22.5938H9.89062V13.3594C9.89062 12.9713 9.57562 12.6562 9.1875 12.6562H7.07812V9.84375H9.1875C9.57562 9.84375 9.89062 9.52875 9.89062 9.14062V4.92188C9.89062 2.98359 11.468 1.40625 13.4062 1.40625H16.9219V4.21875H13.4062C13.0181 4.21875 12.7031 4.53375 12.7031 4.92188V9.14062C12.7031 9.52875 13.0181 9.84375 13.4062 9.84375Z"
                                            fill="white" />
                                    </svg></a>
                                <a href="#">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none">
                                        <g clip-path="url(#clip0_43668_1845)">
                                            <path
                                                d="M14.2418 10.1624L22.9842 0H20.9125L13.3215 8.82384L7.25852 0H0.265625L9.43399 13.3432L0.265625 24H2.33742L10.3538 14.6817L16.7567 24H23.7496L14.2413 10.1624H14.2418ZM11.4042 13.4608L10.4752 12.1321L3.08391 1.55961H6.26607L12.2309 10.0919L13.1599 11.4206L20.9135 22.5113H17.7313L11.4042 13.4613V13.4608Z"
                                                fill="#946926" />
                                        </g>
                                        <defs>
                                            <clipPath id="clip0_43668_1845">
                                                <rect width="24" height="24" fill="white" />
                                            </clipPath>
                                        </defs>
                                    </svg>
                                </a>
                                <a href="#">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none">
                                        <g clip-path="url(#clip0_43668_1848)">
                                            <path
                                                d="M12.2362 23.9999C12.1567 23.9999 12.0773 23.9999 11.9973 23.9996C10.116 24.0041 8.37781 23.9564 6.68738 23.8534C5.13757 23.7591 3.7229 23.2236 2.59607 22.3047C1.50879 21.4181 0.766296 20.2194 0.389282 18.7421C0.0611572 17.4559 0.0437622 16.1934 0.0270996 14.9723C0.0150146 14.0961 0.00256348 13.0579 0 12.0021C0.00256348 10.9419 0.0150146 9.90374 0.0270996 9.02758C0.0437622 7.80663 0.0611572 6.54412 0.389282 5.25781C0.766296 3.78051 1.50879 2.58172 2.59607 1.69512C3.7229 0.7763 5.13757 0.240716 6.68756 0.146417C8.37799 0.0436949 10.1166 -0.00427876 12.0018 0.000298881C13.8836 -0.00372944 15.6213 0.0436949 17.3117 0.146417C18.8615 0.240716 20.2762 0.7763 21.403 1.69512C22.4905 2.58172 23.2328 3.78051 23.6098 5.25781C23.9379 6.54394 23.9553 7.80663 23.972 9.02758C23.9841 9.90374 23.9967 10.9419 23.9991 11.9977V12.0021C23.9967 13.0579 23.9841 14.0961 23.972 14.9723C23.9553 16.1932 23.9381 17.4557 23.6098 18.7421C23.2328 20.2194 22.4905 21.4181 21.403 22.3047C20.2762 23.2236 18.8615 23.7591 17.3117 23.8534C15.6929 23.952 14.0299 23.9999 12.2362 23.9999ZM11.9973 22.5131C13.8479 22.5175 15.5471 22.4706 17.1978 22.3703C18.3697 22.299 19.752 21.5304 20.5844 20.8516C21.3538 20.2241 21.8837 19.3584 22.1593 18.2784C22.4325 17.2078 22.4482 16.0583 22.4634 14.9466C22.4753 14.0763 22.4878 13.0455 22.4903 11.9999C22.4878 10.9542 22.4753 9.92352 22.4634 9.05322C22.4482 7.94158 22.4325 6.79205 22.1593 5.72125C21.8837 4.64129 21.3538 3.77557 20.5844 3.14806C19.752 2.46948 18.3697 1.72331 17.1978 1.65209C15.5471 1.55156 13.8479 1.50524 12.0016 1.50926C10.1514 1.50487 8.45196 1.55706 6.80127 1.65759C5.62939 1.72882 4.37526 2.2314 3.54286 2.90998C2.77346 3.53749 2.10105 4.64129 1.82548 5.72125C1.55229 6.79205 1.53654 7.9414 1.52134 9.05322C1.50944 9.92425 1.49699 10.9557 1.49443 12.0021C1.49699 13.044 1.50944 14.0756 1.52134 14.9466C1.53654 16.0583 1.55229 17.2078 1.82548 18.2784C2.10105 19.3584 2.63096 20.2241 3.40037 20.8516C4.23277 21.5302 5.62939 22.299 6.80127 22.3703C8.45196 22.4708 10.1517 22.5177 11.9973 22.5131ZM11.9526 17.8593C8.72186 17.8593 6.0932 15.2308 6.0932 11.9999C6.0932 8.76904 8.72186 6.14056 11.9526 6.14056C15.1835 6.14056 17.8119 8.76904 17.8119 11.9999C17.8119 15.2308 15.1835 17.8593 11.9526 17.8593ZM12.0016 7.50489C9.36718 7.50489 7.51314 9.35893 7.51314 11.9977C7.51314 14.1946 9.17436 16.513 11.9757 16.513C14.1728 16.513 16.457 14.4316 16.457 11.9977C16.457 9.80083 14.781 7.50489 12.0016 7.50489ZM18.4682 4.26556C17.6916 4.26556 17.0619 4.89507 17.0619 5.67181C17.0619 6.44854 17.6916 7.07806 18.4682 7.07806C19.2449 7.07806 19.8744 6.44854 19.8744 5.67181C19.8744 4.89507 19.2449 4.26556 18.4682 4.26556Z"
                                                fill="#946926" />
                                        </g>
                                        <defs>
                                            <clipPath id="clip0_43668_1848">
                                                <rect width="24" height="24" fill="white" />
                                            </clipPath>
                                        </defs>
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-9">
                <div class="blog-detail">
                    <img class="br-24 mb-24" src="{{ asset('image/coffee-tips/' . $tip->image) }}" alt="">
                    <div class="image-detail mb-24">
                        <div class="vr-line"></div>
                        <p>{{ $tip->created_at}}</p>
                        <p class="fw-700 color-ter">By, {{ $tip->user->name}}</p>
                    </div>
                    <h4 class="dark-gray mb-24 fw-700">{{ $tip->title}}</h4>
                    <p class="mb-32">
                    {{ $tip->content}}
                    </p>
                    <div class="hr-line mb-32"></div>
                    <form>
                        <h3 class="fw-700 color-ter mb-24">Leave A Reply</h3>
                        <p class="mb-24">Your email address will not be published. Required fields are marked *
                        </p>
                        <div class="row align-content-center row-gap-4 mb-24">
                            <div class="col-lg-6">
                                <input type="text" name="name" id="name" class="form-control" placeholder="Name"
                                    required>
                            </div>
                            <div class="col-lg-6">
                                <input type="email" name="email" id="email1" class="form-control"
                                    placeholder="Email" required>
                            </div>
                            <div class="col-lg-12">
                                <textarea name="message" id="message" class="form-control"
                                    placeholder="Your Message" required></textarea>
                            </div>
                        </div>
                        <div class="cus-checkBox mb-24">
                            <input type="checkbox" id="remember">
                            <label for="remember" class="lead-16">
                                Save my name, email, and website in this browser for the next time.
                            </label>
                        </div>
                        <button class="border-0 cus-btn">
                            <span class="text">submit comment</span>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- BLOG END -->

@endsection