@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h5>Genre</h5>
                    </div>
                    <div class="card-body">
                        <p class="card-title">Total of Genres</p>
                        <p class="card-text">{{ $allGenre }}</p>
                        <a href="/genre" class="btn btn-primary">
                            View
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h5>Movie</h5>
                    </div>
                    <div class="card-body">
                        <p class="card-title">Total of Movies</p>
                        <p class="card-text">{{ $allMovie }}</p>
                        <a href="/movie" class="btn btn-primary">
                            View
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
