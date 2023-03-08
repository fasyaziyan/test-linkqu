Tutorial Install

1. Download/Clone Project tersebut
2. Membuat database serta ubah file .env.example menjadi .env dengan menyesuaikan nama database yang dibuat
3. Jalankan composer install
4. Jalankan php artisan key:generate
5. Jalankan php artisan migrate untuk membuat table pada database
6. Selesai

Note : Untuk menjalankan API via Postman dapat menggunakan url http://127.0.0.1:8000/api/penduduk dengan key=penduduk
