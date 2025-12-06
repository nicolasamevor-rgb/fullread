@extends('base')
@section('title', 'Accueil')

@section('content')
    <div class="flex flex-col lg:flex-row">

        <main class="flex-1 p-4 sm:p-6">

            <div class="bg-gray-200 p-4 mb-4">
                <p class="text-center font-bold text-xl sm:text-2xl lg:text-3xl">
                    Bienvenue à notre bibliothèque en ligne
                </p>
            </div>

            <div class="bg-gray-200 p-4 mb-4">
                <p class="text-center font-bold text-lg sm:text-2xl lg:text-3xl">
                    Réservez vos documents depuis votre maison en quelques clics
                </p>
            </div>

            <p class="text-center font-bold text-lg sm:text-2xl lg:text-3xl my-6">
                Voici quelques livres que vous pouvez réserver
            </p>


            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-4 p-4">
                @foreach($livres as $livre)
                    <div class="border p-4 bg-blue-100 rounded shadow transform transition duration-300 hover:-translate-y-2">
                        <h2 class="font-bold text-base sm:text-lg">{{$livre->titre}}</h2>
                        <p class="text-sm sm:text-base">{{$livre->auteur}}</p>
                    </div>
                @endforeach
            </div>

            <p class="text-center mt-6">
                Veuillez créer un compte pour pouvoir réserver des livres
            </p>

            <div class="flex justify-center mt-4">
                <button onclick="window.location.href='{{ route('register') }}'"
                    class=" cursor-pointer px-6 py-2 bg-blue-700 text-white rounded-lg shadow-md hover:bg-blue-600 transition">
                    Créer un compte
                </button>

            </div>
        </main>
    </div>
@endsection