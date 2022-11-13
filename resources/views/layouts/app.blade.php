<!DOCTYPE html>
<html lang="{{ str_replace("_", "-", app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Autour+One&display=swap" rel="stylesheet">
        <link href="{{ asset("css/app.css") }}" rel="stylesheet">
        <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">

        <style>
            body {
                font-family: "Nunito", sans-serif;
            }

            h1 {
                font-family: "Autour One", cursive;
            }
        </style>
    </head>
    <body class="bg-gray-100">
        <div class="container w-11/12 mt-8 mx-auto lg:w-2/3">
            <header class="flex flex-wrap items-center justify-between mb-12">
                <h1 class="text-6xl">The Dog House</h1>

                {{-- Buttons to allow the user to easily switch between pages --}}
                <aside class="flex flex-wrap gap-3 mt-8 xl:mt-0 w-full xl:w-auto">
                    <a href="{{ route("pictures.create") }}" class="w-full ml-auto bg-blue-500 hover:bg-blue-700 text-white font-bold py-4 px-4 rounded xl:w-auto lg:py-2">
                        Add your own dog
                    </a>

                    <a href="{{ url()->previous() }}" class="w-full ml-auto bg-blue-100 hover:bg-blue-200 text-blue-500 font-bold py-4 px-4 rounded xl:w-auto lg:py-2">
                        ← Go Back
                    </a>
                </aside>
            </header>

            @yield("content")
        </div>
    </body>
</html>