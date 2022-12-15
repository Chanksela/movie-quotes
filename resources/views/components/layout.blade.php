<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Movie Quotes</title>
    <script defer src="https://unpkg.com/alpinejs@3.10.3/dist/cdn.min.js"></script>
    @vite ('resources/css/app.css')
</head>

<body class="text-stone-100 bg-gradient-radial h-auto w-auto">
    <div class="flex flex-col h-full">
        <div class="fixed w-full">
            <x-header />
        </div>
        <x-aside />
        <div class="flex justify-center grow ">

            {{ $slot }}
        </div>

    </div>
    @if (session()->has('success'))
        <div x-data="{ show: true }" x-init="setTimeout(() => show = false, 4000)" x-show="show"
            class="fixed bottom-0 right-0 bg-white text-stone-500 p-2 rounded m-2">
            <p>{{ session('success') }}</p>
        </div>
    @endif
</body>
