@extends('admin.layouts.admin')

@section('content')
    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Tables</h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        DataTables Advanced Tables
                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                            <thead>
                            <tr>
                                <th>ID </th>
                                <th> Title </th>
                                <th> Telephone </th>
                                <th style="width: 100px"> Date </th>
                                <th> Volume </th>
                                <th> Wherefrom</th>
                                <th> Where </th>
                                <th> User </th>
                                <th> Description </th>
                                <th> Action </th>

                            </tr>
                            </thead>
                            <tbody>
                            @foreach($load as $item)
                                <tr>
                                    <td>{{ $item->id }}</td>
                                    <td>{{ $item->title }}</td>
                                    <td>{{ $item->telefon }}</td>
                                    <td>{{ $item->data }}</td>
                                    <td>{{ $item->volume }}</td>
                                    <td>{{ $item->region1->name }}</td>
                                    <td>{{ $item->region2->name }}</td>
                                    <td>{{ $item->user->name }}</td>
                                    <td>{{ $item->description }}</td>
                                    <td style="width: 130px">
                                        <a href="{{ route('edit_load',$item->id) }}">
                                            <button type="button" class="btn btn-info" ><span>Edit</span></button>
                                        </a>
                                        <a href="{{ route('delete_load',$item->id) }}">
                                            <button type="button" class="btn btn-danger" ><span>Delete</span></button>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="panel-footer">
                        <a href="{{ route('add_load') }}">
                            <button type="button" class="btn btn-primary">Add new</button>
                        </a>
                    </div>
                    <!-- /.panel-body -->
                </div>
                <!-- /.panel -->
            </div>
            <!-- /.col-lg-12 -->
        </div>
    </div>
@endsection