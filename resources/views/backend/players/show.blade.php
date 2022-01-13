@extends('backend.layouts.app')
@section('title', 'View Player Details')

@section('content')

    <div class="row">
        <div class="col-12">
            <div class="card-box">
                <div class="row">
                    <div class="col-md-4">
                        <img class="w-75" src="{{ $player['photo_large'] }}" alt="">
                    </div>
                    <div class="col-md-4">
                        <h1 class="player_name">{{ $player['first_name'] . ' ' . $player['second_name'] }}</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
