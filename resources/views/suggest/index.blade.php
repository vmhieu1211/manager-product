@extends('suggest.layout')

@section('content')
    @csrf
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Manager Suggest</h2>
            </div>

            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('suggests.create') }}"> Create New Suggest</a>
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
            <th>Amount</th>
            <th>Money</th>
            <th>Type</th>
            <th>Asset Type</th>
            <th>Person Suggest</th>
            <th>Department  Suggest</th>
            <th>Suggest Date</th>
            <th>Status</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($suggests as $suggests)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $suggests->products_name }}</td>
                <td>{{ $suggests->amount }}</td>
                <td>{{ $suggests->money }}</td>
                <td>{{ $suggests->suggest_type }}</td>
                <td>{{ $suggests->asset_type }}</td>
                <td>{{ $suggests->personSuggest->name }}</td>
                <td>{{$suggests->department_suggest}}</td>
                <td>{{ $suggests->suggest_date }}</td>
                <td>{{ $suggests->status }}</td>
                <td>
                    <form action="{{ route('suggests.destroy', $suggests->id) }}" method="POST">
                        <a class="btn btn-info" href="{{ route('suggests.show', $suggests->id) }}">Show</a>
                        <a class="btn btn-primary" href="{{ route('suggests.edit', $suggests->id) }}">Edit</a>
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
@endsection
