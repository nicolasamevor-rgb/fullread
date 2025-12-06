<form id="formLivre" action="{{ route('catalogue.addexemplaire', $livre) }}" class="mt-6 " method="POST">
    @csrf
    <input type="hidden" name="livre_id" value="{{ $livre->id }}">
    <button class=" bg-blue-700 px-2 py-1 hover:bg-blue-500 rounded-md">
        Add
    </button>
</form>