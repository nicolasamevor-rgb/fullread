@extends('base')
@section('title', 'Date de Retour')
@section('content')
    <form action="{{ route('emprunts.update', $pret) }}" class="mt-6 block" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-4">
            <label for="date_retour_effective" class="block text-sm text-gray-700 font-meduim">Veuillez fournir la date de
                retour</label>
            <input type="date" name="date_retour_effective" id="date_retour_effective"
                class=" block w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-gray-600 shadow-md "
                required>
            @error('date_retour_effective')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <button class="w-full bg-blue-700 px-3 py-4 hover:bg-blue-500 rounded-md">
            Terminer
        </button>
    </form>


@endsection