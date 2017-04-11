@extends('admin.layouts.admin')

@section('content')
    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Адрес
                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                            <thead>
                            <tr>
                                <th>ID </th>
                                <th> Name </th>
                                <th> Action </th>

                            </tr>
                            </thead>
                            <tbody>
                            @foreach($region as $item)
                                <tr>
                                    <td>{{ $item->id }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>
                                        <a href="{{ route('edit_region',$item->id) }}">
                                            <button type="button" class="btn btn-info" ><span>Edit</span></button>
                                        </a>
                                        <a href="{{ route('delete_region',$item->id) }}">
                                            <button type="button" class="btn btn-danger" ><span>Delete</span></button>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="panel-footer">
                        <a href="{{ route('add_region_get') }}">
                            <button type="button" class="btn btn-primary">Add address</button>
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