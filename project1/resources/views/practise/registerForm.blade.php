<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <title>register-form</title>
</head>
<body class="min-h-screen bg-linear-to-br from-slate-900 via-slate-800 to-slate-900 flex items-center justify-center px-4 font-sans">

    <div class="w-full max-w-md bg-white/5 backdrop-blur-sm border border-white/10 rounded-2xl shadow-2xl px-8 py-6">
        <h1 class="text-2xl font-bold text-white text-center mb-5 tracking-tight">Create Account</h1>

        @if (session('success'))
            <div class="mb-4 bg-emerald-500/10 border border-emerald-500/30 rounded-lg px-4 py-3">
                <p class="text-emerald-300 text-sm">{{ session('success') }}</p>
            </div>
        @endif

        {{-- Global Error Summary (shows if any errors exist) --}}
        @if($errors->any())
            <div class="mb-4 bg-red-500/10 border border-red-500/30 rounded-lg px-4 py-3">
                <p class="text-red-400 text-xs font-semibold mb-1">⚠ Please fix the following errors:</p>
                <ul class="list-disc list-inside space-y-0.5">
                    @foreach($errors->all() as $error)
                        <li class="text-red-300 text-xs">{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="/submit-register-form" method="POST" class="space-y-3">
            @csrf

            {{-- Name --}}
            <div class="flex flex-col gap-1">
                <label for="name" class="text-xs font-medium text-slate-300">Name:</label>
                <input type="text" id="name" name="name" value="{{ old('name') }}" placeholder="Enter Name"
                    class="w-full px-3 py-2 rounded-lg bg-white/10 border text-white text-sm placeholder:text-slate-500 focus:outline-none focus:ring-2 focus:border-transparent transition
                    {{ $errors->has('name') ? 'border-red-500 focus:ring-red-500' : 'border-white/15 focus:ring-indigo-500' }}">
                @error('name')
                    <p class="text-red-400 text-xs flex items-center gap-1">
                        <span>&#x2715;</span> {{ $message }}
                    </p>
                @enderror
            </div>

            {{-- Age --}}
            <div class="flex flex-col gap-1">
                <label for="age" class="text-xs font-medium text-slate-300">Age:</label>
                <input type="number" id="age" name="age" value="{{ old('age') }}" placeholder="Enter Age"
                    class="w-full px-3 py-2 rounded-lg bg-white/10 border text-white text-sm placeholder:text-slate-500 focus:outline-none focus:ring-2 focus:border-transparent transition
                    {{ $errors->has('age') ? 'border-red-500 focus:ring-red-500' : 'border-white/15 focus:ring-indigo-500' }}">
                @error('age')
                    <p class="text-red-400 text-xs flex items-center gap-1">
                        <span>&#x2715;</span> {{ $message }}
                    </p>
                @enderror
            </div>

            {{-- Course --}}
            <div class="flex flex-col gap-1">
                <label for="course" class="text-xs font-medium text-slate-300">Course:</label>
                <input type="text" id="course" name="course" value="{{ old('course') }}" placeholder="Enter Course"
                    class="w-full px-3 py-2 rounded-lg bg-white/10 border text-white text-sm placeholder:text-slate-500 focus:outline-none focus:ring-2 focus:border-transparent transition
                    {{ $errors->has('course') ? 'border-red-500 focus:ring-red-500' : 'border-white/15 focus:ring-indigo-500' }}">
                @error('course')
                    <p class="text-red-400 text-xs flex items-center gap-1">
                        <span>&#x2715;</span> {{ $message }}
                    </p>
                @enderror
            </div>

            {{-- Email --}}
            <div class="flex flex-col gap-1">
                <label for="email" class="text-xs font-medium text-slate-300">Email:</label>
                <input type="email" id="email" name="email" value="{{ old('email') }}" placeholder="Enter Email"
                    class="w-full px-3 py-2 rounded-lg bg-white/10 border text-white text-sm placeholder:text-slate-500 focus:outline-none focus:ring-2 focus:border-transparent transition
                    {{ $errors->has('email') ? 'border-red-500 focus:ring-red-500' : 'border-white/15 focus:ring-indigo-500' }}">
                @error('email')
                    <p class="text-red-400 text-xs flex items-center gap-1">
                        <span>&#x2715;</span> {{ $message }}
                    </p>
                @enderror
            </div>

            {{-- Password --}}
            <div class="flex flex-col gap-1">
                <label for="password" class="text-xs font-medium text-slate-300">Password:</label>
                <input type="password" id="password" name="password" placeholder="Enter Password"
                    class="w-full px-3 py-2 rounded-lg bg-white/10 border text-white text-sm placeholder:text-slate-500 focus:outline-none focus:ring-2 focus:border-transparent transition
                    {{ $errors->has('password') ? 'border-red-500 focus:ring-red-500' : 'border-white/15 focus:ring-indigo-500' }}">
                @error('password')
                    <p class="text-red-400 text-xs flex items-center gap-1">
                        <span>&#x2715;</span> {{ $message }}
                    </p>
                @enderror
            </div>

            <div class="pt-1">
                <button type="submit"
                    class="w-full py-2.5 px-6 bg-indigo-600 hover:bg-indigo-500 active:bg-indigo-700 text-white text-sm font-semibold rounded-lg transition-colors duration-200 shadow-lg shadow-indigo-500/25 cursor-pointer">
                    Register
                </button>
            </div>

        </form>
    </div>
</body>
</html>
