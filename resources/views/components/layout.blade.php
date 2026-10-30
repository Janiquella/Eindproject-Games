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
@if (Route::has('login'))
    <nav class="flex items-center justify-end gap-4">

        <a href="/games" class="no-underline p-2">Games</a>
        @auth
            <a href="/games/create">Create</a>
        @endauth

        @auth
            <a
                href="{{ url('/dashboard') }}"
                class="inline-block px-5 py-1.5 dark:text-[#000000] border-[#19140035] hover:border-[#1915014a] border text-[#1b1b18] dark:border-[#3E3E3A] dark:hover:border-[#62605b] rounded-sm text-sm leading-normal"
            >
                Profile
            </a>
        @else
            <a
                href="{{ route('login') }}"
                class="inline-block px-5 py-1.5 dark:text-[#000000] text-[#1b1b18] border border-transparent hover:border-[#19140035] dark:hover:border-[#3E3E3A] rounded-sm text-sm leading-normal">
                Log in
            </a>

            @if (Route::has('register'))
                <a
                    href="{{ route('register') }}"
                    class="inline-block px-5 py-1.5 dark:text-[#000000] border-[#19140035] hover:border-[#1915014a] border text-[#1b1b18] dark:border-[#3E3E3A] dark:hover:border-[#62605b] rounded-sm text-sm leading-normal">
                    Register
                </a>
            @endif
        @endauth
    </nav>
@endif

<main>
    {{$slot}}
</main>
</body>

</html>
