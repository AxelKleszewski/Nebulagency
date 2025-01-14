<div class="menu">
    <div class="menu-logo">
        <a href="{{ route('accueil') }}"><img class="logo" src="{{ Vite::asset('resources/images/logo2.png') }}" alt="Logo"></a>
    </div>
    <a class="menu-link" href="{{ route('voyages.index') }}">Voyages</a>
    <a class="menu-link" href="{{ route('qui') }}">Qui sommes-nous ?</a>
    <a class="menu-link" href="{{ route('about') }}">À propos</a>
    <a class="menu-link" href="{{ route('contact') }}">Contact</a>
    @guest
        <a class="menu-link" href="{{ route('login') }}">S'inscrire</a>
    @endguest
    @auth
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>

        <a class="menu-link" href="#" id="logout">Se déconnecter</a>
        <script>
            document.getElementById('logout').addEventListener("click", (event) => {
                event.preventDefault();
                document.getElementById('logout-form').submit();
            });
        </script>
    @endauth
    @auth
        <a href="{{ route('showprofile.index') }}"><i class='bx bxs-user'></i></a>
    @else
        <a href="{{ route('login') }}"><i class='bx bxs-user'></i></a>
    @endauth
</div>
