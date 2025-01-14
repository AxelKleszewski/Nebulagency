
<x-app-layout>

    <section class="principal">
        <h1>NEBULAGENCY</h1>
        <p>Agence de voyage spatial</p>
        <p><span>Explore <a class="fleche" href="#nous"><i class='bx bx-right-arrow-alt'></i></a></span></p>
    </section>

    <section class="nous" id="nous">
        <div class="nous-text">
            <h1>Qui sommes nous ?</h1>
            <p>Bienvenue dans l'ère des voyages spatiaux avec Nebulagency , l'agence<br>
            de voyages spécialisée dans les expériences interstellaires inoubliables !<br>
                Nous sommes là pour transformer vos rêves d'exploration cosmique en réalité.</p>
                <h3>Notre Mission</h3>
               <p>Offrir des voyages sécurisés et fascinants à travers le système solaire et<br>
                au-delà, en mettant l'accent sur le confort, l'émerveillement et <br>
                l'accessibilité. Chez Cosmic Horizons, l'univers est à portée de main.</p>
        </div>
    </section>

    <section class="weeklyjourney">
        <div class="journey">
            <h1>Voyage<br> de la <br>semaine </h1>
            <h2>{{$journey->titre}}</h2>
            <p>{{$journey->description}}</p>
        </div>
        <div class="journey-emo">
            <p>Commencer a explorer</p>
            <a href="{{route('voyages.show', $journey->id)}}"><i class='bx bxs-right-top-arrow-circle'></i></a>
        </div>
    </section>

    <section class="suggestions" id="suggestions">
        <h2>Suggestions de voyages</h2>
        <div class="journey-container">
            @foreach($journeys as $j)
            <div class="journey-card">
                <h1>{{ $j->titre }}</h1>
                <p>{{ $j->description }}</p>
                <img src="{{ asset('storage/' . $j->visuel) }}" alt="Visuel de {{ $j->titre }}">
                <button><a href="{{ route('voyages.show', $j->id) }}">En savoir plus</a></button>
        </div>
        @endforeach
        </div>
    </section>

</x-app-layout>
