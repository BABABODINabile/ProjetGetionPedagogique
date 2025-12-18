<h1>Modifier la promotion</h1>

<form action="{{ route('promotions.update', $promotion) }}" method="POST">
    @csrf
    @method('PUT')

    {{-- Champ Libellé --}}
    <label>Libellé</label><br>
    <input type="text" name="libelle" value="{{ old('libelle', $promotion->libelle) }}">
    <br><br>

    <!-- {{-- Champ Année --}}
    <label>Année académique</label><br>
    <input type="text" name="annee" value="{{ old('annee', $promotion->annee) }}">
    <br><br> -->

    <button type="submit">Mettre à jour</button>
</form>
