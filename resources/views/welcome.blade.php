<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-bs-theme="auto">

<head>
    <script src="{{ asset('assets/color-modes.js') }}"></script>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Playfair&#43;Display:700,900&amp;display=swap" rel="stylesheet">

    {{-- CSS --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('assets/blog.css') }}">

</head>

<body>
    <div class="container">
        <header class="border-bottom lh-1 py-3">
            <div class="row flex-nowrap justify-content-between align-items-center">
                <div class="col-6">
                    <a class="blog-header-logo text-body-emphasis text-decoration-none" href="#">NextMovie<span
                            class="text-danger">.</span></a>
                </div>
                <div class="col-6 d-flex justify-content-end align-items-center">
                    @if (Route::has('login'))
                    <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right z-10">
                        @auth
                        <a href="{{ url('/home') }}" class="btn btn-sm btn-primary">Home</a>
                        @else
                        <a href="{{ route('login') }}" class="btn btn-sm btn-primary">Login</a>

                        @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="ml-4 btn btn-sm btn-outline-primary">Register</a>
                        @endif
                        @endauth
                    </div>
                    @endif
                </div>
            </div>
        </header>
    </div>

    <main class="container mt-4">
        {{-- Hero --}}
        <div class="p-4 p-md-5 mb-4 rounded text-body-emphasis bg-body-secondary">
            <div class="col-lg-6 mx-auto">
                <div class="text-center px-0">
                    <h1 class="display-4 fst-italic">All The Best <span class="text-danger">Movie</span> From Around The World Is Here</h1>
                    <p class="lead my-3">
                        Multiple lines of text that form the lede, informing new readers quickly and
                        efficiently about what’s most interesting in this post’s contents.
                    </p>
                </div>
            </div>
        </div>

        {{-- News Card --}}
        <h3 class="pb-4 mb-4 fst-italic border-bottom">
            Update Movie<span class="text-danger">.</span>
        </h3>
        <div class="mb-4">
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-4">
                @foreach ($allMovie as $item)
                <div class="col">
                    <div class="card shadow-sm">
                        <img src="{{ asset('img/cover/' . $item->cover) }}" class="card-img-top" alt="..." style="height: 600px">
                        <div class="card-body">
                            <span class="badge bg-primary-subtle border border-primary-subtle text-primary-emphasis">
                                {{ $item->genre->nama_genre }}
                            </span>
                            <h5 class="card-title py-4">{{ Str::limit($item->judul, 30) }}</h5>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="btn-group">
                                    <a href="{{ route('single', $item->id) }}"
                                        class="btn btn-sm btn-outline-secondary">Read</a>
                                </div>
                                <small class="text-body-secondary">
                                    {{ $item->created_at->format('F j, Y') }}
                                </small>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </main>

    <div class="mt-auto text-body-secondary bg-body-tertiary">
        <div class="container">
            <footer class="py-5 d-flex flex-wrap text-center align-items-center justify-content-between">
                <div class="col-md-4 text-start">
                    <h1>NextMovie<span class="text-danger">.</span></h1>
                </div>
                <div class="col-md-4">
                    Website build with
                    <a href="https://getbootstrap.com/">Bootstrap</a> by <a
                        href="https://instagram.com/aaardnnn">@aaardnnn</a>
                </div>
                <div class="col-md-4 text-end">
                    <a href="#" class="btn btn-primary">Back to top</a>
                </div>
            </footer>
        </div>
    </div>

    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

</body>

</html>