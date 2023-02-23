<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">


    <!-- JavaScript -->
    <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>

    <!-- CSS -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css" />

    <title>Hello, world!</title>
    <style>
        .topbar {
            padding: 15px 0;
        }

        .topbar .btn-primary {
            margin-left: auto;
            display: table;
        }

        .table_area {
            margin-top: 30px;
        }

        .table_inner {
            border-radius: 4px;
            box-shadow: rgb(224, 224, 224) 20px 20px 60px, rgb(255, 255, 255) -20px -20px 60px;
            padding: 30px;
        }

        .topbar_inner {
            box-shadow: rgb(224, 224, 224) 20px 20px 60px, rgb(255, 255, 255) -20px -20px 60px;
            padding: 30px;
            border-radius: 4px;
        }
    </style>
</head>

<body>
    @yield('main')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.3.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js"></script>

    @stack('scripts')
</body>

</html>
