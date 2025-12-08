@extends('base')
@section('title', 'Emprunts')

@section('content')
    <div class="flex flex-col sm:flex-row">
        @include('sidebar')

        <main class="flex-1 p-6">


            <div class="overflow-x-auto">
                <table class="min-w-full border border-gray-300 rounded-lg shadow-md text-sm sm:text-base">
                    <thead class="bg-gray-800 text-white">
                        <tr>
                            <th class="px-2 sm:px-6 py-2 sm:py-3 text-left">#</th>
                            <th class="px-2 sm:px-6 py-2 sm:py-3 text-left">Date d'Emprunt</th>
                            <th class="px-2 sm:px-6 py-2 sm:py-3 text-left">Date de retour prévue</th>
                            <th class="px-2 sm:px-6 py-2 sm:py-3 text-left">Date de retour effective</th>
                            <th class="px-2 sm:px-6 py-2 sm:py-3 text-left">Lecteur</th>
                            <th class="px-2 sm:px-6 py-2 sm:py-3 text-left">Livre Emprunté</th>
                            <th class="px-2 sm:px-6 py-2 sm:py-3 text-left">Action</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200 bg-white">
                        @foreach ($emprunts as $emprunt)
                            <tr>
                                <td class="px-2 sm:px-6 py-2 sm:py-3">{{ $emprunt->id }}</td>
                                <td class="px-2 sm:px-6 py-2 sm:py-3">{{ $emprunt->created_at }}</td>
                                <td class="px-2 sm:px-6 py-2 sm:py-3">{{ $emprunt->date_retour_prevue }}</td>
                                <td class="px-2 sm:px-6 py-2 sm:py-3 text-orange-500">{{ $emprunt->date_retour_effective }}</td>
                                <td class="px-2 sm:px-6 py-2 sm:py-3 text-green-500">{{ $emprunt->reservation->user->name }}
                                </td>
                                <td class="px-2 sm:px-6 py-2 sm:py-3">{{ $emprunt->reservation->livre->titre }}</td>
                                <td class="px-2 sm:px-6 py-2 sm:py-3">
                                    <button onclick="window.location.href='{{ route('emprunts.showdateretour', $emprunt) }}'"
                                        class="bg-green-500 text-white font-bold shadow-md rounded-lg px-3 py-1 w-full sm:w-auto">
                                        <box-icon type='solid' name='edit'></box-icon>
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </main>
    </div>
@endsection