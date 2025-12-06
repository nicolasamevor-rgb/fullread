@extends('base')

@section('title', 'Se connecter')


@section('content')

    <div class="max-w-lg mx-auto mt-20 p-4  bg-gray-200  rounded-lg shadow-md">
        @if($errors->any())
            <div class="bg-red-600 text-red-100 px-4 -py-3  border-red rounded-lg" role="alert">
                <strong class="font-bold">Oups!</strong>
                <span class="block sm:inline"> {{ $errors->first() }} </span>
            </div>


        @endif
        <form action="{{ route('login.log') }}" class="mt-6" method="POST">
            @csrf
            <div class="mb-4">
                <label for="email" class="block text-sm text-gray-700 font-meduim">Email</label>
                <input type="email" name="email" id="email"
                    class=" block w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-gray-600 shadow-md "
                    required>
                @error('email')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-4">
                <label for="password" class="block text-sm text-gray-700 font-meduim">Password</label>
                <input type="password" name="password" id="password"
                    class=" block w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-gray-600 shadow-md "
                    required>
                @error('password')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>
            <button class="w-full bg-blue-700 px-3 py-4 hover:bg-blue-500 rounded-md">
                Se connecter
            </button>
            <p class="my-2">
                Pas de Compte?
            </p>
            <a href="{{ route('register') }}" class="hover:underline">
                S'inscrire
            </a>
        </form>
    </div>

@endsection