@extends('product.layout')

@section('content')
    @csrf
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Manager Product</h2>
            </div>

            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('suggest.create') }}"> Create New Suggest</a>
                <a class="btn btn-success" href=""> Logout</a>
            </div>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Product</th>
            <th>Type</th>
            <th>Suggest Date</th>
            <th>People Suggest</th>
            <th>State</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($suggests as $suggests)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $suggests->product->product_name }}</td>
                <td>{{ $suggests->suggest_type }}</td>
                <td>{{ $suggests->suggest_date }}</td>
                <td>{{ $suggests->person_suggest_id }}</td>
                <td>{{ $suggests->state }}</td>
                <td>
                    <form action="" method="POST">
                        <a class="btn btn-info" href="">Show</a>
                        {{-- @can('product-edit') --}}
                        <a class="btn btn-primary" href="">Edit</a>
                        {{-- @endcan --}}
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
@endsection
