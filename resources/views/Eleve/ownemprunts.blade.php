@extends('base')
@section('title', 'Mes Emprunts')

@section('content')
    <div class="flex h-screen w-full max-w-screen overflow-x-hidden">
        @include('sidebar')

        <main class="flex-1 p-3 sm:p-6 overflow-y-auto h-screen">
            <!-- Table responsive -->
            <div class="overflow-x-auto">
                <table class="min-w-full border border-gray-300 rounded-lg shadow-md">
                    <!-- En-tête -->
                    <thead class="bg-gray-800 text-white text-xs sm:text-sm md:text-base">
                        <tr>
                            <th class="px-2 sm:px-6 py-2 sm:py-3 text-left">#</th>
                            <th class="px-2 sm:px-6 py-2 sm:py-3 text-left">Date d'Emprunt</th>
                            <th class="px-2 sm:px-6 py-2 sm:py-3 text-left">Date de retour prévue</th>
                            <th class="px-2 sm:px-6 py-2 sm:py-3 text-left">Livre Emprunté</th>
                            <th class="px-2 sm:px-6 py-2 sm:py-3 text-left">Auteur</th>
                        </tr>
                    </thead>

                    <!-- Corps -->
                    <tbody class="divide-y divide-gray-200 bg-white text-xs sm:text-sm md:text-base">
                        @foreach ($emprunts as $emprunt)
                            <tr>
                                <td class="px-2 sm:px-6 py-2 sm:py-3">{{ $loop->iteration }}</td>
                                <td class="px-2 sm:px-6 py-2 sm:py-3">{{ $emprunt->created_at }}</td>
                                <td class="px-2 sm:px-6 py-2 sm:py-3">{{ $emprunt->date_retour_prevue }}</td>
                                <td class="px-2 sm:px-6 py-2 sm:py-3 font-semibold">{{ $emprunt->reservation->livre->titre }}
                                </td>
                                <td class="px-2 sm:px-6 py-2 sm:py-3">{{ $emprunt->reservation->livre->auteur }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </main>
    </div>
@endsection