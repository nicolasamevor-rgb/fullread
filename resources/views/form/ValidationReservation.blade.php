<form action={{route('reservations.validate', $reservation)}} method="POST">
    @csrf
    @method('PUT')
    <input type="hidden" name="status" value="validée">
    <button class="bg-red-500 rounded-lg shadow-md hover:bg-blue-700" type="submit">Valider</button>
</form>