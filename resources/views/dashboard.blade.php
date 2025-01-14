<x-app-layout>
    <p class="dashboard-info">
        Vous êtes connecté, vous pouvez maintenant allez voir les différents voyages !!!
    </p>
    <form action="{{route('accueil')}}" method="get">
        <button class="dashboard-btn" type="submit">Accueil</button>
    </form>
</x-app-layout>

