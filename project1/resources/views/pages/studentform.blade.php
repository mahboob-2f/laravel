<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fetch Student Data</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="min-h-screen bg-slate-100 text-slate-900">
    <div class="flex min-h-screen items-center justify-center px-4">
        <div class="w-full max-w-md rounded-2xl bg-white p-8 shadow-lg shadow-slate-200">
            <p class="text-sm font-semibold uppercase tracking-[0.2em] text-sky-600">Student Lookup</p>
            <h1 class="mt-3 text-3xl font-bold">Fetch student data</h1>
            <p class="mt-2 text-sm text-slate-500">Enter a student ID from the sample array to view the record.</p>

            @if (session('error'))
                <div class="mt-6 rounded-xl border border-red-200 bg-red-50 px-4 py-3 text-sm font-medium text-red-600">
                    {{ session('error') }}
                </div>
            @endif

            @error('id')
                <div class="mt-6 rounded-xl border border-amber-200 bg-amber-50 px-4 py-3 text-sm font-medium text-amber-700">
                    {{ $message }}
                </div>
            @enderror

            <form action="/submit-data" method="POST" class="mt-6 space-y-5">
                @csrf
                <div>
                    <label for="id" class="mb-2 block text-sm font-medium text-slate-700">Student ID</label>
                    <input
                        id="id"
                        type="number"
                        name="id"
                        value="{{ old('id') }}"
                        placeholder="Enter id like 1, 2, or 3"
                        class="w-full rounded-xl border border-slate-200 bg-slate-50 px-4 py-3 outline-none transition focus:border-sky-500 focus:bg-white focus:ring-4 focus:ring-sky-100"
                    >
                </div>

                <button
                    type="submit"
                    class="w-full rounded-xl bg-sky-600 px-4 py-3 text-sm font-semibold text-white transition hover:bg-sky-700 focus:outline-none focus:ring-4 focus:ring-sky-200"
                >
                    Submit
                </button>
            </form>
        </div>
    </div>
</body>
</html>
