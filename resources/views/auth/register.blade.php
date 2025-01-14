<x-app-layout>
    <section class="login">
        <div class="wrap">
            <form class="login-form" action="{{route('register')}}" method="post">
                @csrf
                <div class="form-header">
                    <h3>Enregistrement</h3>
                    <p>Enregistrement pour l'accès à l'application</p>
                </div>
                <!--Nom Input-->
                <div class="form-group-log">
                    <input type="text" name="name" class="form-input-log" placeholder="Prénom Nom">
                </div>
                <!--Email Input-->
                <div class="form-group-log">
                    <input type="text" name="email" class="form-input-log" placeholder="email@exemple.com">
                </div>
                <!--Pseudo Input-->
                <div class="form-group-log">
                    <input type="text" name="pseudo" class="form-input-log" placeholder="pseudo">
                </div>
                <!--Password Input-->
                <div class="form-group-log">
                    <input type="password" name="password" class="form-input-log" placeholder="mot de passe">
                </div>
                <!--Confirm Password Input-->
                <div class="form-group-log">
                    <input type="password" name="password_confirmation" class="form-input-log" placeholder="Confirmez mot de passe">
                </div>
                <!--Login Button-->
                <div class="form-group-log">
                    <button class="form-button" type="submit">Enregistrement</button>
                </div>
                <div class="form-footer">
                    Vous avez déjà un compte ? <a href="{{route('login')}}">Connexion</a>
                </div>
            </form>
        </div><!--/.wrap-->
    </section>
</x-app-layout>
