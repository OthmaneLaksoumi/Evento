<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        .card {
            border: 1px solid #ccc;
            border-radius: 5px;
            margin-top: 20px;
            overflow: hidden;
        }

        .card-header {
            background-color: #007bff;
            color: #fff;
            padding: 10px 15px;
        }

        .card-body {
            padding: 15px;
        }

        .row {
            display: flex;
            flex-wrap: wrap;
        }

        .col-sm-12 {
            flex: 0 0 100%;
            max-width: 100%;
        }

        p {
            margin: 0 0 10px;
        }

        h2 {
            margin-bottom: 20px;
        }
    </style>
    <title>Document</title>
</head>

<body>

    <div class="col-md-12">
        <div class="card mt-5">
            <div class="card-header bg-primary text-white">
                <h5 class="mb-0">Reservation Ticket</h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-6">
                        <p><strong>Event:</strong> {{ $event->title }}</p>
                        <p><strong>Location:</strong> {{ $event->location }}</p>
                        <p><strong>Organizer:</strong> {{ $event->user()->name }}</p>
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
            {{-- <div>
                {!! $reservation->QrCode !!}
            </div> --}}
        </div>
    </div>
</body>

</html>
