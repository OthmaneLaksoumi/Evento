<?php
use Illuminate\Support\Facades\Auth;
$user = Auth::user();
?>


<nav class="navbar navbar-expand-lg bg-secondary bg-gradient">
    <div class="container col-12">

        <a class="navbar-brand col-3 text-black" href="{{ route('home') }}">Evento</a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>



        <div class="collapse navbar-collapse col-3 justify-content-around" id="navbarSupportedContent">

            <form class="col-6 d-flex " role="search" method="GET" action="{{ route('events.search') }}">
                <input class="form-control me-2" type="search" id="search" name="query"
                    placeholder="Search events by title" aria-label="Search">
                    <input type="submit" class="btn btn-outline-light" value="Search">
            </form>

            <?php if ($user === null) { ?>
            <ul class="navbar-nav ml-auto mb-2 mb-lg-0">

                <li class="btn btn-outline-light">
                    <a href="{{ route('register') }}" class="text-dark" style="text-decoration: none;">S'inscrire</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="{{ route('login') }}">Se connecter</a>
                </li>
            </ul>
            <?php } else { ?>
            <ul class="navbar-nav ml-auto mb-2 mb-lg-0">
                <li>
                    <form action="{{ route('logout') }}" method="post">
                        @csrf
                        <input type="submit" class="btn btn-outline-light" value="Se déconnecter">
                    </form>
                </li>
                @unlessrole('organizer')
                    <li class="mx-2">
                        <form action="{{ route('profile.be_organizer') }}" method="post">
                            @csrf
                            <input type="submit" class="btn btn-outline-light" value="Be Organizer">
                        </form>
                    </li>
                @endunlessrole


                <li class="btn text-light mx-2">
                    {{ $user->name }}
                </li>


            </ul>
            <?php } ?>
        </div>


    </div>
</nav>
