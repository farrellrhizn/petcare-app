@extends('layouts.app')

@section('title', 'Edit Treatment - PetCare+')

@section('content')
<div class="mb-6">
    <h1 class="text-3xl font-bold text-foreground">Edit Treatment</h1>
</div>

<div class="bg-card border border-border rounded-xl shadow-sm overflow-hidden">
    <div class="p-6">
        <form action="{{ route('treatments.update', $treatment) }}" method="POST">
            @csrf
            @method('PUT')
            
            <div class="mb-6">
                <label for="name" class="block text-sm font-medium text-foreground mb-2">Treatment Name <span class="text-destructive">*</span></label>
                <input type="text" class="w-full px-4 py-2.5 bg-input border rounded-lg focus:ring-2 focus:ring-primary focus:outline-none transition-all @error('name') !border-destructive @enderror" 
                       id="name" name="name" value="{{ old('name', $treatment->name) }}" required>
                @error('name')
                    <p class="mt-1 text-sm text-destructive">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="description" class="block text-sm font-medium text-foreground mb-2">Description</label>
                <textarea class="w-full px-4 py-2.5 bg-input border rounded-lg focus:ring-2 focus:ring-primary focus:outline-none transition-all @error('description') !border-destructive @enderror" 
                          id="description" name="description" rows="3">{{ old('description', $treatment->description) }}</textarea>
                @error('description')
                    <p class="mt-1 text-sm text-destructive">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="price" class="block text-sm font-medium text-foreground mb-2">Price (Rp) <span class="text-destructive">*</span></label>
                <input type="number" step="0.01" class="w-full px-4 py-2.5 bg-input border rounded-lg focus:ring-2 focus:ring-primary focus:outline-none transition-all @error('price') !border-destructive @enderror" 
                       id="price" name="price" value="{{ old('price', $treatment->price) }}" required>
                @error('price')
                    <p class="mt-1 text-sm text-destructive">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex gap-3">
                <button type="submit" class="inline-flex items-center px-6 py-2.5 bg-primary text-primary-foreground rounded-lg hover:bg-primary/90 transition-colors shadow-sm font-medium">Update Treatment</button>
                <a href="{{ route('treatments.index') }}" class="inline-flex items-center px-6 py-2.5 bg-secondary text-secondary-foreground rounded-lg hover:bg-secondary/80 transition-colors font-medium">Cancel</a>
            </div>
        </form>
    </div>
</div>
@endsection
