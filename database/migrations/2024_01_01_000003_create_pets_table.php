<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('pets', function (Blueprint $table) {
            $table->id();
            $table->string('registration_code', 20)->unique();
            $table->foreignId('owner_id')->constrained('owners')->onDelete('cascade');
            $table->string('name');
            $table->string('species');
            $table->integer('age');
            $table->decimal('weight', 5, 2);
            $table->timestamps();
            
            // Composite unique constraint: same owner cannot have pets with same name and species
            $table->unique(['owner_id', 'name', 'species']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pets');
    }
};
