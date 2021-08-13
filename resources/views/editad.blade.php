@extends('layouts.app')

@section('content')

    <!-- Bootstrap Boilerplate... -->

    <div class="panel-body">
        <!-- Display Validation Errors -->
        @include('common.errors')
        @if(Auth::check())
        <!-- New AD Form -->
        <form action="/editad/{{ $ad->id }}" method="POST" class="form-horizontal" enctype="multipart/form-data">
            {{ csrf_field() }}

            <!-- AD Name -->
            <div class="form-group">
                <label for="ad-name" class="col-sm-3 control-label">Advertising title</label>

                <div class="col-sm-6">
                    <input value="{{ $ad->title }}" type="text" name="name" id="ad-name" class="form-control" maxlength="255">
                </div>
            </div>
            <div class="form-group">
                <label for="ad-description" class="col-sm-3 control-label">Advertising description</label>

                <div class="col-sm-6">
                    <textarea name="description" id="ad-description" class="form-control" maxlength="1023">{{ $ad->description }}</textarea>
                </div>
            </div>
            @foreach(json_decode($ad->photos) as $photo)
                <img src="{{ Storage::url($photo) }}" alt="Ad photo" />
            @endforeach

            <!-- Add AD Button -->
            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-6">
                    <button type="submit" class="btn btn-primary">
                        <i class="fa fa-plus"></i> Save Advertising
                    </button>
                </div>
            </div>
        </form>
        @else
        <h2>Please, log into your account to view this page</h2>
        @endif
    </div>

    <!-- TODO: Current Tasks -->
@endsection