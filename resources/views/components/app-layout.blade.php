<!DOCTYPE html>
<html>
<head>
    <link rel="icon" type="image/png" href="{{ Vite::asset('resources/images/logo2.png') }}" />
    <meta charset="UTF-8">
    <title>{{isset($title) ? $title : "NebulAgency"}}</title>
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/uikit@3.17.11/dist/css/uikit.min.css" />



    <!-- par défaut on charge ces css/js -->
    <!-- on peut étendre cette section, voir la vue test-vite.blade.php -->
    @section("head")
        @vite(['resources/css/app.css', 'resources/js/app.js', 'resources/css/dashboard.css', 'resources/css/voyage.css', 'resources/css/connexion.css', 'resources/css/aPropos.css', 'resources/css/contact.css', 'resources/css/like.css', 'resources/css/qui.css', 'resources/css/profil.css', 'resources/css/error.css'])
    @show
</head>
<body>

<x-menu></x-menu>

<main>
    {{$slot}}
</main>

<x-footer></x-footer>
</body>
</html>
