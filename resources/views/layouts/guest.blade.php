@props(['title'])

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="public/css/main.css">
    <style>
        .fixed-alert {
            position: absolute;
            top: 53px;
            left: 50%;
            transform: translateX(-50%);
            width: 50%;
            z-index: 1000;
            /* Ensure the alert is on top of all elements */
        }
    </style>
    <title>{{ $title }}</title>
</head>

<body>



    @include('partials.header')

    <div class="container mt-5">
        <div class="row">

            @include('partials.side')

            {{ $slot }}


        </div>

    </div>

    @include('partials.footer')


    <script src="Public\js\ajax_search.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
    <script>
       
    </script>
</body>

</html>
