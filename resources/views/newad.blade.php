@extends('layouts.app')

@section('content')

    <!-- Bootstrap Boilerplate... -->

    <div class="panel-body">
        <h2>New advertisement</h2>
        <!-- Display Validation Errors -->
        @include('common.errors')
        @if(Auth::check())
        <!-- New AD Form -->
        <form action="/ad" method="POST" class="form-horizontal" enctype="multipart/form-data">
            {{ csrf_field() }}

            <!-- AD Name -->
            <div class="form-group">
                <label for="ad-name" class="col-sm-3 control-label">Advertising title</label>

                <div class="col-sm-6">
                    <input type="text" name="name" id="ad-name" class="form-control" maxlength="255">
                </div>
            </div>
            <div class="form-group">
                <label for="ad-description" class="col-sm-3 control-label">Advertising description</label>

                <div class="col-sm-6">
                    <textarea name="description" id="ad-description" class="form-control" maxlength="1023"></textarea>
                </div>
            </div>
            <div class="form-group">
                <label for="ad-photo1" class="col-sm-3 control-label">Advertising photo 1</label>

                <div class="col-sm-6">
                    <input type="file" name="photo1" id="ad-photo1" />
                </div>
            </div>
            <div class="form-group">
                <label for="ad-photo2" class="col-sm-3 control-label">Advertising photo 2</label>

                <div class="col-sm-6">
                    <input type="file" name="photo2" id="ad-photo2" />
                </div>
            </div>
            <div class="form-group">
                <label for="ad-photo3" class="col-sm-3 control-label">Advertising photo 3</label>

                <div class="col-sm-6">
                    <input type="file" name="photo3" id="ad-photo3" />
                </div>
            </div>

            <!-- Add AD Button -->
            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-6">
                    <button type="submit" class="btn btn-primary">
                        <i class="fa fa-plus"></i> Add Advertising
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