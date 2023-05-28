@extends('layouts.admin')

@section('title', 'Add item')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Add user</h1>
            </div><!-- /.col -->

            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Home</a></li>
                    <li class="breadcrumb-item active">Add user</li>
                </ol>
            </div>

            <!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<section class="content">
    <div class="container-fluid">

        @if(session('success'))
        <div class="alert alert-success" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
            <h4><i class="icon fa fa-check"></i>{{ session('success') }}</h4>
        </div>
        @endif

        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-md-8" style="margin:auto">
                <div class="card card-primary">
                    <!-- form start -->
                    <form action="{{ route('user.store') }}" method="POST">
                        @csrf
                        <div class="card-body row">

                            <div class="form-group col-md-6">
                                <label for="InputEmail">Email address</label>
                                <input type="email" name="email" class="form-control" id="InputEmail" placeholder="Enter email" required>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="InputPassword">Password</label>
                                <input type="password" name="password" class="form-control" id="InputPassword" placeholder="Password" required>
                            </div>

                            <div class="form-group col-md-4">
                                <label for="InputEmail">First name</label>
                                <input type="text" name="first_name" class="form-control" id="InputUsername" placeholder="First name">
                            </div>

                            <div class="form-group col-md-4">
                                <label for="InputEmail">Last name</label>
                                <input type="text" name="last_name" class="form-control" id="InputUsername" placeholder="Last name">
                            </div>

                            <div class="form-group col-md-4">
                                <label for="InputEmail">Middle name</label>
                                <input type="text" name="middle_name" class="form-control" id="InputUsername" placeholder="Middle name">
                            </div>

                            <div class="form-group col-md-12">
                                <label for="InputEmail">Username</label>
                                <input type="text" name="username" class="form-control" id="InputUsername" placeholder="Username">
                            </div>

                            <div class="form-group col-md-6">
                                <label for="InputCountry">Country</label>
                                <select name="country_id" class="form-control" id="InputCountry" placeholder="Country">
                                    <option value="" selected hidden>Select a country</option>
                                    <option value="1">USA</option>
                                    <option value="2">RUSSIA</option>
                                    <option value="3">LATVIA</option>
                                </select>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="InputPhone">Phone</label>
                                <input type="text" name="phone" class="form-control" id="InputPhone" placeholder="Phone">
                            </div>

                            <div class="form-group col-md-4">
                                <label for="InputCity">City</label>
                                <input type="text" name="city" class="form-control" id="InputCity" placeholder="City">
                            </div>

                            <div class="form-group col-md-4">
                                <label for="InputRegion">Region</label>
                                <input type="text" name="region" class="form-control" id="InputRegion" placeholder="Region">
                            </div>

                            <div class="form-group col-md-4">
                                <label for="InputZipcode">Zip code</label>
                                <input type="text" name="zip_code" class="form-control" id="InputZipcode" placeholder="Zip code">
                            </div>

                            <div class="form-group col-md-6">
                                <label for="InputStreetAddress">Street address</label>
                                <input type="text" name="street_address" class="form-control" id="InputStreetAddress" placeholder="Street address">
                            </div>

                            <div class="form-group col-md-6">
                                <label for="InputStreetAddress2">Street address 2</label>
                                <input type="text" name="street_address_2" class="form-control" id="InputStreetAddress2" placeholder="Street address 2">
                            </div>

                            <!--
                            <div class="form-group">
                                <label for="InputFile">File input</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="InputFile">
                                        <label class="custom-file-label" for="InputFile">Choose file</label>
                                    </div>
                                    <div class="input-group-append">
                                        <span class="input-group-text">Upload</span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="Check1">
                                <label class="form-check-label" for="Check1">Check me out</label>
                            </div>
                            -->
                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer row">
                            <button type="submit" class="btn btn-primary col-md-6" style="margin:auto">Submit</button>
                        </div>
                    </form>
                </div>
            </div>


        </div>
        <!-- /.row -->

    </div><!-- /.container-fluid -->
</section>
<!-- /.content -->
@endsection