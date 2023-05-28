@extends('layouts.main')

@php
$title = "";
if (isset(Auth::user()->username)) {
$title = Auth::user()->username;
} else {
$title = Auth::user()->first_name . ' ' . Auth::user()->last_name;
}
@endphp

@section('page_title', $title . ' – Profile')

@section('page_meta')
<!-- CSRF Token -->
<meta name="csrf-token" content="{{ csrf_token() }}">
@endsection

@section('page_css')
<link rel="stylesheet" href="/css/header/header-styles.css">
<link rel="stylesheet" href="/css/header/header-regular-styles.css">
<link rel="stylesheet" href="/css/footer-styles.css">
<link rel="stylesheet" href="/css/page-styles.css">
<link rel="stylesheet" href="/css/category-list-styles.css">
<link rel="stylesheet" href="/css/profile/profile-styles.css">
<style>
    .content {
        display: flex;
        flex-direction: column;
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
<script src="/js/header-script.js"></script>
<script src="/js/category-list-script.js"></script>
@endsection

@section('content_main')
<div class="content">

    <div class="profile-container">
        <div class="profile-sidebar">
            <div class="category-container">
                <div class="category-heading">
                    Profile
                    <div class="arrow"></div>
                </div>
                <ul class="category-list">
                    <li><a href="#!">Personal data</a></li>
                    <!-- <li><a href="#!">Earning</a></li> -->
                    <!-- <li><a href="#!">Payout settings</a></li> -->
                    <li><a href="#!">Change password</a></li>
                </ul>
            </div>
            <div class="category-container">
                <div class="category-heading">
                    My store
                    <div class="arrow"></div>
                </div>
                <ul class="category-list">
                    <li><a href="#!">Store information</a></li>
                    <li><a href="/editor">Store appearance</a></li>
                    <li><a href="#!">Products in your store</a></li>
                </ul>
            </div>
        </div>

        <div class="profile-content">

        </div>
    </div>

</div>
@endsection