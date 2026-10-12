
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Data Mahasiswa</title>
</head>
<body>
    <h1>Data Mahasiswa</h1>

    <p>Halaman mahasiswa berhasil dibuka.</p>

    <p>Jumlah data: {{ count($daftarMahasiswa) }}</p>

    @if (count($daftarMahasiswa) > 0)
        <table border="1" cellpadding="8">
            <thead>
                <tr>
                    <th>NIM</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Usia</th>
                    <th>Program Studi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($daftarMahasiswa as $item)
                    <tr>
                        <td>{{ $item['nim'] }}</td>
                        <td>{{ $item['nama'] }}</td>
                        <td>{{ $item['email'] }}</td>
                        <td>{{ $item['usia'] }}</td>
                        <td>{{ $item['nama_prodi'] }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>Data mahasiswa belum tersedia.</p>
    @endif
</body>
</html>
