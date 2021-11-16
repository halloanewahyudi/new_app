<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
   
    <div style="max-width:960px; margin:0 auto; padding:30px;">
    <h1 style="text-align:center"> Bukti Pendaftaran </h1>
    <hr>
     <!-- content -->
  
        <h2>A. Data Pribadi</h2>
        <table>
            <tr><td>Nama</td><td>:</td><td><?= user()->full_name; ?></td></tr>
            <tr><td>No Pendaftaran</td><td>:</td><td><?= user()->registration_number; ?></td>
            <tr><td>Tanggal Lahir</td><td>:</td><td><?= user()->date_of_birth; ?></td></tr>
            <tr><td>Jenis Kelamin</td><td>:</td><td><?= user()->gender; ?></td></tr>
            <tr><td>Golongan darah</td><td>:</td><td><?= $data_santri['golongan_darah']; ?></td></tr>
            <tr><td>Tinggi Badan</td><td>:</td><td><?= $data_santri['tinggi_badan']; ?></td></tr>
            <tr><td>Berat Badan</td><td>:</td><td><?= $data_santri['berat_badan']; ?></td></tr>
            <tr><td>Anak ke</td><td>:</td><td><?= $data_santri['anak_ke']; ?></td></tr>
            <tr><td>Status Tinggal</td><td>:</td><td><?= $data_santri['status_tinggal']; ?></td></tr>
            <tr><td>pembiayaan</td><td>:</td><td><?= $data_santri['pembiayaan']; ?></td></tr>
            <tr><td>Alamat</td><td>:</td><td><?= $data_santri['san_alamat']; ?></td></tr>
            <tr><td>Desa/ Kelurahan</td><td>:</td><td><?= $data_santri['san_desa_kelurahan']; ?></td></tr>
            <tr><td>Kecamatan</td><td>:</td><td><?= $data_santri['san_kecamatan']; ?></td></tr>
            <tr><td>Kabupaten</td><td>:</td><td><?= $data_santri['san_kab']; ?></td></tr>
            <tr><td>Provinsi</td><td>:</td><td><?= $data_santri['san_provinsi']; ?></td></tr>
            <tr><td>Negara</td><td>:</td><td><?= $data_santri['san_negara']; ?></td></tr>
            <tr><td>Kode Pos</td><td>:</td><td><?= $data_santri['san_kode_pos']; ?></td></tr>
            <tr><td>Hobi</td><td>:</td><td><?= $data_santri['hobi']; ?></td></tr>
            <tr><td>Cita-cita</td><td>:</td><td><?= $data_santri['cita_cita']; ?></td></tr>
            <tr><td>Jumlah Hafalan</td><td>:</td><td><?= $data_santri['jumlah_hafalan']; ?></td></tr>
            <tr><td>NISN</td><td>:</td><td><?= $data_santri['nisn']; ?></td></tr>
            <tr><td>NIK</td><td>:</td><td><?= $data_santri['nik']; ?></td></tr>
        </table>

        <h2>B.Sekolah Asal</h2>
        <table>
            <tr><td>Sekolah</td><td>:</td><td><?= $data_santri['sekolah_asal'] ?></td></tr>
            <tr><td>NPSN</td><td>:</td><td><?= $data_santri['npsn'] ?></td></tr>
            <tr><td>Tahun Lulus</td><td>:</td><td><?= $data_santri['tahun_lulus'] ?></td></tr>
            <tr><td>Alamat Sekolah</td><td>:</td><td><?= $data_santri['alamat'] ?></td></tr>
            <tr><td>Desa/ Kelurahan</td><td>:</td><td><?= $data_santri['desa_kelurahan']; ?></td></tr>
            <tr><td>Kecamatan</td><td>:</td><td><?= $data_santri['kecamatan']; ?></td></tr>
            <tr><td>Provinsi</td><td>:</td><td><?= $data_santri['provinsi']; ?></td></tr>
            <tr><td>Negara</td><td>:</td><td><?= $data_santri['negara']; ?></td></tr>
            <tr><td>Kode Pos</td><td>:</td><td><?= $data_santri['kode_pos']; ?></td></tr>
        </table>
        
             <!-- sisi kanan -->
    
        <h2>C.Jenjang Tujuan</h2>
        <table>
            <tr><td>Jenjang</td><td>:</td><td><?= user()->educational_level; ?></td></tr>
            <?php if(isset($data_tujuan)){
                $kelas = $data_tujuan['kelas'];
            }else{
                $kelas = '';
            } ?>
            <tr><td>Kelas</td><td>:</td><td><?= $kelas?></td>
        </table>

        <h2>D.Data Ayah</h2>
        <table>
            <tr><td>Nama</td><td>:</td><td><?= $data_ayah['nama'] ?></td></tr>
            <tr><td>Tempat Lahir</td><td>:</td><td><?= $data_ayah['tempat_lahir'] ?></td></tr>
            <tr><td>Tanggal Lahir</td><td>:</td><td><?= $data_ayah['tanggal_lahir'] ?></td></tr>
            <tr><td>Pekerjaan </td><td>:</td><td><?= $data_ayah['pekerjaan'] ?></td></tr>
            <tr><td>Pendidikan Terakhir</td><td>:</td><td><?= $data_ayah['pendidikan_terakhir'] ?></td></tr>
            <tr><td>Jurusan</td><td>:</td><td><?= $data_ayah['jurusan'] ?></td></tr>
            <tr><td>No HP</td><td>:</td><td><?= $data_ayah['no_hp'] ?></td></tr>
            <tr><td>Email</td><td>:</td><td><?= $data_ayah['email'] ?></td></tr>
            <tr><td>Status</td><td>:</td><td><?= $data_ayah['status'] ?></td></tr>
            <tr><td>NIK</td><td>:</td><td><?= $data_ayah['nik'] ?></td></tr>
        </table>

        <h2>E.Data Ibu</h2>
        <table>
        <tr><td>Nama</td><td>:</td><td><?= $data_ibu['nama'] ?></td></tr>
            <tr><td>Tempat Lahir</td><td>:</td><td><?= $data_ibu['tempat_lahir'] ?></td></tr>
            <tr><td>Tanggal Lahir</td><td>:</td><td><?= $data_ibu['tanggal_lahir'] ?></td></tr>
            <tr><td>Pekerjaan </td><td>:</td><td><?= $data_ibu['pekerjaan'] ?></td></tr>
            <tr><td>Pendidikan Terakhir</td><td>:</td><td><?= $data_ibu['pendidikan_terakhir'] ?></td></tr>
            <tr><td>Jurusan</td><td>:</td><td><?= $data_ibu['jurusan'] ?></td></tr>
            <tr><td>No HP</td><td>:</td><td><?= $data_ibu['no_hp'] ?></td></tr>
            <tr><td>Email</td><td>:</td><td><?= $data_ibu['email'] ?></td></tr>
            <tr><td>Status</td><td>:</td><td><?= $data_ibu['status'] ?></td></tr>
            <tr><td>NIK</td><td>:</td><td><?= $data_ibu['nik'] ?></td></tr>
        </table>

        <h2>E.Data Lain</h2>
        <table>
        <?php if(isset($data_tujuan)){
                $biaya = $data_tujuan['pembiayaan'];
            }else{
                $biaya = '';
            } ?>
        <tr><td>Penanggung Jawab Biaya</td><td>:</td><td><?= $biaya?></td></tr>
        </table>
    </div>
</body>

</html>