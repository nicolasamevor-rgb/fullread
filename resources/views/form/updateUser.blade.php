@extends('base')
@section('title', 'Update')
@section('content')
    <form action="{{ route('user.update', $user) }}" class="mt-6 block" method="POST">
        @csrf
        @method('PUT')


        <div class="mb-4">
            <label for="password" class="block text-sm text-gray-700 font-meduim">Nouveau mot de passe</label>
            <input type="password" name="password" id="password"
                class=" block w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-gray-600 shadow-md "
                required>
            @error('password')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>
        <div class="mb-4">
            <label for="role" class="block text-sm text-gray-700 font-meduim">Role</label>
            <select name="role" id="role" class="form-select">
                <option value="">Role</option>
                @foreach($roles as $role)
                    <option value="{{ $role->id }}">{{ $role->nom }}</option>
                @endforeach
            </select>

            @error('categorie_id')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <button class="w-full bg-blue-700 px-3 py-4 hover:bg-blue-500 rounded-md">
            Mettre à jour
        </button>
    </form>


@endsection