# Backend Technical Test - Adhivasindo

REST API sederhana yang dibangun menggunakan **Laravel 12** dan **MySQL** untuk memenuhi technical test Backend Developer PT Adhivasindo.

## Tech Stack

- Laravel 12
- PHP 8.2+
- MySQL
- Laravel Sanctum
- Postman

---

# Fitur

### Authentication

- Login
- Register
- Authentication menggunakan Laravel Sanctum (Bearer Token)

### CRUD User

- Menampilkan seluruh user
- Menampilkan detail user
- Menambahkan user
- Mengubah user
- Menghapus user

### Search Data Realtime

Mengambil data secara realtime dari endpoint berikut

https://ogienurdiana.com/career/ecc694ce4e7f6e45a5a7912cde9fe131

Search yang tersedia

- Search berdasarkan Nama
- Search berdasarkan NIM
- Search berdasarkan YMD

---

# Requirement

- PHP >= 8.2
- Composer
- MySQL
- Laravel 12

---

# Instalasi

Clone repository

```bash
git clone https://github.com/USERNAME/adhivasindo-test.git
```

Masuk ke project

```bash
cd adhivasindo-test
```

Install dependency

```bash
composer install
```

Copy file environment

```bash
cp .env.example .env
```

Generate key

```bash
php artisan key:generate
```

Atur konfigurasi database pada file `.env`

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=adhivasindo
DB_USERNAME=root
DB_PASSWORD=
```

Jalankan migration

```bash
php artisan migrate
```

Jalankan server

```bash
php artisan serve
```

Server berjalan pada

```
http://127.0.0.1:8000
```

---

# Authentication

Semua endpoint CRUD User dan Search menggunakan Bearer Token.

Header

```
Authorization: Bearer {token}
```

---

# Endpoint API

## Authentication

### Login

POST

```
/api/login
```

Body

```json
{
    "email":"admin@gmail.com",
    "password":"password"
}
```

---

### Register

POST

```
/api/register
```

Body

```json
{
    "name":"Administrator",
    "email":"admin@gmail.com",
    "password":"password",
    "password_confirmation":"password"
}
```

---

# CRUD User

Semua endpoint berikut wajib menggunakan Bearer Token.

## Get All User

GET

```
/api/user
```

---

## Get User By ID

GET

```
/api/user/{id}
```

---

## Create User

POST

```
/api/user
```

Body

```json
{
    "name":"John Doe",
    "email":"john@gmail.com",
    "password":"password123",
    "password_confirmation":"password123"
}
```

---

## Update User

PUT

```
/api/user/{id}
```

Body

```json
{
    "name":"John Doe Updated",
    "email":"johnupdated@gmail.com"
}
```

---

## Delete User

DELETE

```
/api/user/{id}
```

---

# Search Data Realtime

Data diambil secara realtime dari endpoint:

https://ogienurdiana.com/career/ecc694ce4e7f6e45a5a7912cde9fe131

## Search By Name

GET

```
/api/search/name?value=Turner Mia
```

---

## Search By NIM

GET

```
/api/search/nim?value=9352078461
```

---

## Search By YMD

GET

```
/api/search/ymd?value=20230405
```

---

# Validasi

Project menggunakan Laravel Form Request Validation.

- LoginRequest
- RegisterRequest
- CreateUserRequest
- UpdateUserRequest

---

# Response Format

Seluruh endpoint mengembalikan response JSON.

Contoh

```json
{
    "message":"Data user berhasil dibuat",
    "success":true,
    "data":{},
    "status_code":201
}
```

---

# Database

Database menggunakan MySQL.

Migration terdapat pada folder

```
database/migrations
```

Backup database dapat ditemukan pada

```
database.sql
```

---

# Postman Collection

Collection API tersedia pada

```
postman_collection.json
```

Import collection ke Postman kemudian lakukan login untuk memperoleh Bearer Token sebelum mengakses endpoint yang membutuhkan autentikasi.

---

# Project Structure

```
app
 ├── Http
 │    ├── Controllers
 │    ├── Requests
 ├── Models
 ├── Services

routes
database
```

---

# Catatan

- Menggunakan Service Layer
- Menggunakan Form Request Validation
- Menggunakan Laravel Sanctum Authentication
- Menggunakan REST API
- Menggunakan MySQL Database
- Mengambil data realtime menggunakan Laravel HTTP Client

---

# Author

Nama Lengkap

Backend Developer Technical Test