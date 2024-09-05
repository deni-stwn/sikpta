<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Surat Pengajuan Kerja Praktek</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 10px 40px;
            line-height: 1.2;
        }

        h1 {
            text-align: center;
            text-transform: uppercase;
            margin-bottom: 30px;
        }

        table {
            width: 100%;
            margin-bottom: 20px;
            border-collapse: collapse;
        }

        table td {
            padding: 5px;
        }

        .checkbox {
            margin-left: 20px;
        }

        .container {
            width: 100%;
            display: flex;
            justify-content: space-between;
            margin-top: 50px;
        }

        .signature {
            text-align: center;
            width: 45%;
        }

        .signature div {
            height: 80px;
        }

        .signature-name {
            margin-top: 20px;
            font-weight: bold;
        }

        h1 {
            font-size: 18.662px;
        }

        p {
            font-size: 14.663px;
        }

        table tr td,
        table tr th,
        table th,
        ol li,
        ul li {
            font-size: 14.663px;
        }
    </style>
</head>

<body>
    <h1>SURAT PENGAJUAN KERJA PRAKTEK</h1>
    <p>
        Yang bertandatangan di bawah ini adalah mahasiswa Program Studi Teknik
        Informatika Universitas Pasundan Bandung, sbb :
    </p>
    <table>
        <tr>
            <td style="width: 200px">Nrp</td>
            <td>: {{ $surat->user->username }}</td>
        </tr>
        <tr>
            <td style="width: 200px">Nama</td>
            <td>: {{ $surat->user->name }}</td>
        </tr>
        <tr>
            <td style="width: 200px">Kontak / HP</td>
            <td>: {{ $surat->user->no_hp }}</td>
        </tr>
        <tr>
            <td style="width: 200px">Email (rekomendasi Passmail)</td>
            <td>: {{ $surat->user->email }}</td>
        </tr>
    </table>
    <p>
        Bersama ini mengajukan surat permohonan mengikuti kegiatan kerja praktek
        sbb :
    </p>
    <ol>
        <li>
            Tempat Kerja Praktek :
            <table>
                <tbody>
                    <tr>
                        <td style="width: 200px">Tempat</td>
                        <td>: {{ $surat->tempat_kerja }}</td>
                    </tr>
                    <tr>
                        <td style="width: 200px">Nama Perusahaan</td>
                        <td>: {{ $surat->nama_perusahaan }}</td>
                    </tr>
                    <tr>
                        <td style="width: 200px">Bidang Usaha</td>
                        <td>: {{ $surat->bidang_usaha }}</td>
                    </tr>
                    <tr>
                        <td style="width: 200px">Alamat dan Kontak</td>
                        <td>: {{ $surat->alamat }}</td>
                    </tr>
                    <tr>
                        <td style="width: 200px">Pembimbing Lapangan</td>
                        <td>: {{ $surat->pembimbing_lapangan }}</td>
                    </tr>
                </tbody>
            </table>
        </li>
        <li>
            Jenis Kerja Praktek : {{ $surat->jenis_kerja }}
        </li>
        <li>
            Rencana Lama Kerja Praktek (maks. 3 bulan) :
            {{ $surat->tgl_mulai }} sampai {{ $surat->tgl_selesai }}<br />
        </li>
    </ol>
    <p>
        Dengan ini disampaikan pula bahwa saya sanggup menjaga sikap perilaku yang
        baik selama kerja praktek di lapangan dan sanggup menyelesaikan kerja
        praktek sesuai jadual yang ditetapkan.
    </p>
    <p>
        Demikian surat permohonan ini dibuat, selanjutnya mohon dialokasi
        pembimbing internal dari prodi Teknik Informatika, sesuai kewenangan
        Koordinator KP/TA dan kesediaan dosen yang ditunjukkan.
    </p>
    <div class="container">
        <table>
            <tr>
                <td>
                    <div class="signature">
                        <p>Koordinator KP/TA,</p>
                        <div style="margin-top: 80px">( {{ $surat->nama_kordinator }} )</div>
                    </div>
                </td>
                <td style="margin-left: 80px">
                    <div class="signature">
                        <p>{{ $surat->created_at->format('d F Y') }}</p>
                        <div style="margin-top: 80px;">( {{ $surat->user->name }} )</div>
                    </div>
                </td>
            </tr>
        </table>
        {{-- <div class="signature">
            <p>Peserta,</p>
            <div>
                ( {{ $surat->user->name }} )
            </div>
        </div> --}}
    </div>
</body>

</html>
