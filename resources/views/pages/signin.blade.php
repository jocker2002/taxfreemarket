@extends('layouts.main')

@section('page_title', 'Sign In')

@section('page_meta')
<!-- CSRF Token -->
<meta name="csrf-token" content="{{ csrf_token() }}">
@endsection

@section('page_css')
<link rel="stylesheet" href="css/header/header-styles.css">
<link rel="stylesheet" href="css/header/header-regular-styles.css">
<link rel="stylesheet" href="css/footer-styles.css">
<link rel="stylesheet" href="css/page-styles.css">
<!-- <link rel="stylesheet" href="css/register-styles.css"> -->

<style>
    .signin-container {
        display: flex;
        flex-direction: column;
        align-items: center;
        border: 3px solid var(--main-orange);
        border-radius: 10px;
        width: 400px;
        margin: auto;
        padding: 20px;
    }

    .signin-container h1 {
        margin: 0 0 20px 0;
    }

    .signin-container .form-group {
        display: flex;
        flex-direction: column;
        width: 300px;
    }

    .signin-container .form-group label {
        margin-bottom: 5px;
    }

    .signin-container .form-group input {
        margin-bottom: 20px;
        height: 40px;
        background-color: #fffaf8;
        border: 2.5px solid var(--main-orange);
        padding: 0 1em;
    }

    .signin-container .form-group button {
        background-color: var(--main-orange);
        color: white;
        border: none;
        font-weight: bold;
        cursor: pointer;
    }

    .signin-container .form-group input,
    .signin-container .form-group button {
        font-size: 20px;
        height: clamp(40px, 55px, 60px);
        border-radius: 10px;
        outline: none;
        box-sizing: border-box;
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
@endsection

@section('content_main')
<div class="content">

    <div class="signin-container">
        <h1>Sign In</h1>
        <form method="POST" action="{{ route('user.signin') }}">
            @csrf
            <div class="form-group">
                <!--<label for="email">Your email</label>-->
                <input type="text" class="form-control" id="email" name="email"  value="" placeholder="Enter your email">
                @error("email")
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <!--<label for="password">Password</label>-->
                <input type="password" class="form-control" id="password" name="password" value="" placeholder="Enter your password">
                @error("password")
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <button type="submit" name="sendMe" value="1">Sign In</button>
            </div>
        </form>
    </div>

</div>
@endsection