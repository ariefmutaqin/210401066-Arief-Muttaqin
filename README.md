Aplikasi Perpustakaan Laravel

this application is build with:</br>
1. Laravel 7 </br>
2. php: "^7.2.5|^8.0",</br>
3. barryvdh/laravel-dompdf: "^0.9.0",</br>  
4. maatwebsite/excel: "^3.1",</br>
5. milon/barcode": "7.*"</br>
6. template Argon by Creative Tim



## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
# laravel-perpustakaan

## Installation

Cara Install

- Download zip project laravel-perpustakaan
atau
- git clone project ini dengan perintah di terminal

```bash
  git clone https://github.com/yudihendrawan/laravel-perpustakaan.git
```
- buka project di text editor
- buka terminal, lalu jalankan

```bash
composer install
```
atau 
```bash
composer update
```

- rename .env.example menjadi .env
- atur configurasi database
- gunakan APP_URL=http://127.0.0.1:8000. jika localhost nya menggunakan 27.0.0.1:8000
- dan gunakan APP_URL=http://localhost:8000. jika localhost nya menggunakan localhost:8000

 ```bash
php artisan migrate
```
```bash
php artisan migrate --seed
```
```bash
php artisan key:generate
```

```bash
php artisan storage:link
```

 ```bash
php artisan serve
```
