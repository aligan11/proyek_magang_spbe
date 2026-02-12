<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <title>Document</title>
</head>

<body>


</body>

</html>
<style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');
</style>

<div class="min-h-screen bg-gradient-to-br from-blue-600 to-blue-800 flex items-center justify-center p-4">
    <div class="bg-white rounded-lg shadow-2xl w-full max-w-md p-8">
        <!-- Header -->
        <div class="text-center mb-8">
            <h1 class="text-3xl font-bold text-gray-800">KOMINFO</h1>
            <p class="text-gray-600 mt-2">Portal Login</p>
        </div>

        <!-- Form -->
        <form method="POST" action="{{ route('login.post') }}" class="space-y-5">
            @csrf

            <!-- Email Input -->
            <div>
                <label for="email" class="block text-sm font-medium text-gray-700 mb-2">Email</label>
                <input type="email" id="email" name="email" value="{{ old('email') }}"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-600 @error('email') border-red-500 @enderror"
                    placeholder="Masukkan email Anda" required>
                @error('email')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Password Input -->
            <div>
                <label for="password" class="block text-sm font-medium text-gray-700 mb-2">Password</label>
                <input type="password" id="password" name="password"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-600 @error('password') border-red-500 @enderror"
                    placeholder="Masukkan password Anda" required>
                @error('password')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Remember Me -->
            <div class="flex items-center">
                <input type="checkbox" id="remember" name="remember"
                    class="w-4 h-4 text-blue-600 rounded focus:ring-2 focus:ring-blue-600">
                <label for="remember" class="ml-2 text-sm text-gray-700">Ingat saya</label>
            </div>

            <!-- Login Button -->
            <button type="submit"
                class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 rounded-lg transition duration-300 ease-in-out">
                Masuk
            </button>
        </form>

        <!-- Footer Links -->
        <div class="mt-6 text-center space-y-2 text-sm">
            <p class="text-gray-600">
                Belum punya akun?
                <a href="#" class="text-blue-600 hover:underline font-medium">Daftar di sini</a>
            </p>
            <a href="#" class="text-blue-600 hover:underline block">Lupa password?</a>
        </div>
    </div>
</div>
