@extends('layouts.app')

@section('title', 'Dashboard - PetCare+')

@section('content')
<div class="mb-8">
    <h1 class="text-3xl font-bold text-foreground">Dashboard</h1>
    <p class="text-muted-foreground mt-1">Welcome to PetCare+ Veterinary Clinic Management System</p>
</div>

<!-- Stats Grid -->
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
    <div class="bg-primary text-primary-foreground rounded-xl p-6 shadow-lg">
        <h3 class="text-sm font-medium opacity-90">Owners</h3>
        <p class="text-4xl font-bold mt-2">{{ $totalOwners }}</p>
        <p class="text-xs opacity-75 mt-1">Total Registered</p>
    </div>
    
    <div class="bg-chart-1 text-white rounded-xl p-6 shadow-lg">
        <h3 class="text-sm font-medium opacity-90">Pets</h3>
        <p class="text-4xl font-bold mt-2">{{ $totalPets }}</p>
        <p class="text-xs opacity-75 mt-1">Total Registered</p>
    </div>
    
    <div class="bg-chart-3 text-white rounded-xl p-6 shadow-lg">
        <h3 class="text-sm font-medium opacity-90">Checkups</h3>
        <p class="text-4xl font-bold mt-2">{{ $totalCheckups }}</p>
        <p class="text-xs opacity-75 mt-1">Total Performed</p>
    </div>
    
    <div class="bg-chart-4 text-white rounded-xl p-6 shadow-lg">
        <h3 class="text-sm font-medium opacity-90">Treatments</h3>
        <p class="text-4xl font-bold mt-2">{{ $totalTreatments }}</p>
        <p class="text-xs opacity-75 mt-1">Available Services</p>
    </div>
</div>

<!-- Recent Data -->
<div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
    <!-- Recent Pets -->
    <div class="bg-card border border-border rounded-xl shadow-sm overflow-hidden">
        <div class="px-6 py-4 border-b border-border">
            <h2 class="text-lg font-semibold text-card-foreground">Recent Pets</h2>
        </div>
        <div class="p-6">
            @if($recentPets->count() > 0)
                <div class="overflow-x-auto">
                    <table class="w-full">
                        <thead>
                            <tr class="border-b border-border">
                                <th class="text-left py-3 px-4 text-sm font-medium text-muted-foreground">Code</th>
                                <th class="text-left py-3 px-4 text-sm font-medium text-muted-foreground">Name</th>
                                <th class="text-left py-3 px-4 text-sm font-medium text-muted-foreground">Owner</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-border">
                            @foreach($recentPets as $pet)
                            <tr class="hover:bg-muted/50 transition-colors">
                                <td class="py-3 px-4"><code class="text-xs bg-muted px-2 py-1 rounded">{{ $pet->registration_code }}</code></td>
                                <td class="py-3 px-4 text-sm font-medium">{{ $pet->name }}</td>
                                <td class="py-3 px-4 text-sm text-muted-foreground">{{ $pet->owner->name }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                <p class="text-muted-foreground text-sm">No pets registered yet.</p>
            @endif
        </div>
    </div>

    <!-- Recent Checkups -->
    <div class="bg-card border border-border rounded-xl shadow-sm overflow-hidden">
        <div class="px-6 py-4 border-b border-border">
            <h2 class="text-lg font-semibold text-card-foreground">Recent Checkups</h2>
        </div>
        <div class="p-6">
            @if($recentCheckups->count() > 0)
                <div class="overflow-x-auto">
                    <table class="w-full">
                        <thead>
                            <tr class="border-b border-border">
                                <th class="text-left py-3 px-4 text-sm font-medium text-muted-foreground">Date</th>
                                <th class="text-left py-3 px-4 text-sm font-medium text-muted-foreground">Pet</th>
                                <th class="text-left py-3 px-4 text-sm font-medium text-muted-foreground">Treatment</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-border">
                            @foreach($recentCheckups as $checkup)
                            <tr class="hover:bg-muted/50 transition-colors">
                                <td class="py-3 px-4 text-sm">{{ $checkup->checkup_date->format('d/m/Y') }}</td>
                                <td class="py-3 px-4 text-sm font-medium">{{ $checkup->pet->name }}</td>
                                <td class="py-3 px-4 text-sm text-muted-foreground">{{ $checkup->treatment->name }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                <p class="text-muted-foreground text-sm">No checkups recorded yet.</p>
            @endif
        </div>
    </div>
</div>
@endsection
