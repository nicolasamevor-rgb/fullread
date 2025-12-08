@extends('base')

@section('title', 'Inscription')


@section('content')

    <div class="max-w-lg mx-auto mt-20 p-6 bg-gray-200 rounded-lg shadow-md">
        @if(session('success'))
            <div class="bg-green-600 text-green-100 px-4 -py-3 border-green-300 rounded-lg" role="alert">
                <strong class="font-bold">Succès</strong>
                <span class="block sm:inline"> {{ session('success') }} </span>
            </div>


        @endif
        <form action="{{ route('registration.register')}}" class="mt-6" method="POST">
            @csrf
            <div class="mb-4">
                <label for="email" class="block text-sm text-gray-700 font-meduim">Nom</label>
                <input type="string" name="name" id="name"
                    class=" block w-full mt-1 p-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-gray-600 shadow-md "
                    required>
                @error('nom')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-4">
                <label for="email" class="block text-sm text-gray-700 font-meduim">Email</label>
                <input type="email" name="email" id="email"
                    class=" block w-full mt-1 p-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-gray-600 shadow-md "
                    required>
                @error('email')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-4">
                <label for="password" class="block text-sm text-gray-700 font-meduim">Password</label>
                <input type="password" name="password" id="password"
                    class=" block w-full mt-1 p-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-gray-600 shadow-md "
                    required>
                @error('password')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-4">
                <label for="password_confirmation" class="block text-sm text-gray-700 font-meduim">confirmer votre mot de
                    passe</label>
                <input type="password" name="password_confirmation" id="password_confirmation"
                    class=" block w-full mt-1 p-3  border rounded-lg focus:outline-none focus:ring-2 focus:ring-gray-600 shadow-md "
                    required>
            </div>
            <button class="w-full bg-blue-700 px-3 py-4 hover:bg-blue-500 rounded-md">
                S'inscrire
            </button>
            <p class="my-2">
                Déjà un Compte?
            </p>
            <a href="{{ route('login') }}" class="hover:underline">
                Se connecter
            </a>
        </form>
    </div>

@endsection