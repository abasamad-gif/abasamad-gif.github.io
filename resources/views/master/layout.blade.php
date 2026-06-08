<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Brew & Blossom | Premium Coffee & Florals</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    
    <style>
        :root {
            --primary-green: #1c3c2d;
            --accent-yellow: #ffc107;
            --white: #ffffff;
        }

        body {
            font-family: 'Segoe UI', Roboto, Helvetica, Arial, sans-serif;
            background-color: #fcfcfc;
            margin: 0;
            padding: 0;
        }

        /* Extra Large Dark Green Header */
        .navbar {
            position: sticky;
            top: 0;
            z-index: 1000;
            background-color: var(--primary-green) !important;
            padding-top: 1.2rem !important;
            padding-bottom: 1.2rem !important;
            box-shadow: 0 4px 20px rgba(0,0,0,0.3);
            border-bottom: 1px solid rgba(255,255,255,0.1);
        }

        /* Brand Container (Logo + Text) */
        .navbar-brand {
            display: flex;
            align-items: center;
            gap: 20px; 
            margin-right: 0;
            transition: opacity 0.3s ease;
        }

        .navbar-brand:hover {
            opacity: 0.9;
        }

        .brand-text {
            font-size: 2rem;
            font-weight: 800;
            color: var(--white);
            letter-spacing: 2px;
            text-transform: uppercase;
            line-height: 1;
        }

        /* Extra Large Header Logo */
        .header-logo {
            height: 100px; /* Your requested size */
            width: auto;
            filter: drop-shadow(0 4px 8px rgba(0,0,0,0.2));
        }

        /* Navigation Icons */
        .nav-link i {
            font-size: 2rem !important;
            color: var(--white) !important;
            transition: all 0.2s ease;
        }

        .nav-link:hover i {
            color: var(--accent-yellow) !important;
            transform: translateY(-3px);
        }

        /* Cart Badge */
        .badge-cart {
            background-color: var(--accent-yellow);
            color: #000;
            font-size: 0.8rem;
            font-weight: bold;
            border: 2px solid var(--primary-green);
        }

        /* Main Content Spacing */
        main {
            min-height: 85vh;
        }

        /* Footer */
        footer {
            background-color: var(--white);
            color: var(--primary-green);
            border-top: 1px solid #eee;
        }

        /* Custom Scrollbar */
        ::-webkit-scrollbar {
            width: 10px;
        }
        ::-webkit-scrollbar-track {
            background: #f1f1f1;
        }
        ::-webkit-scrollbar-thumb {
            background: var(--primary-green);
            border-radius: 5px;
        }
    </style>
</head>
<body>

    <nav class="navbar navbar-expand-lg">
        <div class="container">
            
            <a class="navbar-brand" href="{{ route('home') }}">
                <img src="{{ asset('images/bnb.png') }}" alt="BNB Logo" class="header-logo">
                <div class="brand-text d-none d-sm-block">
                    Brew <span style="font-weight: 300; opacity: 0.9;">&</span> Blossom
                </div>
            </a>

            <div class="ms-auto d-flex align-items-center">
                <ul class="navbar-nav flex-row gap-4">
                    <li class="nav-item">
                        <a class="nav-link p-0" href="{{ route('shop') }}" title="Go to Shop">
                            <i class="bi bi-grid-3x3-gap"></i>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link p-0 position-relative" href="{{ route('cart.index') }}" title="View Cart">
                            <i class="bi bi-bag-heart"></i>
                            @if(Session::has('cart') && count(Session::get('cart')) > 0)
                                <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill badge-cart">
                                    {{ count(Session::get('cart')) }}
                                </span>
                            @endif
                        </a>
                    </li>
                    @if(Session::has('user_id'))
                        <li class="nav-item">
                            <a class="nav-link p-0" href="{{ route('logout') }}" title="Logout">
                                <i class="bi bi-person-x"></i>
                            </a>
                        </li>
                    @else
                        <li class="nav-item">
                            <a class="nav-link p-0" href="{{ route('login') }}" title="Login">
                                <i class="bi bi-person-circle"></i>
                            </a>
                        </li>
                    @endif
                </ul>
            </div>

        </div>
    </nav>

    <main>
        @yield('content')
    </main>

    <footer class="py-5">
        <div class="container text-center">
            <img src="{{ asset('images/bnb.png') }}" alt="BNB Logo" style="height: 60px; margin-bottom: 15px; filter: grayscale(1); opacity: 0.2;">
            <p class="fw-bold mb-1" style="color: var(--primary-green);">BREW & BLOSSOM</p>
            <p class="text-muted small mb-0">&copy; {{ date('Y') }} Premium Drinks & Floral Boutique. All rights reserved.</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>