<!DOCTYPE html>
<html lang="fr" class="h-full bg-gray-50">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title }}</title>
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="antialiased h-full">
    <div class="flex min-h-full flex-col justify-center py-12 sm:px-6 lg:px-8">
        <div class="flex justify-center">
            <a href="{{ route('index') }}">
                @if ($title === 'Connexion')
                    <h1 class="text-4xl md:text-7xl font-extrabold text-center mb-8 bg-gradient-to-r from-blue-500 via-purple-500 to-pink-500 bg-clip-text text-transparent hover:scale-105 transition-all duration-300">
                        Connexion
                    </h1>
                @elseif ($title === 'Inscription')
                    <h1 class="text-4xl md:text-7xl font-extrabold text-center mb-8 bg-gradient-to-r from-blue-500 via-purple-500 to-pink-500  bg-clip-text text-transparent hover:scale-105 transition-all duration-300">
                        Inscription du etudiant 
                    </h1>
                @endif
            </a>
        </div>

        <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-[480px]">
            <div class="bg-white px-6 py-12 shadow sm:rounded-lg sm:px-12">
                <form class="space-y-6" action="{{ $action }}" method="POST" novalidate>
                    @csrf

                    <div class="space-y-6">
                        {{ $slot }}
                    </div>

                    <div>
                        <button type="submit" class="flex w-full justify-center rounded-md bg-gradient-to-r from-blue-500 via-purple-500 to-pink-500 px-4 py-2 text-sm font-semibold text-white shadow-lg hover:from-blue-600 hover:via-purple-600 hover:to-pink-600 transition-all duration-300 transform hover:scale-105 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-blue-600">
                            {{ $submitMessage }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>
