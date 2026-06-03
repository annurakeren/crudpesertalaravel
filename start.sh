#!/bin/bash

# Pastikan struktur folder storage ada (penting jika pakai Railway Volume)
mkdir -p storage/app/public/pesertas
mkdir -p storage/framework/cache/data
mkdir -p storage/framework/sessions
mkdir -p storage/framework/views
mkdir -p storage/logs

# Buat symlink storage jika belum ada
php artisan storage:link --force

# Jalankan migrasi database
php artisan migrate --force

# Optimize untuk production
php artisan config:cache
php artisan route:cache

# Mulai server
php artisan serve --host=0.0.0.0 --port=${PORT:-8080}
