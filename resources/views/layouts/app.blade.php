<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    @stack('styles')

    <style>
        /* Sidebar Styles */
        .sidebar { width: 250px; background-color: #1e293b; color: white; min-height: 100vh; display: flex; flex-direction: column; flex-shrink: 0; }
        .sidebar h2 { color: #3b82f6; margin: 20px; font-size: 1.5rem; font-weight: bold; }
        .sidebar nav { padding: 0 10px; }
        /* ដក Bootstrap conflict ជាមួយ link ក្នុង sidebar */
        .nav-item { padding: 12px 15px; color: #cbd5e1; display: flex; align-items: center; margin-bottom: 5px; text-decoration: none; transition: 0.3s; border-radius: 8px; }
        .nav-item i { margin-right: 15px; width: 20px; text-align: center; }
        .nav-item:hover { background-color: #334155; color: white; }
        .nav-item.active { background: linear-gradient(90deg, #3b82f6 0%, #2563eb 100%); color: white; box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1); }
    </style>
</head>
<body class="font-sans antialiased">

    <div class="flex h-screen bg-gray-100 dark:bg-gray-900 overflow-hidden">

        <div class="sidebar hidden md:flex">
            <h2>Admin Panel</h2>
            <nav>
                <a href="{{ route('dashboard') }}" class="nav-item {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                    <i class="fas fa-tachometer-alt"></i> Dashboard
                </a>

                <a href="{{ route('posts.index') }}" class="nav-item {{ request()->routeIs('posts.index') ? 'active' : '' }}">
                    <i class="fas fa-info-circle"></i> Posts
                </a>

                <a href="#" class="nav-item">
                    <i class="fas fa-users"></i> Users
                </a>

                <a href="{{ route('categories.index') }}" class="nav-item {{ request()->routeIs('categories.index') ? 'active' : '' }}">
                    <i class="fas fa-folder"></i> Category
                </a>

                <a href="{{ Route::has('reports') ? route('reports') : '#' }}" class="nav-item {{ request()->routeIs('reports') ? 'active' : '' }}">
                    <i class="fas fa-file-alt"></i> Reports
                </a>

                <a href="#" class="nav-item">
                    <i class="fas fa-cog"></i> Settings
                </a>
            </nav>
        </div>

        <div class="flex-1 flex flex-col overflow-hidden">

            @include('layouts.navigation')

            @isset($header)
                <header class="bg-white dark:bg-gray-800 shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endisset

            <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-100 dark:bg-gray-900">
                <div class="py-6">
                    @yield('content')

                    {{ $slot ?? '' }}
                </div>
            </main>
        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    @stack('scripts')
</body>
</html>
