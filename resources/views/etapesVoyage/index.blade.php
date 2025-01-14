<x-app-layout>
<section class="etapes-fond">
    <div class="etapes-container">
        <h1 class="etapes-title">Étapes du Voyage : {{ $voyage->titre }}</h1>

        @if(Auth::id() === ($voyage->user_id))
            <section class="voyages-navbar" style="padding: 25px 0px">
                <a href="{{ route('etapesVoyage.create',['voyageId' => $voyage->id]) }}" class="voyages-button-add">Ajouter une nouvelle étape</a>
            </section>
        @endif

        @if($voyage->etapes->isEmpty())
            <p class="etapes-message">Aucune étape pour ce voyage.</p>
        @else
            <div class="etapes-image">
                <img alt="Image du Voyage" src="{{ asset('storage/' . $voyage->visuel) }}" class="etapes-image-img"/>
            </div>
            <table class="etapes-table">
                <thead>
                    <tr>
                        <th>Titre</th>
                        <th>Début</th>
                        <th>Fin</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($voyage->etapes as $etape)
                        <tr>
                            <td>{{ $etape->titre }}</td>
                            <td>{{ Carbon\Carbon::parse($etape->debut)->format('d-m-Y') }}</td>
                            <td>{{ Carbon\Carbon::parse($etape->fin)->format('d-m-Y') }}</td>
                            <td>
                                <div class="etapes-action-btn">
                                <a href="{{ route('etapesVoyage.show', ['voyageId' => $voyage->id, 'etapeId' => $etape->id]) }}"
                                   class="etapes-btn etapes-btn-view">
                                    Voir
                                </a>
                                @if(Auth::id() === ($etape->voyage->user_id))
                                    <form action="{{ route('etapesVoyage.destroy', ['voyageId' => $voyage->id]) }}" method="POST" class="voyages-item-form">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="voyages-item-button-supp" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce voyage ?')">Supprimer</button>
                                    </form>
                                @endif
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif

        <a href="{{ route('voyages.show', ['voyage' => $voyage->id]) }}" class="etapes-btn etapes-btn-back">Retour au voyage</a>
    </div>
</section>
</x-app-layout>
