@extends('layouts.app')

@section('title', 'Edit Pet - PetCare+')

@section('content')
<div class="mb-6">
    <h1 class="text-3xl font-bold text-foreground">Edit Pet</h1>
</div>

<div class="bg-card border border-border rounded-xl shadow-sm overflow-hidden">
    <div class="p-6">
        <form action="{{ route('pets.update', $pet) }}" method="POST">
            @csrf
            @method('PUT')
            
            <div class="mb-6">
                <label class="block text-sm font-medium text-foreground mb-2">Registration Code</label>
                <input type="text" class="w-full px-4 py-2.5 bg-muted border border-border rounded-lg text-muted-foreground cursor-not-allowed" value="{{ $pet->registration_code }}" disabled>
                <p class="mt-1 text-sm text-muted-foreground">Registration code cannot be changed</p>
            </div>

            <div class="mb-6">
                <label for="owner_id" class="block text-sm font-medium text-foreground mb-2">Owner <span class="text-destructive">*</span></label>
                <select class="w-full px-4 py-2.5 bg-input border rounded-lg focus:ring-2 focus:ring-primary focus:outline-none transition-all @error('owner_id') !border-destructive @enderror" 
                        id="owner_id" name="owner_id" required>
                    <option value="">Select Owner</option>
                    @foreach($owners as $owner)
                        <option value="{{ $owner->id }}" 
                                {{ old('owner_id', $pet->owner_id) == $owner->id ? 'selected' : '' }}>
                            {{ $owner->name }} ({{ $owner->phone }})
                        </option>
                    @endforeach
                </select>
                @error('owner_id')
                    <p class="mt-1 text-sm text-destructive">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="name" class="block text-sm font-medium text-foreground mb-2">Pet Name <span class="text-destructive">*</span></label>
                <input type="text" class="w-full px-4 py-2.5 bg-input border rounded-lg focus:ring-2 focus:ring-primary focus:outline-none transition-all @error('name') !border-destructive @enderror" 
                       id="name" name="name" value="{{ old('name', $pet->name) }}" 
                       placeholder="e.g. Milo, Buddy, Luna" required>
                @error('name')
                    <p class="mt-1 text-sm text-destructive">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="species" class="block text-sm font-medium text-foreground mb-2">Species <span class="text-destructive">*</span></label>
                <input type="text" class="w-full px-4 py-2.5 bg-input border rounded-lg focus:ring-2 focus:ring-primary focus:outline-none transition-all @error('species') !border-destructive @enderror" 
                       id="species" name="species" value="{{ old('species', $pet->species) }}" 
                       placeholder="e.g. Kucing, Anjing, Kelinci" required>
                @error('species')
                    <p class="mt-1 text-sm text-destructive">{{ $message }}</p>
                @enderror
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                <div>
                    <label for="age" class="block text-sm font-medium text-foreground mb-2">Age (years) <span class="text-destructive">*</span></label>
                    <input type="number" step="0.1" class="w-full px-4 py-2.5 bg-input border rounded-lg focus:ring-2 focus:ring-primary focus:outline-none transition-all @error('age') !border-destructive @enderror" 
                           id="age" name="age" value="{{ old('age', $pet->age) }}" 
                           placeholder="e.g. 2" min="0" required>
                    @error('age')
                        <p class="mt-1 text-sm text-destructive">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="weight" class="block text-sm font-medium text-foreground mb-2">Weight (kg) <span class="text-destructive">*</span></label>
                    <input type="number" step="0.1" class="w-full px-4 py-2.5 bg-input border rounded-lg focus:ring-2 focus:ring-primary focus:outline-none transition-all @error('weight') !border-destructive @enderror" 
                           id="weight" name="weight" value="{{ old('weight', $pet->weight) }}" 
                           placeholder="e.g. 4.5" min="0" required>
                    @error('weight')
                        <p class="mt-1 text-sm text-destructive">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div class="flex gap-3">
                <button type="submit" class="inline-flex items-center px-6 py-2.5 bg-primary text-primary-foreground rounded-lg hover:bg-primary/90 transition-colors shadow-sm font-medium">Update Pet</button>
                <a href="{{ route('pets.index') }}" class="inline-flex items-center px-6 py-2.5 bg-secondary text-secondary-foreground rounded-lg hover:bg-secondary/80 transition-colors font-medium">Cancel</a>
            </div>
        </form>
    </div>
</div>
@endsection
