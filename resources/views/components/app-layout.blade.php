<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        header img,
        footer img {
            max-width: 100%;
            height: auto;
        }

        header,
        footer {
            background-color: #f8f9fa;
            padding: 10px 0;
        }

        main {
            flex: 1;
            padding: 20px;
        }

        .container {
            max-width: 960px;
            margin: 0 auto;
        }

        body {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        header img,
        footer img {
            max-width: 100%;
            height: auto;
        }

        main {
            flex: 1;
            padding: 20px;
        }

        .container {
            max-width: 960px;
            margin: 0 auto;
        }

        form label {
            display: block;
            margin-top: 10px;
        }

        form input[type="submit"] {
            margin-top: 15px;
        }
    </style>
</head>

<body>
    <header>
        <div class="container text-center">
            <img src="/img/cine-header.jpg" alt="header-img" class="img-fluid rounded">
        </div>
    </header>

    <main>
        <div class="container">
            {{ $slot }}
        </div>
    </main>

    <footer>
        <div class="container text-center">
            <p>CREATED BY ERIC</p>
            <img src="/img/cine-footer.jpeg" alt="footer-img" class="img-fluid rounded">
        </div>
    </footer>

    <!-- Add Bootstrap JS and Popper.js (required for Bootstrap) -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>

</html>
