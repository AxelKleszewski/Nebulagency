<x-app-layout>
<section class="profile-fond">
    <div class="profile-section">
        @if(session('success'))
            <p class="success-message">{{ session('success') }}</p>
        @endif
        @if($user)
            <div class="profile-card">
                <div class="profile-img-container">
                    @if (!is_null($user->image_url))
                        <img src="{{ $user->image_url }}" alt="Image de l'utilisateur" class="profile-img">
                    @endif
                </div>
                <div class="profile-info">
                    <h2 class="profile-name">{{ $user->name }}</h2>
                    <p class="profile-pseudo"><strong>Utilisateur n°</strong> {{ $user->id }}</p>
                    <p class="profile-pseudo"><strong>Pseudo :</strong> {{ $user->pseudo }}</p>
                    <p class="profile-email"><strong>Email :</strong> {{ $user->email }}</p>
                    <p class="profile-pseudo"><strong>Nombre de like :</strong> {{ $user->likes->count()  }}</p>
                    <p class="profile-pseudo"><strong>Nombre de Commentaire :</strong> {{ $user->avis->count() }}</p>
                    <p class="profile-created-at"><strong>Compte créé le :</strong> {{ $user->created_at->format('d M Y') }}</p>
                    <a href="{{ route('users.edit', $user) }}" class="profile-edit-btn">Modifier</a>
                </div>
            </div>
        @else
            <h3>Aucun utilisateur trouvé</h3>
        @endif
    </div>
    <div class="profile-see-all">
        <a href="{{ route('users.index') }}" class="profile-all-user">Voir les Utilisateurs</a>
    </div>



</section>
</x-app-layout>
