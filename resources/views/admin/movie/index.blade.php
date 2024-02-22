@extends('layouts.app')

@section('content')
    <div class="container mb-4">
        <form action="{{ route('movie.perform') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex justify-content-between">
                            <h5 class="fw-bold my-auto">Create Movies</h5>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="namaJudul" class="form-label">Movies Title</label>
                            <input type="text" name="judul" class="form-control" id="namaJudul">
                            @error('judul')
                                <p class='text-danger mb-0 text-xs pt-1'> {{ $message }} </p>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="sutradara" class="form-label">Director</label>
                            <input type="text" name="sutradara" class="form-control" id="sutradara">
                            @error('sutradara')
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
                                    <option value="{{ $itemG->id }}">{{ $itemG->nama_genre }}</option>
                                @endforeach
                            </select>
                            @error('genre_id')
                                <p class='text-danger mb-0 text-xs pt-1'> {{ $message }} </p>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="deskripsi" class="form-label">Description</label>
                            <textarea class="form-control" id="editor" name="deskripsi"></textarea>
                            @error('deskripsi')
                                <p class='text-danger mb-0 text-xs pt-1'> {{ $message }} </p>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">Create</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <div class="container">
        <div class="card">
            <div class="card-header">
                <div class="d-flex justify-content-between">
                    <h5 class="fw-bold my-auto">All of Movie</h5>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive small">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Id</th>
                                <th scope="col">Title</th>
                                <th scope="col">Desciption</th>
                                <th scope="col">Category</th>
                                <th scope="col">Director</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $i = 1;
                            @endphp
                            @foreach ($allMovie as $item)
                                <tr>
                                    <th scope="row">{{ $i }}</th>
                                    <td>{{ Str::limit($item->judul, 10) }}</td>
                                    <td>{!! Str::words($item->deskripsi, 20) !!}</td>
                                    <td>{{ $item->sutradara }}</td>
                                    <td>{{ $item->genre->nama_genre }}</td>
                                    <td>
                                        <div class="d-flex">
                                            <a href="{{ route('movie.edit', $item->id) }}"
                                                class="btn btn-success btn-sm ms-1">
                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                    class="icon icon-tabler icon-tabler-edit" width="15" height="15"
                                                    viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                                    fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                    <path d="M7 7h-1a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-1" />
                                                    <path
                                                        d="M20.385 6.585a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3l8.385 -8.415z" />
                                                    <path d="M16 5l3 3" />
                                                </svg>
                                            </a>
                                            <form onsubmit="return confirm('Sure To Delete This Movie')"
                                                action="{{ route('movie.delete', $item->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-sm btn-danger mb-0 ms-1">
                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                        class="icon icon-tabler icon-tabler-trash" width="15"
                                                        height="15" viewBox="0 0 24 24" stroke-width="2"
                                                        stroke="currentColor" fill="none" stroke-linecap="round"
                                                        stroke-linejoin="round">
                                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                        <path d="M4 7l16 0" />
                                                        <path d="M10 11l0 6" />
                                                        <path d="M14 11l0 6" />
                                                        <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" />
                                                        <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" />
                                                    </svg>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                                @php
                                    $i++;
                                @endphp
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
