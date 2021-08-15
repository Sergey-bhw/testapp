@extends('layouts.app')
@section('content')
    <div class="container home">
        <div class="row">
            <div class="col-lg-3 newad">
                @if(Auth::check())
                <a href="{{ route('newad') }}">Add new advertisement</a>
                @endif
            </div>
            <div class="col-lg-3 offset-lg-6">Sorting:
                <select class="form-control" id="sorting" @change="changeSort($event)">
                    <option {{ !empty($_GET['sort']) && !empty($_GET['order']) && $_GET['sort'] == 'title' && $_GET['order'] == 'asc' ? 'selected' : ''}}
                    value='{"sort": "title", "order": "asc"}'>Title (ASC)</option>
                    <option {{ !empty($_GET['sort']) && !empty($_GET['order']) && $_GET['sort'] == 'title' && $_GET['order'] == 'desc' ? 'selected' : ''}}
                    value='{"sort": "title", "order": "desc"}'>Title (DESC)</option>
                    <option {{ !empty($_GET['sort']) && !empty($_GET['order']) && $_GET['sort'] == 'date' && $_GET['order'] == 'asc' ? 'selected' : ''}}
                    value='{"sort": "date", "order": "asc"}'>Date (ASC)</option>
                    <option {{ !empty($_GET['sort']) && !empty($_GET['order']) && $_GET['sort'] == 'date' && $_GET['order'] == 'desc' ? 'selected' : ''}}
                    value='{"sort": "date", "order": "desc"}'>Date (DESC)</option>
                </select>
            </div>
        </div>
        <div class="row">
            @foreach($ads as $ad)
            <div class="ad-item col-12 text-center pt-3">
                <h2 class="display-one mt-3">{{ $ad->title }}</h2>
                <br>
                @if (!empty($ad->photos) && count(json_decode($ad->photos)) > 0)
                <img src="{{ Storage::url(json_decode($ad->photos)[0]) }}" alt="Ad photo" />
                @endif
                <a href="/ad/{{ $ad->id }}" class="btn btn-outline-primary">View</a>
            </div>
            @endforeach
            {{ $ads->render() }}
        </div>
    </div>
@endsection