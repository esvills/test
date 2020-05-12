@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('admin.users.index') }}">Users</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Show user</li>
                    </ol>
                </nav>
            </div>
            <div class="col-md-12">
                <div class="card mb-4">
                    <div class="card-header">
                        <div class="float-left">
                            {{ $user->login }} #{{ $user->id }}
                        </div>
                        <div class="float-right">

                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="card-body">
                        <form>
                            <div class="form-group">
                                <label for="inputId">Id</label>
                                <input type="text" value="{{ $user->id }}" class="form-control" id="inputId" readonly>
                            </div>
                            <div class="form-group">
                                <label for="inputLogin">Login</label>
                                <input type="text" value="{{ $user->login }}" class="form-control" id="inputLogin"
                                       readonly>
                            </div>
                            <div class="form-group">
                                <label for="inputPhone">Phone</label>
                                <input type="text" value="{{ $user->phone }}" class="form-control" id="inputPhone"
                                       readonly>
                            </div>
                        </form>
                    </div>
                    <div class="card-footer text-center">
                        <form method="POST" action="{{ route('admin.users.destroy',$user->id) }}">
                            @method('DELETE')
                            @csrf
                            <a href="{{ route('admin.users.edit',$user->id) }}"
                               class="btn btn-primary">Edit</a>
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
