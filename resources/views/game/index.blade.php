@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card mb-4">
                    <div class="card-body">
                        <div class="alert @if($isWin) alert-success @else alert-danger @endif">
                            @if($isWin)
                                <p>You're win</p>
                                <p>Win sum <b>{{ $winSum }}</b></p>
                            @else
                                <p>You're lose</p>
                            @endif
                        </div>

                        <a href="{{ route('game',$link) }}" class="btn btn-success">Im feeling lucky</a>
                        <a href="{{ route('game.history',$link) }}" class="btn btn-primary">History</a>
                        <a href="{{ route('link',$link) }}" class="btn btn-primary">Link info</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
