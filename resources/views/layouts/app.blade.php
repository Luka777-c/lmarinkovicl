<!DOCTYPE html>
<html lang="sr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vinoteka - @yield('title', 'Sistem za upravljanje proizvodnjom vina')</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome ikone -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;700&family=Lato:wght@300;400;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary-color: #8B2635;
            --primary-dark: #6B1C28;
            --light-bg: #f5f5f5;
            --bs-primary: #8B2635;
        }

        body {
            background-color: var(--light-bg);
            color: #333;
            font-family: 'Lato', system-ui, -apple-system, "Segoe UI", Roboto, "Helvetica Neue", Arial, "Noto Sans", "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";
        }

        .app-container {
            display: flex;
            min-height: 100vh;
        }

        /* Sidebar */
        .sidebar {
            width: 250px;
            background: linear-gradient(180deg, var(--primary-color) 0%, var(--primary-dark) 100%);
            color: #fff;
            position: fixed;
            height: 100vh;
            overflow-y: auto;
            z-index: 1000;
        }
        .sidebar .nav-link {
            color: #fff;
            transition: all .2s ease;
            font-weight: 500;
        }
        .sidebar .nav-link:hover,
        .sidebar .nav-link.active {
            background: rgba(255,255,255,0.1);
            transform: translateX(4px);
        }
        .sidebar .nav-link i { width: 20px; font-size: 16px; }

        /* Main content */
        .main-content {
            flex: 1;
            margin-left: 250px;
            padding: 30px;
        }

        /* Page header */
        .page-header {
            background: #fff;
            padding: 25px 30px;
            border-radius: 15px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.08);
            margin-bottom: 30px;
        }
        .page-title { color: var(--primary-color); }

        /* Dashboard cards */
        .dashboard-card {
            background: #fff;
            border-radius: 15px;
            padding: 25px;
            box-shadow: 0 2px 15px rgba(0,0,0,0.08);
            border-left: 5px solid var(--primary-color);
            height: 100%;
        }
        .card-icon {
            width: 50px; height: 50px; border-radius: 12px; display: flex; align-items: center; justify-content: center;
            background: linear-gradient(135deg, var(--primary-color), var(--primary-dark)); color: #fff;
        }
        .card-value { font-size: 32px; font-weight: 800; color: var(--primary-color); }

        /* Table */
        .data-table { background: #fff; border-radius: 15px; box-shadow: 0 2px 15px rgba(0,0,0,0.08); overflow: hidden; }
        .table-header { background: linear-gradient(135deg, var(--primary-color), var(--primary-dark)); color: #fff; padding: 18px 24px; }
        .table-content { padding: 24px; }
        .status-badge { padding: 4px 12px; border-radius: 20px; font-size: 12px; font-weight: 600; }
        .status-active { background: #d4edda; color: #155724; }
        .status-pending { background: #fff3cd; color: #856404; }
        .status-completed { background: #cce5ff; color: #004085; }

        /* Quick actions */
        .quick-actions { background: #fff; border-radius: 15px; padding: 25px; box-shadow: 0 2px 15px rgba(0,0,0,0.08); margin-bottom: 30px; }

        /* Footer */
        .footer { background: #2c1810; color: #fff; padding: 40px 0; margin-top: 30px; }

        /* Responsive */
        @media (max-width: 768px) {
            .sidebar { width: 200px; }
            .main-content { margin-left: 200px; padding: 20px; }
        }
        @media (max-width: 576px) {
            .sidebar { transform: translateX(-100%); transition: transform .3s ease; width: 260px; }
            .sidebar.show { transform: translateX(0); }
            .main-content { margin-left: 0; padding: 15px; }
        }
    </style>
</head>
<body>
    <div class="app-container">
        @include('layouts.sidebar')

        <main class="main-content">
            @yield('content')
        </main>
    </div>

    @include('partials.footer')

    <!-- Bootstrap JS and Popper.js -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
    <script>
        function toggleSidebar() {
            const sidebar = document.getElementById('sidebar');
            sidebar.classList.toggle('show');
        }
    </script>
</body>
</html>