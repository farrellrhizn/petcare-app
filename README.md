# PetCare+ - Aplikasi Klinik Hewan

Aplikasi manajemen klinik hewan yang dibangun dengan Laravel dan Bootstrap.

## Fitur

- **Dashboard**: Ringkasan statistik dan data terbaru
- **Manajemen Pemilik (Owners)**: CRUD data pemilik hewan dengan verifikasi telepon
- **Manajemen Hewan (Pets)**: CRUD data hewan dengan parsing otomatis dan kode registrasi unik
- **Manajemen Perawatan (Treatments)**: CRUD jenis perawatan (vaksin, grooming, pemeriksaan)
- **Manajemen Pemeriksaan (Checkups)**: CRUD catatan pemeriksaan hewan

## Teknologi

- Laravel 11
- MySQL
- Bootstrap 5
- Vite

## Persyaratan Sistem

- PHP >= 8.2
- MySQL
- Composer
- Node.js & NPM

## Instalasi

### 1. Clone atau Extract Project

```bash
cd c:\laragon\www\PetCare\petcare-app
```

### 2. Install Dependencies

```bash
composer install
npm install
```

### 3. Setup Database

Buat database MySQL baru:
```sql
CREATE DATABASE petcare;
```

Copy file `.env` dan sesuaikan konfigurasi database:
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=petcare
DB_USERNAME=root
DB_PASSWORD=
```

### 4. Generate Application Key

```bash
php artisan key:generate
```

### 5. Jalankan Migrasi dan Seeder

```bash
php artisan migrate:fresh --seed
```

### 6. Build Assets

```bash
npm run build
```

### 7. Jalankan Aplikasi

```bash
php artisan serve
```

Akses aplikasi di: http://localhost:8000

## Struktur Database

### Tabel `owners`
- id
- name
- phone
- phone_verified (boolean)
- email
- address
- timestamps

### Tabel `pets`
- id
- registration_code (unique)
- owner_id (foreign key)
- name
- species
- age
- weight
- timestamps

### Tabel `treatments`
- id
- name
- description
- price
- timestamps

### Tabel `checkups`
- id
- pet_id (foreign key)
- treatment_id (foreign key)
- checkup_date
- notes
- diagnosis
- prescription
- cost
- timestamps

## Relasi Database

- 1 Owner → Many Pets
- 1 Pet → Many Checkups
- 1 Treatment → Many Checkups

## Fitur Input Hewan Khusus

### Format Input
```
NAMA_HEWAN JENIS_HEWAN USIA BERAT
```

Contoh:
- `Milo Kucing 2Th 4.5kg`
- `Buddy Anjing 3tahun 12.5kg`
- `Luna Kucing 1thn 3,2KG`

### Format Usia yang Didukung
- `2tahun`, `2Tahun`, `2TAHUN`
- `2th`, `2Th`, `2TH`
- `2thn`, `2Thn`, `2THN`

### Format Berat yang Didukung
- `4.5kg`, `4.5KG`, `4.5Kg`
- `4,5kg`, `4,5KG` (koma otomatis dikonversi ke titik)

### Validasi
1. Nama dan jenis hewan otomatis diubah ke UPPERCASE
2. Owner yang sama tidak bisa memiliki hewan dengan nama dan jenis yang sama
3. Kode registrasi hewan harus unik
4. Hanya owner dengan telepon terverifikasi yang muncul di dropdown
5. Input aman dari multiple spaces

### Format Kode Registrasi
```
HHMMXXXXYYYY
```
- HHMM: Jam dan menit saat data disimpan
- XXXX: 4 digit ID owner (left padded)
- YYYY: Nomor urut hewan

Contoh: `103000120002`
- 10:30 → Pukul 10:30
- 0012 → Owner ID 12
- 0002 → Hewan ke-2 dari owner tersebut

## Data Sample

Setelah menjalankan seeder, akan tersedia:
- 3 Owner (2 verified, 1 unverified)
- 3 Pets
- 4 Treatments
- 3 Checkups

## Penggunaan

### Menambah Pemilik
1. Navigasi ke menu "Owners"
2. Klik "Add New Owner"
3. Isi form dan centang "Phone Verified" jika nomor sudah diverifikasi
4. Submit

### Menambah Hewan
1. Navigasi ke menu "Pets"
2. Klik "Add New Pet"
3. Pilih owner (hanya yang verified)
4. Masukkan data hewan dengan format: `NAMA JENIS USIA BERAT`
5. Submit

### Menambah Pemeriksaan
1. Navigasi ke menu "Checkups"
2. Klik "Add New Checkup"
3. Pilih hewan, treatment, dan isi detail pemeriksaan
4. Submit

## Troubleshooting

### Migration Error
```bash
php artisan migrate:fresh --seed
```

### Assets tidak muncul
```bash
npm run build
```

### Cache issues
```bash
php artisan config:clear
php artisan cache:clear
php artisan view:clear
```

## Author

Aplikasi ini dibuat untuk memenuhi requirement studi kasus "PetCare+" - Aplikasi Klinik Hewan.
