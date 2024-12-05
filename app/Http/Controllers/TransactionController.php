<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Transaction;

class TransactionController extends Controller
{
    public function returnBook(Request $request, Transaction $transaction)
{
    $returnDate = now();
    $transaction->return_date = $returnDate;

    // Hitung denda jika terlambat
    if ($returnDate->greaterThan($transaction->due_date)) {
        $daysLate = $returnDate->diffInDays($transaction->due_date);
        $finePerDay = 1000; // Denda per hari (misalnya Rp1000)
        $transaction->fine = $daysLate * $finePerDay;
    } else {
        $transaction->fine = 0;
    }

    $transaction->save();

    return redirect()->route('transactions.index')->with('success', 'Buku berhasil dikembalikan!');
}

}
