<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Encore | @yield('title', '')</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet" />
    
    @stack('styles')

    <style>
        :root {
            --sidebar-width: 220px;
            --sidebar-bg: #12151c;
        }

        body {
            margin: 0;
            padding: 0;
        }

        .main-content {
            padding: 1rem;
            padding-top: 70px;
        }

        @media (min-width: 992px) {
            .main-content {
                margin-left: var(--sidebar-width);
            }
        }


        #sidebar-toggle:checked~.sidebar {
            transform: translateX(0);
        }

        #sidebar-toggle:checked~.overlay {
            display: block;
        }

        @media (max-width: 991.98px) {
            .sidebar {
                transform: translateX(-100%);
                transition: transform 0.3s ease-in-out;
            }

            .overlay {
                display: none;
                position: fixed;
                top: 0;
                left: 0;
                height: 100vh;
                width: 100vw;
                background-color: rgba(0, 0, 0, 0.5);
                z-index: 1030;
            }
        }
    </style>
</head>

<body class="bg-light">


    <input type="checkbox" id="sidebar-toggle" hidden>


    @include('includes.sidebar')
    @include('includes.navbar')


    <label for="sidebar-toggle" class="overlay d-lg-none"></label>

    <main class="main-content">
        @yield('content')
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    @stack('scripts')
</body>

</html>