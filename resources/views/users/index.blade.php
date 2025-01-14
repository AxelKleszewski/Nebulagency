<x-app-layout>
<section class="utilisateur-fond">
    <div class="utilisateur-container">
        <h1 class="utilisateur-title">Liste des Utilisateurs</h1>
        
        @if (session('success'))
            <div class="utilisateur-success-message">{{ session('success') }}</div>
        @endif
        
        <table class="utilisateur-table">
            <thead>
                <tr>
                    <th>Pseudo</th>
                    <th>Nombre de Likes</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td><a href="{{ route('users.show', $user) }}" class="utilisateur-profile-link">{{ $user->pseudo }}</a></td>
                        <td>{{ $user->likes_count }}</td>
                        <td>
                            @if(Auth::check() && Auth::id() === $user->id)
                                <a href="{{ route('users.edit', $user) }}" class="utilisateur-action-btn">Modifier</a>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</section>
</x-app-layout>
