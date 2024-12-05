<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rekomendasi Buku</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1>Rekomendasi Buku</h1>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Judul</th>
                    <th>Penulis</th>
                    <th>Kategori</th>
                    <th>ISBN</th>
                    <th>Jumlah</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($recommendedBooks as $book)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $book->title }}</td>
                        <td>{{ $book->author }}</td>
                        <td>{{ $book->category }}</td>
                        <td>{{ $book->isbn }}</td>
                        <td>{{ $book->quantity }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5">Tidak ada rekomendasi buku.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</body>
</html>
