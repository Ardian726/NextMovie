@extends('layouts.app')

@section('content')
    <div class="container mb-4">
        <form action="{{ route('movie.update', $movie->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex justify-content-between">
                            <h5 class="fw-bold my-auto">Update Movie</h5>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="namaJudul" class="form-label">Movie Title</label>
                            <input type="text" name="judul" class="form-control" id="namaJudul"
                                value="{{ $movie->judul }}">
                            @error('judul')
                                <p class='text-danger mb-0 text-xs pt-1'> {{ $message }} </p>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="cover" class="form-label">Cover</label>
                            <input accept="image/*" type="file" name="cover" class="form-control" id="imageFile"
                                onchange="previewImage()">
                            @error('cover')
                                <p class='text-danger mb-0 text-xs pt-1'> {{ $message }} </p>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="genreSelect" class="form-label">Genre</label>
                            <select class="form-select" name="genre_id" id="genreSelect">
                                <option selected="" value="">-- Select Genre --</option>
                                @foreach ($genre as $itemG)
                                    @if ($itemG->id === $movie->genre_id)
                                        <option value="{{ $itemG->id }}" selected>{{ $itemG->nama_genre }}
                                        </option>
                                    @else
                                        <option value="{{ $itemG->id }}">{{ $itemG->nama_genre }}</option>
                                    @endif
                                @endforeach
                            </select>
                            @error('genre_id')
                                <p class='text-danger mb-0 text-xs pt-1'> {{ $message }} </p>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="deskripsi" class="form-label">Description</label>
                            <textarea class="form-control" id="editor" name="deskripsi" style="height:350px;">{{ $movie->deskripsi }}</textarea>
                            @error('deskripsi')
                                <p class='text-danger mb-0 text-xs pt-1'> {{ $message }} </p>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">Update</button>
                        <a href="/movie" class="btn btn-outline-secondary">Cancel</a>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
