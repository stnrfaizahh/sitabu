<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Landing page similar to Moka POS">
    <meta name="author" content="Your Name">
    <title>SIBUBU SDI</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <style>
        body {
            font-family: 'Poppins Sans', sans-serif;
            color: #333;
        }
        /* Hero Section */
        .hero {
            position: relative; /* Pastikan .hero menjadi relative untuk positioning pseudo-element */
            background: url('image/login.jpg') center center/cover no-repeat;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            color: #fff;
        }

        .hero::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: rgba(0, 0, 0, 0.5); /* Overlay dengan transparansi */
            z-index: 1; /* Overlay berada di bawah teks */
        }
        .hero h1 {
            font-family: 'Merriweather', serif; /* Menggunakan Merriweather untuk judul */
            font-size: 4rem;
            margin-bottom: 1rem;
        }

        .hero p {
            font-size: 1.5rem;
            margin-bottom: 2rem;
        }
        .hero h1, .hero p {
            position: relative;
            z-index: 2; /* Pastikan teks berada di atas overlay */
        }

        .hero .btn-primary {
            padding: 1rem 2rem;
            font-size: 1.25rem;
        }
        /* Features Section */
        .features {
            padding: 4rem 0;
            text-align: center;
        }
        .features h2 {
            font-family: 'Merriweather', serif;
            margin-bottom: 2rem;
            font-size: 2.5rem;
            color: darkgreen;
        }
        .feature-item {
            margin-bottom: 2rem;
        }
        .feature-item i {
            font-size: 3rem;
            margin-bottom: 1rem;
            color: darkgreen;
        }
        /* Footer */
        footer {
            background-color: green;
            padding: 2rem 0;
            text-align: center;
            color: #fff
        }
    </style>
</head>
<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
        <div class="container">
            <a class="navbar-brand" href="#">SDI TOMPOKERSAN LUMAJANG</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ms-auto my-2 my-lg-0">
                    @if (Route::has('login'))
                        <div class="nav-item">
                            @auth
                                @if (auth()->user()->role == 'admin')
                                        <a class="nav-link" href="{{ route('/dashboard') }}">Dashboard Admin</a>
                                @elseif (auth()->user()->role == 'user')
                                        <a class="nav-link" href="{{ route('/dashboard') }}">Dashboard User</a>
                                @endif
                            @else
                                        <a class="btn btn-primary" style="background-color:rgb(33, 160, 33)" href="{{ route('login') }}">Log in</a>
                                @if (Route::has('register'))
                                        <a class="btn btn-primary" style="background-color:rgb(33, 160, 33)" href="{{ route('register') }}">Register</a>
                                @endif
                            @endauth
                        </div>
                    @endif
                </ul>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <header class="hero">
        <div class="container">
            <h1>SIBUBU SDI</h1>
            <p>SISTEM INFORMASI PEMBUKUAN TABUNGAN SISWA SDI</p>
        </div>
    </header>
</body>
<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

</html>