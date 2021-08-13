@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12 text-center pt-5">
                <h2 class="display-one mt-5">{{ $ad->title }}</h2>
                <p>{{ $ad->description }}</p>
                @foreach(json_decode($ad->photos) as $photo)
                    <img src="{{ Storage::url($photo) }}" alt="Ad photo" />
                @endforeach
            </div>
        </div>
    </div>
@endsection