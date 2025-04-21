<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restaurant Adventure</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Warm, inviting body background with a subtle gradient */
body {
    background: linear-gradient(180deg, #fff7ed 0%, #fdefe5 100%); /* Creamy white to soft apricot */
    font-family: 'Inter', sans-serif; /* Clean, modern font */
}

/* Navbar with a vibrant, appetizing red */
.navbar {
    background: linear-gradient(90deg, #9e2a2f 0%, #c7363a 100%); /* Deep berry to bright cherry red */
    padding: 1rem; /* Increased padding for touch-friendliness */
    box-shadow: 0 3px 6px rgba(0, 0, 0, 0.15); /* Subtle shadow for depth */
}

/* Navbar text and links for clarity and interactivity */
.navbar-brand, .nav-link {
    color: #fff7ed !important; /* Creamy white for high contrast */
    font-weight: 600; /* Bold but refined */
    font-size: 1.1rem; /* Larger for readability */
    padding: 0.5rem 1rem; /* More touch area */
    transition: color 0.3s ease;
}

/* Hover effect with a warm, energetic accent */
.nav-link:hover {
    color: #f4c430 !important; /* Saffron yellow for vibrant feedback */
    background: rgba(255, 255, 255, 0.1); /* Subtle background on hover */
    border-radius: 6px;
}

/* Cards with a clean, neumorphic design */
.card {
    background: #ffffff; /* Crisp white for content clarity */
    border: none;
    border-radius: 12px; /* Softer corners for friendliness */
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1), inset 0 1px 2px rgba(255, 255, 255, 0.5); /* Neumorphic effect */
    transition: transform 0.3s ease, box-shadow 0.3s ease;
    padding: 1.5rem; /* More padding for spaciousness */
}

/* Card hover with a gentle lift */
.card:hover {
    transform: translateY(-4px);
    box-shadow: 0 8px 16px rgba(0, 0, 0, 0.15);
}

/* Primary button with a fresh, natural green */
.btn-primary {
    background: linear-gradient(135deg, #2a7042 0%, #3d9c5a 100%); /* Rosemary to lime green */
    border: none;
    border-radius: 10px; /* Rounded for approachability */
    padding: 0.75rem 1.5rem; /* Larger touch target */
    font-size: 1rem; /* Readable text */
    box-shadow: 0 3px 6px rgba(0, 0, 0, 0.2);
    transition: all 0.3s ease;
}

/* Button hover with a vibrant lift */
.btn-primary:hover {
    background: linear-gradient(135deg, #205635 0%, #2a7042 100%); /* Darker green for depth */
    box-shadow: 0 5px 10px rgba(0, 0, 0, 0.25);
    transform: translateY(-2px);
}

/* Success alerts with a fresh, calming tone */
.alert-success {
    background: #e8f5e9; /* Light mint green for positivity */
    color: #1a3c34; /* Deep teal for contrast */
    border: 1px solid #a5d6a7; /* Soft green border */
    border-radius: 8px;
    padding: 1rem;
    font-size: 1rem;
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