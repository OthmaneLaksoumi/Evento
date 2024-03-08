<?php
use Illuminate\Support\Facades\Auth;
$user = Auth::user();
?>


<div class="col-md-3">
    <div class="card mb-4 shadow-sm">
        <div class="card-body">
            <ul class="list-group">
                @guest
                    <li class="btn btn-outline-secondary list-group-item">
                        <a href="{{ route('register') }}" class="text-dark">S'inscrire</a>
                    </li>

                    <li class="btn mt-4 btn-outline-secondary list-group-item border">
                        <a href="{{ route('login') }}" class="text-dark">Se connecter</a>
                    </li>

                    <div>
                        <li class="nav-item list-group-item mt-4">
                            <a class="nav-link" href="{{ route('home') }}">Home</a>
                        </li>
                    </div>

                @endguest
                @auth
                    <li class="nav-item list-group-item mt-4">
                        <a class="nav-link" href="{{ route('home') }}">Home</a>
                    </li>
                    @can('manage events')
                        <li class="nav-item list-group-item">
                            <a class="nav-link" href="{{ route('my_events') }}">My events</a>
                        </li>
                        <li class="nav-item list-group-item">
                            <a class="nav-link" href="{{ route('events.create') }}">Create an event</a>
                        </li>
                        <li class="nav-item list-group-item">
                            <a class="nav-link" href="{{ route('reservations.index') }}">Reservations</a>
                        </li>
                    @endcan
                @endauth



                {{-- <div>
                    <li class="nav-item list-group-item mt-4">
                        <a class="nav-link" href="index.php">Home</a>
                    </li>
                    <li class="nav-item list-group-item">
                        <a class="nav-link" href="index.php?action=affiche_catgs">Categories</a>
                    </li>
                    <li class="nav-item list-group-item">
                        <a class="nav-link" href="index.php?action=affiche_tags">Tags</a>
                    </li>
                    <li class="nav-item list-group-item">
                        <a class="nav-link" href="index.php?action=affiche_auteurs">Auteurs</a>
                    </li>
                    <li class="nav-item list-group-item">
                        <a class="nav-link" href="index.php?action=affiche_statistics">Statistiques</a>
                    </li>
                </div> --}}




            </ul>
        </div>
    </div>
</div>
