@vite(['resources/css/voyage.css'])
<x-app-layout>
    <section class="create">
        <h1 class="create-title">Modifier une étape</h1>
        <form action="{{ route('etapesVoyage.update', ['voyageId' => $voyage->id, 'etapeId' => $etape->id]) }}" method="POST" enctype="multipart/form-data" class="create-form">
            @csrf
            @method('PUT')

            <div class="create-form-group">
                <label for="titre" class="create-label">Titre :</label>
                <input type="text" name="titre" id="titre" class="create-input" placeholder="Entrez le titre du voyage" value="{{ $etape->titre }}" required>
            </div>

            <div class="create-form-group">
                <label for="resume" class="create-label">Résumé :</label>
                <input type="text" name="resume" id="resume" class="create-input" placeholder="Résumé court du voyage" value="{{ $etape->resume }}" required>
            </div>

            <div class="create-form-group">
                <label for="description" class="create-label">Description :</label>
                <textarea name="description" id="description" class="create-textarea" placeholder="Décrivez le voyage" required>{{ $etape->description }}</textarea>
            </div>

            <div class="create-form-group">
                <label for="debut" class="create-label">Début de l'étape :</label>
                <input type="date" name="debut" id="debut" class="create-input" value="{{ $etape->debut }}" required>
            </div>

            <div class="create-form-group">
                <label for="fin" class="create-label">Fin de l'étape :</label>
                <input type="date" name="fin" id="fin" class="create-input" value="{{ $etape->fin }}" required>
            </div>

            <div class="create-form-group">
                <label for="visuel" class="create-label">Image de présentation :</label>
                <input type="file" name="visuel" id="visuel" class="create-input-file" value="{{ $etape->visuel }}">
            </div>

            <div class="create-form-group">
                <label for="en_ligne" class="create-label">Mettre en ligne :</label>
                <select name="en_ligne" id="en_ligne" class="create-select">
                    <option value="1">Oui</option>
                    <option value="0">Non</option>
                </select>
            </div>

            <div class="create-actions">
                <button type="submit" class="create-btn create-btn-primary">Mettre à jour</button>
                <a href="{{ route('etapesVoyage.index',['voyageId' => $voyage->id]) }}" class="create-btn create-btn-secondary">Retour</a>
            </div>
        </form>
    </section>
</x-app-layout>

