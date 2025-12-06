@extends('base')
@section('title', 'Formulaire de demande')
@section('content')
    <div class="max-w-lg mx-auto mt-20 p-4  bg-gray-200  rounded-lg shadow-md">
        <form action="{{ route('reservations.create', $livre) }}" class="mt-6 block" method="POST">
            @csrf
            <input type="hidden" name="livre_id" value="{{ $livre->id }}">
            <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
            <label for="durée">Vous désirez empruntez le livre pour combien jours :</label>
            <input type="number" name="durée" id="durée" min="1" max="7"
                class=" block w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-gray-600 shadow-md "
                required>
            <button class="w-full bg-blue-700 px-3 py-4 hover:bg-blue-500 rounded-md">
                Terminer
            </button>
        </form>

    </div>


@endsection