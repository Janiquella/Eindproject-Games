@props([
'title' => 'Laracast'
])

    <!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        .max-w-400 {
            max-width: 400px;
            margin: auto;
        }

        .card {
            background: #e3e3e3;
            padding: 1rem;
            text-align: center
        }
    </style>
</head>
<body>
<nav>
    <a href="/games" class="no-underline p-2">Games</a>
    <a href="/games/create">Create</a>
</nav>
<main>
    {{$slot}}
</main>
</body>

</html>
