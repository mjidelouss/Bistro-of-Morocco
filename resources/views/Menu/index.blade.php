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
        </table>
@endsection