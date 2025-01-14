
<div class="">
    <h1>Créer un utilisateur</h1>
    <form action="{{ route('users.store') }}" method="POST">
        @csrf
        <div class="-3">
            <label for="name" class="">Nom</label>
            <input type="text" name="name" id="name" class="" required>
        </div>
        <div class="">
            <label for="email" class="">Email</label>
            <input type="email" name="email" id="email" class="" required>
        </div>
        <div class="mb-3">
            <label for="password" class="">Mot de passe</label>
            <input type="password" name="password" id="password" class="" required>
        </div>
        <div class="mb-3">
            <label for="pseudo" class="">Pseudo</label>
            <input type="text" name="pseudo" id="pseudo" class="">
        </div>
        <button type="submit" class="">Créer</button>
    </form>
</div>

