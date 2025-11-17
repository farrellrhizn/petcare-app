@extends('layouts.app')

@section('title', 'Checkup Details - PetCare+')

@section('content')
<div class="mb-6 flex justify-between items-center">
    <h1 class="text-3xl font-bold text-foreground">Checkup Details</h1>
    <div class="flex gap-3">
        <a href="{{ route('checkups.edit', $checkup) }}" class="inline-flex items-center px-5 py-2.5 bg-primary text-primary-foreground rounded-lg hover:bg-primary/90 transition-colors shadow-sm font-medium">Edit</a>
        <a href="{{ route('checkups.index') }}" class="inline-flex items-center px-5 py-2.5 bg-secondary text-secondary-foreground rounded-lg hover:bg-secondary/80 transition-colors font-medium">Back to List</a>
    </div>
</div>

<div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-6">
    <div class="bg-card border border-border rounded-xl shadow-sm overflow-hidden">
        <div class="border-b border-border px-6 py-4">
            <h2 class="text-xl font-semibold text-foreground">Checkup Information</h2>
        </div>
        <div class="p-6">
            <dl class="space-y-4">
                <div>
                    <dt class="text-sm font-medium text-muted-foreground">ID:</dt>
                    <dd class="mt-1 text-base text-foreground">{{ $checkup->id }}</dd>
                </div>
                
                <div>
                    <dt class="text-sm font-medium text-muted-foreground">Date:</dt>
                    <dd class="mt-1 text-base text-foreground">{{ $checkup->checkup_date->format('d/m/Y') }}</dd>
                </div>
                
                <div>
                    <dt class="text-sm font-medium text-muted-foreground">Treatment:</dt>
                    <dd class="mt-1 text-base font-medium text-foreground">{{ $checkup->treatment->name }}</dd>
                </div>
                
                <div>
                    <dt class="text-sm font-medium text-muted-foreground">Cost:</dt>
                    <dd class="mt-1 text-lg font-semibold text-chart-2">Rp {{ number_format($checkup->cost, 0, ',', '.') }}</dd>
                </div>
                
                <div>
                    <dt class="text-sm font-medium text-muted-foreground">Created:</dt>
                    <dd class="mt-1 text-base text-foreground">{{ $checkup->created_at->format('d/m/Y H:i') }}</dd>
                </div>
            </dl>
        </div>
    </div>

    <div class="bg-card border border-border rounded-xl shadow-sm overflow-hidden">
        <div class="border-b border-border px-6 py-4">
            <h2 class="text-xl font-semibold text-foreground">Pet & Owner Information</h2>
        </div>
        <div class="p-6">
            <dl class="space-y-4">
                <div>
                    <dt class="text-sm font-medium text-muted-foreground">Pet Name:</dt>
                    <dd class="mt-1 text-base">
                        <a href="{{ route('pets.show', $checkup->pet) }}" class="text-primary hover:text-primary/80 font-medium transition-colors">{{ $checkup->pet->name }}</a>
                    </dd>
                </div>
                
                <div>
                    <dt class="text-sm font-medium text-muted-foreground">Species:</dt>
                    <dd class="mt-1 text-base text-foreground">{{ $checkup->pet->species }}</dd>
                </div>
                
                <div>
                    <dt class="text-sm font-medium text-muted-foreground">Registration:</dt>
                    <dd class="mt-1 text-base font-mono text-primary">{{ $checkup->pet->registration_code }}</dd>
                </div>
                
                <div>
                    <dt class="text-sm font-medium text-muted-foreground">Owner:</dt>
                    <dd class="mt-1 text-base">
                        <a href="{{ route('owners.show', $checkup->pet->owner) }}" class="text-primary hover:text-primary/80 font-medium transition-colors">{{ $checkup->pet->owner->name }}</a>
                    </dd>
                </div>
                
                <div>
                    <dt class="text-sm font-medium text-muted-foreground">Owner Phone:</dt>
                    <dd class="mt-1 text-base text-foreground">{{ $checkup->pet->owner->phone }}</dd>
                </div>
            </dl>
        </div>
    </div>
</div>

<div class="bg-card border border-border rounded-xl shadow-sm overflow-hidden">
    <div class="border-b border-border px-6 py-4">
        <h2 class="text-xl font-semibold text-foreground">Medical Details</h2>
    </div>
    <div class="p-6 space-y-6">
        <div>
            <h3 class="text-base font-semibold text-foreground mb-2">Diagnosis</h3>
            <p class="text-foreground">{{ $checkup->diagnosis ?? '-' }}</p>
        </div>
        
        <div>
            <h3 class="text-base font-semibold text-foreground mb-2">Prescription</h3>
            <p class="text-foreground">{{ $checkup->prescription ?? '-' }}</p>
        </div>
        
        <div>
            <h3 class="text-base font-semibold text-foreground mb-2">Additional Notes</h3>
            <p class="text-foreground mb-0">{{ $checkup->notes ?? '-' }}</p>
        </div>
    </div>
</div>
@endsection
