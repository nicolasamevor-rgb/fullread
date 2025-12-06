@extends('base')
@section('title', 'Update')
@section('content')
    <form action="{{ route('catalogue.update', $livre) }}" class="mt-6 block" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-4">
            <label for="titre" class="block text-sm text-gray-700 font-meduim">Titre</label>
            <input type="string" name="titre" id="titre" value="{{ $livre->titre }}"
                class=" block w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-gray-600 shadow-md "
                required>
            @error('titre')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-4">
            <label for="auteur" class="block text-sm text-gray-700 font-meduim">Auteur</label>
            <input type="string" name="auteur" id="auteur" value="{{ $livre->auteur }}"
                class=" block w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-gray-600 shadow-md "
                required>
            @error('auteur')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>
        <div class="mb-4">
            <label for="categorie_id" class="block text-sm text-gray-700 font-meduim">Categorie</label>
            <select name="categorie_id" id="categorie_id" class="form-select">
                <option value="">Choisir une catégorie</option>
                @foreach($categories as $categorie)
                    <option value="{{ $categorie->id }}">{{ $categorie->nom }}</option>
                @endforeach
            </select>

            @error('categorie_id')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>
        <div class="mb-4">
            <label for="disponibilite" class="block text-sm text-gray-700 font-meduim">disponibilite</label>
            <select name="disponibilite" id="disponibilite" class="form-select">
                <option value="1">Oui</option>
                <option value="0">Non</option>
            </select>

            @error('disponibilite')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>
        <button class="w-full bg-blue-700 px-3 py-4 hover:bg-blue-500 rounded-md">
            Mettre à jour
        </button>
    </form>


@endsection