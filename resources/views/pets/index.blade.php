@extends('layouts.app')

@section('title', 'Pets - PetCare+')

@section('content')
<div class="mb-6 flex justify-between items-center">
    <h1 class="text-3xl font-bold text-foreground">Pets</h1>
    <a href="{{ route('pets.create') }}" class="inline-flex items-center px-5 py-2.5 bg-primary text-primary-foreground rounded-lg hover:bg-primary/90 transition-colors shadow-sm font-medium">
        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
        </svg>
        Add New Pet
    </a>
</div>

<div class="bg-card border border-border rounded-xl shadow-sm overflow-hidden">
    <div class="overflow-x-auto">
        <table class="min-w-full divide-y divide-border">
            <thead>
                <tr class="bg-muted/50">
                    <th class="px-6 py-3 text-left text-xs font-semibold text-muted-foreground uppercase tracking-wider">Registration Code</th>
                    <th class="px-6 py-3 text-left text-xs font-semibold text-muted-foreground uppercase tracking-wider">Name</th>
                    <th class="px-6 py-3 text-left text-xs font-semibold text-muted-foreground uppercase tracking-wider">Species</th>
                    <th class="px-6 py-3 text-left text-xs font-semibold text-muted-foreground uppercase tracking-wider">Age</th>
                    <th class="px-6 py-3 text-left text-xs font-semibold text-muted-foreground uppercase tracking-wider">Weight</th>
                    <th class="px-6 py-3 text-left text-xs font-semibold text-muted-foreground uppercase tracking-wider">Owner</th>
                    <th class="px-6 py-3 text-left text-xs font-semibold text-muted-foreground uppercase tracking-wider">Actions</th>
                </tr>
            </thead>
            <tbody class="bg-card divide-y divide-border">
                @foreach($pets as $pet)
                <tr class="hover:bg-muted/50 transition-colors">
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-mono text-primary">{{ $pet->registration_code }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-foreground">{{ $pet->name }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-foreground">{{ $pet->species }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-foreground">{{ $pet->age }} years</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-foreground">{{ $pet->weight }} kg</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-foreground">{{ $pet->owner->name }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm">
                        <div class="flex gap-2">
                            <a href="{{ route('pets.show', $pet) }}" class="inline-flex items-center px-3 py-1.5 bg-chart-4 text-white rounded-lg hover:bg-chart-4/90 transition-colors text-xs font-medium">View</a>
                            <a href="{{ route('pets.edit', $pet) }}" class="inline-flex items-center px-3 py-1.5 bg-chart-3 text-white rounded-lg hover:bg-chart-3/90 transition-colors text-xs font-medium">Edit</a>
                            <form action="{{ route('pets.destroy', $pet) }}" method="POST" class="inline" onsubmit="return confirm('Are you sure?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="inline-flex items-center px-3 py-1.5 bg-destructive text-destructive-foreground rounded-lg hover:bg-destructive/90 transition-colors text-xs font-medium">Delete</button>
                            </form>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    
    @if($pets->hasPages())
    <div class="px-6 py-4 border-t border-border bg-card">
        {{ $pets->links() }}
    </div>
    @endif
</div>
@endsection
