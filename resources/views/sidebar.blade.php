@if(Auth::user()->hasRole('lecteur'))

    <button id="menu-toggle" class="top-0 left-0
                     lg:hidden p-3 bg-gray-800 text-white">
        <box-icon name="menu" class="fill-white"></box-icon>
    </button>

    <!-- Sidebar -->
    <nav id="sidebar" class="hidden lg:flex w-full lg:w-60 lg:h-screen bg-gray-800 text-white flex-col p-6 space-y-4">
        <a href="{{ route('catalogue') }}" class="hover:bg-gray-700 px-3 py-2 rounded flex items-center space-x-2">
            <box-icon class="fill-white" type='solid' name='book-alt'></box-icon>
            <span>Catalogue</span>
        </a>
        <a href="{{ route('ownreservations') }}" class="hover:bg-gray-700 px-3 py-2 rounded flex items-center space-x-2">
            <box-icon class="fill-white" name='cloud-upload' type='solid'></box-icon>
            <span>Mes réservations</span>
        </a>
        <a href="{{ route('ownemprunts') }}" class="hover:bg-gray-700 px-3 py-2 rounded flex items-center space-x-2">
            <box-icon class="fill-white" name='cart-alt'></box-icon>
            <span>Mes emprunts</span>
        </a>

        <div class="mt-auto">
            <button onclick="window.location.href= '{{route('logout')}}' "
                class="w-full bg-blue-600 px-3 py-2 rounded hover:bg-blue-700">
                Déconnexion
            </button>
        </div>
    </nav>
@elseif(Auth::user()->HasRole('admin'))
    <!-- Bouton hamburger visible uniquement sur mobile -->
    <button id="menu-toggle" class="lg:hidden p-3 bg-gray-800 text-white">
        <box-icon name="menu" class="fill-white"></box-icon>
    </button>

    <!-- Sidebar -->
    <nav id="sidebar" class="hidden lg:flex w-full lg:w-60 lg:h-screen bg-gray-800 text-white flex-col p-6 space-y-4">
        <a href="{{ route('dashboard') }}" class="hover:bg-gray-700 px-3 py-2 rounded flex items-center space-x-2">
            <box-icon class="fill-white" type='solid' name='book-alt'></box-icon>
            <span>Gestion des utilisateurs</span>
        </a>
        <a href="{{ route('catalogue') }}" class="hover:bg-gray-700 px-3 py-2 rounded flex items-center space-x-2">
            <box-icon class="fill-white" name='cloud-upload' type='solid'></box-icon>
            <span>Gestion des livres</span>
        </a>
        <a href="{{route('reservations.showvalidate', 'en_attente')}}"
            class="hover:bg-gray-700 px-3 py-2 rounded flex items-center space-x-2">
            <box-icon class="fill-white" name='cart-alt'></box-icon>
            <span>Gestion des Réservations</span>
        </a>
        <a href="{{route('emprunts')}}" class="hover:bg-gray-700 px-3 py-2 rounded flex items-center space-x-2">
            <box-icon class="fill-white" name='cart-alt'></box-icon>
            <span>Gestion des Emprunts</span>
        </a>
        <a href="{{ route('ownreservations') }}" class="hover:bg-gray-700 px-3 py-2 rounded flex items-center space-x-2">
            <box-icon class="fill-white" name='cloud-upload' type='solid'></box-icon>
            <span>Mes réservations</span>
        </a>
        <a href="{{ route('ownemprunts') }}" class="hover:bg-gray-700 px-3 py-2 rounded flex items-center space-x-2">
            <box-icon class="fill-white" name='cart-alt'></box-icon>
            <span>Mes emprunts</span>
        </a>

        <div class="mt-auto">
            <button onclick="window.location.href= '{{route('logout')}}' "
                class="w-full bg-blue-600 px-3 py-2 rounded hover:bg-blue-700">
                Déconnexion
            </button>
        </div>
    </nav>
@endif

<!-- Script pour ouvrir/fermer le menu sur mobile -->
<script>
    document.getElementById('menu-toggle').addEventListener('click', function () {
        const sidebar = document.getElementById('sidebar');
        sidebar.classList.toggle('hidden');
    });
</script>