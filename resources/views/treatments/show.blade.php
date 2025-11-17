@extends('layouts.app')

@section('title', 'Treatment Details - PetCare+')

@section('content')
<div class="mb-6 flex justify-between items-center">
    <h1 class="text-3xl font-bold text-foreground">Treatment Details</h1>
    <div class="flex gap-3">
        <a href="{{ route('treatments.edit', $treatment) }}" class="inline-flex items-center px-5 py-2.5 bg-primary text-primary-foreground rounded-lg hover:bg-primary/90 transition-colors shadow-sm font-medium">Edit</a>
        <a href="{{ route('treatments.index') }}" class="inline-flex items-center px-5 py-2.5 bg-secondary text-secondary-foreground rounded-lg hover:bg-secondary/80 transition-colors font-medium">Back to List</a>
    </div>
</div>

<div class="bg-card border border-border rounded-xl shadow-sm overflow-hidden">
    <div class="border-b border-border px-6 py-4">
        <h2 class="text-xl font-semibold text-foreground">Treatment Information</h2>
    </div>
    <div class="p-6">
        <dl class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <div>
                <dt class="text-sm font-medium text-muted-foreground">ID:</dt>
                <dd class="mt-1 text-base text-foreground">{{ $treatment->id }}</dd>
            </div>
            
            <div>
                <dt class="text-sm font-medium text-muted-foreground">Name:</dt>
                <dd class="mt-1 text-base font-medium text-foreground">{{ $treatment->name }}</dd>
            </div>
            
            <div>
                <dt class="text-sm font-medium text-muted-foreground">Price:</dt>
                <dd class="mt-1 text-base font-semibold text-chart-2">Rp {{ number_format($treatment->price, 0, ',', '.') }}</dd>
            </div>
            
            <div class="md:col-span-2">
                <dt class="text-sm font-medium text-muted-foreground">Description:</dt>
                <dd class="mt-1 text-base text-foreground">{{ $treatment->description ?? '-' }}</dd>
            </div>
            
            <div>
                <dt class="text-sm font-medium text-muted-foreground">Created:</dt>
                <dd class="mt-1 text-base text-foreground">{{ $treatment->created_at->format('d/m/Y H:i') }}</dd>
            </div>
        </dl>
    </div>
</div>
@endsection
