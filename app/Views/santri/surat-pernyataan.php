<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Surat Pernyataan Orang Tua</title>
</head>

<body>
    <div style="max-width:960px; margin:0 auto; padding:30px">
    <div style="text-align:center">
        <h4 style="margin-bottom:60px">SURAT PERNYATAAN CALON ORANG TUA/WALI SANTRIWAN/WATI BARU <br> TAHUN PELAJARAN <?= $tahun_ajaran ?> <br>
            PESANTREN ISLAM INTERNASIONAL AL-ANDALUS
        </h4>
    </div>
        <p>Yang bertanda tangan di bawah ini, kami: </p>
        <table>
            <tr>
                <td style="width:100px">Nama</td>
                <td>:</td>
                <td>............................................</td>
            </tr>
            <tr>
                <td>Pekerjaan</td>
                <td>:</td>
                <td>............................................</td>
            </tr>
            <tr>
                <td>No. HP</td>
                <td>:</td>
                <td>............................................</td>
            </tr>
            <tr>
                <td>Alamat</td>
                <td>:</td>
                <td>............................................</td>
            </tr>
        </table>
        <p>sebagai orang tua/wali calon santri baru Pesantren Internasional Al-Andalus Tahun Pelajaran <?= $tahun_ajaran ?></p>
        <table>
            <tr>
                <td style="width:100px" >Nama</td>
                <td>:</td>
                <td><?= user()->full_name ?></td>
            </tr>
            <tr>
                <td>Tanggal Lahir</td>
                <td>:</td>
                <td><?= user()->date_of_birth?></td>
            </tr>
            <tr>
                <td>No. HP</td>
                <td>:</td>
                <td><?= $data_santri ['kontak']; ?></td>
            </tr>
            <tr>
                <td>Alamat</td>
                <td>:</td>
                <td><?= user()->registration_number; ?></td>
            </tr>
        </table>
        <p>menyatakan bahwa,</p>
        <ul>
            <li>
            	Seluruh data dan dokumen yang kami sertakan dalam pendaftaran santri baru Pesantren Islam Internasional Al Andalus,  adalah benar dan dapat dipertanggungjawabkan;
            </li>
            <li>Siap menanggung dan bertanggung jawab terhadap seluruh biaya pendidikan yang dibebankan oleh pesantren, meliputi: biaya daftar ulang, SPP bulanan, dan biaya resmi lainnya;
            </li>
            <li>
            Siap melepas Ananda untuk mengikuti pembelajaran tatap muka (PTM), dan hadir di pesantren sesuai ketentuan dan protokol yang ditentukan (terhitung awal TP. <?= $tahun_ajaran?>)
            </li>
            <li>
            Siap mematuhi seluruh peraturan pesantren dan bekerjasama dengan Pesantren dalam mendidik ananda berdasarkan kebijakan yang dikeluarkan oleh Pesantren. Mengedepankan tabayun dan musyawarah dalam menyelesaikan kendala dalam proses tarbiyah di Pesantren.
            </li>
            <li>
             Siap menerima konsekwensi dari penerapan aturan pesantren dan menghormatinya.
            </li>
        </ul>
        <p style="margin-bottom:20px">
        Demikian pernyataan ini saya tanda tangani, apabila terdapat di antara poin di atas tidak kami tepati, kami siap menanggung risiko gugur penerimaan santri/dikeluarkan. Semoga Allah Ta'ala memberikan pertolongan dan kemudahan bagi kami dalam menunaikan kewajiban ini.
        </p>
        <p style="text-align:right; margin-bottom:70px">.........................,.........<?= date('Y') ?><br>
        Yang menyatakan,</p>
        <p style="text-align:right" >..................................... <br>
       <span style="font-size:12px; font-style:italic"> (bubuhkan ttd. di atas materai)</span>
        </p>
    </div>
</body>

</html>