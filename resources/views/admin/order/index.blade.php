@extends('layouts.admin')

@section('title', 'New Orders')

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
                <h1 class="m-0">New Orders</h1>
            </div><!-- /.col -->

            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Home</a></li>
                    <li class="breadcrumb-item active">New Orders</li>
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
                                    <th>Status</th>
                                    <th>User ID</th>
                                    <th>Final Price</th>
                                    <th>Created At</th>
                                    <th>Updated At</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($data as $row)
                                <tr>
                                    <td>{{ $row->id }}</td>
                                    <td>{{ $row->status }}</td>
                                    <td>{{ $row->user_id }}</td>
                                    <td>{{ $row->price_final }}</td>
                                    <td>{{ $row->created_at }}</td>
                                    <td>{{ $row->updated_at }}</td>
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
                    [1, 'status' , '{"1":"cart", "2":"processed", "3":"completed", "4":"rejected"}'],
                    [2, 'first_name'],
                    [3, 'user_id'],
                    [4, 'price_final'],
                    [5, 'created_at'],
                    [6, 'updated_at'],
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