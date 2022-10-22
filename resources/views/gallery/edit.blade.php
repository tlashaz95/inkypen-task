@extends('components.layout')

@section('gallery')

    <div class="container mt-20">
        <div class="row items-center">

            <div class="offset-md-2 col-md-3">
                <h3 class="text-2xl font-bold mb-2">Display Image</h3>
                <img src="/display_images/{{ $gallery->display_image }}" class="img-responsive display_image_update"
                    alt="Display Image" />

                @if (count($gallery->images) > 0)
                    <h3 class="text-2xl font-bold mt-4 mb-2">Other image(s)</h3>
                    @foreach ($gallery->images as $img)
                        <img src="/images/{{ $img->image }}" class="img-responsive display_image mt-2 mr-4"
                            alt="Other image" />
                    @endforeach
                @endif
            </div>
            <div class="col-md-6 uploadForm">
                <header class="text-center">
                    <h3 class="text-2xl font-bold uppercase mb-1">
                        Edit {{ $gallery->title }}
                    </h3>
                </header>
                <form action="/update/{{ $gallery->id }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" class="form-control" name="title" value="{{ $gallery->title }}" maxlength="50"
                            required />
                    </div>

                    <div class="form-group">
                        <label for="desc">Description</label>
                        <Textarea class="form-control" name="description" rows="3">{{ $gallery->description }}</Textarea>
                    </div>

                    <div class="form-group">
                        <label for="display_image">Display Image</label>
                        <input type="file" id="input-file" class="form-control" name="display_image" />
                    </div>

                    <div class="form-group">
                        <label for="display_image">Other Images</label>
                        <input type="file" id="input-file" class="form-control" name="images[]" multiple />
                    </div>

                    <button type="submit" class="submitBtn">Submit</button>
                </form>
            </div>
        </div>
    </div>
@endsection
