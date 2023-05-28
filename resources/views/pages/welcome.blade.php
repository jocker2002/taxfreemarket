@extends('layouts.main')

@section('page_title', 'Welcome')

@section('page_css')
<link rel="stylesheet" href="/css/header/header-styles.css">
<link rel="stylesheet" href="/css/header/header-welcome-styles.css">
<link rel="stylesheet" href="/css/footer-styles.css">
<link rel="stylesheet" href="/css/page-styles.css">
<link rel="stylesheet" href="/css/welcome-styles.css">
@endsection

@section('page_libs')
<!-- jQuery Library -->
<script src="/libs/jquery-3.6.0.js"></script>
@endsection

@section('page_plugins')
<!-- Cookie Plugin -->
<script src="/plugins/js.cookie.js"></script>

<!-- Slick Plugin -->
<link rel="stylesheet" href="/plugins/slick-1.8.1/slick.css">
<link rel="stylesheet" href="/plugins/slick-1.8.1/slick-theme.css">
<script src="/plugins/slick-1.8.1/slick.js"></script>

<!-- FitText Plugin -->
<script src="/plugins/jquery.fittext.js"></script>
@endsection

@section('page_js')
<script src="/js/header-script.js"></script>
<script src="/js/welcome-script.js"></script>
@endsection


@section('content_before-main')
<div class="welcome-main">
    @include('layouts.header')
    <div class="welcome-content">
        <section class="welcome">
            <div class="welcome-container">
                <div class="welcome-greeting">
                    <div>
                        <h1>WELCOME</h1>
                        <h2>To the wholesale platform of social commerce, designer, fashion and independent brands.</h2>
                        <h3>We ship to USA, Canada, UK and EU!</h3>
                    </div>
                    <div class="apply-to-sell">
                        <h4>
                            Do you want to sell on the <span>Tax Free Market</span>?
                        </h4><button class="button-rounded">Apply to sell</button>
                    </div>
                </div>
                <div class="welcome-form">
                    <div class="form">
                        <div class="form-container">
                            <h1>Start shopping now!</h1>
                            <form method="POST" action="{{ route('user.signin') }}" id="form-sign-in">
                                @csrf
                                <input type="email" id="email" name="email" class="email-input" placeholder="Enter your email">
                                <input type="password" id="password" name="password" class="password-input" placeholder="Enter your password">
                                <button type="submit" class="button-background button-orange button-hover-black"><span>Sign In!</span></button>
                            </form>
                            <div id="choose-yourself">
                                <button value="physical-retailer" class="button-background button-orange button-hover-black">I am a Physical Retailer</button>
                                <button value="juridic-retailer" class="button-background button-blue button-hover-black">I am a Juridic Retailer</button>
                                <button value="brand" class="button-background button-green button-hover-black">I am a Brand</button>
                            </div>
                            <div class="form-footer">
                                <hr>
                                <h2>Do not have an account yet?</h2>
                                <button class="shift-button button-background button-hover-semiorange"><span>Register!</span></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>
@endsection

