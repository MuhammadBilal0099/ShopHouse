<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Responsive Header with Login Hover</title>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <!-- Tippy.js -->
    <link rel="stylesheet" href="https://unpkg.com/tippy.js@6/dist/tippy.css" />
    <script src="https://unpkg.com/@popperjs/core@2"></script>
    <script src="https://unpkg.com/tippy.js@6"></script>

    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: Arial, sans-serif;
        }

        .site-header {
            background-color: white;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .header-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 15px 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
        }

        .navbar-brand img {
            width: 150px;
            max-width: 100%;
            height: auto;
        }

        nav ul {
            list-style: none;
            display: flex;
            gap: 25px;
            align-items: center;
            flex-wrap: wrap;
        }

        nav ul li a {
            text-decoration: none;
            color: #333;
            font-weight: 500;
        }

        .search-box input {
            padding: 8px 15px;
            border: 1px solid #ddd;
            border-radius: 20px;
            width: 150px;
        }

        .right-section {
            display: flex;
            align-items: center;
            gap: 20px;
        }

        @media (max-width: 768px) {
            .header-container {
                flex-direction: column;
                align-items: flex-start;
            }

            nav ul {
                flex-direction: column;
                align-items: flex-start;
                gap: 15px;
                margin-top: 10px;
            }

            .right-section {
                margin-top: 15px;
                width: 100%;
                justify-content: space-between;
            }

            .search-box input {
                width: 100%;
            }

            .navbar-brand img {
                width: 120px;
            }
        }

        @media (max-width: 480px) {
            .navbar-brand img {
                width: 100px;
            }

            .search-box input {
                width: 100%;
                font-size: 14px;
            }
        }

        /* Tippy.js theme overrides */
        .tippy-box[data-theme~='light-border'] {
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 8px;
        }

        .login-card {
            width: 350px;
            padding: 40px;
            border-radius: 10px;
        }

        .login-card input {
            width: 100%;
            margin-bottom: 15px;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 16px;
        }

        .login-card button {
            width: 100%;
            padding: 10px;
            background-color: #333;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }

        .login-card h4 {
            margin-bottom: 20px;
            font-size: 18px;
        }

        .register-heading {
            color: rgb(241, 61, 19);
            background-color: #FFF4F1;
            padding: 12px;
            border-radius: 10px;
            text-align: center;
            font-size: 16px;
            display: block;
            margin-bottom: 15px;
        }

        /* "Or" Text Styling */
        .login-card span {
            display: block;
            margin: 15px 0;
            font-size: 16px;
            color: #333;
        }

        .login {
            background-color: rgb(241, 61, 19);
            color: #FFF4F1;
            padding: 12px;
            border-radius: 10px;
            text-align: center;
            font-size: 16px;
            display: block;
            text-decoration: none;
            margin-top: 15px;
        }

        .login:hover {
            background-color: rgb(221, 49, 10);
            color: #FFF;
        }
    </style>
</head>

<body>

    <header class="site-header">
        <div class="header-container">
            <!-- Logo -->
            <div style="font-size: 24px; font-weight: bold; color: #333;">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <img src="{{ asset('assets/images/theme-logo.png') }}" alt="Logo" />
                </a>
            </div>

            <!-- Navigation Links -->
            <nav>
                <ul>
                    <li><a href="#">Home</a></li>
                    <li><a href="#">Categories</a></li>
                    <li><a href="#">Offers</a></li>
                    <li class="search-box">
                        <input type="text" placeholder="Search..." />
                    </li>
                </ul>
            </nav>


            {{-- <nav>
                <ul>
                    <li class="{{ request()->routeIs('home') && !request()->is('categories*') && !request()->is('offers*') ? 'active' : '' }}">
                        <a href="{{ route('home') }}">Home</a>
                    </li>
                    <li class="{{ request()->is('categories*') ? 'active' : '' }}">
                        <a href="{{ url('/categories') }}">Categories</a>
                    </li>
                    <li class="{{ request()->is('offers*') ? 'active' : '' }}">
                        <a href="{{ url('/offers') }}">Offers</a>
                    </li>
                    <li class="search-box">
                        <input type="text" placeholder="Search..." />
                    </li>
                </ul>
            </nav> --}}



            <!-- Right Section -->
            <div class="right-section">
                <div style="font-weight: 500; color: #333;">English</div>
                <div id="userIcon"
                    style="font-weight: 500; color: #333; display: flex; align-items: center; cursor: pointer;">
                    <i class="fa fa-user" style="margin-right: 5px;"></i>
                </div>
                <div style="font-weight: 500; color: #333; display: flex; align-items: center; cursor: pointer;">
                    <i class="fa fa-shopping-bag" style="margin-right: 5px;"></i>
                </div>
            </div>
        </div>
    </header>

    <!-- Hidden Login Card Content -->
    <div id="loginCardContent" style="display: none;">
        <div class="login-card" style="width: 350px; padding: 40px;">
            <!-- Register Heading -->
            <a class="register-heading">Register your Account</a>

            <!-- "Or" Text -->
            <div style="text-align: center; margin: 15px 0; font-size: 16px; color: #333;">Or</div>

            <!-- Login Link -->
            <a href={{route('loginForm')}} class="login">Login to your account</a>
        </div>
    </div>

    <script>
        // Initialize Tippy on user icon
        tippy('#userIcon', {
            content: document.getElementById('loginCardContent').innerHTML,
            allowHTML: true,
            interactive: true,
            placement: 'bottom-end',
            trigger: 'mouseenter focus',
            theme: 'light-border',
        });
    </script>

</body>

</html>
