@extends('base')
@section('title', 'Tableau de bord')

@section('content')
    @auth
        <div class="flex">
            <!-- Sidebar -->
            @include('sidebar')

            <!-- Contenu principal -->
            <main class="flex-1  p-6 overflow-y-auto h-screen ">
                @if (Auth::user()->hasRole('admin'))
                    @include('middleware.admin', ['user' => $user, 'users' => $users])
                @elseif(Auth::user()->hasRole('lecteur'))
                    @include('middleware.lecteur', ['user' => $user, 'users' => $users])
                @endif

            </main>
        </div>
    @endauth

@endsection