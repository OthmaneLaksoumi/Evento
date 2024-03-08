<x-guest-layout title="Ticket">

    <div class="col-md-9">
        <div class="card mt-5">
            <div class="card-header bg-primary text-white">
              <h5 class="mb-0">Reservation Ticket</h5>
            </div>
            <div class="card-body">
              <div class="row">
                <div class="col-sm-6">
                  <p><strong>Event:</strong> {{$event->title}}</p>
                  <p><strong>Location:</strong> {{$event->location}}</p>
                  <p><strong>Organizer:</strong> {{$event->user()->name}}</p>
                  <p><strong>Start Date:</strong> {{ $event->start_date }}</p>
                  <p><strong>End Date:</strong> {{ $event->end_date }}</p>
                </div>
                <div class="col-sm-6">
                  <p><strong>Reservation Time:</strong> {{ $reservation->created_at }}</p>
                  <p><strong>Table Number:</strong> 7</p>
                  <p><strong>Special Requests:</strong> None</p>
                  
                </div>
              </div>
            </div>
          </div>
    </div>


</x-guest-layout>
