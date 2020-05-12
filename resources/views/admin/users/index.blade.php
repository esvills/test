@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Users</li>
                    </ol>
                </nav>
            </div>
            <div class="col-md-12">
                <div class="card mb-4">
                    <div class="card-header">
                        <div class="float-left">
                            Users
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('admin.users.create') }}">Create user</a>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="card-body">
                        @if (session()->has('success'))
                            <div class="alert alert-success">
                                <p>{{ session()->get('success') }}</p>
                            </div>
                        @endif
                        <table class="table">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Login</th>
                                <th>Phone</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($users as $user)
                                <tr>
                                    <td>{{ $user->id }}</td>
                                    <td>{{ $user->login }}</td>
                                    <td>{{ $user->phone }}</td>
                                    <td>

                                        <form method="POST" action="{{ route('admin.users.destroy',$user->id) }}">
                                            @method('DELETE')
                                            @csrf
                                            <a href="{{ route('admin.users.show',$user->id) }}"
                                               class="btn btn-primary">Show</a>
                                            <a href="{{ route('admin.users.edit',$user->id) }}"
                                               class="btn btn-primary">Edit</a>
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer">
                        {!! $users->links() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
