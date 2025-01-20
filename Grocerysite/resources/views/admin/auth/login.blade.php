<div class="max-w-md mx-auto bg-white shadow-lg rounded-lg p-8 mt-10">
    <h1 class="text-2xl font-semibold mb-6 text-center">Admin Login</h1>

    @if ($errors->any())
        <div class="mb-4 text-red-600">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('admin.login') }}">
        @csrf

        <div class="mb-4">
            <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
            <input id="email" name="email" type="email" required
                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
        </div>

        <div class="mb-4">
            <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
            <input id="password" name="password" type="password" required
                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
        </div>

        <div class="flex justify-end mt-4">
            <button type="submit"
                class="bg-blue-600 text-white px-6 py-3 rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2"
                style="background-color: #2563eb; color: white; padding: 12px 24px; border-radius: 8px;">
                Login
            </button>
        </div>
    </form>
</div>
