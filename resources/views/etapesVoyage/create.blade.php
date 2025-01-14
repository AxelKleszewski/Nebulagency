@vite(['resources/css/voyage.css'])
<x-app-layout>
    <section class="create">
        <h1 class="create-title">Créer une étape</h1>
        <form action="{{ route('etapesVoyage.store',['voyageId' => $voyage->id]) }}" method="POST" enctype="multipart/form-data" class="create-form">
            @csrf

            <div class="create-form-group">
                <label for="titre" class="create-label">Titre :</label>
                <input type="text" name="titre" id="titre" class="create-input" placeholder="Entrez le titre du voyage" required>
            </div>

            <div class="create-form-group">
                <label for="resume" class="create-label">Résumé :</label>
                <input type="text" name="resume" id="resume" class="create-input" placeholder="Résumé court du voyage" required>
            </div>

            <div class="create-form-group">
                <label for="description" class="create-label">Description :</label>
                <textarea name="description" id="description" class="create-textarea" placeholder="Décrivez le voyage" required></textarea>
            </div>

            <div class="create-form-group">
                <label for="debut" class="create-label">Début de l'étape :</label>
                <input type="date" name="debut" id="debut" class="create-input" required>
            </div>

            <div class="create-form-group">
                <label for="fin" class="create-label">Fin de l'étape :</label>
                <input type="date" name="fin" id="fin" class="create-input" required>
            </div>

            <div class="create-form-group">
                <label for="visuel" class="create-label">Image de présentation :</label>
                <input type="file" name="visuel" id="visuel" class="create-input-file">
            </div>

            <div class="create-form-group">
                <label for="en_ligne" class="create-label">Mettre en ligne :</label>
                <select name="en_ligne" id="en_ligne" class="create-select">
                    <option value="1">Oui</option>
                    <option value="0">Non</option>
                </select>
            </div>

            <div class="create-actions">
                <button type="submit" class="create-btn create-btn-primary">Créer le voyage</button>
                <a href="{{ route('etapesVoyage.index',['voyageId' => $voyage->id]) }}" class="create-btn create-btn-secondary">Retour</a>
            </div>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </form>
    </section>
</x-app-layout>

