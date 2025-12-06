@extends('base')
@section('title', 'Reservations')

@section('content')
    <div class="flex h-screen w-full max-w-screen overflow-x-hidden">
        @include('sidebar')

        <main class="flex-1 p-3 sm:p-6 overflow-y-auto h-screen">
            <!-- Boutons de filtre -->
            <div class="mb-6 bg-gray-500 shadow-md flex flex-col sm:flex-row gap-3 p-3">
                <button class="w-full sm:w-auto h-10 rounded-lg bg-blue-700 text-white hover:bg-blue-500 px-4"
                    onclick="window.location.href='{{route('reservations.showvalidate', 'validée')}}'">
                    Réservations validées
                </button>
                <button class="w-full sm:w-auto h-10 rounded-lg bg-blue-700 text-white hover:bg-blue-500 px-4"
                    onclick="window.location.href='{{route('reservations.showvalidate', 'en_attente')}}'">
                    Réservations en attente
                </button>
            </div>

            <!-- Table responsive -->
            <div class="overflow-x-auto">
                <table class="min-w-full border border-gray-300 rounded-lg shadow-md">
                    <thead class="bg-gray-800 text-white text-xs sm:text-sm md:text-base">
                        <tr>
                            <th class="px-2 sm:px-6 py-2 sm:py-3 text-left">#</th>
                            <th class="px-2 sm:px-6 py-2 sm:py-3 text-left">Livre Réservé</th>
                            <th class="px-2 sm:px-6 py-2 sm:py-3 text-left">Lecteur</th>
                            <th class="px-2 sm:px-6 py-2 sm:py-3 text-left">Date Réservation</th>
                            <th class="px-2 sm:px-6 py-2 sm:py-3 text-left">Date Validation</th>
                            @if ($statut == 'en_attente' || $statut == 'validée')
                                <th class="px-2 sm:px-6 py-2 sm:py-3 text-left">Statut</th>
                                <th class="px-2 sm:px-6 py-2 sm:py-3 text-left">Action</th>
                            @else
                                <th class="px-2 sm:px-6 py-2 sm:py-3 text-left">Retiré?</th>
                                <th class="px-2 sm:px-6 py-2 sm:py-3 text-left">Date de retour</th>

                            @endif
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200 bg-white text-xs sm:text-sm md:text-base">
                        @foreach ($reservations as $reservation)
                            <tr>
                                <td class="px-2 sm:px-6 py-2 sm:py-3">{{ $reservation->id }}</td>
                                <td class="px-2 sm:px-6 py-2 sm:py-3">{{ $reservation->livre->titre }}</td>
                                <td class="px-2 sm:px-6 py-2 sm:py-3">{{ $reservation->user->name }}</td>
                                <td class="px-2 sm:px-6 py-2 sm:py-3">{{ $reservation->created_at }}</td>
                                <td class="px-2 sm:px-6 py-2 sm:py-3">{{ $reservation->updated_at }}</td>
                                @if ($statut == 'en_attente' || $statut == 'validée')
                                    <td class="px-2 sm:px-6 py-2 sm:py-3">{{ $reservation->status }}</td>
                                @endif


                                <td class="px-2 sm:px-6 py-2 sm:py-3">
                                    @if ($reservation->status == "en_attente")
                                        @include('form.ValidationReservation')
                                    @elseif($reservation->status == "validée")
                                        <button
                                            class="w-full sm:w-auto h-10 rounded-lg bg-blue-700 text-white hover:bg-blue-500 px-4"
                                            onclick="window.location.href='{{route('emprunts.showform', ['livre' => $reservation->livre, 'id' => $reservation->id])}}'">
                                            Valider L'emprunt
                                        </button>
                                    @else
                                        <button
                                            class="bg-green-500 text-white font-bold shadow-md rounded-lg px-3 py-1 w-full sm:w-auto">
                                            Oui
                                        </button>

                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </main>
    </div>
@endsection