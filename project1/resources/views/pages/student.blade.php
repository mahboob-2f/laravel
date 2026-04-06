<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Details</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="min-h-screen bg-slate-100 text-slate-900">
    <div class="mx-auto flex min-h-screen max-w-3xl items-center justify-center px-4 py-10">
        <div class="w-full rounded-3xl bg-white p-8 shadow-lg shadow-slate-200">
            <div class="flex flex-col gap-3 border-b border-slate-200 pb-6 sm:flex-row sm:items-end sm:justify-between">
                <div>
                    <p class="text-sm font-semibold uppercase tracking-[0.2em] text-emerald-600">Student Record</p>
                    <h1 class="mt-2 text-3xl font-bold">Student details</h1>
                </div>
                <a
                    href="/fetch-data"
                    class="inline-flex rounded-xl border border-slate-200 px-4 py-2 text-sm font-medium text-slate-700 transition hover:bg-slate-50"
                >
                    Back
                </a>
            </div>

            <div class="mt-6 grid gap-4 sm:grid-cols-2">
                <div class="rounded-2xl bg-slate-50 p-5">
                    <p class="text-sm text-slate-500">ID</p>
                    <p class="mt-2 text-xl font-semibold">{{ $fetched['id'] }}</p>
                </div>
                <div class="rounded-2xl bg-slate-50 p-5">
                    <p class="text-sm text-slate-500">Name</p>
                    <p class="mt-2 text-xl font-semibold">{{ $fetched['name'] }}</p>
                </div>
                <div class="rounded-2xl bg-slate-50 p-5">
                    <p class="text-sm text-slate-500">Course</p>
                    <p class="mt-2 text-xl font-semibold">{{ $fetched['course'] }}</p>
                </div>
                <div class="rounded-2xl bg-slate-50 p-5">
                    <p class="text-sm text-slate-500">City</p>
                    <p class="mt-2 text-xl font-semibold">{{ ucfirst($fetched['city']) }}</p>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
