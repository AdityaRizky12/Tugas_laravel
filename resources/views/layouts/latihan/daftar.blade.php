<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah rekening</title>
</head>
<body>
    <form action="{{ url("/proses") }}" method="POST">
    @csrf
        <input type="text" name="rekening" placeholder="masukan rekening">
        <input type="number" name="saldo" placeholder="masukan saldoAwal">
        <button type="submit">Simpan</button>
    </form>
</body>
</html>