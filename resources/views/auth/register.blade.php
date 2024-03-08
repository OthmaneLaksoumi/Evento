<x-guest-layout title="Sign Up">
    <div class="col-md-7">
        <h2 class="text-center mt-4">Inscription pour les Auteurs</h2>
        <form class="container form-control mt-5  sign-up-form" method="post" action="{{ route('register') }}">
            @csrf
            <div class="mb-3 name-div">
                <label for="name" class="form-label">Nom et prénom</label>
                <input type="text" class="form-control" name="name" id="name" value="{{ old('name') }}"
                    required>
                <x-input-error :messages="$errors->get('name')" class="mt-2" />

            </div>
            <div class="mb-3 email-div">
                <label for="email" class="form-label">Email address</label>
                <input type="email" class="form-control" name="email" id="email" value="{{ old('email') }}"
                    aria-describedby="emailHelp" required>
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />

            </div>
            <div class="mb-3 password-div">
                <label for="password" class="form-label">Mot de passe</label>
                <input type="password" class="form-control" name="password" id="password" required>
            </div>
            <x-input-error :messages="$errors->get('password')" class="mt-2" />


            <div class="mb-3 password-div">
                <label for="password" class="form-label">Confirm Mot de passe</label>
                <input type="password" class="form-control" name="password_confirmation" id="password" required>
            </div>

            <div class="mb-3 text-center">
                <button type="submit" class="btn btn-secondary">S'inscrire</button>
            </div>
        </form>
    </div>

</x-guest-layout>
