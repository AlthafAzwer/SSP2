<!-- resources/views/auth/login.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <!-- Tailwind CSS (CDN) -->
    <link
      href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css"
      rel="stylesheet"
    />
    <style>
        /* Body background - light gray */
        body {
            background-color:rgb(170, 176, 187); /* Soft gray */
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        /* Login Card */
        .login-card {
            background-color: #ffffff; /* White background */
            max-width: 400px;
            width: 100%;
            padding: 2rem;
            border-radius: 0.5rem;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1); /* Light shadow */
        }

        /* Styled input fields */
        .light-input {
            background-color: #ffffff;
            border: 1px solid #cbd5e1; /* Light gray border */
            color: #1f2937;           /* Dark text */
            padding: 10px;
        }

        /* Placeholder text color */
        .light-input::placeholder {
            color: #9ca3af;
        }
    </style>
</head>
<body>
    <div class="login-card">
        <!-- Logo -->
        <div class="flex justify-center mb-6">
            <img src="{{ asset('images/logofinal.png') }}" alt="Logo" class="h-14 w-14">
        </div>

        <!-- Title -->
        <h1 class="text-2xl font-bold text-center text-gray-800 mb-6">LOGIN</h1>

        <!-- Validation Errors -->
        @if ($errors->any())
            <div class="mb-4 text-red-500 text-sm">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>- {{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Login Form -->
        <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Email -->
            <div class="mb-4">
                <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                <input
                    id="email"
                    name="email"
                    type="email"
                    class="light-input w-full rounded-md mt-1
                           focus:outline-none focus:ring-2 focus:ring-blue-400"
                    placeholder="Enter your email"
                    value="{{ old('email') }}"
                    required
                />
            </div>

            <!-- Password -->
            <div class="mb-6">
                <label for="password" class="block text-sm font-medium text-gray-700 mb-1">Password</label>
                <input
                    id="password"
                    name="password"
                    type="password"
                    class="light-input w-full rounded-md mt-1
                           focus:outline-none focus:ring-2 focus:ring-blue-400"
                    placeholder="Enter your password"
                    required
                />
            </div>

            <!-- Submit Button -->
            <div class="flex justify-center">
                <button
                    type="submit"
                    class="px-6 py-2 bg-blue-600 text-white font-semibold rounded-md
                           hover:bg-blue-700 transform transition-all duration-200 hover:scale-105
                           focus:outline-none focus:ring-2 focus:ring-blue-500"
                >
                    Log in
                </button>
            </div>
        </form>

        <!-- Already have an account -->
        <div class="text-center mt-5 text-sm text-gray-500">
            Don't have an account?
            <a href="{{ route('register') }}" class="text-blue-600 hover:underline">Sign up</a>
        </div>
    </div>
</body>
</html>
