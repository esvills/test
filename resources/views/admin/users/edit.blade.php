@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('admin.users.index') }}">Users</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Edit user</li>
                    </ol>
                </nav>
            </div>
            <div class="col-md-12">
                <div class="card mb-4">
                    <div class="card-header">
                        <div class="float-left">
                            Edit {{ $user->login }} #{{ $user->id }}
                        </div>
                        <div class="float-right">

                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="card-body">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        @if (session()->has('success'))
                            <div class="alert alert-success">
                                <p>{{ session()->get('success') }}</p>
                            </div>
                        @endif
                        <form action="{{ route('admin.users.update', $user->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="inputId">Id</label>
                                <input type="text" value="{{ $user->id }}" class="form-control" id="inputId" readonly>
                            </div>
                            <div class="form-group">
                                <label for="inputLogin">Login</label>
                                <input type="text" name="login" value="{{ $user->login }}" class="form-control"
                                       id="inputLogin">
                            </div>
                            <div class="form-group">
                                <label for="phone">Phone</label>
                                <input type="text" name="phone" value="{{ $user->phone }}" class="form-control"
                                       id="phone">
                            </div>
                            <div class="form-group">
                                <button class="btn btn-success">Update</button>
                            </div>
                        </form>
                    </div>
                    <div class="card-footer text-center">
                        <form method="POST" action="{{ route('admin.users.destroy',$user->id) }}">
                            @method('DELETE')
                            @csrf
                            <a href="{{ route('admin.users.show',$user->id) }}"
                               class="btn btn-primary">Show</a>
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.0/js/intlTelInput.min.js"
            integrity="sha256-UdcCVwk4oBi9snhU+B1lephRJyhUgx6ft7OP8K+Eikg=" crossorigin="anonymous"></script>

    <script>
        var input = document.getElementById("phone");
        window.intlTelInput(input, {
            preferredCountries: ['UA'],
            nationalMode: !1,
            autoHideDialCode: false,
            autoPlaceholder: true,
            initialCountry: "auto",
            geoIpLookup(e) {
                e('UA')
            }
        });
    </script>
@endpush
@push('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.0/css/intlTelInput.css"
          integrity="sha256-rTKxJIIHupH7lFo30458ner8uoSSRYciA0gttCkw1JE=" crossorigin="anonymous"/>
@endpush
