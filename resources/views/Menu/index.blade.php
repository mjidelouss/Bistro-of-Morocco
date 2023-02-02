@extends('controlPanel')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Control Panel</h2>
            </div>
            <div class="pull-right" style="margin-bottom: 10px">
            <a class="btn btn-success" href="#"> Add Item</a>
            </div>
        </div>
        <table class="table table-bordered">
            <tr>
                <th>No</th>
                <th>Image</th>
                <th>Name</th>
                <th>Details</th>
                <th width="280px">Action</th>
            </tr>
            @foreach ($items as $item)
            <tr>
            <td>{{ ++$i }}</td>
            <td><img src="/img/{{ $item->image }}" width="100px"></td>
            <td>{{ $item->name }}</td>
            <td>{{ substr($item->description, 0,  130) . '...' }}</td>
            <td>
                <form action="" method="POST">
                    <a class="btn btn-info" href="">Show</a>
                    <a class="btn btn-primary" href="">Edit</a>
                    
                    @csrf
                    @method('DELETE')

                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
        </table>
@endsection