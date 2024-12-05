<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Transaction;
use App\Models\User;

class AdminController extends Controller
{
    public function dashboard()
{
    return view('admin.dashboard', [
        'totalBooks' => Book::count(),
        'activeTransactions' => Transaction::whereNull('return_date')->count(),
        'totalFines' => Transaction::sum('fine'),
        'totalUsers' => User::count(),
    ]);
}

}
