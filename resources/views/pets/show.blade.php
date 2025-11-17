@extends('layouts.app')

@section('title', 'Pet Details - PetCare+')

@section('content')
<div class="mb-6 flex justify-between items-center">
    <h1 class="text-3xl font-bold text-foreground">Pet Details</h1>
    <div class="flex gap-3">
        <a href="{{ route('pets.edit', $pet) }}" class="inline-flex items-center px-5 py-2.5 bg-primary text-primary-foreground rounded-lg hover:bg-primary/90 transition-colors shadow-sm font-medium">Edit</a>
        <a href="{{ route('pets.index') }}" class="inline-flex items-center px-5 py-2.5 bg-secondary text-secondary-foreground rounded-lg hover:bg-secondary/80 transition-colors font-medium">Back to List</a>
    </div>
</div>

<div class="bg-card border border-border rounded-xl shadow-sm overflow-hidden mb-6">
    <div class="border-b border-border px-6 py-4">
        <h2 class="text-xl font-semibold text-foreground">Pet Information</h2>
    </div>
    <div class="p-6">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <dl class="space-y-4">
                    <div>
                        <dt class="text-sm font-medium text-muted-foreground">Registration Code:</dt>
                        <dd class="mt-1 text-base font-mono text-primary">{{ $pet->registration_code }}</dd>
                    </div>
                    
                    <div>
                        <dt class="text-sm font-medium text-muted-foreground">Name:</dt>
                        <dd class="mt-1 text-base text-foreground">{{ $pet->name }}</dd>
                    </div>
                    
                    <div>
                        <dt class="text-sm font-medium text-muted-foreground">Species:</dt>
                        <dd class="mt-1 text-base text-foreground">{{ $pet->species }}</dd>
                    </div>
                    
                    <div>
                        <dt class="text-sm font-medium text-muted-foreground">Age:</dt>
                        <dd class="mt-1 text-base text-foreground">{{ $pet->age }} years</dd>
                    </div>
                </dl>
            </div>
            <div>
                <dl class="space-y-4">
                    <div>
                        <dt class="text-sm font-medium text-muted-foreground">Weight:</dt>
                        <dd class="mt-1 text-base text-foreground">{{ $pet->weight }} kg</dd>
                    </div>
                    
                    <div>
                        <dt class="text-sm font-medium text-muted-foreground">Owner:</dt>
                        <dd class="mt-1 text-base">
                            <a href="{{ route('owners.show', $pet->owner) }}" class="text-primary hover:text-primary/80 font-medium transition-colors">{{ $pet->owner->name }}</a>
                        </dd>
                    </div>
                    
                    <div>
                        <dt class="text-sm font-medium text-muted-foreground">Registered:</dt>
                        <dd class="mt-1 text-base text-foreground">{{ $pet->created_at->format('d/m/Y H:i') }}</dd>
                    </div>
                </dl>
            </div>
        </div>
    </div>
</div>

<div class="bg-card border border-border rounded-xl shadow-sm overflow-hidden">
    <div class="border-b border-border px-6 py-4">
        <h2 class="text-xl font-semibold text-foreground">Checkup History ({{ $pet->checkups->count() }})</h2>
    </div>
    <div class="p-6">
        @if($pet->checkups->count() > 0)
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-border">
                    <thead>
                        <tr class="bg-muted/50">
                            <th class="px-6 py-3 text-left text-xs font-semibold text-muted-foreground uppercase tracking-wider">Date</th>
                            <th class="px-6 py-3 text-left text-xs font-semibold text-muted-foreground uppercase tracking-wider">Treatment</th>
                            <th class="px-6 py-3 text-left text-xs font-semibold text-muted-foreground uppercase tracking-wider">Diagnosis</th>
                            <th class="px-6 py-3 text-left text-xs font-semibold text-muted-foreground uppercase tracking-wider">Cost</th>
                            <th class="px-6 py-3 text-left text-xs font-semibold text-muted-foreground uppercase tracking-wider">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-border">
                        @foreach($pet->checkups as $checkup)
                        <tr class="hover:bg-muted/50 transition-colors">
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-foreground">{{ $checkup->checkup_date->format('d/m/Y') }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-foreground">{{ $checkup->treatment->name }}</td>
                            <td class="px-6 py-4 text-sm text-foreground">{{ Str::limit($checkup->diagnosis ?? '-', 50) }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-chart-2">Rp {{ number_format($checkup->cost, 0, ',', '.') }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm">
                                <a href="{{ route('checkups.show', $checkup) }}" class="text-primary hover:text-primary/80 font-medium transition-colors">View</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @else
            <p class="text-muted-foreground mb-0">No checkup history yet.</p>
        @endif
    </div>
</div>
@endsection
