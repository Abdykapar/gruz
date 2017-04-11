@extends('admin.layouts.admin')

@section('content')
    <div id="page-wrapper">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Machine types</div>
                    <div class="panel-body">
                        <table class="table">
                                <tr>
                                    <th>ID </th>
                                    <th> Name </th>
                                    <th> Action </th>

                                </tr>
                            @foreach($category1 as $item)
                                <tr>
                                    <td>{{ $item->id }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>
                                        <a href="{{ route('edit_type',$item->id) }}">
                                            <button type="button" class="btn btn-info" ><span>Edit</span></button>
                                        </a>
                                        <a href="{{ route('delete_type',$item->id) }}">
                                            <button type="button" class="btn btn-danger" ><span>Delete</span></button>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach

                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection