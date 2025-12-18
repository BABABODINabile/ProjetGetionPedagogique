<form method="POST" action="{{ route('users.store') }}">
    @csrf

    <input type="email" name="email" placeholder="Email">
    <input type="password" name="password" placeholder="Mot de passe">

    <select name="role">
        <option value="ADMIN">Admin</option>
        <option value="FORMATEUR">Formateur</option>
        <option value="ETUDIANT">Étudiant</option>
    </select>

    <button type="submit">Créer</button>
</form>
