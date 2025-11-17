@extends('layouts.app')

@section('title', 'Create Owner - PetCare+')

@section('content')
<div class="mb-6">
    <h1 class="text-3xl font-bold text-foreground">Create New Owner</h1>
</div>

<div class="bg-card border border-border rounded-xl shadow-sm overflow-hidden">
    <div class="p-6">
        <form action="{{ route('owners.store') }}" method="POST">
            @csrf
            
            <div class="mb-6">
                <label for="name" class="block text-sm font-medium text-foreground mb-2">Name <span class="text-destructive">*</span></label>
                <input type="text" class="w-full px-4 py-2.5 bg-input border border-border rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent transition-all @error('name') border-destructive @enderror" 
                       id="name" name="name" value="{{ old('name') }}" required>
                @error('name')
                    <p class="mt-1 text-sm text-destructive">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="phone" class="block text-sm font-medium text-foreground mb-2">Phone <span class="text-destructive">*</span></label>
                <input type="text" class="w-full px-4 py-2.5 bg-input border border-border rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent transition-all @error('phone') border-destructive @enderror" 
                       id="phone" name="phone" value="{{ old('phone') }}" required>
                @error('phone')
                    <p class="mt-1 text-sm text-destructive">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <div class="flex items-center">
                    <input type="checkbox" class="w-4 h-4 text-primary bg-input border-border rounded focus:ring-primary" id="phone_verified" 
                           name="phone_verified" value="1" {{ old('phone_verified') ? 'checked' : '' }}>
                    <label class="ml-2 text-sm font-medium text-foreground" for="phone_verified">
                        Phone Verified
                    </label>
                </div>
            </div>

            <div class="mb-6">
                <label for="email" class="block text-sm font-medium text-foreground mb-2">Email</label>
                <input type="email" class="w-full px-4 py-2.5 bg-input border border-border rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent transition-all @error('email') border-destructive @enderror" 
                       id="email" name="email" value="{{ old('email') }}">
                @error('email')
                    <p class="mt-1 text-sm text-destructive">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="address" class="block text-sm font-medium text-foreground mb-2">Address</label>
                <textarea class="w-full px-4 py-2.5 bg-input border border-border rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent transition-all @error('address') border-destructive @enderror" 
                          id="address" name="address" rows="3">{{ old('address') }}</textarea>
                @error('address')
                    <p class="mt-1 text-sm text-destructive">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex gap-3">
                <button type="submit" class="inline-flex items-center px-6 py-2.5 bg-primary text-primary-foreground rounded-lg hover:bg-primary/90 transition-colors shadow-sm font-medium">Create Owner</button>
                <a href="{{ route('owners.index') }}" class="inline-flex items-center px-6 py-2.5 bg-secondary text-secondary-foreground rounded-lg hover:bg-secondary/80 transition-colors font-medium">Cancel</a>
            </div>
        </form>
    </div>
</div>
@endsection
