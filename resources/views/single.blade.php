<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-bs-theme="dark">

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
                                    <a href="{{ route('register') }}"
                                        class="ml-4 btn btn-sm btn-outline-primary">Register</a>
                                @endif
                            @endauth
                        </div>
                    @endif
                </div>
            </div>
        </header>
    </div>

    <main class="container">

        <div class="row g-5">
            <div class="col-md-8">
                <div class="my-4">
                    <h1 class="fst-italic">{{ $allMovie->judul }}</h1>
                    <span class="badge bg-primary-subtle border border-primary-subtle text-primary-emphasis mb-2">
                        {{ $allMovie->genre->nama_genre }}
                    </span>
                    <p>Created at : {{ $allMovie->created_at->format('F j, Y') }}</p>
                </div>
                <img src="{{ asset('img/cover/' . $allMovie->cover) }}" class="col-12 rounded mb-4">
                <p>{!! $allMovie->deskripsi !!}</p>
            </div>

            <div class="col-md-4">
                <div class="position-sticky" style="top: 2rem;">
                    <div class="p-4 my-4 bg-body-tertiary rounded">
                        <h4 class="fst-italic">Latest Movie<span class="text-danger">.</span></h4>
                        <p>Customize this section to tell your visitors a little bit about your
                            publication, writers, content, or something else entirely. Totally up to you.
                        </p>
                        <ul class="list-unstyled">
                            @foreach ($allMovieSingle as $item)
                                <li>
                                    <a class="d-flex flex-column flex-lg-row gap-3 align-items-start align-items-lg-center py-3 link-body-emphasis text-decoration-none border-top"
                                        href="{{ route('single', $item->id) }}">
                                        <img src="{{ asset('img/cover/' . $item->cover) }}" width="100"
                                            height="100%" alt="">

                                        <div class="col-lg-8">
                                            <h6 class="mb-0">{{ $item->judul }}</h6>
                                            <span
                                                class="badge bg-primary-subtle border border-primary-subtle text-primary-emphasis my-3">
                                                {{ $item->genre->nama_genre }}
                                            </span>
                                            <small class="text-body-secondary">
                                                {{ $item->created_at->format('F j, Y') }}
                                            </small>
                                        </div>
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                    <a class="btn btn-outline-primary mb-4" href="/">Back</a>
                </div>
            </div>
        </div>

    </main>

    <div class="text-body-secondary bg-body-tertiary">
        <div class="container">
            <footer
                class="py-5 d-flex flex-wrap text-center align-items-center justify-content-between">
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
