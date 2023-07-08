@extends('suggest.layout')
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit Suggest</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('products.index') }}"> Back</a>
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

    <form action="{{ route('suggest.update', $suggest->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Product:</strong>
                    <input type="text" name="products_name" value="{{ $suggest->products_name }}" class="form-control"
                        placeholder="Name">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Amount:</strong>
                    <input type="text" name="amount" value="{{ $suggest->amount }}" class="form-control"
                        placeholder="Amount">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Money:</strong>
                    <input type="text" name="money" value="{{ $suggest->money }}" class="form-control"
                        placeholder="Money">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Type:</strong>
                    <select name="suggest_type" class="form-control" required>
                        <option value="buy">Mua</option>
                        <option value="sell">Bán</option>
                    </select>
                </div>
            </div>
            <div class="col-xs-6 col-sm-6 col-md-12">
                <div class="form-group">
                    <strong>Suggest Date:</strong>
                    <input type="date" name="suggest_date" class="form-control" placeholder="Suggest Date" required>
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Status:</strong>
                    <select name="status" class="form-control" required>
                        <option value="not_approved">Not aprroved</option>
                        <option value="approved">Approved</option>
                        <option value="done">Done</option>
                    </select>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </form>
@endsection
