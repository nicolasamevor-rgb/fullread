@extends('base')
@section('title', 'Catalogue')


@section('content')
    <div class="flex h-screen w-full max-w-screen overflow-x-hidden">
        <!-- Sidebar -->
        @include('sidebar')

        <!-- Contenu principal -->
        <main class="flex-1 p-3 sm:p-6 overflow-y-auto h-screen">
            @if (Auth::user()->hasRole('admin') || Auth::user()->hasRole('bibliothecaire'))
                <div class="mb-4">
                    <button id="addbok" class="bg-blue-600 text-white px-3 py-2 rounded hover:bg-blue-700 w-full sm:w-auto">
                        Ajouter un Livre
                    </button>
                </div>
                @if($errors->has('titre') || $errors->has('auteur'))
                    @include('form.ajoutlivre', ['categories' => $categories, 'visible' => 'block'])
                @else
                    @include('form.ajoutlivre', ['categories' => $categories, 'visible' => 'hidden'])
                @endif
            @endif

            <!-- Message succès -->
            @if(session('success'))
                <div class="bg-green-600 text-green-100 px-4 py-3 border-green-300 rounded-lg mb-4" role="alert">
                    <strong class="font-bold">Succès</strong>
                    <span class="block sm:inline"> {{ session('success') }} </span>
                </div>
            @endif

            <!-- Table responsive -->
            <div class="mx-auto overflow-x-auto">
                <table class="min-w-full border border-gray-300 rounded-lg shadow-md text-xs sm:text-sm md:text-base">
                    <!-- En-tête -->
                    <thead class="bg-gray-800 text-white">
                        <tr>
                            <th class="px-2 sm:px-6 py-2 sm:py-3 text-left">#</th>
                            <th class="px-2 sm:px-6 py-2 sm:py-3 text-left">Titre</th>
                            <th class="px-2 sm:px-6 py-2 sm:py-3 text-left">Auteur</th>
                            <th class="px-2 sm:px-6 py-2 sm:py-3 text-left">Nbre exemplaire</th>
                            <th class="px-2 sm:px-6 py-2 sm:py-3 text-left">Catégorie</th>
                            <th class="px-2 sm:px-6 py-2 sm:py-3 text-left">Actions</th>
                        </tr>
                    </thead>

                    <!-- Corps -->
                    <tbody class="divide-y divide-gray-200 bg-white">
                        @foreach ($livres as $livre)
                            <tr>
                                <td class="px-2 sm:px-6 py-2 sm:py-3">{{ $loop->iteration }}</td>
                                <td class="px-2 sm:px-6 py-2 sm:py-3">{{ $livre->titre }}</td>
                                <td class="px-2 sm:px-6 py-2 sm:py-3">{{ $livre->auteur }}</td>
                                <td class="px-2 sm:px-6 py-2 sm:py-3">{{ $livre->exemplaire_livre_count }}</td>
                                <td class="px-2 sm:px-6 py-2 sm:py-3">{{ $livre->categorie->nom }}</td>
                                <td class="px-2 sm:px-6 py-2 sm:py-3 flex flex-col sm:flex-row gap-2">
                                    @can('gerer livres')
                                        @include('form.ajoutexemplairelivre', compact('livre'))
                                    @endcan

                                    @if ($livre->exemplaire_livre_count > 0)
                                        <button onclick="window.location.href='{{ route('reservations.showform', $livre->id) }}'"
                                            type="button"
                                            class="bg-green-600 text-white px-3 py-1 rounded hover:bg-green-700 w-full sm:w-auto">
                                            Réserver
                                        </button>
                                        @can('gerer livres')
                                            <button type="button"
                                                onclick="window.location.href='{{ route('catalogue.updateform', $livre->id) }}'"
                                                class="bg-green-600 text-white px-3 py-1 rounded hover:bg-green-700 w-full sm:w-auto">
                                                <box-icon type="solid" name="edit"></box-icon>
                                            </button>
                                        @endcan
                                    @else
                                        <button class="bg-red-600 text-white px-3 py-1 rounded w-full sm:w-auto"
                                            style="cursor: not-allowed;" disabled>
                                            Réserver
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