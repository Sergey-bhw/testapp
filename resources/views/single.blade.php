@extends('layouts.app')
@section('content')
    <div class="container single">
        <div class="row">
            <div class="col-12 text-center pt-5">
                <h2 class="display-one">{{ $ad->title }}</h2>
                <p>{{ $ad->description }}</p>
                @if ($isAuthor)
                <a href="{{ route('editad', ['id' => $ad->id]) }}">Edit</a>
                @endif
                @foreach(json_decode($ad->photos) as $photo)
                    <img src="{{ Storage::url($photo) }}" alt="Ad photo" />
                @endforeach
            </div>
        </div>
    </div>
@endsection