@section('content_main')
<div class="content content-padded">
    <section class="features">
        <div>
            <h2>Maximize your purchases and sellings</h2>
            <div class="circle">
                <img src="/img/cart-arrow-up.svg">
            </div>
            <h3>Shop more than ever!</h3>
        </div>
        <div>
            <h2>Absence of minimum order price!</h2>
            <div class="circle">
                <img src="/img/fair-price-trade.svg">
            </div>
            <h3>It is not necessary to reach a certain order amount!</h3>
        </div>
        <div>
            <h2>Over 300 international, designer and fashion brands</h2>
            <div class="circle">
                <img src="/img/brands.svg">
            </div>
            <h3>Only genuine goods!</h3>
        </div>
        <div>
            <h2>Over 100,000 latest products in our wholesale assortiment</h2>
            <div class="circle">
                <img src="/img/clothes.svg">
            </div>
            <h3>Really wide choice!</h3>
        </div>
    </section>
    <section class="about-us content-padding border-rounding gray-background">
        <h1 class="section-title">About us</h1>
        <hr class="title-underscore">
        <p>Tax Free Market (TFM) is a universal social commerce platform where everyone, regardless of age and profession, can easily open their own online store and start their own business without any investment.</p>
        <p>We connect suppliers, designer, fashion and independent brands with buyers through retailers, enabling small retailers to effectively connect and sell their products through social media channels and instant messengers.</p>
        <p>Our professional entrepreneurial experience in export and import in the world and information technology allow us to maximize the full potential of online sales in digital transformation.</p>
    </section>
    <section class="offers">
        <!--
        <div class="items we-offer">
            <ul>
                <li>Online shop for free</li>
                <li>Best wholesale prices</li>
                <li>Purchases immediately without VAT</li>
                <li>Sales channel scaling</li>
                <li>Automation of work and processes</li>
                <li>Set your selling price</li>
                <li>We pay rewards with money or bitcoins</li>
            </ul>
        </div>
        -->
        <img src="/img/offers.svg">
        <!--
        <div class="items no-more">
            <ul>
                <li>High prices</li>
                <li>Site development</li>
                <li>Multiple levels of intermediaries</li>
                <li>Cross-border purchases with VAT</li>
                <li>Fake brands</li>
                <li>Search of sales channels</li>
                <li>Wasted time looking for the best price</li>
            </ul>
        </div>
        -->
    </section>
    <section class="receive-access">
        <h1 class="section-title">Receive access</h1>
        <h2 class="section-subtitle">to the best digital wholesale market</h2>
        <hr class="title-underscore">
        <div class="info-container">
            <div class="info">
                <div class="square-container">
                    <div class="square-back"></div>
                    <div class="square-front border-yellow"></div>
                </div>
                <h2>Register for free</h2>
                <p>To access the wholesale market and discover over 300 fashion and independent brands with 100,000 unique products.</p>
            </div>
            <div class="info">
                <div class="square-container">
                    <div class="square-back"></div>
                    <div class="square-front border-lightskyblue"></div>
                </div>
                <h2>Buy directly from suppliers</h2>
                <p>Chat and buy directly from your favorite brands. Benefit from good margins and minimal order amounts. <b>Get free shipping.</b></p>
            </div>
            <div class="info ">
                <div class="square-container">
                    <div class="square-back"></div>
                    <div class="square-front border-lightgreen"></div>
                </div>
                <h2>Software</h2>
                <p>To expand the possibilities, Tax Free Market has create a set of B2B and B2C software tools for retail consumers and wholesalers.</p>
            </div>
            <div class="receive-access-lines">
                <hr class="line-left">
                <hr class="line-right">
            </div>
        </div>
    </section>
    <section class="your-store content-padding border-rounding gray-background">
        <h1 class="section-title">Your online store <span class="orange">for free!</span></h1>
        <hr class="title-underscore">
        <div class="blocks-autoplay">
            <div class="block-container">
                <h2 class="section-subtitle orange">Register</h2>
                <p>We will help you set up your free online store</p>
                <img src="/img/ux.svg">
            </div>
            <div class="block-container">
                <h2 class="section-subtitle orange">Select items to sell</h2>
                <p>Fill it with wholesale prices from designer, fashion and independent brands</p>
                <img src="/img/catalog.svg">
            </div>
            <div class="block-container">
                <h2 class="section-subtitle orange">Promote</h2>
                <p>Let customers make orders directly from your posts in <b>social networks</b> and <b>instant messengers</b></p>
                <img src="/img/social-media.svg">
            </div>
            <div class="block-container">
                <h2 class="section-subtitle orange">Receive orders</h2>
                <p>Customers checkout in your store as well as you can order for yourself at wholesale prices</p>
                <img src="/img/order.svg">
            </div>
            <div class="block-container">
                <h2 class="section-subtitle orange">Don't worry</h2>
                <p>We will arrange delivery to you or your customers, accept payment for the goods, help and calculate your earnings</p>
                <img src="/img/delivery-truck.svg">
            </div>
            <div class="block-container">
                <h2 class="section-subtitle orange">Earn real money</h2>
                <p>You set the price for your customer.</p>
                <p>Your earnings are the price difference.</p>
                <p>We pay to your payment card.</p>
                <p>Money can be received as cashback and bitcoins.</p>
                <img src="/img/wallet.svg">
            </div>
        </div>
    </section>
    <section class="exclusive-opportunity">
        <h1 class="section-title">Exclusive opportunity</h1>
        <h2 class="section-subtitle">to receive passive income </h2>
        <hr class="title-underscore">
        <p>Turn your <b class="orange">social networks</b> into a <b class="orange underline">passive source of income</b> without problems and unnecessary expenses which will ensure your financial independence.</p>
        <div class="grid-blocks">
            <div class="column center text-center">
                <div class="circle green-yellow">
                    <img src="/img/dollar.svg">
                </div>
                <p>
                    Get money for each purchased product – <b class="orange">an affiliate commission</b>. Earn money from sales of famous and independent brands!
                </p>
            </div>
            <div class="column center text-center">
                <div class="circle orange-semiorange">
                    <img src="/img/social-media.svg">
                </div>
                <p>
                    Easily add, promote and sell on <b class="orange">social networks</b>. Let the blogger be the seller and the seller be the blogger.
                </p>
            </div>
            <div class="column center text-center">
                <div class="circle blue-navy">
                    <img src="/img/gallery.svg">
                </div>
                <p>
                    Let customers order directly from your <b class="orange">social networks <span class="orange underline">posts</span></b> and a shop with your shop's brand style.
                </p>
            </div>
        </div>
        <h2 class="section-subtitle h2-margin"><span class="orange">Social networks</span> are great marketplaces since people spend a lot of time on them anyway.</h2>
        <button class="button-rounded btn-r-default">Register</button>
    </section>
    <section class="start-selling content-padding border-rounding">
        <div class="info content-padding border-rounding">
            <h1 class="section-title">Start selling</h1>
            <h2 class="section-subtitle">Register as a <span class="orange">wholesale supplier</span> of Tax Free Market</h2>
            <hr class="title-underscore">
            <h2 class="section-subtitle">Speed up and simplify your sales journey!</h2>
            <p>Set up your business in minutes and join our community of small and medium businesses making money every day with dropshipping!</p>
            <div class="grid-blocks">
                <div class="column center padded">
                    <div class="circle">
                        <img src="/img/statistics.svg">
                    </div>
                    <p>Grow your business and increase sales</p>
                </div>
                <div class="column center padded">
                    <div class="circle">
                        <img src="/img/box.svg">
                    </div>
                    <p>A million distributors will sell products to you at the same time</p>
                </div>
                <div class="column center padded">
                    <div class="circle">
                        <img src="/img/trade.svg">
                    </div>
                    <p>Sell your products to the US, Canada, UK and EU</p>
                </div>
            </div>
            <button class="button-rounded btn-r-default">Register</button>
        </div>
    </section>
    <section class="reseller">
        <h1 class="section-title">Become a reseller</h1>
        <h2 class="section-subtitle">Start your online business with <span class="orange">zero-investment !</span></h2>
        <hr class="title-underscore">
        <div class="grid-blocks">
            <div class="column center padded">
                <div class="block">
                    <img src="/img/laptop.svg">
                </div>
                <p>We will help you launch your own online store <b class="underline">without any investment</b></p>
            </div>
            <div class="column center padded">
                <div class="block">
                    <img src="/img/shopping-basket.svg">
                </div>
                <p>We will provide products of <b class="orange">designer, fashion and independent brands</b> at <b class="underline">wholesale prices</b></p>
            </div>
            <div class="column center padded">
                <div class="block">
                    <img src="/img/checkout.svg">
                </div>
                <p>
                    We will take care about order processing, payments, shipping and returns
                </p>
            </div>
        </div>
        <h2 class="section-subtitle orange" style="font-size:1.75em">It is as simple as it is possible!</h2>
        <button class="button-rounded btn-r-default">Register</button>
    </section>
    <section class="reach content-padding border-rounding">
        <div class="info content-padding border-rounding">
            <h1 class="section-title">Reach</h1>
            <h2 class="section-subtitle">up to <span>2 billion</span> unique shoppers!</h2>
            <hr class="title-underscore">
            <p>Let customers order directly from your posts!</p>
            <p>Easily add, promote and sell on <span class="orange">social networks </span> and <span class="orange">instant messengers !</span></p>
        </div>
    </section>
    <section class="ex-op-store">
        <h1 class="section-title">EXCLUSIVE OPPORTUNITY</h1>
        <h2 class="section-subtitle">through your <span class="orange">free online store</span></h2>
        <hr class="title-underscore">
        <div class="grid-blocks">
            <div class="row right">
                <span class="numeration">01.</span>
                <div class="block">
                    <img src="/img/wholesale.svg">
                </div>
            </div>
            <div class="row left text-left">
                <p>Shop for yourself <b class="orange underline">at wholesale prices</b></p>
            </div>

            <div class="row right">
                <span class="numeration">02.</span>
                <div class="block">
                    <img src="/img//laptop-social-media.svg">
                </div>
            </div>
            <div class="row left text-left">
                <p>Turn your <b>social networks</b> and <b>instant messengers</b> into a <b class="orange underline"><br>source of passive income</b></p>
            </div>
        </div>
    </section>
    <section class="earn-bitcoins content-padding border-rounding gray-background">
        <h1 class="section-title">Earn <span class="orange">bitcoins</span> on every sale</h1>
        <hr class="title-underscore">
        <p>We will help social retailers to earn <b class="orange">free bitcoins</b> as a <b class="underline">cashback</b> and <b class="underline">rewards</b> every time they make purchases from you</p>
        <h2 class="section-subtitle orange" style="font-size:1.75em">It is as simple as it is possible!</h2>
        <div class="bitcoin-img">
            <img src="/img/bitcoin-logo.svg">
            <h1>bitcoin</h1>
        </div>
        <h2 class="section-subtitle" style="font-size:1.75em">Amplify your <b class="orange">profits and investments!</b></h2>
    </section>
    <section class="payment">
        <h1 class="section-title">Methods of payment</h1>
        <hr class="title-underscore">
        <div class="payment-list">
            <div>
                <img src="/img/visa-logo.svg" alt="Visa">
            </div>
            <div>
                <img src="/img/mastercard-logo.svg" alt="Mastercard">
            </div>
            <div>
                <img src="/img/paypal-logo.svg" alt="PayPal">
            </div>
            <div>
                <img src="/img/stripe-logo.svg" alt="Stripe">
            </div>
            <div>
                <img src="/img/american-express-logo.svg" alt="American Express">
            </div>
        </div>
    </section>
</div>
@endsection