<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title', 'Admin Panel')</title>

    <!-- Tailwind CSS -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    

    <!-- Livewire Styles -->
    @livewireStyles
</head>
<body class="bg-gray-100 font-sans antialiased">
    <div class="min-h-screen flex">
        <!-- Sidebar -->
        <nav class="w-64 bg-gray-800 text-white flex flex-col">
            <div class="p-4 text-lg font-bold">Admin Portal</div>
            <ul class="space-y-4 px-4">
                <li><a href="{{ route('admin.dashboard') }}" class="hover:text-gray-400">Dashboard</a></li>
                <li><a href="{{ route('admin.manage-products') }}" class="hover:text-gray-400">Manage Products</a></li>
                <li><a href="#" class="hover:text-gray-400">Manage Users</a></li>
                <li><a href="#" class="hover:text-gray-400">Manage Orders</a></li>
            </ul>
            <form method="POST" action="{{ route('admin.logout') }}" class="mt-auto p-4">
                @csrf
                <button type="submit" class="bg-red-600 text-white px-4 py-2 rounded-md hover:bg-red-700">
                    Logout
                </button>
            </form>
        </nav>

        <!-- Page Content -->
        <main class="flex-1 p-6">
            @yield('content')
        </main>
    </div>

    <!-- Livewire Scripts -->
    @livewireScripts
</body>
</html>
