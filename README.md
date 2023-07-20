Instalasi:

1. Jalankan pada powershell ```bash
cp .env.example .env
```

2. Pindahkan working directory powershell pada directory aplikasi

3. Jalankan command berikut pada powershell:
```bash
compose install
php artisan key:generate
php artisan migrate
php artisan db:seed
php artisan serve
```

4. Untuk login buka pada url "/login". Username default adalah "admin" dan password adalah "admin".
5. Untuk mengisi data tamu baru pada url "/". Untuk mengisi tidak memerlukan akun sehingga tamu dapat mengisi sendiri data mereka.

