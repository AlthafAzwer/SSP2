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
                    <a href="{{ route('admin.orders.index') }}" class="flex items-center space-x-2 px-4 py-2 rounded hover:bg-gray-700">
    <span>Manage Orders</span>
</a>

<a href="{{ route('admin.admin.queries.index') }}" class="flex items-center space-x-2 px-4 py-2 rounded hover:bg-gray-700">
    <span>Manage Queries</span>
</a>


                </li>
            </ul>
            <form method="POST" action="{{ route('admin.logout') }}" class="mt-auto p-4">
    @csrf
    <button type="submit" 
        class="w-full bg-red-600 text-white font-semibold py-3 px-6 rounded-lg shadow-md 
               hover:bg-red-700 hover:shadow-lg transition duration-300 ease-in-out 
               flex items-center justify-center space-x-2">
        
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
            <path fill-rule="evenodd" d="M3 10a1 1 0 011-1h8.586l-2.293-2.293a1 1 0 111.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 11-1.414-1.414L12.586 11H4a1 1 0 01-1-1z" clip-rule="evenodd" />
        </svg>
        
        <span>Logout</span>
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
