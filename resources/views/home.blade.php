@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            @foreach($ads as $ad)
            <div class="col-12 text-center pt-5">
                <h2 class="display-one mt-5">{{ $ad->title }}</h2>
                <br>
                <a href="/ad/{{ $ad->id }}" class="btn btn-outline-primary">View</a>
            </div>
            @endforeach
            {{ $ads->render() }}
            {{ $sort }}
        </div>
    </div>
@endsection