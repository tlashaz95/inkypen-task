@extends('components.layout')

@section('gallery')

    <div class="wrapper">
        <div>
            <header class="text-center">
                <h1 class="text-5xl mt-4 mb-3">Your Image Gallery</h1>
                <p class="punchline text-xl font-bold uppercase mb-12">save your memories</p>
            </header>

            <div class="gallery">
                @foreach ($galleries as $gallery)
                    <a href="/show/{{ $gallery->id }}">
                        <div class="card">
                            <div class="imgBx">
                                <img src="display_images/{{ $gallery->display_image }}" />
                            </div>
                            <div class="contentBx">
                                <h2>{{ $gallery->title }}</h2>
                                <div class="desc">
                                    <p>{{ $gallery->description }}</p>
                                </div>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    </div>

@endsection
