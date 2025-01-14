<footer class="footer">
    <div class="footer-container">
        <div class="footer-logo">
            <img src="{{ Vite::asset('resources/images/logo2.png') }}" alt="Logo">
        </div>
        <div class="footer-links">
            <a href="{{ route('accueil') }}">Accueil</a>
            <a href="{{ route('voyages.index') }}">Voyages</a>
            <a href="{{ route('contact') }}">Contact</a>
            <a href="{{ route('info') }}">À propos</a>
        </div>
        <div class="footer-socials">
            <a href="https://www.facebook.com" target="_blank" class="social-link">
                <i class="fab fa-facebook-f"></i>
            </a>
            <a href="https://www.twitter.com" target="_blank" class="social-link">
                <i class="fab fa-twitter"></i>
            </a>
            <a href="https://www.instagram.com" target="_blank" class="social-link">
                <i class="fab fa-instagram"></i>
            </a>
        </div>
    </div>
    <div class="footer-bottom">
        <p>&copy; 2024 Nebulagency. Tous droits réservés.</p>
    </div>
</footer>

