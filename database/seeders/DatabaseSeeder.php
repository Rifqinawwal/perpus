<?php

use App\Models\User;
use App\Models\Book;
use App\Models\Transaction;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        // Cek apakah email admin@library.com sudah ada di database
        if (!User::where('email', 'admin@library.com')->exists()) {
            User::create([
                'name' => 'Admin Perpustakaan',
                'email' => 'admin@library.com',
                'password' => bcrypt('password'),
            ]);
        }

        // Cek apakah email user@library.com sudah ada di database
        if (!User::where('email', 'user@library.com')->exists()) {
            User::create([
                'name' => 'User Siswa',
                'email' => 'user@library.com',
                'password' => bcrypt('password'),
            ]);
        }

        // Tambah data buku jika belum ada
        if (Book::count() == 0) {
            Book::insert([
                [
                    'title' => 'Matematika Dasar',
                    'author' => 'Dr. A. Sugiono',
                    'category' => 'Pendidikan',
                    'published_date' => '2020-01-01',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'title' => 'Ilmu Pengetahuan Alam',
                    'author' => 'Prof. B. Habibie',
                    'category' => 'Sains',
                    'published_date' => '2018-05-01',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
            ]);
        }

        // Tambah data transaksi jika belum ada
        if (Transaction::count() == 0) {
            Transaction::create([
                'user_id' => 2, // ID dari user kedua
                'book_id' => 1, // ID buku pertama
                'borrow_date' => now(),
                'due_date' => Carbon::now()->addDays(7),
                'return_date' => null,
                'fine' => 0,
            ]);
        }
    }
}



