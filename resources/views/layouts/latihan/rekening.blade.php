<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Rekening</title>
</head>
<body>
   <h1>{{ $title }}</h1>
   <p>{{ $content }}</p>
   <table>
    <tr>
        <th>Nama Rekening</th>
        <th>Saldo Awal</th>
    </tr>
    @foreach ($rekening as $rek)
        <tr>
            <td>{{$rek->NamaRekening}}</td>
            <td>{{$rek->saldoAwal}}</td>
        </tr>
    @endforeach
</table>

</body>
</html>