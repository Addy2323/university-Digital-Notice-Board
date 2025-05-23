<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <!-- CoreUI CSS -->
    <link href="https://cdn.jsdelivr.net/npm/@coreui/coreui@5.0.0/dist/css/coreui.min.css" rel="stylesheet">
</head>
<body class="c-app">
    <div class="c-sidebar c-sidebar-dark c-sidebar-fixed c-sidebar-lg-show" id="sidebar">
        <div class="c-sidebar-brand d-md-down-none" style="height:56px;">
            <span class="c-sidebar-brand-full">Admin</span>
        </div>
        <ul class="c-sidebar-nav">
            <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="/admin/dashboard">Dashboard</a></li>
            <!-- Add more sidebar links here -->
        </ul>
    </div>
    <div class="c-wrapper">
        <header class="c-header c-header-light c-header-fixed px-3">
            <a class="c-header-brand d-lg-none" href="#">Admin</a>
            <ul class="c-header-nav ml-auto mr-4">
                <li class="c-header-nav-item px-3">
                    <a class="c-header-nav-link" href="/logout">Logout</a>
                </li>
            </ul>
        </header>
        <div class="c-body">
            <main class="c-main p-4">
                @yield('content')
            </main>
        </div>
    </div>
    <!-- CoreUI JS -->
    <script src="https://cdn.jsdelivr.net/npm/@coreui/coreui@5.0.0/dist/js/coreui.bundle.min.js"></script>
</body>
</html> 