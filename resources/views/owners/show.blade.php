@extends('layouts.app')

@section('title', 'Owner Details - PetCare+')

@section('content')
<div class="mb-6 flex justify-between items-center">
    <h1 class="text-3xl font-bold text-foreground">Owner Details</h1>
    <div class="flex gap-3">
        <a href="{{ route('owners.edit', $owner) }}" class="inline-flex items-center px-5 py-2.5 bg-primary text-primary-foreground rounded-lg hover:bg-primary/90 transition-colors shadow-sm font-medium">Edit</a>
        <a href="{{ route('owners.index') }}" class="inline-flex items-center px-5 py-2.5 bg-secondary text-secondary-foreground rounded-lg hover:bg-secondary/80 transition-colors font-medium">Back to List</a>
    </div>
</div>

<div class="bg-card border border-border rounded-xl shadow-sm overflow-hidden mb-6">
    <div class="border-b border-border px-6 py-4">
        <h2 class="text-xl font-semibold text-foreground">Owner Information</h2>
    </div>
    <div class="p-6">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <dl class="space-y-4">
                    <div>
                        <dt class="text-sm font-medium text-muted-foreground">ID:</dt>
                        <dd class="mt-1 text-base text-foreground">{{ $owner->id }}</dd>
                    </div>
                    
                    <div>
                        <dt class="text-sm font-medium text-muted-foreground">Name:</dt>
                        <dd class="mt-1 text-base text-foreground">{{ $owner->name }}</dd>
                    </div>
                    
                    <div>
                        <dt class="text-sm font-medium text-muted-foreground">Phone:</dt>
                        <dd class="mt-1 text-base text-foreground">{{ $owner->phone }}</dd>
                    </div>
                    
                    <div>
                        <dt class="text-sm font-medium text-muted-foreground">Phone Status:</dt>
                        <dd class="mt-1">
                            @if($owner->phone_verified)
                                <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-chart-2/10 text-chart-2 border border-chart-2/20">Verified</span>
                            @else
                                <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-muted text-muted-foreground border border-border">Not Verified</span>
                            @endif
                        </dd>
                    </div>
                </dl>
            </div>
            <div>
                <dl class="space-y-4">
                    <div>
                        <dt class="text-sm font-medium text-muted-foreground">Email:</dt>
                        <dd class="mt-1 text-base text-foreground">{{ $owner->email ?? '-' }}</dd>
                    </div>
                    
                    <div>
                        <dt class="text-sm font-medium text-muted-foreground">Address:</dt>
                        <dd class="mt-1 text-base text-foreground">{{ $owner->address ?? '-' }}</dd>
                    </div>
                    
                    <div>
                        <dt class="text-sm font-medium text-muted-foreground">Registered:</dt>
                        <dd class="mt-1 text-base text-foreground">{{ $owner->created_at->format('d/m/Y H:i') }}</dd>
                    </div>
                </dl>
            </div>
        </div>
    </div>
</div>

<div class="bg-card border border-border rounded-xl shadow-sm overflow-hidden">
    <div class="border-b border-border px-6 py-4">
        <h2 class="text-xl font-semibold text-foreground">Pets ({{ $owner->pets->count() }})</h2>
    </div>
    <div class="p-6">
        @if($owner->pets->count() > 0)
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-border">
                    <thead>
                        <tr class="bg-muted/50">
                            <th class="px-6 py-3 text-left text-xs font-semibold text-muted-foreground uppercase tracking-wider">Registration Code</th>
                            <th class="px-6 py-3 text-left text-xs font-semibold text-muted-foreground uppercase tracking-wider">Name</th>
                            <th class="px-6 py-3 text-left text-xs font-semibold text-muted-foreground uppercase tracking-wider">Species</th>
                            <th class="px-6 py-3 text-left text-xs font-semibold text-muted-foreground uppercase tracking-wider">Age</th>
                            <th class="px-6 py-3 text-left text-xs font-semibold text-muted-foreground uppercase tracking-wider">Weight</th>
                            <th class="px-6 py-3 text-left text-xs font-semibold text-muted-foreground uppercase tracking-wider">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-border">
                        @foreach($owner->pets as $pet)
                        <tr class="hover:bg-muted/50 transition-colors">
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-mono text-primary">{{ $pet->registration_code }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-foreground">{{ $pet->name }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-foreground">{{ $pet->species }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-foreground">{{ $pet->age }} years</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-foreground">{{ $pet->weight }} kg</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm">
                                <a href="{{ route('pets.show', $pet) }}" class="text-primary hover:text-primary/80 font-medium transition-colors">View</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @else
            <p class="text-muted-foreground mb-0">No pets registered yet.</p>
        @endif
    </div>
</div>
@endsection
