<?php
	$admin = array('62','63','66'); 
?>
	<section class="invoice" id="invoice">
      <div class="row">
        <div class="col-xs-12">
			<p class="page-header"><img height="50" src="<?=base_url()?>images/logoblack.png"><img height="50" class="pull-right" src="<?=base_url()?>images/logobnisekblack.png"></p>
		    <h2 class="page-header">
			    <i class="fa fa-globe"></i>&nbsp;&nbsp;<?=$title?>
				<small class="pull-right"><strong>Tanggal Registrasi:</strong> <?php if($chatbot_hints->tanggal != '0000-00-00') { echo date('d-m-Y', strtotime($chatbot_hints->tanggal)); } ?></small>
			</h2>
        </div>
      </div>
      <div class="row invoice-info">
		<div class="col-sm-4 invoice-col">
			<strong>Nama Depan: </strong><?=$chatbot_hints->nama_depan?><br/>
			<strong>Nama Tengah: </strong><?=$chatbot_hints->nama_tengah?><br/>
			<strong>Nama Belakang: </strong><?=$chatbot_hints->nama_belakang?><br/>
        </div>
		<div class="col-sm-4 invoice-col">
			<strong>Warga Negara: </strong><?=$chatbot_hints->warganegara?><br/>
			<strong>Negara: </strong><?=$chatbot_hints->negara?><br/>
			<strong>Email: </strong><?=$chatbot_hints->email?><br/>
			<strong>Handphone: </strong><?=$chatbot_hints->handphone?><br/>
        </div>
		<div class="col-sm-4 invoice-col">
			<strong>Type Rekening Efek: </strong><?=$chatbot_hints->rekening_efek?><br/>
			<strong>Tipe Layanan: </strong><?=$chatbot_hints->tipe_layanan?><br/>
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
						<td width="30%">Tempat Lahir</td><td><?=$chatbot_hints->tempat_lahir?></td>
					</tr>
					<tr>
						<td width="30%">Tanggal Lahir</td><td><?php if($chatbot_hints->tanggal_lahir != '0000-00-00') { echo date('d-m-Y', strtotime($chatbot_hints->tanggal_lahir)); } ?></td>
					</tr>
					<tr>
						<td width="30%">Jenis Kelamin</td><td><?php if($chatbot_hints->jenis_kelamin == "P") { echo 'Pria'; } else { echo 'Wanita'; }?></td>
					</tr>
					<tr>
						<td width="30%">Agama</td>
						<td><?php 
							switch ($chatbot_hints->agama) {
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
						<td width="30%">Pendidikan</td><td><?=$chatbot_hints->pendidikan?></td>
					</tr>
					<tr>
						<td width="30%">Nama Ibu Kandung</td><td><?=$chatbot_hints->ibu_kandung?></td>
					</tr>
					<tr>
						<td width="30%">Status Pernikahan</td>
						<td><?php 
							switch ($chatbot_hints->status_pernikahan) {
							case 'S': echo 'Lajang'; break;
							case 'M': echo 'Menikah'; break;
							case 'R': echo 'Duda'; break;
							case 'W': echo 'Janda'; break;
						}
						?></td>
					</tr>
					<tr>
						<td width="30%">Nama Pasangan</td><td><?=$chatbot_hints->nama_pasangan?></td>
					</tr>
<?php //if($chatbot_hints->warganegara == 'WNI') { ?>
					<tr>
						<td width="30%">Nomor KTP</td><td><?=$chatbot_hints->ktp?></td>
					</tr>
					<tr>
						<td width="30%">Tempat KTP Diterbitkan</td><td><?=$chatbot_hints->ktp_tempat?></td>
					</tr>
					<tr>
						<td width="30%">Tanggal KTP Diterbitkan</td><td><?php if($chatbot_hints->ktp_terbit != '0000-00-00') { echo date('d-m-Y', strtotime($chatbot_hints->ktp_terbit)); } ?></td>
					</tr>
					<tr>
						<td width="30%">Berlaku Sampai</td>
						<td><?php
							if($chatbot_hints->ktp_berlaku_sampai == 'lifetime') { echo 'Seumur Hidup'; } else {
								if($chatbot_hints->ktp_berlaku_tanggal != '0000-00-00') { echo date('d-m-Y', strtotime($chatbot_hints->ktp_berlaku_tanggal)); }
							}
						?></td>
					</tr>
					<tr>
						<td width="30%">Foto KTP</td><td><?=$chatbot_hints->fotoktp?></td>
					</tr>
					<tr>
						<td width="30%">Foto Selfie dengan KTP</td><td><?=$chatbot_hints->fotoselfie?></td>
					</tr>
<?php //} else { ?>
					<tr>
						<td width="30%">Nomor PASSPORT</td><td><?=$chatbot_hints->paspor?></td>
					</tr>
					<tr>
						<td width="30%">Tempat PASSPORT Diterbitkan</td><td><?=$chatbot_hints->paspor_tempat?></td>
					</tr>
					<tr>
						<td width="30%">Tanggal PASSPORT Diterbitkan</td><td><?php if( isset($chatbot_hints->paspor_terbit) && ($chatbot_hints->paspor_terbit != '0000-00-00')) { echo date('d-m-Y', strtotime($chatbot_hints->paspor_terbit)); } ?></td>
					</tr>
					<tr>
						<td width="30%">Berlaku Sampai</td>
						<td><?php
							if($chatbot_hints->paspor_berlaku_sampai == 'lifetime') { echo 'Seumur Hidup'; } else {
								if(isset($chatbot_hints->paspor_berlaku_tanggal) && ($chatbot_hints->paspor_berlaku_tanggal != '0000-00-00')) { echo date('d-m-Y', strtotime($chatbot_hints->paspor_berlaku_tanggal)); }
							}
						?></td>
					</tr>
					<tr>
						<td width="30%">Foto PASSPORT</td><td><?=$chatbot_hints->fotopaspor?></td>
					</tr>
					<tr>
						<td width="30%">Nomor KITAS</td><td><?=$chatbot_hints->kitas?></td>
					</tr>
					<tr>
						<td width="30%">Tempat KITAS Diterbitkan</td><td><?=$chatbot_hints->kitas_tempat?></td>
					</tr>
					<tr>
						<td width="30%">Tanggal KITAS Diterbitkan</td><td><?php if(isset($chatbot_hints->kitas_terbit) && ($chatbot_hints->kitas_terbit != '0000-00-00')) { echo date('d-m-Y', strtotime($chatbot_hints->kitas_terbit)); } ?></td>
					</tr>
					<tr>
						<td width="30%">Berlaku Sampai</td>
						<td><?php
							if($chatbot_hints->kitas_berlaku_sampai == 'lifetime') { echo 'Seumur Hidup'; } else {
								if(isset($chatbot_hints->kitas_terbit) && ($chatbot_hints->kitas_berlaku_tanggal != '0000-00-00')) { echo date('d-m-Y', strtotime($chatbot_hints->kitas_berlaku_tanggal)); }
							}
						?></td>
					</tr>
					<tr>
						<td width="30%">Foto KITAS</td><td><?=$chatbot_hints->fotokitas?></td>
					</tr>
<?php //} ?>
					<tr>
						<th width="30%">Alamat KTP</th><td></td>
					</tr>
					<tr>
						<td width="30%">Nama Jalan</td><td><?=$chatbot_hints->ktp_alamat?></td>
					</tr>
					<tr>
						<td width="30%">RT/RW/Perumahan</td><td><?=$chatbot_hints->ktp_rtrw?></td>
					</tr>
					<tr>
						<td width="30%">Kelurahan</td><td><?=$chatbot_hints->ktp_kelurahan?></td>
					</tr>
					<tr>
						<td width="30%">Kecamatan</td><td><?=$chatbot_hints->ktp_kecamatan?></td>
					</tr>
					<tr>
						<td width="30%">Provinsi</td><td><?=$chatbot_hints->ktp_provinceid?></td>
					</tr>
					<tr>
						<td width="30%">Kota/Kabupaten</td><td><?=$chatbot_hints->ktp_cityid?></td>
					</tr>
					<tr>
						<td width="30%">Kodepos</td><td><?=$chatbot_hints->ktp_kodepos?></td>
					</tr>
					<tr>
						<th width="30%">Alamat Terkini</th><td></td>
					</tr>
						<td width="30%">Nama Jalan</td><td><?=$chatbot_hints->terkini_alamat?></td>
					</tr>
					<tr>
						<td width="30%">RT/RW/Perumahan</td><td><?=$chatbot_hints->terkini_rtrw?></td>
					</tr>
					<tr>
						<td width="30%">Kelurahan</td><td><?=$chatbot_hints->terkini_kelurahan?></td>
					</tr>
					<tr>
						<td width="30%">Kecamatan</td><td><?=$chatbot_hints->terkini_kecamatan?></td>
					</tr>
					<tr>
						<td width="30%">Provinsi</td><td><?=$chatbot_hints->terkini_provinceid?></td>
					</tr>
					<tr>
						<td width="30%">Kota/Kabupaten</td><td><?=$chatbot_hints->terkini_cityid?></td>
					</tr>
					<tr>
						<td width="30%">Kodepos</td><td><?=$chatbot_hints->terkini_kodepos?></td>
					</tr>
					<tr>
						<td width="30%">Telepon</td><td><?=$chatbot_hints->phone?></td>
					</tr>
					<tr>
						<td width="30%">Tujuan Investasi (Investment Objectives)</td>
						<td><?php 
							switch ($chatbot_hints->investasi) {
							case 'IV': echo 'Investasi'; break;
							case 'PA': echo 'Apresiasi Harga'; break;
							case 'IN': echo 'Pendapatan'; break;
							case 'SP': echo 'Spekulasi'; break;
							case 'OT': echo 'Lainnya'; break;
						}
						?></td>
					</tr>
					<tr>
						<td width="30%">Pekerjaan</td><td><?=$chatbot_hints->pekerjaan?></td>
					</tr>
					<tr>
						<td width="30%">NPWP</td><td><?=$chatbot_hints->npwp?></td>
					</tr>
					<tr>
						<td width="30%">Nama Bank</td><td><?=$chatbot_hints->nama_bank?></td>
					</tr>
					<tr>
						<td width="30%">Nama Pemilik Rekening</td><td><?=$chatbot_hints->nama_pemilik?></td>
					</tr>
					<tr>
						<td width="30%">Nomor Rekening</td><td><?=$chatbot_hints->no_rekening?></td>
					</tr>
					<tr>
						<td width="30%">Foto Buku Tabungan</td><td><?=$chatbot_hints->fototabungan?></td>
					</tr>
					<tr>
						<td width="30%">Pilihan Bank RDI</td><td><?=$chatbot_hints->bank_rdi?></td>
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
							switch ($chatbot_hints->sumber_penghasilan) {
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
							switch ($chatbot_hints->penghasilan_bulan) {
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
							switch ($chatbot_hints->penghasilan_tahun) {
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
							switch ($chatbot_hints->kekayaan) {
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
						<td width="30%">Nama Perusahaan/Universitas</td><td><?=$chatbot_hints->nama_perusahaan?></td>
					</tr>
					<tr>
						<td width="30%">Alamat Perusahaan/Universitas</td><td><?=$chatbot_hints->alamat_perusahaan?></td>
					</tr>
					</tr>
						<td width="30%">Nama Jalan</td><td><?=$chatbot_hints->perusahaan_alamat?></td>
					</tr>
					<tr>
						<td width="30%">RT/RW/Perumahan</td><td><?=$chatbot_hints->perusahaan_rtrw?></td>
					</tr>
					<tr>
						<td width="30%">Kelurahan</td><td><?=$chatbot_hints->perusahaan_kelurahan?></td>
					</tr>
					<tr>
						<td width="30%">Kecamatan</td><td><?=$chatbot_hints->perusahaan_kecamatan?></td>
					</tr>
					<tr>
						<td width="30%">Provinsi</td><td><?=$chatbot_hints->perusahaan_provinceid?></td>
					</tr>
					<tr>
						<td width="30%">Kota/Kabupaten</td><td><?=$chatbot_hints->perusahaan_cityid?></td>
					</tr>
					<tr>
						<td width="30%">Kodepos</td><td><?=$chatbot_hints->perusahaan_kodepos?></td>
					</tr>
					<tr>
						<th width="30%">PROFIL RISIKO</th><td></td>
					</tr>
					<tr>
						<td width="30%">1. berapa lama rencana jangka waktu investasi anda?</td>
						<td><?php 
							switch ($chatbot_hints->waktu_investasi) {
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
							switch ($chatbot_hints->tujuan_investasi) {
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
							switch ($chatbot_hints->dana_investasi) {
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
							switch ($chatbot_hints->dana_investasi) {
							case '5': echo '< 10%'; break;
							case '10': echo '10 - 25%'; break;
							case '15': echo '26-50%'; break;
							case '20': echo '>50%'; break;
						}
						?></td>
					</tr>
					<tr>
						<td width="30%"></td><td><?=$chatbot_hints->tempat_lahir?></td>
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
							switch ($chatbot_hints->kuis1) {
							case 'ya': echo 'Ya'; break;
							case 'tidak': echo 'Tidak'; break;
						}
						?></td>
					</tr>
					<tr>
						<td width="50%">Saya dan/atau anggota keluarga bekerja pada perusahaan efek, Bursa Efek, perusahaan yang diatur oleh OJK, Bank, Asuransi atau lembaga keuangan sejenis</td>
						<td><?php 
							switch ($chatbot_hints->kuis2) {
							case 'ya': echo 'Ya'; break;
							case 'tidak': echo 'Tidak'; break;
						}
						?></td>
					</tr>
					<tr>
						<td width="50%">Saya dan/atau anggota keluarga mempunyai pengendalian pada suatu perusahaan publik atau kepemilikan terhadap saham yang dilarang</td>
						<td><?php 
							switch ($chatbot_hints->kuis3) {
							case 'ya': echo 'Ya'; break;
							case 'tidak': echo 'Tidak'; break;
						}
						?></td>
					</tr>
					<tr>
						<td width="50%">Saya dan/atau anggota keluarga sekarang/ sebelumnya/ akan menduduki posisi/ sedang dicalonkan untuk suatu posisi publik/Politically Exposed Person (PEP)</td>
						<td><?php 
							switch ($chatbot_hints->kuis4) {
							case 'ya': echo 'Ya'; break;
							case 'tidak': echo 'Tidak'; break;
						}
						?></td>
					</tr>
					<tr>
						<td width="50%">Saya memiliki kewarganegaraan Amerika Serikat atau Warga Negara dari daerah teritori Amerika Serikat</td>
						<td><?php 
							switch ($chatbot_hints->kuis5) {
							case 'ya': echo 'Ya'; break;
							case 'tidak': echo 'Tidak'; break;
						}
						?></td>
					</tr>
					<tr>
						<td width="50%">Saya memiliki Green Card/ Kartu Permanen Residen, termasuk visa kerja yang masih berlaku</td>
						<td><?php 
							switch ($chatbot_hints->kuis6) {
							case 'ya': echo 'Ya'; break;
							case 'tidak': echo 'Tidak'; break;
						}
						?></td>
					</tr>
					</tr>
						<td width="50%">Saya memiliki domisili pajak di luar Indonesia</td>
						<td><?php 
							switch ($chatbot_hints->kuis7) {
							case 'ya': echo 'Ya'; break;
							case 'tidak': echo 'Tidak'; break;
						}
						?></td>
					</tr>
					<tr>
						<td width="50%">Saya bertindak mewakili pemilik manfaat (beneficiary owner)</td>
						<td><?php 
							switch ($chatbot_hints->kuis8) {
							case 'ya': echo 'Ya'; break;
							case 'tidak': echo 'Tidak'; break;
						}
						?></td>
					</tr>
					<tr>
						<td width="50%">Apakah Anda dilahirkan di Amerika Serikat?</td>
						<td><?php 
							switch ($chatbot_hints->kuis9) {
							case 'ya': echo 'Ya'; break;
							case 'tidak': echo 'Tidak'; break;
						}
						?></td>
					</tr>
					<tr>
						<td width="50%">Apakah Anda memberikan Surat Kuasa atau kewenangan tandatangan yang masih berlaku kepada seseorang yang memiliki alamat di Amerika Serikat ?</td>
						<td><?php 
							switch ($chatbot_hints->kuis10) {
							case 'ya': echo 'Ya'; break;
							case 'tidak': echo 'Tidak'; break;
						}
						?></td>
					</tr>
					<tr>
						<td width="50%">Apakah anda memberikan instruksi otomatis untuk melakukan transfer dana ke rekening yang dikelola di Amerika Serikat ?</td>
						<td><?php 
							switch ($chatbot_hints->kuis11) {
							case 'ya': echo 'Ya'; break;
							case 'tidak': echo 'Tidak'; break;
						}
						?></td>
					</tr>
					<tr>
						<td width="50%">Apakah Anda memiliki alamat "in care of" atau "hold mail" sebagai satu-satunya alamat ?</td>
						<td><?php 
							switch ($chatbot_hints->kuis12) {
							case 'ya': echo 'Ya'; break;
							case 'tidak': echo 'Tidak'; break;
						}
						?></td>
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