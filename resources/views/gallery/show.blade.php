@extends('components.layout')

@section('gallery')
    <div class="wrapper">
        <div class="container">
            <header class="flex flex-col mt-8">
                <h1 class="text-3xl">{{ $gallery->title }}</h1>
                <p class="text-xl mt-4">{{ $gallery->description }}</p>
            </header>

            <div class="slider">
                <div class="slider_left">
                    <img src="/display_images/{{ $gallery->display_image }}" class="img-responsive display_image_slider"
                        alt="Display Image" />
                </div>
                <div class="slider_right">
                    @if (count($gallery->images) > 0)
                        @foreach ($gallery->images as $img)
                            <div class="sliderImgs fade">
                                <img src="/images/{{ $img->image }}" class="slider_img" alt="Other images" />
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
