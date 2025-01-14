<x-app-layout>
<section>
    <main class="voyages-container">

        @if(Auth::id() !== null)
            <section class="voyages-navbar">
                <a href="{{ route('voyages.create') }}" class="voyages-button-add">Ajouter un nouveau voyage</a>
            </section>
        @endif

        <header class="voyages-header">
            <h1 class="voyages-title">TOUT LES VOYAGES</h1>
        </header>

        <section class="voyages-filter">
            <form method="GET" action="{{ route('voyages.index') }}" class="voyages-filter-form">
                <label for="galaxie" class="voyages-filter-label">Filtrer par galaxie :</label>
                <select name="galaxie" id="galaxie" class="voyages-filter-select">
                    <option value="all">Toutes</option>
                    @foreach($galaxies as $g)
                        <option value="{{ urlencode($g) }}" {{ $g == $galaxie ? 'selected' : '' }}>{{ $g }}</option>
                    @endforeach
                </select>
                <button type="submit" class="voyages-filter-button">Filtrer</button>
            </form>
        </section>

        <h2 class="voyages-item-subtitle">NOS VOYAGES</h2>

        <section class="voyages-list">
            @if(isset($voyages))
                <ul class="voyages-items">
                    @foreach($voyages as $voyage)
                        <li class="voyages-item">
                            <div class="voyages-item-content">
                                <h1 class="voyages-item-title">{{ $voyage->titre }}</h1>
                                <p class="voyages-item-summary">Résumé : {{ $voyage->resume }}</p>
                                <p class="voyages-item-duration">Durée en jours : {{ $voyage->duree_jours }}</p>
                            </div>

                            <div class="voyages-item-image">
                                <img alt="Image du voyage" src="{{ asset('storage/' . $voyage->visuel) }}" />
                            </div>

                            <div class="voyages-item-actions">
                                <a href="{{ route('voyages.show', $voyage->id) }}" class="voyages-item-button">Voir</a>
                            </div>
                        </li>
                    @endforeach
                </ul>
            @else
                <h3 class="voyages-no-items">Aucun voyage</h3>
            @endif
        </section>

        <section class="voyages-list">
            @if(!empty($userVoyages) && $userVoyages->count() > 0)
                <h2 class="voyages-item-subtitle">VOS VOYAGES</h2>
                <ul class="voyages-items">
                    @foreach($userVoyages as $voyage)
                        <li class="voyages-item">
                            <div class="voyages-item-content">
                                <h1 class="voyages-item-title">{{ $voyage->titre }}</h1>
                                <p class="voyages-item-summary">Résumé : {{ $voyage->resume }}</p>
                                <p class="voyages-item-duration">Durée en jours : {{ $voyage->duree_jours }}</p>
                            </div>

                            <div class="voyages-item-image">
                                <img alt="Image du voyage" src="{{ asset('storage/' . $voyage->visuel) }}" />
                            </div>

                            <div class="voyages-item-actions">
                                <a href="{{ route('voyages.show', $voyage->id) }}" class="voyages-item-button">Voir</a>
                                <a href="{{ route('voyages.edit', $voyage->id) }}" class="voyages-item-button">Modifier</a>
                                <form action="{{ route('voyages.destroy', $voyage->id) }}" method="POST" class="voyages-item-form">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="voyages-item-button-supp" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce voyage ?')">Supprimer</button>
                                </form>
                            </div>
                        </li>
                    @endforeach
                </ul>
            @endif
        </section>
    </main>
</x-app-layout>



