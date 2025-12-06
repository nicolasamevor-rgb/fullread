<h1>Bienvenue Admin,{{ $user->name }}</h1>



<main class="flex-1 p-6">
    <div class="overflow-x-auto">
        <table class="min-w-full border border-gray-300 rounded-lg shadow-md ">
            <!-- En-tête -->
            <thead class="bg-gray-800 text-white">
                <tr>
                    <th class="px-6 py-3 text-left">#</th>
                    <th class="px-6 py-3 text-left">Nom</th>
                    <th class="px-6 py-3 text-left">Email</th>
                    <th class="px-6 py-3 text-left">Rôle</th>
                    <!-- <th class="px-6 py-3 text-left">Mot de Passe</th> -->
                    <!-- <th class="px-6 py-3 text-left">Actions</th> -->
                </tr>
            </thead>

            <!-- Corps -->
            <tbody class="divide-y divide-gray-200 bg-white">
                @foreach ($users as $u)
                    <tr>
                        <td class="px-6 py-3">{{$loop->iteration}}</td>
                        <td class="px-6 py-3">{{$u->name}}</td>
                        <td class="px-6 py-3">{{$u->email}}</td>
                        <td class="px-6 py-3">{{$u->role}}</td>
                        <!-- <td class="px-6 py-3 text-green-600 font-semibold">{{$u->password}}</td> -->

                        <!-- <td class="px-6 py-3">
                                            <button class="bg-blue-600 text-white px-3 py-1 rounded hover:bg-blue-700"><box-icon
                                                    type='solid' name='edit'></box-icon>
                                            </button>
                                        </td> -->
                    </tr>

                @endforeach
            </tbody>
        </table>
    </div>

</main>
</div>