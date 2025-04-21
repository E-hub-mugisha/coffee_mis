@extends('layouts.app')
@section('title', 'Home')
@section('content')

<div class="title-banner">
    <div class="container-fluid">
        <img class="title-cup-img" src="assets/media/banner/title-img-1.png" alt="">
        <div class="title-text">
            <h1 class="color-primary">Contact Us</h1>
        </div>
    </div>
</div>

<!-- contact Form Section Start -->
<section class="contact-section py-80">
    <div class="container-fluid">
        <div class="row align-items-center row-gap-4">
            <div class="col-lg-7">
                <div class="">
                    <div class="mb-64">
                        <h2 class="fw-700 color-primary mb-12">Contact Us!</h2>
                        <p class="mb-12">Email, call, or complete the form to learn how <span class="color-ter">Sip
                            </span><br><span class="color-ter"> & Savor</span> can
                            solve your messaging problem.</p>
                        <a href="mailto:info@email.com"
                            class="hover-content mb-12 text-16 light-gray">info@email.com</a><br>
                        <a href="tel:+321221231" class="hover-content text-16 mb-12 light-gray">321-221-231</a><br>
                        <a href="#" class="hover-content color-ter text-decoration-underline">Customer
                            Support</a>
                    </div>
                    <div class="customer-block">
                        <div>
                            <h6 class="fw-700 black mb-12">Customer Support</h6>
                            <p>Our support team is available<br> around the clock to address any<br> concerns or
                                queries you may<br> have.</p>
                        </div>
                        <div>
                            <h6 class="fw-700 black mb-12">Feedback and Suggestion</h6>
                            <p>We value your feedback and are<br> continuously working to improve <br>snappy.
                                Your input is crucial in<br> shaping the future of snappy.</p>
                        </div>
                        <div>
                            <h6 class="fw-700 black mb-12">Media Inquiries</h6>
                            <p>For media-related question or <br>press inquires, please contact us <br>at
                                media@royalspins.com.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-5">
                <div class="contact-wrapper">
                    <h4 class="color-primary mb-12 fw-700">Get in Touch</h4>
                    <p class="mb-32">Please feel free to get in touch with us using the contact form below. We’d
                        love to hear
                        for you.</p>
                    <form class="contact-form" method="post">
                        <input type="text" name="name" id="name" class="form-control mb-24" placeholder="Name">
                        <input type="email" name="email" id="email" class="form-control mb-24" placeholder="Email"
                            required>
                        <textarea name="message" id="comments" class="form-control mb-24" placeholder="Your Message"
                            required></textarea>
                        <button type="submit" class="cus-btn w-100 mb-24">
                            <span class="text">submit</span></button>
                        <div id="message" class="alert-msg"></div>
                        <div class="text-center">
                            <p>By contacting us, you agree to our <span class="color-ter">Terms of
                                    services</span><br> and <span class="color-ter">Privacy Policy
                                </span></p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- contact Form Section End -->

@endsection