
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Data Mahasiswa</title>
</head>
<body>

    <h1>Data Mahasiswa</h1>

    @if (session('berhasil'))
        <p>{{ session('berhasil') }}</p>
    @endif

    @if (session('gagal'))
        <p>{{ session('gagal') }}</p>
    @endif

    @if ($errors->any())
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <h2>Tambah Mahasiswa</h2>

    <form action="{{ route('mahasiswa.store') }}" method="POST">
        @csrf

        <label>NIM</label><br>
        <input type="text" name="nim" value="{{ old('nim') }}" required>
        <br><br>

        <label>Nama</label><br>
        <input type="text" name="nama" value="{{ old('nama') }}" required>
        <br><br>

        <label>Email</label><br>
        <input type="email" name="email" value="{{ old('email') }}" required>
        <br><br>

        <label>Usia</label><br>
        <input type="number" name="usia" value="{{ old('usia') }}" required>
        <br><br>

        <label>Program Studi</label><br>
        <select name="program_studi_id" required>
            <option value="">-- Pilih Program Studi --</option>

            @foreach ($daftarProgramStudi as $prodi)
                <option value="{{ $prodi['id'] }}"
                    {{ old('program_studi_id') == $prodi['id'] ? 'selected' : '' }}>
                    {{ $prodi['nama_prodi'] }}
                </option>
            @endforeach
        </select>

        <br><br>
        <button type="submit">Tambah Data</button>
    </form>


    <!-- BAGIAN PENCARIAN DAN FILTER MAHASISWA -->

    <h2>Pencarian dan Filter Mahasiswa</h2>

    <form action="{{ route('mahasiswa.index') }}" method="GET">

        <label>Cari NIM, Nama, atau Email</label><br>

        <input
            type="text"
            name="search"
            placeholder="Masukkan kata kunci..."
            value="{{ $kataKunci ?? '' }}"
        >

        <br><br>

        <label>Filter Program Studi</label><br>

        <select name="program_studi_id">
            <option value="">-- Semua Program Studi --</option>

            @foreach ($daftarProgramStudi as $prodi)
                <option
                    value="{{ $prodi['id'] }}"
                    {{ ($programStudiId ?? '') == $prodi['id'] ? 'selected' : '' }}
                >
                    {{ $prodi['nama_prodi'] }}
                </option>
            @endforeach
        </select>

        <br><br>

        <button type="submit">Cari / Filter</button>

        <a href="{{ route('mahasiswa.index') }}">Reset</a>

    </form>


    <!-- BAGIAN DAFTAR MAHASISWA -->

    <h2>Daftar Mahasiswa</h2>

    <table border="1" cellpadding="8">
        <thead>
            <tr>
                <th>NIM</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Usia</th>
                <th>Program Studi</th>
                <th>Aksi</th>
            </tr>
        </thead>

        <tbody>
            @forelse ($daftarMahasiswa as $mahasiswa)
                <tr>
                    <td>{{ $mahasiswa['nim'] }}</td>
                    <td>{{ $mahasiswa['nama'] }}</td>
                    <td>{{ $mahasiswa['email'] }}</td>
                    <td>{{ $mahasiswa['usia'] }}</td>
                    <td>{{ $mahasiswa['nama_prodi'] }}</td>

                    <td>
                        <a href="{{ route('mahasiswa.edit', $mahasiswa['id']) }}">
                            Edit
                        </a>

                        <form
                            action="{{ route('mahasiswa.destroy', $mahasiswa['id']) }}"
                            method="POST"
                            style="display:inline;"
                            onsubmit="return confirm('Yakin ingin menghapus data ini?')"
                        >
                            @csrf
                            @method('DELETE')

                            <button type="submit">Hapus</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6">Data mahasiswa tidak ditemukan.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

</body>
</html>
