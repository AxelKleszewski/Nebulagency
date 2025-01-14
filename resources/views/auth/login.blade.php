<x-app-layout>
    <section class="login">
        <div class="wrap">
            <form class="login-form" action="{{route('login')}}" method="post">
                @csrf
                <div class="form-header">
                    <h3>Connexion</h3>
                    <p>Accès au tableau de bord</p>
                </div>
                <!--Email Input-->
                <div class="form-group-log">
                    <input type="text" name="email" class="form-input-log" placeholder="email@example.com" value={{old('email') ?? ""}}>
                </div>
                <!--Password Input-->
                <div class="form-group-log">
                    <input type="password" name="password" class="form-input-log" placeholder="password">
                </div>
                <!--Login Button-->
                <div class="form-group-log">
                    <button class="form-button" type="submit">Login</button>
                </div>
                <div class="form-footer">
                    Vous n'avez pas de compte ? <a href="{{route('register')}}">Enregistrement</a>
                </div>
            </form>
        </div><!--/.wrap-->

        @if (isset($error))
            <div>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </section>
</x-app-layout>

