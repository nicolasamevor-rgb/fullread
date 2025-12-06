@auth
    <h1 class="text-lg sm:text-xl lg:text-2xl font-bold text-center mb-4">
        Bienvenue, Élève {{ $user->name }}
    </h1>

    <main class="flex-1 p-3 sm:p-6">
        <div class="w-full max-w-md sm:max-w-lg lg:max-w-2xl mx-auto shadow-md bg-yellow-100 p-4 rounded">
            <p class="text-sm sm:text-base lg:text-lg text-center">
                Approfondis tes connaissances dans cette bibliothèque
            </p>
        </div>
    </main>
@endauth