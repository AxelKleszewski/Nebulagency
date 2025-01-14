<x-app-layout>

<section class="etape-show">
    <div class="container">
        <h1 class="titre-etape">Étape : {{ $etape->titre }}</h1>

        <div class="etape-content">
            @if(isset($etape->visuel))
                <img alt="Image de l'etape" src="{{ asset('storage/' . $etape->visuel) }}" class="etapes-image-img"/>
            @elseif ($medias->isEmpty())
                <p class="no-media">Aucune image disponible pour cette étape.</p>
            @else
                <div class="etape-image">
                    @foreach ($medias as $media)
                        <div class="media-item">
                            <img src="{{ $media->url }}" alt="{{ $media->titre }}">
                        </div>
                    @endforeach
                </div>
            @endif

            <div class="etape-text">
                <p><strong>Résumé :</strong> {{ $etape->resume }}</p>
                <p><strong>Description :</strong> {{ $etape->description }}</p>
                <p><strong>Début :</strong> {{ Carbon\Carbon::parse($etape->debut)->format('d-m-Y') }}</p>
                <p><strong>Fin :</strong> {{ Carbon\Carbon::parse($etape->fin)->format('d-m-Y') }}</p>
            </div>
        </div>

        <div class="navigation">
            @if ($etapePrecedente)
                <a href="{{ route('etapesVoyage.show', ['voyageId' => $etape->voyage_id, 'etapeId' => $etapePrecedente->id]) }}" class="btn btn-primary"><i class='bx bxs-chevrons-left'></i></a>
            @endif

            @if ($etapeSuivante)
                <a href="{{ route('etapesVoyage.show', ['voyageId' => $etape->voyage_id, 'etapeId' => $etapeSuivante->id]) }}" class="btn btn-primary"><i class='bx bxs-chevrons-right' ></i></a>
            @endif
        </div>

        <div class="etape-show-bou">
            <a href="{{ route('etapesVoyage.index', $etape->voyage_id) }}" class="bouton">Retour aux étapes</a>
        </div>

        <div class="com-section">
            <h2 class="com-title">Avis</h2>
            <div class="com-list">
                @if($comments->isEmpty())
                    <p class="no-comments">Aucun commentaire pour ce voyage.</p>
                @else
                    @foreach ($comments as $comment)
                        <div class="com">
                            <div class="comment-avatar">
                                @if (!is_null($comment->user->image_url))
                                    <img src="{{ $comment->user->image_url }}" alt="pdp de {{ $comment->user->pseudo }}">
                                @endif
                            </div>
                            <div class="comment-content">
                                <p class="comment-author"><strong>{{ $comment->user->pseudo }}</strong></p>
                                <p class="comment-text">{{ $comment->comment }}</p>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </div>

    @if(Auth::check())
        <div class="comment-container">
            <h2 class="comment-title">Ajouter un commentaire</h2>
            <div class="comment-form-wrapper">
                <form action="{{ route('commentsS.store') }}" method="POST" class="comment-form">
                    @csrf
                    <input type="hidden" name="etape_id" value="{{ $etape->id }}">

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
