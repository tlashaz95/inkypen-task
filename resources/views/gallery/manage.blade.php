@extends('components.layout')

@section('gallery')
    <div class="container mt-20">
        <header class="text-center">
            <h3 class="text-2xl font-bold uppercase mb-1">
                <u>Manage Gallery</u>
            </h3>
            <a href="/create" class="mb-4 btn btn-link">Upload Images</a>
        </header>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Ser</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Display Image</th>
                    <th>Update</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($galleries as $gallery)
                    <tr>
                        <th scope="row">{{ $gallery->id }}</th>
                        <td>{{ $gallery->title }}</td>
                        <td>{{ $gallery->description }}</td>
                        <td><img src="display_images/{{ $gallery->display_image }}" class="img-responsive display_image" /></td>
                        <td><a href="/edit/{{ $gallery->id }}" class="btn btn-outline-primary">Update</a></td>
                        <td>
                            <form action="/delete/{{ $gallery->id }}" method="POST">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-outline-danger"
                                    onclick="return confirm('Are you sure?');">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
