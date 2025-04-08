<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Selamat Datang | MyWebsite</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        html, body {
            height: 100%;
        }
        body {
            display: flex;
            flex-direction: column;
        }
        .main-content {
            flex: 1;
        }
        .hero-section {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        }
        .btn-primary {
            background-color: #4f46e5;
            border-color: #4f46e5;
            padding: 10px 25px;
            font-weight: 500;
            transition: all 0.3s;
        }
        .btn-primary:hover {
            background-color: #4338ca;
            border-color: #4338ca;
            transform: translateY(-2px);
        }
        .btn-light {
            padding: 10px 25px;
            font-weight: 500;
            transition: all 0.3s;
        }
        .btn-light:hover {
            transform: translateY(-2px);
        }
        .welcome-title {
            font-weight: 700;
            font-size: 2.5rem;
            margin-bottom: 1.5rem;
        }
        .welcome-subtitle {
            font-weight: 300;
            font-size: 1.2rem;
            margin-bottom: 2.5rem;
            opacity: 0.9;
        }
        footer {
            background-color: #212529;
            color: white;
            padding: 1.5rem 0;
            margin-top: auto;
        }
    </style>
</head>
<body class="bg-light d-flex flex-column min-vh-100">

    <div class="main-content">
        <div class="container my-5">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="hero-section p-5 my-5">
                        <div class="text-center">
                            <h1 class="welcome-title">Selamat Datang di MyWebsite</h1>
                            <p class="welcome-subtitle">Mulai perjalanan Anda dengan kami hari ini</p>
                            
                            @auth
                                <a href="{{ route("dashboard") }}" class="btn btn-primary btn-lg">Dashboard</a>
                            @else
                                <div class="d-grid gap-3 d-sm-flex justify-content-sm-center">
                                    <a href="{{ route('login') }}" class="btn btn-primary btn-lg px-4 gap-3">Login</a>
                                    <a href="{{ route('register') }}" class="btn btn-light btn-lg px-4">Register</a>
                                </div>
                            @endauth
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <footer class="mt-auto">
        <div class="container text-center">
            <p class="mb-0">&copy; 2025 MyWebsite. Semua Hak Dilindungi.</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>