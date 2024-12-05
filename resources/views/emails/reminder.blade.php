<!DOCTYPE html>
<html>
<head>
    <title>Peringatan Pengembalian Buku</title>
</head>
<body>
    <h1>Peringatan Pengembalian Buku</h1>
    <p>Halo {{ $transaction->user->name }},</p>
    <p>Batas waktu pengembalian buku "{{ $transaction->book->title }}" adalah {{ $transaction->due_date }}. Mohon segera mengembalikan buku untuk menghindari denda.</p>
    <p>Terima kasih,<br>Perpustakaan Sekolah</p>
</body>
</html>
