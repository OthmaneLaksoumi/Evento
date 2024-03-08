<x-guest-layout title="Reservations">

    <div class="col-md-9">
        @forelse ($events as $event)
            <div class="card mb-4">
                <div class="card-body">
                    {{-- <h5 class="card-title">Make a Reservation</h5> --}}
                    {{-- <form id="reservationForm">
                    <div class="form-group">
                        <label for="name">Name:</label>
                        <input type="text" class="form-control" id="name" placeholder="Enter your name" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" class="form-control" id="email" placeholder="Enter your email"
                            required>
                    </div>
                    <div class="form-group">
                        <label for="date">Reservation Date:</label>
                        <input type="date" class="form-control" id="date" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit Reservation</button>
                </form> --}}
                    <ul class="list-group list-group-flush">
                        <h5 class="card-title">{{ $event->number_of_reservations() }}</h5>
                        <li class="list-group-item"><strong>Start Date:</strong> {{ $event->start_date }}</li>
                        <li class="list-group-item"><strong>End Date:</strong> {{ $event->end_date }}</li>
                        <li class="list-group-item"><strong>Location:</strong> {{ $event->location }}</li>
                        <li class="list-group-item"><strong>Reservations not acceptance:</strong>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">Event Title</th>
                                        <th scope="col">First</th>
                                        <th scope="col">Last</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>{{ $event->title }}</td>
                                        <td>Otto</td>
                                        <td>Otto</td>
                                    </tr>

                                </tbody>
                            </table>

                        </li>
                    </ul>
                </div>
            </div>
        @empty
            <div class="alert alert-danger" role="alert">
                You don't have any reservation.
            </div>
        @endforelse

    </div>
    {{-- <div class="col-md-6">
        <!-- Display Number of Reservations -->
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Number of Reservations</h5>
                <p id="reservationCount">0</p>
            </div>
        </div>
    </div> --}}

</x-guest-layout>
