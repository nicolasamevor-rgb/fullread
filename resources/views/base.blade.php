<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js" defer></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>@yield('title')</title>
</head>

<body>
    <nav class=" w-screen bg-blue-600 p-4 flex justify-between space-x-4 h-20">

        <a href="{{ route('dashboard') }}">
            <div class="text-2xl font-bold mb-6">
                <box-icon class="fill-white" name='library'></box-icon>
                Bibliothèque
            </div>
        </a>
        @auth
            <a href="{{ route('logout') }}" class="flex flex-col items-center space-y-1">
                <box-icon class="fill-white w-8 h-8" type='solid' name='user-circle'></box-icon>
                <span class="text-black text-sm">Se déconnecter</span>
            </a>
        @endauth
        @guest
            <a href="{{ route('login') }}" class="flex flex-col items-center space-y-1">
                <box-icon class="fill-white w-8 h-8" type='solid' name='user-circle'></box-icon>
                <span class="text-black text-sm">Se connecter</span>
            </a>
        @endguest
    </nav>
    <div>
        @yield('TitrePage')
    </div>
    <div>
        @yield('content')
    </div>

</body>

</html>