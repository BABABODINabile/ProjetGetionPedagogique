

<h1 style='text-align: center; background-color: red;'>Liste des Promotions</h1>

{{-- Lien vers le formulaire de création d’un nouvel utilisateur --}}
<a href="{{ route('promotions.create') }} " style='margin-left: 45%; font-size: 25px;' >Ajouter</a>

{{-- Boucle sur la liste des utilisateurs envoyée par le controller --}}
@foreach($promotions as $promotion)
    <p style='margin-left: 45%'>
        {{-- Affichage de l’email et du rôle de l’utilisateur --}}
        {{ $promotion->libelle }}

        {{-- ===== BOUTON MODIFIER ===== --}}
        {{-- Lien vers le formulaire d’édition --}}
        {{-- users.edit appelle la méthode edit(User $user) --}}
        <a href="{{ route('promotions.edit', $promotion) }}" style='margin-left: %'>
            Modifier
        </a>

        {{-- ===== FORMULAIRE SUPPRIMER ===== --}}
        {{-- On utilise un formulaire car la suppression se fait en DELETE --}}
        <form action="{{ route('promotions.destroy', $promotion) }} " 
              method="POST"
              style="display:inline; margin-left: 40%  ;">

            {{-- Protection CSRF obligatoire --}}
            @csrf

            {{-- Simulation de la méthode DELETE --}}
            @method('DELETE')

            {{-- Bouton de soumission --}}
            {{-- confirm() empêche la suppression accidentelle --}}
            <button type="submit" style='margin-left: 5%'
                onclick="return confirm('Supprimer cet utilisateur ?')">
                Supprimer
            </button>
        </form>
    </p>
@endforeach
