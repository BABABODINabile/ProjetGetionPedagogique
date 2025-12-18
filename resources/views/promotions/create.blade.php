<form method="POST" action="{{ route('promotions.store') }}">
    @csrf
    <input type="text" name="libelle" id="" placeholder="libele">
    <button type="submit">Créer</button>
</form>
