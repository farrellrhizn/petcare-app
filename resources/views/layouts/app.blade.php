<!DOCTYPE html>
<html lang="en" class="h-full">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'PetCare+')</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&family=Lora:wght@400;500;600;700&family=IBM+Plex+Mono:wght@400;500;600&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="h-full bg-background text-foreground font-sans antialiased flex flex-col">
    <!-- Navigation -->
    <nav class="bg-primary shadow-md">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <div class="flex">
                    <a href="{{ route('dashboard') }}" class="flex items-center text-primary-foreground font-bold text-xl">
                        🐾 PetCare+
                    </a>
                    <div class="hidden sm:ml-8 sm:flex sm:space-x-1">
                        <a href="{{ route('dashboard') }}" class="inline-flex items-center px-4 py-2 text-sm font-medium rounded-lg transition-colors {{ request()->routeIs('dashboard') ? 'bg-primary-foreground/10 text-primary-foreground' : 'text-primary-foreground/80 hover:bg-primary-foreground/10 hover:text-primary-foreground' }}">
                            Dashboard
                        </a>
                        <a href="{{ route('owners.index') }}" class="inline-flex items-center px-4 py-2 text-sm font-medium rounded-lg transition-colors {{ request()->routeIs('owners.*') ? 'bg-primary-foreground/10 text-primary-foreground' : 'text-primary-foreground/80 hover:bg-primary-foreground/10 hover:text-primary-foreground' }}">
                            Owners
                        </a>
                        <a href="{{ route('pets.index') }}" class="inline-flex items-center px-4 py-2 text-sm font-medium rounded-lg transition-colors {{ request()->routeIs('pets.*') ? 'bg-primary-foreground/10 text-primary-foreground' : 'text-primary-foreground/80 hover:bg-primary-foreground/10 hover:text-primary-foreground' }}">
                            Pets
                        </a>
                        <a href="{{ route('treatments.index') }}" class="inline-flex items-center px-4 py-2 text-sm font-medium rounded-lg transition-colors {{ request()->routeIs('treatments.*') ? 'bg-primary-foreground/10 text-primary-foreground' : 'text-primary-foreground/80 hover:bg-primary-foreground/10 hover:text-primary-foreground' }}">
                            Treatments
                        </a>
                        <a href="{{ route('checkups.index') }}" class="inline-flex items-center px-4 py-2 text-sm font-medium rounded-lg transition-colors {{ request()->routeIs('checkups.*') ? 'bg-primary-foreground/10 text-primary-foreground' : 'text-primary-foreground/80 hover:bg-primary-foreground/10 hover:text-primary-foreground' }}">
                            Checkups
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="flex-1 py-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            @if(session('success'))
                <div class="mb-6 p-4 bg-chart-1/10 border border-chart-1/20 text-chart-1 rounded-lg shadow-sm">
                    <div class="flex items-center">
                        <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                        </svg>
                        <span class="font-medium">{{ session('success') }}</span>
                    </div>
                </div>
            @endif

            @if(session('error'))
                <div class="mb-6 p-4 bg-destructive/10 border border-destructive/20 text-destructive rounded-lg shadow-sm">
                    <div class="flex items-center">
                        <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"/>
                        </svg>
                        <span class="font-medium">{{ session('error') }}</span>
                    </div>
                </div>
            @endif

            @yield('content')
        </div>
    </main>

    <!-- Footer -->
    <footer class="bg-card border-t border-border mt-auto py-6">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <p class="text-muted-foreground text-sm">&copy; 2025 Ell-PetCare+. All rights reserved.</p>
        </div>
    </footer>
</body>
</html>
