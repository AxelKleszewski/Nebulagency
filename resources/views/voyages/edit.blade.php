@vite(['resources/css/app.css'])

<x-app-layout>

<section class="edit">
    <h1 class="edit-title">Modifier le voyage</h1>
    <form action="{{ route('etapesVoyage.update', $etapes->id) }}" method="POST" enctype="multipart/form-data" class="edit-form">
        @csrf
        @method('PUT')

        <div class="edit-form-group">
            <label for="titre" class="edit-label">Titre :</label>
            <input type="text" name="titre" id="titre" class="edit-input" value="{{ $etape->titre }}" required>
        </div>

        <div class="edit-form-group">
            <label for="resume" class="edit-label">Résumé :</label>
            <input type="text" name="resume" id="resume" class="edit-input" value="{{ $etape->resume }}" required>
        </div>

        <div class="edit-form-group">
            <label for="description" class="edit-label">Description :</label>
            <textarea name="description" id="description" class="edit-textarea" required>{{ $etape->description }}</textarea>
        </div>

        <div class="edit-form-group">
            <label for="debut" class="edit-label">Date du début :</label>
            <input type="date" name="debut" id="debut" class="edit-input" value="{{ $etape->debut }}" required>
        </div>

        <div class="edit-form-group">
            <label for="galaxie" class="edit-label">Galaxie :</label>
            <select name="galaxie" id="galaxie" class="edit-select">
                <option value="Voie Lactée" @if ($voyage->galaxie === "Voie Lactée") selected @endif>Voie Lactée</option>
                <option value="Andromède" @if ($voyage->galaxie === "Andromède") selected @endif>Andromède</option>
                <option value="Hoag" @if ($voyage->galaxie === "Hoag") selected @endif>Hoag</option>
                <option value="Mayall" @if ($voyage->galaxie === "Mayall") selected @endif>Mayall</option>
                <option value="Spirale de Mutter" @if ($voyage->galaxie === "Spirale de Mutter") selected @endif>Spirale de Mutter</option>
                <option value="Noyau Profond" @if ($voyage->galaxie === "Noyau Profond") selected @endif>Noyau Profond</option>
            </select>
        </div>

        <div class="edit-form-group">
            <label for="prix_euros" class="edit-label">Prix du voyage (en euros) :</label>
            <input type="number" name="prix_euros" id="prix_euros" class="edit-input" value="{{ $voyage->prix_euros }}" required>
        </div>

        <div class="edit-form-group">
            <label for="visuel" class="edit-label">Image de présentation :</label>
            <input type="file" name="visuel" id="visuel" class="edit-input-file">
        </div>

        <div class="edit-actions">
            <button type="submit" class="edit-btn edit-btn-primary">Mettre à jour</button>
            <a href="{{ route('etapesVoyage.index') }}" class="edit-btn edit-btn-secondary">Retour</a>
        </div>
    </form>
</section>


</x-app-layout>
