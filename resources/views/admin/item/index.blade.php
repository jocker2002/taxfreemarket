@extends('layouts.admin')

@section('title', 'All items')

@section('page_css')
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
<style>
    .tabledit-save-button,
    .tabledit-confirm-button {
        width: 100%;
        margin-top: 5px;
    }

    .red-button {
        padding: 10px 20px;
        color: white;
        background-color: #F4364C;
        border-radius: 10px;
        font-size: 16px;
        font-weight: bold;
        border: none;
        transition: 100ms;
    }

    .red-button:hover {
        background-color: #ed1d24;
    }

</style>
@endsection

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-4">
                <h1 class="m-0">All items</h1>
            </div><!-- /.col -->

            <div class="col-sm-4">
                <button class="red-button" onclick="window.location.href='/upd'">
                    Update Items
                </button>
            </div>

            <div class="col-sm-4">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Home</a></li>
                    <li class="breadcrumb-item active">All items</li>
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
                        <h3 class="panel-title">Items</h3>
                    </div>
                    <div class="panel-body">
                        <div class="table-responsive">
                            @csrf
                            <table id="editable" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Item ID</th>
                                        <th>Type</th>
                                        <th>Brand</th>
                                        <th>Name</th>
                                        <th>Code</th>
                                        <th>Intra</th>
                                        <th>Made in</th>
                                        <th>Intangible</th>
                                        <th>Online</th>
                                        <th>Weight</th>
                                        <th>Availability</th>
                                        <th>Price</th>
                                        <th>Currency</th>
                                        <th>Created at</th>
                                        <th>Updated at</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($data as $row)
                                    <tr>
                                        <td>{{ $row->id }}</td>
                                        <td>{{ $row->item_id }}</td>
                                        <td>{{ $row->type }}</td>
                                        <td>{{ $row->brand }}</td>
                                        <td>{{ $row->name }}</td>
                                        <td>{{ $row->code }}</td>
                                        <td>{{ $row->intra }}</td>
                                        <td>{{ $row->madein }}</td>
                                        <td>{{ $row->intangible }}</td>
                                        <td>{{ $row->online }}</td>
                                        <td>{{ $row->weight }}</td>
                                        <td>{{ $row->availability }}</td>
                                        <td>{{ $row->sellPrice }}</td>
                                        <td>{{ $row->currency }}</td>
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
            url: '{{ route("admin.item.action") }}',
            dataType: "json",
            columns: {
                identifier: [0, 'id'],
                editable: [
                    [1, 'item_id'],
                    [2, 'type'],
                    [3, 'brand'],
                    [4, 'name'],
                    [5, 'code'],
                    [6, 'intra'],
                    [7, 'madein'],
                    [8, 'intangible'],
                    [9, 'online'],
                    [10, 'weight'],
                    [11, 'availability'],
                    [12, "sellPrice"],
                    [13, "currency"],
                    [14, "created_at"],
                    [15, "updated_at"]
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