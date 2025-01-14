@vite(['resources/css/voyage.css'])

<x-app-layout>
    <section class="show">
        <div class="show-liste">
            <h1 class="show-title">{{ $voyage->titre }}</h1>

            <div class="show-details">
                <p><strong>Résumé :</strong> {{ $voyage->resume }}</p>
                <p><strong>Description :</strong> {{ $voyage->description }}</p>
                <p><strong>Durée du voyage :</strong> {{ $voyage->duree_jours }} jours</p>
                <p><strong>Galaxie :</strong> {{ $voyage->galaxie }}</p>
                <p><strong>Prix du voyage :</strong> {{ $voyage->prix_euros }}
                    @if($voyage->galaxie === "Noyau Profond")
                        Crédits Républicains
                    @elseif($voyage->galaxie === "Spirale de Mutter")
                        £
                    @else
                        $
                    @endif
                </p>
            </div>

            <div class="show-actions">
                <a href="{{ route('etapesVoyage.index', ['voyageId' => $voyage->id]) }}" class="show-button">Voir les étapes</a>
                <a href="{{ route('voyages.index') }}" class="show-button show-button-return">Retour</a>

                @if(Auth::id() !== null)
                    <form class="like-form" action="{{ route('likes.create', $voyage->id)}}">
                        <button class="like-button">
                            <span class="like-icon">❤️</span>
                            <span class="like-text">J'aime : </span>
                            <span class="like-text">{{$count}}</span>

                        </button>
                    </form>
                @endif

                <script>
                    document.querySelector('.like-button').addEventListener('click', function() {
                        this.classList.toggle('liked');
                    });
                </script>
            </div>
        </div>

        <div class="comments-section">
                <h2 class="comments-title">Avis</h2>
                <div class="comments-list">
                    @if($comments->isEmpty())
                        <p>Aucun commentaire pour ce voyage.</p>
                    @else
                        @foreach ($comments as $comment)
                            <div class="comment">
                                @if (!is_null($comment->user->image_url))
                                    <img src="{{ $comment->user->image_url }}" alt="pdp de {{ $comment->user->pseudo }}" class="comment-avatar">
                                @endif
                                <div class="comment-bubble">
                                    <p class="comment-author"><strong>{{ $comment->user->pseudo }}</strong></p>
                                    <p class="comment-text">{{ $comment->comment }}</p>
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>

        @if(Auth::check())
            <div class="comment-container">
                <h2 class="comment-title">Ajouter un commentaire</h2>
                <div class="comment-form-wrapper">
                    <form action="{{ route('commentsV.store') }}" method="POST" class="comment-form">
                        @csrf
                        <input type="hidden" name="voyage_id" value="{{ $voyage->id }}">

                        <div class="form-field">
                            <label for="comment" class="form-label">Votre commentaire :</label>
                            <textarea name="comment" id="comment" class="form-input" rows="4" required placeholder="Écrivez votre commentaire ici..."></textarea>
                        </div>

                        <button type="submit" class="submit-button">Publier</button>
                    </form>
                </div>
            </div>
        @endif


    </section>
</x-app-layout>


