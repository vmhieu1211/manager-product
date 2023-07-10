@extends('user.layout')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>User Manager</h2>
            </div>
            <div class="pull-right">
                {{-- @can('user-create') --}}
                    <a class="btn btn-success" href="{{ route('users.create') }}"> Create New User</a>
                {{-- @endcan --}}

                @if (Auth::check())
                    <a class="btn btn-success" href=" "> Logout</a>
                @endif

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
            <th>Id</th>
            <th>Name</th>
            <th>Email</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($users as $user)
            <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>
                    <form action="{{ route('users.destroy', $user->id) }}" method="POST">
                        <a class="btn btn-info" href="{{ route('users.show', $user->id) }}">Show</a>
                        {{-- @can('user-edit') --}}
                        <a class="btn btn-primary" href="{{ route('users.edit', $user->id) }}">Edit</a>
                        {{-- @endcan --}}

                        {{-- @can('user-delete') --}}
                        <form action="{{ route('users.destroy', $user->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                        {{-- @endcan --}}
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
@endsection
