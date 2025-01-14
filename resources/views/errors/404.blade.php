<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>404 - Page non trouvée</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    @vite(['resources/css/error.css', 'resources/js/app.js'])
</head>
<body>
<main class="error-page">
    <div class="error-container">
        <h1 class="error-title">Erreur 404</h1>
        <p class="error-subtitle">La page que vous recherchez est perdue dans l'espace.</p>
        <p class="error-message">Il semble que vous ayez pris un mauvais tournant dans l'univers...</p>
        <a href="{{ route('accueil') }}" class="error-button">Retour à la Terre</a>
    </div>
    <div class="space-background"></div>
</main>

</body>
</html>
