<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Book;



class BookController extends Controller
{
    // Menampilkan semua buku
    public function index()
    {
        $books = Book::all();
        return view('books.index', compact('books'));
    }

    // Menampilkan form tambah buku
    public function create()
    {
        return view('books.create');
    }

    // Menyimpan data buku ke database
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'published_year' => 'nullable|integer',
        ]);

        // Simpan buku
        Book::create($request->all());

        return redirect()->route('books.index')->with('success', 'Buku berhasil ditambahkan!');
    }

    // Menampilkan form edit buku
    public function edit(Book $book)
    {
        return view('books.edit', compact('book'));
    }

    // Mengupdate data buku di database
    public function update(Request $request, Book $book)
    {
        // Validasi input
        $request->validate([
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'published_year' => 'nullable|integer',
        ]);

        // Update buku
        $book->update($request->all());

        return redirect()->route('books.index')->with('success', 'Buku berhasil diperbarui!');
    }

    // Menghapus buku dari database
    public function destroy(Book $book)
    {
        $book->delete();

        return redirect()->route('books.index')->with('success', 'Buku berhasil dihapus!');
    }

    // Menampilkan rekomendasi buku berdasarkan preferensi user
    public function recommendations()
{
    $user = Auth::user();
    
    // Pastikan user memiliki preferensi
    if (!$user || !$user->preference) {
        return redirect()->route('books.index')->with('error', 'Tidak ada preferensi ditemukan untuk user ini.');
    }

    $preferredCategory = $user->preference->preferred_category;
    $recommendedBooks = Book::where('category', $preferredCategory)->get();

    return view('books.recommendations', compact('recommendedBooks'));
}

    
}
