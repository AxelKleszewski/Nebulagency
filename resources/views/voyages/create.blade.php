@vite(['resources/css/voyage.css'])
<x-app-layout>
<section class="create">
    <h1 class="create-title">Créer un voyage</h1>
    <form action="{{ route('voyages.store') }}" method="POST" enctype="multipart/form-data" class="create-form">
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
            <label for="duree_jours" class="create-label">Durée du voyage (en jours) :</label>
            <input type="number" name="duree_jours" id="duree_jours" class="create-input" placeholder="Ex. : 10" required>
        </div>

        <div class="create-form-group">
            <label for="galaxie" class="create-label">Galaxie :</label>
            <select name="galaxie" id="galaxie" class="create-select">
                <option value="Voie Lactée">Voie Lactée</option>
                <option value="Andromède">Andromède</option>
                <option value="Hoag">Hoag</option>
                <option value="Mayall">Mayall</option>
                <option value="Spirale de Mutter">Spirale de Mutter</option>
                <option value="Noyau Profond">Noyau Profond</option>
            </select>
        </div>

        <div class="create-form-group">
            <label for="etape1" class="create-label">Etape 1 :</label>
            <select name="etape1" id="etape1" class="create-select">
                @foreach($etapes as $e)
                    <option value={{$e->id}}>{{$e->titre}}</option>
                @endforeach
            </select>
        </div>

        <div class="create-form-group">
            <label for="etape2" class="create-label">Etape 2 :</label>
            <select name="etape2" id="etape2" class="create-select">
                @foreach($etapes as $e)
                    <option value={{$e->id}}>{{$e->titre}}</option>
                @endforeach
            </select>
        </div>

        <div class="create-form-group">
            <label for="etape3" class="create-label">Etape 3 :</label>
            <select name="etape3" id="etape3" class="create-select">
                @foreach($etapes as $e)
                    <option value={{$e->id}}>{{$e->titre}}</option>
                @endforeach
            </select>
        </div>

        <div class="create-form-group">
            <label for="etape4" class="create-label">Etape 4 :</label>
            <select name="etape4" id="etape4" class="create-select">
                @foreach($etapes as $e)
                    <option value={{$e->id}}>{{$e->titre}}</option>
                @endforeach
            </select>
        </div>

        <div class="create-form-group">
            <label for="etape5" class="create-label">Etape 5 :</label>
            <select name="etape5" id="etape5" class="create-select">
                @foreach($etapes as $e)
                    <option value={{$e->id}}>{{$e->titre}}</option>
                @endforeach
            </select>
        </div>

        <div class="create-form-group">
            <label for="prix_euros" class="create-label">Prix du voyage (en euros) :</label>
            <input type="number" name="prix_euros" id="prix_euros" class="create-input" placeholder="Ex. : 500" required>
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
            <a href="{{ route('voyages.index') }}" class="create-btn create-btn-secondary">Retour</a>
        </div>
    </form>
</section>
</x-app-layout>

