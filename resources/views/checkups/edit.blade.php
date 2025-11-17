@extends('layouts.app')

@section('title', 'Edit Checkup - PetCare+')

@section('content')
<div class="mb-6">
    <h1 class="text-3xl font-bold text-foreground">Edit Checkup</h1>
</div>

<div class="bg-card border border-border rounded-xl shadow-sm overflow-hidden">
    <div class="p-6">
        <form action="{{ route('checkups.update', $checkup) }}" method="POST">
            @csrf
            @method('PUT')
            
            <div class="mb-6">
                <label for="pet_id" class="block text-sm font-medium text-foreground mb-2">Pet <span class="text-destructive">*</span></label>
                <select class="w-full px-4 py-2.5 bg-input border rounded-lg focus:ring-2 focus:ring-primary focus:outline-none transition-all @error('pet_id') !border-destructive @enderror" 
                        id="pet_id" name="pet_id" required>
                    <option value="">Select Pet</option>
                    @foreach($pets as $pet)
                        <option value="{{ $pet->id }}" 
                                {{ old('pet_id', $checkup->pet_id) == $pet->id ? 'selected' : '' }}>
                            {{ $pet->name }} ({{ $pet->species }}) - Owner: {{ $pet->owner->name }}
                        </option>
                    @endforeach
                </select>
                @error('pet_id')
                    <p class="mt-1 text-sm text-destructive">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="treatment_id" class="block text-sm font-medium text-foreground mb-2">Treatment <span class="text-destructive">*</span></label>
                <select class="w-full px-4 py-2.5 bg-input border rounded-lg focus:ring-2 focus:ring-primary focus:outline-none transition-all @error('treatment_id') !border-destructive @enderror" 
                        id="treatment_id" name="treatment_id" required>
                    <option value="">Select Treatment</option>
                    @foreach($treatments as $treatment)
                        <option value="{{ $treatment->id }}" 
                                {{ old('treatment_id', $checkup->treatment_id) == $treatment->id ? 'selected' : '' }}>
                            {{ $treatment->name }} - Rp {{ number_format($treatment->price, 0, ',', '.') }}
                        </option>
                    @endforeach
                </select>
                @error('treatment_id')
                    <p class="mt-1 text-sm text-destructive">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="checkup_date" class="block text-sm font-medium text-foreground mb-2">Checkup Date <span class="text-destructive">*</span></label>
                <input type="date" class="w-full px-4 py-2.5 bg-input border rounded-lg focus:ring-2 focus:ring-primary focus:outline-none transition-all @error('checkup_date') !border-destructive @enderror" 
                       id="checkup_date" name="checkup_date" 
                       value="{{ old('checkup_date', $checkup->checkup_date->format('Y-m-d')) }}" required>
                @error('checkup_date')
                    <p class="mt-1 text-sm text-destructive">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="diagnosis" class="block text-sm font-medium text-foreground mb-2">Diagnosis</label>
                <textarea class="w-full px-4 py-2.5 bg-input border rounded-lg focus:ring-2 focus:ring-primary focus:outline-none transition-all @error('diagnosis') !border-destructive @enderror" 
                          id="diagnosis" name="diagnosis" rows="3">{{ old('diagnosis', $checkup->diagnosis) }}</textarea>
                @error('diagnosis')
                    <p class="mt-1 text-sm text-destructive">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="prescription" class="block text-sm font-medium text-foreground mb-2">Prescription</label>
                <textarea class="w-full px-4 py-2.5 bg-input border rounded-lg focus:ring-2 focus:ring-primary focus:outline-none transition-all @error('prescription') !border-destructive @enderror" 
                          id="prescription" name="prescription" rows="3">{{ old('prescription', $checkup->prescription) }}</textarea>
                @error('prescription')
                    <p class="mt-1 text-sm text-destructive">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="notes" class="block text-sm font-medium text-foreground mb-2">Notes</label>
                <textarea class="w-full px-4 py-2.5 bg-input border rounded-lg focus:ring-2 focus:ring-primary focus:outline-none transition-all @error('notes') !border-destructive @enderror" 
                          id="notes" name="notes" rows="3">{{ old('notes', $checkup->notes) }}</textarea>
                @error('notes')
                    <p class="mt-1 text-sm text-destructive">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="cost" class="block text-sm font-medium text-foreground mb-2">Cost (Rp) <span class="text-destructive">*</span></label>
                <input type="number" step="0.01" class="w-full px-4 py-2.5 bg-input border rounded-lg focus:ring-2 focus:ring-primary focus:outline-none transition-all @error('cost') !border-destructive @enderror" 
                       id="cost" name="cost" value="{{ old('cost', $checkup->cost) }}" required>
                @error('cost')
                    <p class="mt-1 text-sm text-destructive">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex gap-3">
                <button type="submit" class="inline-flex items-center px-6 py-2.5 bg-primary text-primary-foreground rounded-lg hover:bg-primary/90 transition-colors shadow-sm font-medium">Update Checkup</button>
                <a href="{{ route('checkups.index') }}" class="inline-flex items-center px-6 py-2.5 bg-secondary text-secondary-foreground rounded-lg hover:bg-secondary/80 transition-colors font-medium">Cancel</a>
            </div>
        </form>
    </div>
</div>
@endsection
