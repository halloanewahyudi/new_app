<div>

    <div style="max-width:960px; margin:0 auto; padding:0">
    
        <table>
            <tr>
                <td width="100">
                    <img src="<?= base_url('assets/img/mhlogo.jpg') ?>" width="150">
                </td>
                <td>
                    <div>
                        <h3 style="margin: 0; padding: 0;">Pesantren Islam Internasional MInhajul Haq</h3>
                        <h1 style="margin: 0; padding:0">Panitia Penerimaan Santri dan Santriwati</h1>
                        <h4 style="margin: 0; padding:0">Tahun ajaran <?= $tahun_ajaran ?></h4>
                    </div>
                </td>
            </tr>
        </table>
        <table style="padding-left:-10px; width:100%;  clear:left; margin-top:20px">
            <tr>
                <td>No</td>
                <td>:</td>
                <td><?= $data_undangan['no_surat'] ?></td>
            </tr>
            <tr>
                <td>Hal</td>
                <td>:</td>
                <td>Undangan Seleksi</td>
            </tr>
        </table>
        <p>Kepada Yth, <br>
            Calon Santri dan Orang Tua/Wali, <br> Di Tempat
        </p>
        <p style="text-align: center;font-size:24px"> Assalamu 'alaikum warahmatullahi wabarakatuh</p>
        <p>
            Alhamdulillah, shalawat dan salam semoga tercurah pada Rasulullah shallallahu 'alaihi wasallam, keluarga, para sahabat dan pengikutnya hingga hari akhir kelak.
            Proses pendaftaran online Ananda,
        </p>
        <table>
            <tr>
                <td>Nama</td>
                <td> :</td>
                <td><?= user()->full_name; ?></td>
            </tr>
            <tr>
                <td>No Pendaftaran</td>
                <td>:</td>
                <td><?=  user()->registration_number; ?></td>
            </tr>
        </table>
        <p>
            maka Panitia Penerimaan Santri Baru Pesantren Islam Minhajul Haq TP. 2020/2021 mengundang Ananda calon santri
            beserta orang tua/wali untuk melaksanakan ujian seleksi masuk Pesantren Islam Minhajul Haq besok pada:
        </p>
        <table>
            <?php if (isset($data_undangan)) : ?>
                <tr>
                    <td>Hari Tanggal</td>
                    <td>:</td>
                    <td> <?= $data_undangan['hari_tanggal'];  ?></td>
                </tr>
                <tr>
                    <td>Jam</td>
                    <td>:</td>
                    <td> <?= $data_undangan['jam']; ?></td>
                </tr>
                <tr>
                    <td>Jenis Ujian</td>
                    <td>:</td>
                    <td> <?= $data_undangan['jenis_ujian']; ?></td>
                </tr>
                <tr>
                    <td>Tempat</td>
                    <td>:</td>
                    <td> <?= $data_undangan['tempat']; ?></td>
                </tr>
                <tr>
                    <td>Materi Ujian</td>
                    <td>:</td>
                    <td> <?= $data_undangan['materi_ujian']; ?></td>
                </tr>
            <?php endif; ?>
        </table>
        <p>
            Demikian undangan ini kami sampaikan, atas perhatiannya kami ucapkan terima kasih, jazakumullahu khairan.
            Wassalamu 'alaikum warahmatullahi wabarakatuh.
        </p>
        <p>
            Wassalamu 'alaikum warahmatullahi wabarakatuh.
        </p>
        <p>
            Kab. Semarang, September 2021 <br>
            Hormat Kami,<br>
            Ketua Panitia
        </p>
        <p style="margin-top: 20px;">
            Fulan
        </p>
        <!--- PAGE ke DUA--0d6efd40-->

        

    </div>
</div>
<!--akhir dari semua div-->