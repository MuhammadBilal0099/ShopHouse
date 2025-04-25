<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Responsive Header with Sidebar & Login Hover</title>

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
            position: sticky;
            z-index: 1000;
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

        #menuToggle {
            display: none;
            font-size: 24px;
            cursor: pointer;
        }

        @media (max-width: 768px) {
            nav {
                display: none;
            }

            #menuToggle {
                display: block;
            }

            .header-container {
                flex-wrap: nowrap;
            }

            .right-section {
                display: none;
                /* Hide icons on small screen */
            }

            .right-section.show {
                display: flex !important;
                /* Toggle visibility when sidebar opens */
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

        /* Sidebar */
        #sidebarMenu {
            position: fixed;
            top: 0;
            left: -250px;
            width: 250px;
            height: 100vh;
            background: white;
            box-shadow: 2px 0 5px rgba(0, 0, 0, 0.1);
            transition: left 0.3s ease;
            padding: 20px;
            z-index: 1000;
        }

        #sidebarMenu ul {
            list-style: none;
            padding: 20px 0;
        }

        #sidebarMenu ul li {
            margin-bottom: 15px;
        }

        #sidebarMenu ul li a {
            text-decoration: none;
            color: #333;
            font-weight: 500;
        }

        #overlay {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100vw;
            height: 100vh;
            background: rgba(0, 0, 0, 0.5);
            z-index: 998;
        }

        /* Tippy.js overrides */
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

        .sidebar-logo {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .sidebar-logo img {
            width: 150px;
            height: auto;
        }

        .sidebar-logo i {
            font-size: 20px;
            cursor: pointer;
        }


        .sidebar-menu li {
            border-bottom: 1px solid #ddd;
            padding: 10px 0;
        }

        .sidebar-menu li:last-child {
            border-bottom: none;
        }
    </style>
</head>

<body>

    <!-- Header -->
    <header class="site-header">
        <div class="header-container">
            <!-- Logo -->
            <div>
                <a class="navbar-brand" href="#">
                    <img src="{{ asset('assets/images/theme-logo.png') }}" alt="Logo" />
                </a>
            </div>

            <!-- Menu Toggle (Hamburger) -->
            <div id="menuToggle">
                <i class="fas fa-bars"></i>
            </div>

            <!-- Navigation -->
            <nav>
                <ul>
                    <li><a href="{{route('home')}}">Home</a></li>
                    <li><a href="#">Categories</a></li>
                    <li><a href="#">Offers</a></li>
                    <li class="search-box">
                        <input type="text" placeholder="Search..." />
                    </li>
                </ul>
            </nav>

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

    <div id="sidebarMenu">
        <div class="sidebar-logo">
            <img src="{{ asset('assets/images/theme-logo.png') }}" alt="Logo" />
            <i class="fa fa-times" style="color: rgb(241, 61, 19)"  onclick="toggleSidebar()"></i>
        </div>
        <ul class="sidebar-menu">
            <li><a href="#">Home</a></li>
            <li><a href="#">Categories</a></li>
            <li><a href="#">Offers</a></li>
            <li><a href="#">English</a></li>
            <li><a href="#"><i class="fas fa-user fa-fw"></i></a></li>
            <li><a href="#"><i class="fas fa-shopping-bag fa-fw"></i></a></li>
        </ul>
    </div>

    <!-- Overlay -->
    <div id="overlay" onclick="toggleSidebar()"></div>

    <!-- Login Card (Hidden Content) -->
    <div id="loginCardContent" style="display: none;">
        <div class="login-card">
            <a href="{{ route('signUpForm') }}" class="register-heading">Register your Account</a>
            <div style="text-align: center; margin: 15px 0; font-size: 16px; color: #333;">Or</div>
            <a href="{{ route('loginForm') }}" class="login">Login to your account</a>
        </div>
    </div>

    <!-- Scripts -->
    <script>
        // Tippy Login Card
        tippy('#userIcon', {
            content: document.getElementById('loginCardContent').innerHTML,
            allowHTML: true,
            interactive: true,
            placement: 'bottom-end',
            trigger: 'mouseenter focus',
            theme: 'light-border',
        });

        // Sidebar toggle
        function toggleSidebar() {
            const sidebar = document.getElementById("sidebarMenu");
            const overlay = document.getElementById("overlay");

            if (sidebar.style.left === "0px") {
                sidebar.style.left = "-250px";
                overlay.style.display = "none";
                rightSection.classList.remove("show");
            } else {
                sidebar.style.left = "0px";
                overlay.style.display = "block";
                rightSection.classList.add("show");
            }
        }

        document.getElementById("menuToggle").addEventListener("click", toggleSidebar);
    </script>

</body>

</html>
