<?php
	$admin = array('62','63','66'); 
?>
	<section class="invoice" id="invoice">
      <div class="row">
        <div class="col-xs-12">
			<p class="page-header"><img height="50" src="<?=base_url()?>images/logoblack.png"><img height="50" class="pull-right" src="<?=base_url()?>images/logobnisekblack.png"></p>
		    <h2 class="page-header">
			    <i class="fa fa-globe"></i>&nbsp;&nbsp;<?=$title?>
				<small class="pull-right"><strong>Tanggal Registrasi:</strong> <?php if($registrasi->tanggal != '0000-00-00') { echo date('d-m-Y', strtotime($registrasi->tanggal)); } ?></small>
			</h2>
        </div>
      </div>
      <div class="row invoice-info">
		<div class="col-sm-4 invoice-col">
			<strong>Nama Depan: </strong><?=$registrasi->nama_depan?><br/>
			<strong>Nama Tengah: </strong><?=$registrasi->nama_tengah?><br/>
			<strong>Nama Belakang: </strong><?=$registrasi->nama_belakang?><br/>
        </div>
		<div class="col-sm-4 invoice-col">
			<strong>Warga Negara: </strong><?=$registrasi->warganegara?><br/>
			<strong>Negara: </strong><?=$registrasi->negara?><br/>
			<strong>Email: </strong><?=$registrasi->email?><br/>
			<strong>Handphone: </strong><?=$registrasi->handphone?><br/>
        </div>
		<div class="col-sm-4 invoice-col">
			<strong>Type Rekening Efek: </strong><?=$registrasi->rekening_efek?><br/>
			<strong>Tipe Layanan: </strong><?=$registrasi->tipe_layanan?><br/>
        </div>
      </div>
      <div class="row">
        <div class="col-xs-12">
		  <p class="page-header">
		  <strong>Data Diri : </strong><br/>
		  </p>
				<table class="table table-striped">
					<tbody>
					<tr>
						<td width="30%">Tempat Lahir</td><td><?=$registrasi->tempat_lahir?></td>
					</tr>
					<tr>
						<td width="30%">Tanggal Lahir</td><td><?php if($registrasi->tanggal_lahir != '0000-00-00') { echo date('d-m-Y', strtotime($registrasi->tanggal_lahir)); } ?></td>
					</tr>
					<tr>
						<td width="30%">Jenis Kelamin</td><td><?php if($registrasi->jenis_kelamin == "P") { echo 'Pria'; } else { echo 'Wanita'; }?></td>
					</tr>
					<tr>
						<td width="30%">Agama</td>
						<td><?php 
							switch ($registrasi->agama) {
							case '01': echo 'Islam'; break;
							case '02': echo 'Protestan'; break;
							case '03': echo 'Katholik'; break;
							case '04': echo 'Budha'; break;
							case '05': echo 'Hindu'; break;
							case '06': echo 'Kong Hu Cu'; break;
						}
						?></td>
					</tr>
					<tr>
						<td width="30%">Pendidikan</td><td><?=$registrasi->pendidikan?></td>
					</tr>
					<tr>
						<td width="30%">Nama Ibu Kandung</td><td><?=$registrasi->ibu_kandung?></td>
					</tr>
					<tr>
						<td width="30%">Status Pernikahan</td>
						<td><?php 
							switch ($registrasi->status_pernikahan) {
							case 'S': echo 'Lajang'; break;
							case 'M': echo 'Menikah'; break;
							case 'R': echo 'Duda'; break;
							case 'W': echo 'Janda'; break;
						}
						?></td>
					</tr>
					<tr>
						<td width="30%">Nama Pasangan</td><td><?=$registrasi->nama_pasangan?></td>
					</tr>
<?php //if($registrasi->warganegara == 'WNI') { ?>
					<tr>
						<td width="30%">Nomor KTP</td><td><?=$registrasi->ktp?></td>
					</tr>
					<tr>
						<td width="30%">Tempat KTP Diterbitkan</td><td><?=$registrasi->ktp_tempat?></td>
					</tr>
					<tr>
						<td width="30%">Tanggal KTP Diterbitkan</td><td><?php if($registrasi->ktp_terbit != '0000-00-00') { echo date('d-m-Y', strtotime($registrasi->ktp_terbit)); } ?></td>
					</tr>
					<tr>
						<td width="30%">Berlaku Sampai</td>
						<td><?php
							if($registrasi->ktp_berlaku_sampai == 'lifetime') { echo 'Seumur Hidup'; } else {
								if($registrasi->ktp_berlaku_tanggal != '0000-00-00') { echo date('d-m-Y', strtotime($registrasi->ktp_berlaku_tanggal)); }
							}
						?></td>
					</tr>
					<tr>
						<td width="30%">Foto KTP</td><td>
						<?php if($registrasi->fotoktp) {?>
						<a href="<?=base_url($registrasi->fotoktp)?>" target="_blank"><img src="<?=base_url($registrasi->fotoktp)?>" height="100"></a>
						<?php }?>
						</td>
					</tr>
					<tr>
						<td width="30%">Foto Selfie dengan KTP</td><td>
						<?php if($registrasi->fotoselfie) {?>
						<a href="<?=base_url($registrasi->fotoselfie)?>" target="_blank"><img src="<?=base_url($registrasi->fotoselfie)?>" height="100"></a>
						<?php }?>
						</td>
					</tr>
