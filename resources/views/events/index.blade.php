<x-guest-layout title="Create an event">
    @session('wait')
        <div class="alert alert-danger fixed-alert" id="myAlert" role="alert">
            {{session('wait')}}
        </div>
    @endsession
    <div class="col-md-9">
        <div class="row">
            @forelse ($events as $event)
                <div class="card mb-5">
                    <div class="card-body">
                        <h5 class="card-title">{{ $event->title }}</h5>
                        <p class="card-text">{{ $event->description }}</p>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item"><strong>Start Date:</strong> {{ $event->start_date }}</li>
                        <li class="list-group-item"><strong>End Date:</strong> {{ $event->end_date }}</li>
                        <li class="list-group-item"><strong>Location:</strong> {{ $event->location }}</li>
                        <li class="list-group-item"><strong>Category:</strong> {{ $event->category()->name }}</li>
                        <li class="list-group-item"><strong>Available seats:</strong> {{ $event->available_seats }}</li>
                    </ul>
                    <div class="card-body">
                        {{-- <a href="#" class="btn btn-outline-success">Reserve</a> --}}


                        @guest
                            <form action="{{ route('events.reserve', $event) }}" method="post" style="display: inline">
                                @csrf
                                <input type="submit" class="btn btn-outline-success" value="Reserve">
                            </form>
                        @elseif ($user->id !== $event->organizer_id)
                            <form action="{{ route('events.reserve', $event) }}" method="post" style="display: inline">
                                @csrf
                                <input type="submit" class="btn btn-outline-success" value="Reserve">
                            </form>
                        @endguest

                        @auth
                            @if ($user->id === $event->organizer_id)
                                <a href="{{ route('events.edit', $event) }}" class="btn btn-outline-success">Edit</a>

                                @if (!$event->trashed())
                                    <form action="{{ route('events.destroy', $event) }}" method="post"
                                        style="display: inline">
                                        @csrf
                                        @method('delete')
                                        <input type="submit" class="btn btn-outline-danger" value="Delete">
                                    </form>
                                @else
                                    <form action="{{ route('events.restore', $event) }}" method="post"
                                        style="display: inline">
                                        @csrf
                                        <input type="submit" class="btn btn-outline-dark" value="Restore">
                                    </form>
                                @endif
                            @endif
                        @endauth
                    </div>
                </div>


            @empty
                <div class="alert alert-danger text-center" role="alert">
                    No event exist.
                </div>
            @endforelse


            @if ($events->total() !== 0)
                {{ $events->links('components.paginate', ['events' => $events]) }}
            @endif

        </div>
    </div>



</x-guest-layout>
