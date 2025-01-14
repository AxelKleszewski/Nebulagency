<x-app-layout>
    <div class="contact">
        <div class="contact-texte">
            <h1>Contactez NEBULAGENCY</h1>
            <p>
                Vous rêvez de visiter les planètes du système solaire ?
                Nos voyages spatiaux à partir de 3 000€ sont faits pour vous !
                Contactez-nous dès maintenant pour plus d'informations ou pour réserver votre aventure intergalactique.
            </p>

            <form class="contact-form" action="{{ route('contact') }}" method="POST">
                @csrf
                <div>
                    <label for="name">Nom complet :</label>
                    <input
                        type="text"
                        id="name"
                        name="name"
                        class="contact-input"
                        required>
                </div>

                <div>
                    <label for="email">Email :</label>
                    <input
                        type="email"
                        id="email"
                        name="email"
                        class="contact-input"
                        required>
                </div>

                <div>
                    <label for="message">Message :</label>
                    <textarea
                        id="message"
                        name="message"
                        rows="5"
                        class="contact-textarea"
                        required></textarea>
                </div>

                <button class="contact-button">
                    Envoyer
                </button>
            </form>

            <div class="contact-dessous">
                <p>Besoin d'aide ?</p>
                <p>Contactez-nous par email à <a href="mailto:contact@novagency.com">contact@nebulagency.com</a></p>
                <p>ou appelez-nous au +33 1 23 45 67 89.</p>
            </div>
        </div>
    </div>
</x-app-layout>
