@extends('product.layout')

@section('content')
    @csrf
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Manager Product</h2>
            </div>

            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('products.create') }}"> Create New Product</a>
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
            <th>Name</th>
            <th>Amount</th>
            <th>Money</th>
            <th>Department</th>
            <th>Status</th>
            <th>Purchase Date</th>
            <th>Delevery Date</th>
            <th>Person Delivery</th>
            <th>Depreciation rate</th>
            <th>Depreciation Amount</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($products as $product)
            <tr>
                <td>{{ $product->id }}</td>
                <td>{{ $product->name }}</td>
                <td>{{ $product->amount }}</td>
                <td>{{ $product->money }}</td>
                <td>{{ $product->department }}</td>
                <td>{{ $product->status }}</td>
                <td>{{ $product->purchase_date }}</td>
                <td>{{ $product->delivery_date }}</td>
                <td>{{ $product->personDelivery->name }}</td>
                <td>{{ $product->depreciation_rate }}</td>
                <td>{{ ($product->money * $product->depreciation_rate) / 100 }}</td>

                <td>
                    <form action="{{ route('products.destroy', $product->id) }}" method="POST">
                        <a class="btn btn-info" href="{{ route('products.show', $product->id) }}">Show</a>
                        <a class="btn btn-primary" href="{{ route('products.edit', $product->id) }}">Edit</a>
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
@endsection
