<!-- resources/views/auth/register.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>User Registration</title>
    <!-- Tailwind CSS (CDN) -->
    <link
      href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css"
      rel="stylesheet"
    />
    <style>
        /* Body with light-gray background */
        body {
            background-color:rgb(170, 176, 187); /* Soft gray */
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        /* Registration Card */
        .register-card {
            background-color: #ffffff; /* White card */
            max-width: 400px;
            width: 100%;
            padding: 2rem;
            border-radius: 0.5rem;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1); /* Soft shadow */
        }
        /* Input field styles (light mode) */
        .light-input {
            background-color: #ffffff;
            border: 1px solid #cbd5e1;  /* Light border */
            color: #1f2937;            /* Dark text */
            padding: 10px;
        }
        .light-input::placeholder {
            color: #9ca3af; /* Subtle placeholder */
        }
    </style>
</head>
<body>
    <div class="register-card">
        <!-- Logo -->
        <div class="flex justify-center mb-5">
            {{-- Replace with your actual logo path --}}
            <img src="{{ asset('images/logofinal.png') }}" alt="App Logo" class="h-14 w-14">
        </div>

        <!-- Title -->
        <h1 class="text-2xl font-bold text-center text-gray-800 mb-6">REGISTER</h1>

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

        <!-- Registration Form -->
        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Name -->
            <div class="mb-4">
                <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Name</label>
                <input
                    id="name"
                    name="name"
                    type="text"
                    value="{{ old('name') }}"
                    required
                    class="light-input mt-1 block w-full rounded-md
                           focus:outline-none focus:ring-2 focus:ring-blue-400
                           placeholder-gray-400"
                    placeholder="Enter your name"
                />
            </div>

            <!-- Email -->
            <div class="mb-4">
                <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                <input
                    id="email"
                    name="email"
                    type="email"
                    value="{{ old('email') }}"
                    required
                    class="light-input mt-1 block w-full rounded-md
                           focus:outline-none focus:ring-2 focus:ring-blue-400
                           placeholder-gray-400"
                    placeholder="Enter your email"
                />
            </div>

            <!-- Password -->
            <div class="mb-4">
                <label for="password" class="block text-sm font-medium text-gray-700 mb-1">Password</label>
                <input
                    id="password"
                    name="password"
                    type="password"
                    required
                    class="light-input mt-1 block w-full rounded-md
                           focus:outline-none focus:ring-2 focus:ring-blue-400
                           placeholder-gray-400"
                    placeholder="Enter your password"
                />
            </div>

            <!-- Confirm Password -->
            <div class="mb-6">
                <label for="password_confirmation" class="block text-sm font-medium text-gray-700 mb-1">Confirm Password</label>
                <input
                    id="password_confirmation"
                    name="password_confirmation"
                    type="password"
                    required
                    class="light-input mt-1 block w-full rounded-md
                           focus:outline-none focus:ring-2 focus:ring-blue-400
                           placeholder-gray-400"
                    placeholder="Re-enter your password"
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
                    Create Account
                </button>
            </div>
        </form>

        <!-- Already Registered -->
        <div class="text-center mt-5 text-sm text-gray-500">
            Already have an account?
            <a href="{{ route('login') }}" class="text-blue-600 hover:underline">Login</a>
        </div>
    </div>
</body>
</html>
