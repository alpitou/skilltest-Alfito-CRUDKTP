<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    
    <table border="1" style="border-collapse: collapse;">
        <thead>
            <tr>
                <th scope="col">NIK</th>
                <th scope="col">Nama</th>
                <th scope="col">Umur</th>
                <th scope="col">Jenis Kelamin</th>
                <th scope="col">Tanggal lahir</th>
                <th scope="col">Alamat</th>
                <th scope="col">Agama</th>
                <th scope="col">Pekerjaan</th>
            </tr>
        </thead>
        <tbody>
                <tr>
                    <td>{{ $data->nik }}</td>
                    <td>{{ $data->name }}</td>
                    <td>{{ \Carbon\Carbon::parse($data->birthdate)->age }}</td>
                    <td>{{ $data->gender }}</td>
                    <td>{{ $data->birthdate }}</td>
                    <td>{{ $data->address }}</td>
                    <td>{{ $data->religion }}</td>
                    <td>{{ $data->profession }}</td>
                </tr>
        </tbody>
    </table>
</body>
</html>
