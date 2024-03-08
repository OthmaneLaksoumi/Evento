<x-guest-layout title="Login">
    <div class="col-md-7">
        <h2 class="text-center mt-4">Inscription pour les Auteurs</h2>
        <form class="container form-control mt-5  sign-up-form" method="post" action="{{ route('login') }}">
            @csrf
            <div class="mb-3 email-div">
                <label for="email" class="form-label">Email address</label>
                <input type="email" class="form-control" name="email" id="email" aria-describedby="emailHelp"
                    required>
                <x-input-error :messages="$errors->get('email')" class="mt-2" />

            </div>

            <div class="mb-3 password-div">
                <label for="password" class="form-label">Mot de passe</label>
                <input type="password" class="form-control" name="password" id="password" required>
                <x-input-error :messages="$errors->get('password')" class="mt-2" />

            </div>

            <div class="mb-3 text-center">
                <button type="submit" class="btn btn-secondary">S'inscrire</button>
            </div>
        </form>
    </div>
</x-guest-layout>
