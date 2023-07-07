@extends('product.layout')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Add New Suggest</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('suggest.index') }}"> Back</a>
            </div>
        </div>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- <form action="{{ route('suggests.store') }}" method="POST" enctype="multipart/form-data"> --}}
    @csrf

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Product:</strong>
                <input type="text" name="Product" class="form-control" placeholder="Product">
            </div>
        </div>
        <div class="col-xs-6 col-sm-6 col-md-12">
            <div class="form-group">
                <strong>Type:</strong>
                {{-- <select name="product_type_id" class="form-control">
                        @foreach ($productTypes as $productType)
                            <option value="{{ $productType->id }}">{{ $productType->product_type_name }}</option>
                        @endforeach
                    </select> --}}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
    </form>
@endsection
