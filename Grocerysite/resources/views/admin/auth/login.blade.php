<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <!-- Tailwind CSS (CDN) -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">

    <style>
        /* Full-page dark background */
        body {
            background-color: #0f172a;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        /* Login Card */
        .login-card {
            background-color: #1e293b;
            max-width: 400px;
            width: 100%;
            padding: 2rem;
            border-radius: 0.5rem;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.3);
        }

        /* Input field styles */
        .dark-input {
            background-color: #1e293b;
            border: 1px solid #334155;
            color: #f1f5f9;
            padding: 10px;
        }

        .dark-input::placeholder {
            color: #94a3b8;
        }
    </style>
</head>
<body>
    <div class="login-card">
        <!-- Logo Instead of Key Icon -->
        <div class="flex justify-center mb-5">
            <img src="{{ asset('images/logofinal.png') }}" alt="Logo" class="h-14 w-14">
        </div>

        <h1 class="text-2xl font-bold text-center text-white mb-6">ADMIN PANEL</h1>

        {{-- Display validation errors --}}
        @if ($errors->any())
            <div class="mb-4 text-red-400">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Login Form -->
        <form method="POST" action="{{ route('admin.login') }}">
            @csrf

            <div class="mb-4">
                <label for="email" class="block text-sm font-medium text-gray-300 mb-1">Email</label>
                <input id="email" name="email" type="email" class="dark-input mt-1 block w-full rounded-md focus:outline-none focus:ring-2 focus:ring-teal-500" placeholder="Enter your email" required />
            </div>

            <div class="mb-6">
                <label for="password" class="block text-sm font-medium text-gray-300 mb-1">Password</label>
                <input id="password" name="password" type="password" class="dark-input mt-1 block w-full rounded-md focus:outline-none focus:ring-2 focus:ring-teal-500" placeholder="Enter your password" required />
            </div>

            <!-- Centered Login Button -->
            <div class="flex justify-center">
                <button type="submit"
                    class="px-6 py-2 bg-teal-600 text-white font-semibold rounded-md
                           hover:bg-teal-700 transform transition-all duration-200 hover:scale-105
                           focus:outline-none focus:ring-2 focus:ring-teal-500">
                    Login
                </button>
            </div>
        </form>
    </div>
</body>
</html>
