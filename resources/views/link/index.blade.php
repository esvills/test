@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card mb-4">
                    <div class="card-body">
                        <input value="{{ route('link',$link) }}" aria-label="" class="form-control" readonly>
                        <hr>
                        <a href="{{ route('link.deactivated',$link) }}" class="btn btn-warning">
                            Deactivated this link
                        </a>
                        <a href="{{ route('link.new',$link) }}" class="btn btn-success">New link</a>
                        <hr>
                        <a href="{{ route('game',$link) }}" class="btn btn-success">Im feeling lucky</a>
                        <a href="{{ route('game.history',$link) }}" class="btn btn-primary">History</a>
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