<?php //} else { ?>
					<tr>
						<td width="30%">Nomor PASSPORT</td><td><?=$registrasi->paspor?></td>
					</tr>
					<tr>
						<td width="30%">Tempat PASSPORT Diterbitkan</td><td><?=$registrasi->paspor_tempat?></td>
					</tr>
					<tr>
						<td width="30%">Tanggal PASSPORT Diterbitkan</td><td><?php if( isset($registrasi->paspor_terbit) && ($registrasi->paspor_terbit != '0000-00-00')) { echo date('d-m-Y', strtotime($registrasi->paspor_terbit)); } ?></td>
					</tr>
					<tr>
						<td width="30%">Berlaku Sampai</td>
						<td><?php
							if($registrasi->paspor_berlaku_sampai == 'lifetime') { echo 'Seumur Hidup'; } else {
								if(isset($registrasi->paspor_berlaku_tanggal) && ($registrasi->paspor_berlaku_tanggal != '0000-00-00')) { echo date('d-m-Y', strtotime($registrasi->paspor_berlaku_tanggal)); }
							}
						?></td>
					</tr>
					<tr>
						<td width="30%">Foto PASSPORT</td><td>
						<?php if($registrasi->fotopaspor) {?>
						<a href="<?=base_url($registrasi->fotopaspor)?>" target="_blank"><img src="<?=base_url($registrasi->fotopaspor)?>" height="100"></a>
						<?php }?>
						</td>
					</tr>
					<tr>
						<td width="30%">Nomor KITAS</td><td><?=$registrasi->kitas?></td>
					</tr>
					<tr>
						<td width="30%">Tempat KITAS Diterbitkan</td><td><?=$registrasi->kitas_tempat?></td>
					</tr>
					<tr>
						<td width="30%">Tanggal KITAS Diterbitkan</td><td><?php if(isset($registrasi->kitas_terbit) && ($registrasi->kitas_terbit != '0000-00-00')) { echo date('d-m-Y', strtotime($registrasi->kitas_terbit)); } ?></td>
					</tr>
					<tr>
						<td width="30%">Berlaku Sampai</td>
						<td><?php
							if($registrasi->kitas_berlaku_sampai == 'lifetime') { echo 'Seumur Hidup'; } else {
								if(isset($registrasi->kitas_terbit) && ($registrasi->kitas_berlaku_tanggal != '0000-00-00')) { echo date('d-m-Y', strtotime($registrasi->kitas_berlaku_tanggal)); }
							}
						?></td>
					</tr>
					<tr>
						<td width="30%">Foto KITAS</td><td>
						<?php if($registrasi->fotokitas) {?>
						<a href="<?=base_url($registrasi->fotokitas)?>" target="_blank"><img src="<?=base_url($registrasi->fotokitas)?>" height="100"></a>
						<?php }?>
						</td>
					</tr>
