@extends('base')
@section('title', 'Formulaire de demande')
@section('content')
    <div class="max-w-lg mx-auto mt-20 p-4  bg-gray-200  rounded-lg shadow-md">
        <form id="formEmprunt" action="{{ route('emprunts.create') }}" class="mt-6 block" method="POST">
            @csrf
            <input type="hidden" name="reservation_id" value="{{ $reservation->id  }}">
            <input type="hidden" name="date_retour_prevue" value="{{ now()->addDays($reservation->duree) }}">
            <label for="exemplaire_id" class="block text-sm text-gray-700 font-meduim">Veuillez entrez l'identifiant de
                l'exemplaire</label>
            <select name="exemplaire_id" id="exemplaire_id" class="form-select">
                @foreach($exemplaires as $exemplaire)
                    <option value="{{ $exemplaire->id }}">{{ $exemplaire->id }}</option>
                @endforeach
            </select>
            <!-- <input type="hidden" name="date_retour_effective" value="{{ NULL}}"> -->
            <button id="btn" class="w-full bg-blue-700 px-0 py-0 hover:bg-blue-500 rounded-md">
                Valider l'emprunt
            </button>
        </form>

        <script>
            document.getElementById('btn').addEventListener('click', function () {
                document.getElementById('formEmprunt').classList.add('hidden')
            });
        </script>

    </div>


@endsection