<x-app-layout>
<section class="profile-fond">
    <div class="profile-section2">
        <div class="profile-card">
            <div class="profile-img-container">
                @if (!is_null($utilisateur->image_url))
                    <img src="{{ $utilisateur->image_url }}" alt="Image de l'utilisateur" class="profile-img">
                @endif
            </div>
            <div class="profile-info">
                <p class="profile-pseudo"><strong>Pseudo :</strong> {{ $utilisateur->pseudo }}</p>
                <p class="profile-pseudo"><strong>Nombre de likes :</strong> {{ $utilisateur->likes->count() }}</p>
            </div>
        </div>
        <div class="profile-see-all">
            <a href="{{ route('users.index') }}" class="profile-all-user">Retour</a>
        </div>
    </div>
</section>

</x-app-layout>