<?php //} ?>
					<tr>
						<th width="30%">Alamat KTP</th><td></td>
					</tr>
					<tr>
						<td width="30%">Nama Jalan</td><td><?=$registrasi->ktp_alamat?></td>
					</tr>
					<tr>
						<td width="30%">RT/RW/Perumahan</td><td><?=$registrasi->ktp_rtrw?></td>
					</tr>
					<tr>
						<td width="30%">Kelurahan</td><td><?=$registrasi->ktp_kelurahan?></td>
					</tr>
					<tr>
						<td width="30%">Kecamatan</td><td><?=$registrasi->ktp_kecamatan?></td>
					</tr>
					<tr>
						<td width="30%">Provinsi</td><td><?=$registrasi->ktp_provinceid?></td>
					</tr>
					<tr>
						<td width="30%">Kota/Kabupaten</td><td><?=$registrasi->ktp_cityid?></td>
					</tr>
					<tr>
						<td width="30%">Kodepos</td><td><?=$registrasi->ktp_kodepos?></td>
					</tr>
					<tr>
						<th width="30%">Alamat Terkini</th><td></td>
					</tr>
						<td width="30%">Nama Jalan</td><td><?=$registrasi->terkini_alamat?></td>
					</tr>
					<tr>
						<td width="30%">RT/RW/Perumahan</td><td><?=$registrasi->terkini_rtrw?></td>
					</tr>
					<tr>
						<td width="30%">Kelurahan</td><td><?=$registrasi->terkini_kelurahan?></td>
					</tr>
					<tr>
						<td width="30%">Kecamatan</td><td><?=$registrasi->terkini_kecamatan?></td>
					</tr>
					<tr>
						<td width="30%">Provinsi</td><td><?=$registrasi->terkini_provinceid?></td>
					</tr>
					<tr>
						<td width="30%">Kota/Kabupaten</td><td><?=$registrasi->terkini_cityid?></td>
					</tr>
					<tr>
						<td width="30%">Kodepos</td><td><?=$registrasi->terkini_kodepos?></td>
					</tr>
					<tr>
						<td width="30%">Telepon</td><td><?=$registrasi->phone?></td>
					</tr>
					<tr>
						<td width="30%">Tujuan Investasi (Investment Objectives)</td>
						<td><?php 
							switch ($registrasi->investasi) {
							case 'IV': echo 'Investasi'; break;
							case 'PA': echo 'Apresiasi Harga'; break;
							case 'IN': echo 'Pendapatan'; break;
							case 'SP': echo 'Spekulasi'; break;
							case 'OT': echo 'Lainnya'; break;
						}
						?></td>
					</tr>
					<tr>
						<td width="30%">Pekerjaan</td><td><?=$registrasi->pekerjaan?></td>
					</tr>
					<tr>
						<td width="30%">NPWP</td><td><?=$registrasi->npwp?></td>
					</tr>
					<tr>
						<td width="30%">Nama Bank</td><td><?=$registrasi->nama_bank?></td>
					</tr>
					<tr>
						<td width="30%">Nama Pemilik Rekening</td><td><?=$registrasi->nama_pemilik?></td>
					</tr>
					<tr>
						<td width="30%">Nomor Rekening</td><td><?=$registrasi->no_rekening?></td>
					</tr>
					<tr>
						<td width="30%">Foto Buku Tabungan</td><td>
						<?php if($registrasi->fototabungan) {?>
						<a href="<?=base_url($registrasi->fototabungan)?>" target="_blank"><img src="<?=base_url($registrasi->fototabungan)?>" height="100"></a>
						<?php }?>
						</td>
					</tr>
					<tr>
						<td width="30%">Pilihan Bank RDI</td><td><?=$registrasi->bank_rdi?></td>
					</tr>
				</table>
        </div>
      </div>
      <div class="row">
        <div class="col-xs-12">
		  <p class="page-header">
		  <strong>Data Tambahan : </strong><br/>
		  </p>
				<table class="table table-striped">
					<tbody>
					<tr>
						<td width="30%">Sumber Penghasilan</td>
						<td><?php 
							switch ($registrasi->sumber_penghasilan) {
							case '1': echo 'Gaji'; break;
							case '10': echo 'Deposito'; break;
							case '11': echo 'Pinjaman'; break;
							case '14': echo 'Tax Amnesty'; break;
							case '2': echo 'Hasil Usaha'; break;
							case '3': echo 'Bunga Bank'; break;
							case '4': echo 'Warisan'; break;
							case '5': echo 'Hibah dari Orang tua'; break;
							case '6': echo 'Hibah dari Pasangan'; break;
							case '7': echo 'Uang Pensiun'; break;
							case '8': echo 'Hasil Undian'; break;
							case '9': echo 'Hasil Investasi'; break;
							case '12': echo 'Lainnya'; break;
						}
						?></td>
					</tr>
					<tr>
						<td width="30%">Penghasilan Per Bulan</td>
						<td><?php 
							switch ($registrasi->penghasilan_bulan) {
							case '1': echo '0-10 juta'; break;
							case '2': echo '5-10Juta'; break;
							case '3': echo '10-20Juta'; break;
							case '4': echo '20-50Juta'; break;
							case '5': echo '50-100Juta'; break;
							case '6': echo 'Diatas 100juta'; break;
						}
						?></td>
					</tr>
					<tr>
						<td width="30%">Penghasilan Per Tahun</td>
						<td><?php 
							switch ($registrasi->penghasilan_tahun) {
							case '00': echo '0-10 juta'; break;
							case '01': echo '10-50 juta'; break;
							case '02': echo '50-100 juta'; break;
							case '03': echo '100-500 juta'; break;
							case '05': echo '500 juta-1 Milyar'; break;
							case '06': echo 'Diatas 1 Milyar'; break;
						}
						?></td>
					</tr>
					<tr>
						<td width="30%">Kekayaan Bersih</td>
						<td><?php 
							switch ($registrasi->kekayaan) {
							case '01': echo '0-500juta'; break;
							case '02': echo '500Juta - 1Milyar'; break;
							case '03': echo '1 - 2,5Milyar'; break;
							case '04': echo '2,5 - 5Milyar'; break;
							case '05': echo '5 - 10Milyarr'; break;
							case '06': echo 'Diatas 10Milyar'; break;
						}
						?></td>
					</tr>
					<tr>
						<td width="30%">Nama Perusahaan/Universitas</td><td><?=$registrasi->nama_perusahaan?></td>
					</tr>
					<tr>
						<td width="30%">Alamat Perusahaan/Universitas</td><td><?=$registrasi->alamat_perusahaan?></td>
					</tr>
					</tr>
						<td width="30%">Nama Jalan</td><td><?=$registrasi->perusahaan_alamat?></td>
					</tr>
					<tr>
						<td width="30%">RT/RW/Perumahan</td><td><?=$registrasi->perusahaan_rtrw?></td>
					</tr>
					<tr>
						<td width="30%">Kelurahan</td><td><?=$registrasi->perusahaan_kelurahan?></td>
					</tr>
					<tr>
						<td width="30%">Kecamatan</td><td><?=$registrasi->perusahaan_kecamatan?></td>
					</tr>
					<tr>
						<td width="30%">Provinsi</td><td><?=$registrasi->perusahaan_provinceid?></td>
					</tr>
					<tr>
						<td width="30%">Kota/Kabupaten</td><td><?=$registrasi->perusahaan_cityid?></td>
					</tr>
					<tr>
						<td width="30%">Kodepos</td><td><?=$registrasi->perusahaan_kodepos?></td>
					</tr>
					<tr>
						<th width="30%">PROFIL RISIKO</th><td></td>
					</tr>
					<tr>
						<td width="30%">1. berapa lama rencana jangka waktu investasi anda?</td>
						<td><?php 
							switch ($registrasi->waktu_investasi) {
							case '5': echo '< 1 tahun'; break;
							case '10': echo '1-3 tahun'; break;
							case '15': echo '3-5 tahun'; break;
							case '20': echo '> 5 tahun'; break;
						}
						?></td>
					</tr>
					<tr>
						<td width="30%">2. apa tujuan investasi anda?</td>
						<td><?php 
							switch ($registrasi->tujuan_investasi) {
							case '5': echo 'keamanan dana investasi'; break;
							case '10': echo 'pendapatan & keamanan dana investasi'; break;
							case '15': echo 'pendapatan dan pertumbuhan jangkapanjang'; break;
							case '20': echo 'pertumbuhan'; break;
						}
						?></td>
					</tr>
					<tr>
						<td width="30%">3. berapa tingkat risiko yang dapat anda toleransi?</td>
						<td><?php 
							switch ($registrasi->dana_investasi) {
							case '5': echo '0%'; break;
							case '10': echo '< 25%'; break;
							case '15': echo '26-50%'; break;
							case '20': echo '>50%'; break;
						}
						?></td>
					</tr>
					<tr>
						<td width="30%">4. berapa % dari pendapatan anda yang akan digunakan untuk investasi?</td>
						<td><?php 
							switch ($registrasi->dana_investasi) {
							case '5': echo '< 10%'; break;
							case '10': echo '10 - 25%'; break;
							case '15': echo '26-50%'; break;
							case '20': echo '>50%'; break;
						}
						?></td>
					</tr>
					<tr>
						<td width="30%"></td><td><?=$registrasi->tempat_lahir?></td>
					</tr>
				</table>
        </div>
      </div>
      <div class="row">
        <div class="col-xs-12">
		  <p class="page-header">
		  <strong>Kuisioner : </strong><br/>
		  </p>
				<table class="table table-striped">
					<tbody>
					<tr>
						<td width="50%">Saya dan/atau anggota keluarga bekerja pada BNI Sekuritas</td>
						<td><?php 
							switch ($registrasi->kuis1) {
							case 'ya': echo 'Ya'; break;
							case 'tidak': echo 'Tidak'; break;
						}
						?></td>
					</tr>
					<tr>
						<td width="50%">Saya dan/atau anggota keluarga bekerja pada perusahaan efek, Bursa Efek, perusahaan yang diatur oleh OJK, Bank, Asuransi atau lembaga keuangan sejenis</td>
						<td><?php 
							switch ($registrasi->kuis2) {
							case 'ya': echo 'Ya'; break;
							case 'tidak': echo 'Tidak'; break;
						}
						?></td>
					</tr>
					<tr>
						<td width="50%">Saya dan/atau anggota keluarga mempunyai pengendalian pada suatu perusahaan publik atau kepemilikan terhadap saham yang dilarang</td>
						<td><?php 
							switch ($registrasi->kuis3) {
							case 'ya': echo 'Ya'; break;
							case 'tidak': echo 'Tidak'; break;
						}
						?></td>
					</tr>
					<tr>
						<td width="50%">Saya dan/atau anggota keluarga sekarang/ sebelumnya/ akan menduduki posisi/ sedang dicalonkan untuk suatu posisi publik/Politically Exposed Person (PEP)</td>
						<td><?php 
							switch ($registrasi->kuis4) {
							case 'ya': echo 'Ya'; break;
							case 'tidak': echo 'Tidak'; break;
						}
						?></td>
					</tr>
					<tr>
						<td width="50%">Saya memiliki kewarganegaraan Amerika Serikat atau Warga Negara dari daerah teritori Amerika Serikat</td>
						<td><?php 
							switch ($registrasi->kuis5) {
							case 'ya': echo 'Ya'; break;
							case 'tidak': echo 'Tidak'; break;
						}
						?></td>
					</tr>
					<tr>
						<td width="50%">Saya memiliki Green Card/ Kartu Permanen Residen, termasuk visa kerja yang masih berlaku</td>
						<td><?php 
							switch ($registrasi->kuis6) {
							case 'ya': echo 'Ya'; break;
							case 'tidak': echo 'Tidak'; break;
						}
						?></td>
					</tr>
					</tr>
						<td width="50%">Saya memiliki domisili pajak di luar Indonesia</td>
						<td><?php 
							switch ($registrasi->kuis7) {
							case 'ya': echo 'Ya'; break;
							case 'tidak': echo 'Tidak'; break;
						}
						?></td>
					</tr>
					<tr>
						<td width="50%">Saya bertindak mewakili pemilik manfaat (beneficiary owner)</td>
						<td><?php 
							switch ($registrasi->kuis8) {
							case 'ya': echo 'Ya'; break;
							case 'tidak': echo 'Tidak'; break;
						}
						?></td>
					</tr>
					<tr>
						<td width="50%">Apakah Anda dilahirkan di Amerika Serikat?</td>
						<td><?php 
							switch ($registrasi->kuis9) {
							case 'ya': echo 'Ya'; break;
							case 'tidak': echo 'Tidak'; break;
						}
						?></td>
					</tr>
					<tr>
						<td width="50%">Apakah Anda memberikan Surat Kuasa atau kewenangan tandatangan yang masih berlaku kepada seseorang yang memiliki alamat di Amerika Serikat ?</td>
						<td><?php 
							switch ($registrasi->kuis10) {
							case 'ya': echo 'Ya'; break;
							case 'tidak': echo 'Tidak'; break;
						}
						?></td>
					</tr>
					<tr>
						<td width="50%">Apakah anda memberikan instruksi otomatis untuk melakukan transfer dana ke rekening yang dikelola di Amerika Serikat ?</td>
						<td><?php 
							switch ($registrasi->kuis11) {
							case 'ya': echo 'Ya'; break;
							case 'tidak': echo 'Tidak'; break;
						}
						?></td>
					</tr>
					<tr>
						<td width="50%">Apakah Anda memiliki alamat "in care of" atau "hold mail" sebagai satu-satunya alamat ?</td>
						<td><?php 
							switch ($registrasi->kuis12) {
							case 'ya': echo 'Ya'; break;
							case 'tidak': echo 'Tidak'; break;
						}
						?></td>
					</tr>
					<tr>
						<td width="30%">Contoh Signature</td><td>
						<?php if($registrasi->signature) {?>
						<a href="<?=base_url($registrasi->signature)?>" target="_blank"><img src="<?=base_url($registrasi->signature)?>" height="100"></a>
						<?php }?>
						</td>
					</tr>
				</table>
        </div>
      </div>
      <div class="row no-print">
			<div class="col-xs-12">
				<button onclick="window.history.go(-1); return false;" type="button" class="btn btn-success">Back</button>
			</div>
      </div>
    </section>