<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Owner;
use App\Models\Pet;
use App\Models\Treatment;
use App\Models\Checkup;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Create Owners
        $owner1 = Owner::create([
            'name' => 'John Doe',
            'phone' => '081234567890',
            'phone_verified' => true,
            'email' => 'john@example.com',
            'address' => 'Jl. Merdeka No. 123, Jakarta',
        ]);

        $owner2 = Owner::create([
            'name' => 'Jane Smith',
            'phone' => '081298765432',
            'phone_verified' => true,
            'email' => 'jane@example.com',
            'address' => 'Jl. Sudirman No. 456, Bandung',
        ]);

        $owner3 = Owner::create([
            'name' => 'Bob Wilson',
            'phone' => '081345678901',
            'phone_verified' => false,
            'email' => 'bob@example.com',
            'address' => 'Jl. Gatot Subroto No. 789, Surabaya',
        ]);

        // Create Treatments
        $vaccine = Treatment::create([
            'name' => 'Vaksinasi',
            'description' => 'Vaksinasi untuk hewan peliharaan',
            'price' => 150000,
        ]);

        $grooming = Treatment::create([
            'name' => 'Grooming',
            'description' => 'Perawatan kebersihan dan penampilan hewan',
            'price' => 100000,
        ]);

        $checkup = Treatment::create([
            'name' => 'Pemeriksaan Umum',
            'description' => 'Pemeriksaan kesehatan rutin',
            'price' => 75000,
        ]);

        $dental = Treatment::create([
            'name' => 'Perawatan Gigi',
            'description' => 'Pembersihan dan perawatan gigi hewan',
            'price' => 200000,
        ]);

        // Create Pets with proper registration codes
        $pet1 = Pet::create([
            'registration_code' => Pet::generateRegistrationCode($owner1->id),
            'owner_id' => $owner1->id,
            'name' => 'MILO',
            'species' => 'KUCING',
            'age' => 2,
            'weight' => 4.5,
        ]);

        $pet2 = Pet::create([
            'registration_code' => Pet::generateRegistrationCode($owner1->id),
            'owner_id' => $owner1->id,
            'name' => 'LUNA',
            'species' => 'ANJING',
            'age' => 3,
            'weight' => 12.5,
        ]);

        $pet3 = Pet::create([
            'registration_code' => Pet::generateRegistrationCode($owner2->id),
            'owner_id' => $owner2->id,
            'name' => 'WHISKERS',
            'species' => 'KUCING',
            'age' => 1,
            'weight' => 3.2,
        ]);

        // Create Checkups
        Checkup::create([
            'pet_id' => $pet1->id,
            'treatment_id' => $vaccine->id,
            'checkup_date' => now()->subDays(10),
            'notes' => 'Vaksinasi rutin tahunan',
            'diagnosis' => 'Kondisi sehat',
            'prescription' => 'Tidak ada',
            'cost' => 150000,
        ]);

        Checkup::create([
            'pet_id' => $pet2->id,
            'treatment_id' => $grooming->id,
            'checkup_date' => now()->subDays(5),
            'notes' => 'Grooming lengkap dengan potong kuku',
            'diagnosis' => 'Kondisi bulu baik',
            'prescription' => 'Shampoo khusus untuk bulu sensitif',
            'cost' => 100000,
        ]);

        Checkup::create([
            'pet_id' => $pet3->id,
            'treatment_id' => $checkup->id,
            'checkup_date' => now()->subDays(2),
            'notes' => 'Pemeriksaan kesehatan rutin',
            'diagnosis' => 'Sehat, tidak ada masalah',
            'prescription' => 'Vitamin harian',
            'cost' => 75000,
        ]);
    }
}
