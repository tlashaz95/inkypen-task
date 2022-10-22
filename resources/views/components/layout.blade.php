<!doctype html>
<html lang="en">

<head>
    <title>InkyPen - Image Gallery</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}" />
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
        integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css"
        integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous" />

    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>

    <nav class="navBar flex justify-between items-center">
        <a href="/"><img class="w-40 mt-2 mb-2 ml-12" src="{{ asset('assets/images/logo.png') }}" alt="" /></a>
        <a href="/"><img src="{{ asset('assets/images/iGallery.png') }}" class="w-40 mt-2 mb-2 ml-12" /></a>
        <ul class="flex mr-12 text-xl">
            <li>
                <a href="/manage-gallery" class="hover:text-laravel"><i class="fa-solid fa-gear"></i>
                    Manage Gallery</a>
            </li>

        </ul>
    </nav>

    @yield('gallery')

    <script src="{{ asset('assets/js/customSlider.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</body>

</html>
