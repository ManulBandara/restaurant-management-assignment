<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restaurant Adventure</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #e6f3e6;
        }
        .navbar {
            background-color: #2e7d32;
        }
        .navbar-brand, .nav-link {
            color: #ffffff !important;
            font-weight: bold;
        }
        .nav-link:hover {
            color: #ffeb3b !important;
        }
        .card {
            border: none;
            box-shadow: 0 4px 8px rgba(0,0,0,0.2);
            transition: transform 0.3s;
        }
        .card:hover {
            transform: scale(1.05);
        }
        .btn-primary {
            background-color: #4caf50;
            border-color: #4caf50;
        }
        .btn-primary:hover {
            background-color: #388e3c;
            border-color: #388e3c;
        }
        .alert-success {
            background-color: #c8e6c9;
            color: #1b5e20;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <a class="navbar-brand" href="/">Restaurant Adventure</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('concessions.index') }}">Food Menu</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('orders.index') }}">Orders</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('kitchen.index') }}">Kitchen</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container mt-4">
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif
        @yield('content')
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>