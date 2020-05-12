@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card mb-4">
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Win</th>
                                    <th>Sum</th>
                                    <th>Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($items as $item)
                                    <tr>
                                        <td>{{ $item->win ? 'win' : 'lose' }}</td>
                                        <td>{{ $item->win ? $item->win_sum : '-' }}</td>
                                        <td>{{ $item->created_at }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                        <a href="{{ route('game',$link) }}" class="btn btn-success">Im feeling lucky</a>
                        <a href="{{ route('game.history',$link) }}" class="btn btn-primary">History</a>
                        <a href="{{ route('link',$link) }}" class="btn btn-primary">Link info</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
