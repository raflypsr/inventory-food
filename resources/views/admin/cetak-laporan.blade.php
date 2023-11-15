<!DOCTYPE html>
<html>

<head>
    <title>GENERATE LAPORAN</title>
</head>

<body>
    <br><br>
    <center>
        <h2 style="font-family: sans-serif;">Laporan Bahan {{ $jenis }}</h2>
    </center>
    <br>

    <br><br><br>
    @if ($jenis == 'Masuk')
        <table style="" border="1" cellspacing="0" cellpadding="5" width="100%">
            <thead>
                <tr>
                    <th scope="col" style="font-family: sans-serif;">No</th>
                    <th scope="col" style="font-family: sans-serif;">Jumlah Bahan</th>
                    <th scope="col" style="font-family: sans-serif;">Kode Bahan</th>
                    <th scope="col" style="font-family: sans-serif;">Nama Bahan</th>
                    <th scope="col" style="font-family: sans-serif;">Petugas</th>
                    <th scope="col" style="font-family: sans-serif;">Total Harga</th>
                    <th scope="col" style="font-family: sans-serif;">Tanggal Datang</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($dataMasuk as $item)
                    <tr>
                        <td style="font-family: sans-serif;">{{ $loop->iteration }}</td>
                        <td style="font-family: sans-serif;">{{ $item->jumlah_bahan }}</td>
                        <td style="font-family: sans-serif;">{{ $item->kode_bahan }}</td>
                        <td style="font-family: sans-serif;">{{ $item->nama_bahan }}</td>
                        <td style="font-family: sans-serif;">{{ $item->nama_petugas }}</td>
                        <td style="font-family: sans-serif;">{{ $item->harga_total }}</td>
                        <td style="font-family: sans-serif;">{{ $item->tanggal_datang }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @elseif($jenis == 'Keluar')
        <table style="" border="1" cellspacing="0" cellpadding="5" width="100%">
            <thead>
                <tr>
                    <th scope="col" style="font-family: sans-serif;">No</th>
                    <th scope="col" style="font-family: sans-serif;">Jumlah Bahan</th>
                    <th scope="col" style="font-family: sans-serif;">Alasan</th>
                    <th scope="col" style="font-family: sans-serif;">Nama Petugas</th>
                    <th scope="col" style="font-family: sans-serif;">Nama Bahan</th>
                    <th scope="col" style="font-family: sans-serif;">Tanggal Keluar</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($dataKeluar as $item)
                    <tr>
                        <td style="font-family: sans-serif;">{{ $loop->iteration }}</td>
                        <td style="font-family: sans-serif;">{{ $item->jumlah_bahan }}</td>
                        <td style="font-family: sans-serif;">{{ $item->alasan }}</td>
                        <td style="font-family: sans-serif;">{{ $item->nama_bahan }}</td>
                        <td style="font-family: sans-serif;">{{ $item->nama_petugas }}</td>
                        <td style="font-family: sans-serif;">{{ $item->tanggal_keluar }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif

</body>

</html>
