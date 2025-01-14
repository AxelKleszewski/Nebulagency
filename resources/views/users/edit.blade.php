<x-app-layout>
    <section class="user-profile-section">
        <div class="user-profile-card">
            <h1 class="user-title">Modifier un utilisateur</h1>
            <form action="{{ route('users.update', $user) }}" method="POST" class="user-form">
                @csrf
                @method('PUT')

                <div class="user-form-group">
                    <label for="name" class="user-label">Nom :</label>
                    <input type="text" name="name" id="name" class="user-input" value="{{ $user->name }}" required>
                </div>

                <div class="user-form-group">
                    <label for="pseudo" class="user-label">Pseudo :</label>
                    <input type="text" name="pseudo" id="pseudo" class="user-input" value="{{ $user->pseudo }}">
                </div>

                <div class="user-form-group">
                    <label for="email" class="user-label">Email :</label>
                    <input type="email" name="email" id="email" class="user-input" value="{{ $user->email }}" required>
                </div>

                <div class="user-form-group">
                    <label for="password" class="user-label">Nouveau mot de passe :</label>
                    <input type="password" name="password" id="password" class="user-input">
                    <small class="user-small">Laissez vide si vous ne souhaitez pas modifier le mot de passe.</small>
                </div>

                <div class="user-form-group">
                    <label for="image_url" class="user-label">Nouvelle photo de profil</label>
                    <input type="text" name="image_url" id="image_url" class="user-input" value="{{ $user->image_url }}">
                    <small class="user-small">Url web de votre photo de profil</small>
                </div>

                <button type="submit" class="user-btn user-btn-primary">Mettre à jour</button>
            </form>
        </div>
    </section>
</x-app-layout>
