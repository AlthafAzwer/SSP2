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
            <div class="p-6 text-2xl font-extrabold">Admin Portal</div>
            <ul class="space-y-2 px-4">
                <li>
                    <a href="{{ route('admin.dashboard') }}" class="flex items-center space-x-2 px-4 py-2 rounded hover:bg-gray-700">
                        <span>Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.manage-products') }}" class="flex items-center space-x-2 px-4 py-2 rounded hover:bg-gray-700">
                        <span>Manage Products</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.admin.manage-users') }}" class="flex items-center space-x-2 px-4 py-2 rounded hover:bg-gray-700">
                        <span>Manage Users</span>
                    </a>
                </li>
                <li>
                    <a href="#" class="flex items-center space-x-2 px-4 py-2 rounded hover:bg-gray-700">
                        <span>Manage Orders</span>
                    </a>
                </li>
            </ul>
            <form method="POST" action="{{ route('admin.logout') }}" class="mt-auto p-4">
                @csrf
                <button type="submit" class="bg-red-600 w-full text-white px-4 py-2 rounded-md hover:bg-red-700">
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
