<!-- <h1>Liste des utilisateurs</h1>

<a href="{{ route('users.create') }}">Ajouter</a>


@foreach($users as $user)
    <p>
        {{ $user->email }} - {{ $user->role }}
        <a href="{{ route('users.edit', $user) }}">Modifier</a>
    </p>
@endforeach

 -->



 
<!-- <h1>Liste des utilisateurs</h1>

<a href="{{ route('users.create') }}">Ajouter</a>

@foreach($users as $user)
    <p>
        {{ $user->email }} - {{ $user->role }}

        <form action="{{ route('users.destroy', $user) }}" method="POST" style="display:inline">
            @csrf
            @method('DELETE')

            <button type="submit" onclick="return confirm('Supprimer cet utilisateur ?')">
                Supprimer
            </button>
        </form>
    </p>
@endforeach -->






<h1>Liste des utilisateurs</h1>

{{-- Lien vers le formulaire de création d’un nouvel utilisateur --}}
<a href="{{ route('users.create') }}">Ajouter</a>

{{-- Boucle sur la liste des utilisateurs envoyée par le controller --}}
@foreach($users as $user)
    <p>
        {{-- Affichage de l’email et du rôle de l’utilisateur --}}
        {{ $user->email }} - {{ $user->role }}

        {{-- ===== BOUTON MODIFIER ===== --}}
        {{-- Lien vers le formulaire d’édition --}}
        {{-- users.edit appelle la méthode edit(User $user) --}}
        <a href="{{ route('users.edit', $user) }}">
            Modifier
        </a>

        {{-- ===== FORMULAIRE SUPPRIMER ===== --}}
        {{-- On utilise un formulaire car la suppression se fait en DELETE --}}
        <form action="{{ route('users.destroy', $user) }}"
              method="POST"
              style="display:inline">

            {{-- Protection CSRF obligatoire --}}
            @csrf

            {{-- Simulation de la méthode DELETE --}}
            @method('DELETE')

            {{-- Bouton de soumission --}}
            {{-- confirm() empêche la suppression accidentelle --}}
            <button type="submit"
                onclick="return confirm('Supprimer cet utilisateur ?')">
                Supprimer
            </button>
        </form>
    </p>
@endforeach
