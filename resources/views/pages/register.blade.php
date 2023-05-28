@extends('layouts.main')

@section('page_title', 'Registration')

@section('page_meta')
<!-- CSRF Token -->
<meta name="csrf-token" content="{{ csrf_token() }}">
@endsection

@section('page_css')
<link rel="stylesheet" href="/css/header/header-styles.css">
<link rel="stylesheet" href="/css/header/header-regular-styles.css">
<link rel="stylesheet" href="/css/footer-styles.css">
<link rel="stylesheet" href="/css/page-styles.css">
<link rel="stylesheet" href="/css/register-styles.css">
<link rel="stylesheet" href="/css/checkbox-styles.css">
<style>
    .input-container {
        display: flex;
        align-items: center;
        width: 100%;
    }

    .error-message {
        position: absolute;
        background-color: rgb(255, 226, 224);
        padding: 5px;
        border: 1px solid rgb(255, 198, 194);
        width: 200px;
        height: fit-content;
        font-weight: bold;
        text-align: center;
        color: red;
        box-shadow: 3px 3px 5px gray;
    }

    .error-message.error-left {
        left: -220px;
    }

    .error-message.error-right {
        right: -220px;
    }
</style>
@endsection

@section('page_libs')
<script src="/libs/jquery-3.6.0.js"></script>
@endsection

@section('page_plugins')
<script src="/plugins/js.cookie.js"></script>
@endsection

@section('page_js')
<script src="js/header-script.js"></script>
<script src="js/register-script.js"></script>
@endsection

@section('content_main')
<div class="content">
    <div class="register-window">
        <!--
        <div class="register-nav">
            <button class="nav-retailer register-active">Retailer</button>
            <button class="nav-brand">Brand</button>
            <div class="register-slider"></div>
        </div>
        -->
        <div class="register-container">
            <div class="form-container" id="form-retailer">
                <h1 class="section-title">Registration</h1>
                <hr class="title-underscore">
                <!-- <h2 class="section-subtitle">Physical Retailer</h2> -->
                <h2 class="section-subtitle">Hello new user!</h2>
                <form method="POST" action="{{ route('user.register')}}">
                    @csrf

                    <div class="input-container">
                        <input type="text" id="first-name" name="first_name" placeholder="First Name">
                    </div>

                    <div>
                        <input type="text" id="last-name" name="last_name" placeholder="Last Name">
                    </div>


                    <div class="input-container">
                        <input type="email" id="email" name="email" placeholder="Email">
                        @error("email")
                        <div class="error-message error-left">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="input-container">
                        <input type="password" id="password" name="password" placeholder="Password">
                        @error("password")
                        <div class="error-message error-right">{{ $message }}</div>
                        @enderror
                    </div>


                    <!--
                    <label class="checkbox-container"><span>I am a Juridic Retailer</span>
                        <input type="checkbox">
                        <span class="checkmark"></span>
                    </label>
                    <div class="form-juridic-retailer">
                        <input type="text" name="name-of-store" placeholder="Name of Store">
                        <input list="select-country" name="select-country" placeholder="Select Country">
                        <datalist id="select-country">
                        </datalist>
                        <input type="url" name="store-website" placeholder="Store Website">
                        <input type="tel" name="mobile-number" placeholder="Mobile Number">
                        <input type="text" name="vat-number" placeholder="VAT identification number">
                    </div>
                    -->
                    <button type="submit" class="button-background button-orange button-hover-black">Register!</button>
                </form>
            </div>
            <!--
            <div class="form-container" id="form-brand">
                <h1 class="section-title">Registration</h1>
                <hr class="title-underscore">
                <h2 class="section-subtitle">Brand</h2>
                <form action="#!" method="post">
                    <input type="text" name="first-name" placeholder="First Name">
                    <input type="text" name="last-name" placeholder="Last Name">
                    <input type="email" name="business-email" placeholder="Business Email">
                    <input type="text" name="name-of-brand" placeholder="Name of Brand">
                    <input list="select-country" name="select-country" placeholder="Select Country">
                    <datalist id="select-country">
                    </datalist>
                    <input type="url" name="brand-website" placeholder="Brand Website">
                    <input type="numbers" name="years-in-business" placeholder="Years in Business">
                    <input type="text" name="vat-number" placeholder="VAT identification number">
                    <button type="submit" class="button-background button-orange button-hover-black">Apply Now!</button>
                </form>
            </div>
            -->
        </div>
    </div>
</div>
@endsection