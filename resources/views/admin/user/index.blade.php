@extends('layouts.admin')

@section('title', 'All users')

@section('page_css')
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
<style>
    .tabledit-save-button,
    .tabledit-confirm-button {
        width: 100%;
        margin-top: 5px;
    }
</style>
@endsection

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">All users</h1>
            </div><!-- /.col -->

            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Home</a></li>
                    <li class="breadcrumb-item active">All users</li>
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
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="container col-lg-12">
                    <div class=" panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Users</h3>
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        @csrf
                        <table id="editable" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Username</th>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Middle Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Country</th>
                                    <th>City</th>
                                    <th>Region</th>
                                    <th>Street address</th>
                                    <th>Street address 2</th>
                                    <th>Zip code</th>
                                    <th>Registered at</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($data as $row)
                                <tr>
                                    <td>{{ $row->id }}</td>
                                    <td>{{ $row->username }}</td>
                                    <td>{{ $row->first_name }}</td>
                                    <td>{{ $row->last_name }}</td>
                                    <td>{{ $row->middle_name }}</td>
                                    <td>{{ $row->email }}</td>
                                    <td>{{ $row->phone }}</td>
                                    <td>{{ $row->country_id }}</td>
                                    <td>{{ $row->city }}</td>
                                    <td>{{ $row->region }}</td>
                                    <td>{{ $row->street_address }}</td>
                                    <td>{{ $row->street_address_2 }}</td>
                                    <td>{{ $row->zip_code }}</td>
                                    <td>{{ $row->created_at }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.row -->
    </div><!-- /.container-fluid -->
</section>
<!-- /.content -->
@endsection

@section('page_js')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<script src="https://markcell.github.io/jquery-tabledit/assets/js/tabledit.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {

        $.ajaxSetup({
            headers: {
                'X-CSRF-Token': $("input[name=_token]").val()
            }
        });

        $('#editable').Tabledit({
            url: '{{ route("admin.user.action") }}',
            dataType: "json",
            columns: {
                identifier: [0, 'id'],
                editable: [
                    [1, 'username'],
                    [2, 'first_name'],
                    [3, 'last_name'],
                    [4, 'middle_name'],
                    [5, 'email'],
                    [6, 'phone'],
                    [7, 'country_id'],
                    [8, 'city'],
                    [9, 'region'],
                    [10, 'street_address'],
                    [11, 'street_address_2'],
                    [12, 'zip_code'],
                    [13, "created_at"]
                ]
                //editable:[[1, 'first_name'], [2, 'last_name'], [3, 'gender', '{"1":"Male", "2":"Female"}']]
            },
            restoreButton: false,
            onSuccess: function(data, textStatus, jqXHR) {
                if (data.action == 'delete') {
                    $('#' + data.id).remove();
                }
            }
        });

    });
</script>
@endsection