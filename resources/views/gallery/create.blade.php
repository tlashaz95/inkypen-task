@extends('components.layout')

@section('gallery')

    <div class="container mt-20">
        <div class="items-center">
            <div class="col-md-6">
                <header class="text-center">
                    <h3 class="text-2xl font-bold uppercase mb-1">
                        Upload New Image(s)
                    </h3>
                </header>
                @if (count($errors) > 0)
                    @foreach ($errors->all() as $error)
                        <div class="alert alert-danger">{{ $error }}</div>
                    @endforeach
                @endif
                <form action="/gallery" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" class="form-control" name="title" placeholder="Title" maxlength="50" required>
                    </div>

                    <div class="form-group">
                        <label for="desc">Description</label>
                        <Textarea class="form-control" name="description" rows="3" placeholder="Description"></Textarea>
                    </div>

                    <div class="form-group">
                        <label for="display_image">Display Image</label>
                        <input type="file" id="input-file" class="form-control" name="display_image" required>
                    </div>

                    <div class="form-group">
                        <label for="display_image">Other Images</label>
                        <input type="file" id="input-file" class="form-control" name="images[]" multiple>
                    </div>

                    <button type="submit" class="submit_btn">Submit</button>
                </form>
            </div>
        </div>
    </div>
@endsection
