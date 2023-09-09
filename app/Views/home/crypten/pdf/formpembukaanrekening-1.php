<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title><?= $title_pdf;?></title>
        <style type="text/css">
			*{
				font-family: Arial, Helvetica, sans-serif;
				font-size: 10pt;
			}
            #table {
                font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
                border-collapse: collapse;
                width: 100%;
            }
            #table td, #table th {
                border: 0px solid #ddd;
                padding: 8px;
            }
            #table td {
				font-size: 9pt;
				vertical-align: top;
            }
            #table td.kotak {
				border: 1px solid #333;
            }
            #table tr:nth-child(even){background-color: #f2f2f2;}
            #table tr:hover {background-color: #ddd;}
            #table th {
                padding-top: 10px;
                padding-bottom: 10px;
                text-align: left;
                background-color: #215868;
                color: white;
				font-size: 10pt;
            }
			#table th img {
				float: right;
			}

			#table2 {
                border-collapse: collapse;
                width: 100%;
			}
			#table2 td.right {
				text-align: right;
			}

            #table3 {
                font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
                border-collapse: collapse;
                width: 100%;
            }
            #table3 td, #table3 th {
                border: 0px solid #ddd;
                padding: 8px;
            }
            #table3 td {
				font-size: 9pt;
				vertical-align: top;
            }
            #table3 td.kotak {
				border: 1px solid #333;
            }
            #table3 th {
                padding-top: 10px;
                padding-bottom: 10px;
                text-align: left;
                background-color: #215868;
                color: white;
				font-size: 10pt;
            }
			#table3 th img {
				float: right;
			}

        </style>
    </head>
    <body>
        <table id="table">
            <thead>
                <tr>
                    <th>FORMULIR APLIKASI PEMBUKAAN REKENING EFEK PERORANGAN<br/><i>Application Form of Securities Account Opening for Individual Customer</i></th>
                    <th><img src="<?=base_url('images/logobnisek.png')?>"></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td></td>
                </tr>
            </tbody>
        </table>
        <table id="table2">
            <tbody>
                <tr>
                    <td width="60%" >Mohon diisi dengan huruf cetak dan beri tanda &#10004; pada kotak pilihan <br/><i>(Please fill in with with block letters and mark &#10004; in the box)</i></td>
                    <td width="20%" class="right">Nomor Formulir<br/><i>(Form Number)</i></td>
                    <td width="20%">&nbsp;&nbsp;:</td>
                </tr>
            </tbody>
        </table>
        <table id="table2">
            <tbody>
                <tr>
                    <td><img width="725" src="<?=base_url('images/pendaftaran.png')?>"></td>
                </tr>
            </tbody>
        </table>
        <table id="table">
            <thead>
                <tr>
                    <th colspan="4">DATA PEMOHON <i>(Applicant Data)</i></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Nama Lengkap (Full Name)</td>
                    <td colspan="3">: <?=$registrasi->nama_depan?> <?=$registrasi->nama_tengah?> <?=$registrasi->nama_belakang?></td>
                </tr>
                <tr>
                    <td width="25%">Nama Alias (Alias)</td>
                    <td width="25%">: <?=$registrasi->nama_alias?></td>
                    <td width="25%">Tipe Investor (Investor Type)</td>
                    <td width="25%">: </td>
                </tr>
                <tr>
                    <td width="25%">Jenis Kelamin (Gender)</td>
                    <td width="25%">: <?php if($registrasi->jenis_kelamin == "L") { echo "Pria (Male)"; } else { echo "Wanita (Female)"; }?></td>
                    <td width="25%">Kewarganegaraan (Nationality)</td>
                    <td width="25%">: <?=$registrasi->warganegara?></td>
                </tr>
                <tr>
                    <td width="25%">Tempat Lahir (Place of Birth)</td>
                    <td width="25%">: <?=$registrasi->tempat_lahir?></td>
                    <td width="25%">Tanggal Lahir (Date of Birth)</td>
                    <td width="25%">: <?=date("d-m-Y", strtotime($registrasi->tanggal_lahir))?></td>
                </tr>
                <tr>
                    <td width="25%">Status Pernikahan (Marital Status)</td>
                    <td width="25%">: <?php
switch ($registrasi->status_pernikahan) {
  case "S": echo "Lajang (Single)"; break;
  case "M": echo "Menikah (Married)"; break;
  case "R": echo "Duda (Widower)"; break;
  case "W": echo "Janda (Widow)"; break;
  default:  echo ""; break;
}
					?></td>
                    <td width="25%">Nama Pasangan (Spouse Name)</td>
                    <td width="25%">: <?=$registrasi->nama_pasangan?></td>
                </tr>
                <tr>
                    <td width="25%">Nama Ibu Kandung (Mother's Name)</td>
                    <td width="25%">: <?=$registrasi->ibu_kandung?></td>
                    <td width="25%">Pendidikan Terakhir (Last Education)</td>
                    <td width="25%">: <?=$registrasi->pendidikan?></td>
                </tr>
                <tr>
                    <td width="25%">Tanda Pengenal (ID Type)</td>
                    <td width="25%">: <?php if($registrasi->warganegara == "WNI") { echo 'KTP'; } else { echo 'Passport & KITAS/KITAP'; }?></td>
                    <td width="25%">Nomor ID (ID Number)</td>
                    <td width="25%">: <?php if($registrasi->warganegara == "WNI") { echo $registrasi->ktp; }?></td>
                </tr>
                <tr>
                    <td width="25%">Tempat Diterbitkan (Issued Place)</td>
                    <td width="25%">: <?php if($registrasi->warganegara == "WNI") { echo $registrasi->ktp_tempat; }?></td>
                    <td width="25%">Tanggal Diterbitkan (Issued Date)</td>
                    <td width="25%">: <?php if($registrasi->warganegara == "WNI") { echo date("d-m-Y", strtotime($registrasi->ktp_terbit)); }?></td>
                </tr>
                <tr>
                    <td width="25%">Berlaku Sampai (Expired Date)</td>
                    <td width="25%">: <?php if($registrasi->warganegara == "WNI") { if($registrasi->ktp_berlaku_sampai == 'lifetime') { echo 'Seumur Hidup (Lifetime)'; } else { echo date("d-m-Y", strtotime($registrasi->ktp_berlaku_sampai)); } }?></td>
                    <td width="25%">No. Telp (Phone Number)</td>
                    <td width="25%">: <?=$registrasi->phone?></td>
                </tr>
                <tr>
                    <td width="25%">Handphone(Mobile Phone)</td>
                    <td width="25%">: <?=$registrasi->handphone?></td>
                    <td width="25%">Email</td>
                    <td width="25%">: <?=$registrasi->email?></td>
                </tr>
                <tr>
                    <td colspan="2"><strong>Alamat Sesuai Tanda Pengenal (Address as Stated in ID Card)</strong></td>
                    <td colspan="2"><strong>Alamat Terkini (Present Address)</strong><?php if($registrasi->alamatsama == '1') { echo '<br/>Sesuai Tanda Pengenal (Same as ID Card)'; }?></td>
                </tr>
                <tr>
                    <td width="25%">Nama Jalan (Street Name)</td>
                    <td width="25%">: <?=$registrasi->ktp_alamat?></td>
                    <td width="25%">Nama Jalan (Street Name)</td>
                    <td width="25%">: <?php if($registrasi->alamatsama == '1') { echo $registrasi->ktp_alamat; } else { echo $registrasi->terkini_alamat; }?></td>
                </tr>
                <tr>
                    <td width="25%">RT/RW/Perumahan (RT/RW/Housing)</td>
                    <td width="25%">: <?=$registrasi->ktp_rtrw?></td>
                    <td width="25%">RT/RW/Perumahan (RT/RW/Housing)</td>
                    <td width="25%">: <?php if($registrasi->alamatsama == '1') { echo $registrasi->ktp_rtrw; } else { echo $registrasi->terkini_rtrw; }?></td>
                </tr>
                <tr>
                    <td width="25%">Kelurahan (Village)</td>
                    <td width="25%">: <?=$registrasi->ktp_kelurahan?></td>
                    <td width="25%">Kelurahan (Village)</td>
                    <td width="25%">: <?php if($registrasi->alamatsama == '1') { echo $registrasi->ktp_kelurahan; } else { echo $registrasi->terkini_kelurahan; }?></td>
                </tr>
                <tr>
                    <td width="25%">Kecamatan (Sub-District)</td>
                    <td width="25%">: <?=$registrasi->ktp_kecamatan?></td>
                    <td width="25%">Kecamatan (Sub-District)</td>
                    <td width="25%">: <?php if($registrasi->alamatsama == '1') { echo $registrasi->ktp_kecamatan; } else { echo $registrasi->terkini_kecamatan; }?></td>
                </tr>
                <tr>
                    <td width="25%">Kota/Kabupaten (City)</td>
                    <td width="25%">: <?php $row = $this->tabel_model->detail('city',$registrasi->ktp_cityid); echo $row->type.' '.$row->city; ?></td>
                    <td width="25%">Kota/Kabupaten (City)</td>
                    <td width="25%">: <?php
					if($registrasi->alamatsama == '1') { $row = $this->tabel_model->detail('city',$registrasi->ktp_cityid); echo $row->type.' '.$row->city; } else { $row = $this->tabel_model->detail('city',$registrasi->terkini_cityid); echo $row->type.' '.$row->city;  }
					?></td>
                </tr>
                <tr>
                    <td width="25%">Provinsi (Province)</td>
                    <td width="25%">: <?php $row = $this->tabel_model->detail('province',$registrasi->ktp_provinceid); echo $row->province; ?></td>
                    <td width="25%">Provinsi (Province)</td>
                    <td width="25%">: <?php
					if($registrasi->alamatsama == '1') { $row = $this->tabel_model->detail('province',$registrasi->ktp_provinceid); echo $row->province; } else { $row = $this->tabel_model->detail('city',$registrasi->terkini_provinceid); echo $row->province;  }
					?></td>
                </tr>
                <tr>
                    <td width="25%">Kode Pos (Zip Code)</td>
                    <td width="25%">: <?=$registrasi->ktp_kodepos?></td>
                    <td width="25%">Kode Pos (Zip Code)</td>
                    <td width="25%">: <?php if($registrasi->alamatsama == '1') { echo $registrasi->ktp_kodepos; } else { echo $registrasi->terkini_kodepos; }?></td>
                </tr>
                <tr>
                    <td width="25%">Negara (Country)</td>
                    <td width="25%">: <?php $row = $this->tabel_model->detailcountry('country',$registrasi->negara); echo $row->country_name;?></td>
                    <td width="25%">Negara (Country)</td>
                    <td width="25%">: <?php if($registrasi->alamatsama == '1') { $row = $this->tabel_model->detailcountry('country',$registrasi->negara); echo $row->country_name; } else { echo $row = $this->tabel_model->detailcountry('country',$registrasi->negara); echo $row->country_name; }?></td>
                </tr>
            </tbody>
        </table>

        <table id="table">
            <thead>
                <tr>
                    <th colspan="4">DATA PEKERJAAN <i>(Occupation Data)</i></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Jenis Pekerjaan (Occupation Type)</td>
                    <td colspan="3">: <?=$registrasi->pekerjaan?></td>
                </tr>
                <tr>
                    <td width="25%">NPWP (Tax ID)</td>
                    <td width="25%">: <?=$registrasi->npwp?></td>
                    <td colspan="2"><?php if($registrasi->npwp == '')  { if($registrasi->no_npwp = 'belum') { echo 'Belum memiliki NPWP'; } else if($registrasi->no_npwp = 'bukan') { echo 'Bukan subjek pajak'; } } ?></td>
                </tr>
                <tr>
                    <td width="25%">Nama Tempat Bekerja (Company Name)</td>
                    <td width="25%">: <?=$registrasi->nama_perusahaan?></td>
                    <td width="25%">Lama Bekerja (Length of Work)</td>
                    <td width="25%">: </td>
                </tr>
                <tr>
                    <td width="25%">Bidang Usaha (Line of Business)</td>
                    <td width="25%">: </td>
                    <td width="25%">Jabatan (Job Position)</td>
                    <td width="25%">: </td>
                </tr>
                <tr>
                    <td width="25%">Frekuensi Penghasilan (Income Freq)</td>
                    <td width="25%">: </td>
                    <td width="25%">Kepemilikan Asset (Asset Owner)</td>
                    <td width="25%">: </td>
                </tr>
                <tr>
                    <td width="25%">Sumber Dana (Source of Funds)</td>
                    <td colspan="3">: <?php
switch ($registrasi->sumber_penghasilan) {
  case "1": echo "Gaji (Salary)"; break;
  case "10": echo "Deposito (Deposit)"; break;
  case "11": echo "Pinjaman (Loan)"; break;
  case "14": echo "Tax Amnesty"; break;
  case "2": echo "Hasil Usaha (Business Profit)"; break;
  case "3": echo "Bunga Bank (Bank Interest)"; break;
  case "4": echo "Warisan (Heritage)"; break;
  case "5": echo "Hibah dari Orang tua (Grant From Parent)"; break;
  case "6": echo "Hibah dari Pasangan (Grant From Spouse)"; break;
  case "7": echo "Uang Pensiun (Pension Fund)"; break;
  case "8": echo "Hasil Undian (Lottery)"; break;
  case "9": echo "Hasil Investasi (Investment Return)"; break;
  case "12": echo "Lainnya (Others)"; break;
  default:  echo ""; break;
}
					?></td>
                </tr>
                <tr>
                    <td width="25%">Penghasilan Per Bulan (Monthly Income)</td>
                    <td colspan="3">: <?php
switch ($registrasi->penghasilan_bulan) {
  case "1": echo "0-10 juta"; break;
  case "2": echo "5-10Juta"; break;
  case "3": echo "10-20Juta"; break;
  case "4": echo "20-50Juta"; break;
  case "5": echo "50-100Juta"; break;
  case "6": echo "Diatas 100juta"; break;
  default:  echo ""; break;
}
					?></td>
                </tr>
                <tr>
                    <td width="25%">Penghasilan Rata-rata Per Tahun (Average Income Per Years)</td>
                    <td colspan="3">: <?php
switch ($registrasi->penghasilan_tahun) {
  case "00": echo "0-10 juta"; break;
  case "01": echo "10-50 juta"; break;
  case "02": echo "50 - 100 juta"; break;
  case "03": echo "100-500 juta"; break;
  case "05": echo "500 juta-1 Milyar"; break;
  case "06": echo "Diatas 1 Milyar"; break;
  default:  echo ""; break;
}
					?></td>
                </tr>
                <tr>
                    <td width="25%">Kekayaan Bersih (Net Worth)</td>
                    <td colspan="3">: <?php
switch ($registrasi->kekayaan) {
  case "01": echo "0-500juta"; break;
  case "02": echo "500Juta - 1Milyar"; break;
  case "03": echo "1 - 2,5Milyar"; break;
  case "04": echo "2,5 - 5Milyar"; break;
  case "05": echo "5 - 10Milyar"; break;
  case "06": echo "Diatas 10Milyar"; break;
  default:  echo ""; break;
}
					?></td>
                </tr>
                <tr>
                    <td colspan="4"><strong>Alamat Perusahaan/Universitas (Company/University Address)</strong></td>
                </tr>
                <tr>
                    <td width="25%">Nama Jalan (Street Name)</td>
                    <td colspan="3">: <?=$registrasi->perusahaan_alamat?></td>
                </tr>
                <tr>
                    <td width="25%">RT/RW/Perumahan (RT/RW/Housing)</td>
                    <td width="25%">: <?=$registrasi->perusahaan_rtrw?></td>
                    <td width="25%">Kelurahan (Village)</td>
                    <td width="25%">: <?=$registrasi->perusahaan_kelurahan?></td>
                </tr>
                <tr>
                    <td width="25%">Kecamatan (Sub-District)</td>
                    <td width="25%">: <?=$registrasi->perusahaan_kecamatan?></td>
                    <td width="25%">Kota/Kabupaten (City)</td>
                    <td width="25%">: <?php $row = $this->tabel_model->detail('city',$registrasi->perusahaan_cityid); echo $row->type.' '.$row->city; ?></td>
                </tr>
                <tr>
                    <td width="25%">Provinsi (Province)</td>
                    <td width="25%">: <?php $row = $this->tabel_model->detail('province',$registrasi->perusahaan_provinceid); echo $row->province; ?></td>
                    <td width="25%">Kode Pos (Zip Code)</td>
                    <td width="25%">: <?=$registrasi->perusahaan_kodepos?></td>

                </tr>
                <tr>
                    <td width="25%">Telepon Kantor (Company Phone)</td>
                    <td width="25%">: </td>
                    <td width="25%">Fax Kantor (Company Fax)</td>
                    <td width="25%">: </td>
                </tr>
                <tr>
                    <td width="25%">Negara (Country)</td>
                    <td colspan="3">: <?php $row = $this->tabel_model->detailcountry('country',$registrasi->negara); echo $row->country_name;?></td>
                </tr>
            </tbody>
        </table>

        <table id="table">
            <thead>
                <tr>
                    <th colspan="2">DATA REKENING BANK <i>(Bank Account Data)</i></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td width="25%">Nama Bank (Bank Name)</td>
                    <td>: <?php
switch ($registrasi->nama_bank) {
  case "BNI": echo "PT. BANK NEGARA INDONESIA"; break;
  case "UOBB": echo "PT. BANK UOB BUANA TBK"; break;
  case "WIND": echo "PT. BANK CHINA CONSTRUCTION BANK INDONESIA TBK"; break;
  case "CAPT": echo "PT. BANK CAPITAL INDONESIA"; break;
  case "CENT": echo "PT. BANK CENTURY TBK"; break;
  case "CITI": echo "CITIBANK NA"; break;
  case "COMW": echo "PT. BANK COMMONWEALTH"; break;
  default:  echo ""; break;
}
					?></td>
                </tr>
                <tr>
                    <td>Nomor Rekening Bank (Account No)</td>
                    <td>: <?=$registrasi->no_rekening?></td>
                </tr>
                <tr>
                    <td>Nama Pemilik Rekening (Account Name)</td>
                    <td>: <?=$registrasi->nama_pemilik?></td>
                </tr>
            </tbody>
        </table>

        <table id="table">
            <thead>
                <tr>
                    <th colspan="2">LATAR BELAKANG DAN TUJUAN INVESTASI <i>(Investment Background and Objective)</i></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td width="25%">Tujuan Investasi (Investment Objectives)</td>
                    <td>: <?php
switch ($registrasi->tujuan_investasi) {
  case "5": echo "keamanan dana investasi"; break;
  case "10": echo "pendapatan & keamanan dana investasi"; break;
  case "15": echo "pendapatan dan pertumbuhan jangkapanjang"; break;
  case "20": echo "pertumbuhan"; break;
  default:  echo ""; break;
}
					?></td>
                </tr>
                <tr>
                    <td>Alamat Korespondensi (Correspondence)</td>
                    <td>: </td>
                </tr>
            </tbody>
        </table>
        <table id="table">
            <tbody>
                <tr>
                    <td>Mohon melampirkan (Please Enclose a copy of)</td>
                    <td></td>
                </tr>
                <tr>
                    <td>1. KTP yang masih berlaku untuk WNI (Valid ID card for WNI)<br/>2. PASPPORT yang berlaku Untuk WNA (Valid Paspport for WNA)</td>
                    <td>3. KITAS/KITAP yang berlaku Untuk WNA (Valid KITAS/KITAP for WNA)<br/>4. NPWP (Tax Number Identification)</td>
                </tr>
            </tbody>
        </table>

        <table id="table">
            <thead>
                <tr>
                    <th colspan="3">INFORMASI LAIN-LAIN <i>(Miscellaneous Information)</i></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td width="5%">1.</td>
                    <td width="65%">Apakah anda dan atau anggota keluarga (termasuk orang tua/saudara kandung) bekerja di PT BNI Sekuritas ? (Are you any of your relatives (including parent/sibling) working for PT BNI Sekuritas.?)</td>
                    <td width="30%"><?=$registrasi->kuis1?> <?php if($registrasi->kuis1 == 'ya') { echo '<br/>Nama (Name) : '.$registrasi->kuis1_nama.'<br/>Bagian (Department) :'.$registrasi->kuis1_bagian; } ?></td>
                </tr>
                <tr>
                    <td width="5%">2.</td>
                    <td width="65%">Apakah anda mempunyai saudara atau anggota keluarga (ternasuk orang tua/saudara kandung) yang bekerja pada perusahaan Efek, Bursa, Badan Pengawas Pasar Modal dan Lembaga Jasa Keuangan atau sejenis? <i>(Do you have any relatives (including parent/sibling) working in other securities company, Stock Exchange, other company under supervisor of Indonesian Stock Exchange, Indonesian Financial Service Authority or other similar financial institution.?)</i></td>
                    <td width="30%"><?=$registrasi->kuis2?> <?php if($registrasi->kuis2 == 'ya') { echo '<br/>Nama (Name) : '.$registrasi->kuis2_nama.'<br/>Nama Perusahaan (Company Name) :'.$registrasi->kuis2_perusahaan; } ?></td>
                </tr>
                <tr>
                    <td width="5%">3.</td>
                    <td width="65%">Apakah anda mempunyai saudara atau anggota keluarga (termasuk orangtua/saudara kandung samoai dengan derajat ketiga) yang mempunyai status sebagai Direktur atau mempunyai pengendalian pada suatu perusahaan public atau kepemilikan terhadap saham yang dilarang? <i>(Do you have any relatives being an employee of a company, Director or having control to any public company or having prohibiled stock?)</i></td>
                    <td width="30%"><?=$registrasi->kuis3?> <?php if($registrasi->kuis3 == 'ya') { echo '<br/>Nama (Name) : '.$registrasi->kuis3_nama.'<br/>Nama Perusahaan (Company Name) :'.$registrasi->kuis3_perusahaan; } ?></td>
                </tr>
                <tr>
                    <td width="5%">4.</td>
                    <td colspan="2">Apakah anda mempunyai pasangan, anggota keluarga (termasuk orang tua/saudara kandung) sekarang/sebelumnya yang akan menduduki posisi sebagai pejabat atau calon untuk suatu posisi public/Politically Exposed Person (PEP)? <i>(Are you or your spouse, family member (including parent/sibling) now/previously/ will hold be nomunated for any position exposed to public (PEP).?)</i>
					<br/><br/><strong><?=$registrasi->kuis4?></strong><?php if($registrasi->kuis4 == 'ya') { echo '<br/>Nama (Name) : '.$registrasi->kuis4_nama.'<br/>Lembaga (Institution) :'.$registrasi->kuis4_lembaga; } ?>
					<br/><br/>
					Jika jawaban "Ya" silahkan melengkapi Formulir Uji Tuntas (EDD)<i>(Please complete ENHANCED DUE DILIGENCE FORM form, if any answer of above question is "Yes")</i>
					</td>
                </tr>
                <tr>
                    <td width="5%">5.</td>
                    <td colspan="2">
					<ol type="a">
						<li>Apakah anda Warga Negara Amerika Serikat atau Warga Negara dari daerah territory Amerika Serikat? <i>(Are you a U.S. Citizen of a.U.S Territory?)</i>&nbsp;&nbsp;<strong><?=$registrasi->kuis5?></strong>
						</li>
						<li>Apakah anda merupakan pemilik Green Card/Kartu Permanen Residen termasuk pemilik visa kerja yang masih berlaku?<i>(Do you have hold a U.S. Permanent Resident Card (Green Card) including a current work permit?)</i>&nbsp;&nbsp;<strong><?=$registrasi->kuis6?></strong></li>
					</ol>
					Jika salah satu jawaban adalah "Ya" silahkan melengkapi FORM W-9<i>(Please complete the W-9 form, if any answer of above question is "Yes")</i>
					</td>
                </tr>
                <tr>
                    <td width="5%">6.</td>
                    <td colspan="2">
					<ol type="a">
						<li>Apakah anda dilahirkan di Amerika Serikat? <i>(Are you Born in U.S)?</i>&nbsp;&nbsp;<strong><?=$registrasi->kuis7?></strong>
						</li>
						<li>Apakah anda memiliki alamat dan/atau alamat korespodensi dan/atau PO BOX di Amerika Serikat? <i>(Do you have a U.S. residence and/or U.S. correspondence and/or U.S. PO BOX.?)</i>&nbsp;&nbsp;<strong><?=$registrasi->kuis8?></strong></li>
						<li>Apakah anda memberikan Surat Kuasa atau kewenangan tandatangan yang masih berlaku kepada seseorang yang memiliki alamat di Amerika Serikat? <i>(Do you grant any effective Power of Attorney (POA) or signatory authority to a person with U.S address?)</i>&nbsp;&nbsp;<strong><?=$registrasi->kuis9?></strong></li>
						<li>Apakah anda memberikan instruksi otomatis untuk melakukan transfer dana ke rekening yang dikelola di Amerika Serikat? <i>(Do you give any standing instructions to transfer funds to U.S. account?)</i>&nbsp;&nbsp;<strong><?=$registrasi->kuis10?></li>
						<li>Apakah anda memiliki alamat "in care of" atau "hold mail" sebagai satu-satunya alamat? <i>(Do you have an "in care of" or "hold mail" address as the sole address?)</i>&nbsp;&nbsp;<strong><?=$registrasi->kuis11?></li>
					</ol>
					Jika salah satu jawaban di atas adalah "Ya", silahkan melengkapi Formulir W-8BEN-E <i>(Please complete the Form W-8BEN-E, if any answer of above question is "Yes")</i></i>
					</td>
                </tr>
                <tr>
                    <td width="5%">7.</td>
                    <td width="65%">Apakah anda memiliki domisili pajak di luar Indonesia? <i>(Do you have a tax residence outside Indonesia?)</i><br/><br/>
					Jika "Ya", silahkan melengkapi Surat Pernyataan Nasabah Asing <i>(Please complete the Individual-Self Certification, if answer of above question is "Yes")</i></td>
                    <td width="30%"><?=$registrasi->kuis12?></td>
                </tr>
                <tr>
                    <td width="5%">8.</td>
                    <td width="65%">Apakah anda bertindak untuk kepentingan Pemilik Manfaat? <i>(Are you acting on behalf of Beneficial Owner?)</i><br/><br/>
					Jika "Ya" silahkan melengkapi Surat Pernyataan Pemilik Manfaat (Bagi Nasabah Perorangan) <i>(Please complete Statement Letter - Beneficial Owner (for Individual Customer), if any answer of above question is "Yes")</i></td>
                    <td width="30%"><?=$registrasi->kuis13?></td>
                </tr>
            </tbody>
        </table>
		<hr>
        <table id="table">
            <thead>
                <tr>
                    <th colspan="4">PERNYATAAN NASABAH (Customer Declaration)</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td colspan="2">Dengan ini saya/kami menyatakan bahwa :</td>
                    <td colspan="2">I / We hereby declare that :</td>
                </tr>
                <tr>
                    <td width="5%">1.</td>
                    <td width="45%">Semua informasi yang tercantum pada formulir ini adalah benar dan sah;
bilamana di kemudian hari terdapat tuntutan dalam bentuk apapun dari
pihak ketiga manapun atas transaksi dan/atau rekening (-rekening)
saya/kami terhadap PT BNI Sekuritas, maka saya/kami bertanggung jawab
penuh atas segala tuntutan pihak ketiga tersebut baik yang bersifat kasus
perdata maupun pidana;</td>
                    <td width="5%">1.</td>
                    <td width="45%">All information stated in this form are true and valid; if subsequently there is
any claims in any form whatsoever from any third party on transaction
and/or my/our account(s) to PT BNI Sekuritas, then I/we are fully liable on
such claims of the third party, either in the nature of civil or criminal case;</td>
                </tr>
                <tr>
                    <td width="5%">2.</td>
                    <td width="45%">Semua penyetoran dana hanya ditujukan kepada rekening Bank atas nama
dan yang telah ditunjuk oleh PT BNI Sekuritas;</td>
                    <td width="5%">2.</td>
                    <td width="45%">All payments of fund may only be deposited to a bank account designated by
and registered on behalf of PT BNI Sekuritas;</td>
                </tr>
                <tr>
                    <td width="5%">3.</td>
                    <td width="45%">Semua penyetoran Efek hanya ditujukan kepada rekening Efek atas nama PT
BNI Sekuritas di Lembaga Penyimpanan dan Penyelesaian (LPP);</td>
                    <td width="5%">3.</td>
                    <td width="45%">All Securities deposit may only be addressed to the Securities account of PT
BNI Sekuritas in the Depository and Settlement Institution (LPP);</td>
                </tr>
                <tr>
                    <td width="5%">4.</td>
                    <td width="45%">Saya/kami memberi wewenang penuh kepada PT BNI Sekuritas untuk
melakukan identifikasi dan verifikasi semua informasi tersebut, termasuk
dengan menggunakan data saya/kami yang ada pada Bank RDN (Rekening
Dana Nasabah);</td>
                    <td width="5%">4.</td>
                    <td width="45%">I/We granted full authority to PT BNI Sekuritas to identify and verify of such
all information, including using my/our data in IFA (Investor Fund Account)
Bank;</td>
                </tr>
                <tr>
                    <td width="5%">5.</td>
                    <td width="45%">Saya/kami mengerti bahwa persetujuan pembukaan rekening dapat
dipertimbangkan untuk diberikan berdasarkan informasi dalam formulir ini
dan syarat-syarat perjanjian lainnya. Namun demikian PT BNI Sekuritas
mempunyai hak untuk menolak aplikasi ini tanpa adanya keharusan untuk
memberikan alasan;</td>
                    <td width="5%">5.</td>
                    <td width="45%">I/We understood that the approval on opening account may be considered to
be granted based on the information contained in this form and the
conditions of other agreement. However, PT BNI Sekuritas is entitled to reject
this application without any obligation to provide the reason.</td>
                </tr>
                <tr>
                    <td width="5%">6.</td>
                    <td width="45%">Semua sumber dana yang saya gunakan dalam transaksi pembelian efek
bukan didapatkan atau berasal dari pencucian uang (Money Laundering)
atau kegiatan lain yang melanggar hukum;</td>
                    <td width="5%">6.</td>
                    <td width="45%">All sources of fund used in the securities purchasing transactions are not
obtained/originated from money laundering practices or any unlawful actions</td>
                </tr>
                <tr>
                    <td width="5%">7.</td>
                    <td width="45%">Tidak akan menggunakan rekening efek yang akan dibuka sebagai sarana
untuk melakukan tindakan yang dapat dikategorikan melanggar hukum
termasuk namun tidak terbatas pada tindakan pidana pencucian uang;</td>
                    <td width="5%">7.</td>
                    <td width="45%">I/We shall not use the securities account to be opened as the means of doing
any unlawful actions, including but not limited to the criminal action
considered as money laundering.</td>
                </tr>
                <tr>
                    <td width="5%">8.</td>
                    <td width="45%">Saya/kami memberikan persetujuan dan kuasa kepada PT BNI Sekuritas
untuk menggunakan, mengungkapkan, dan memberikan data saya/kami dan
data keuangan saya/kami dalam hal saya/kami merupakan wajib pajak
Amerika Serikat yang terdapat pada PT BNI Sekuritas kepada pihak lain yang
berwenang dalam rangka pemenuhan ketentuan Foreign Account Tax
Compliance Act (FATCA);</td>
                    <td width="5%">8.</td>
                    <td width="45%">I / We give consent and authorize PT BNI Sekuritas to use, disclose, and
provide my / our data and my / our financial data in case I am / We are a
United States taxpayer in PT BNI Sekuritas to other authorities in order to
fulfill the regulations of the Foreign Account Tax Compliance Act (FATCA);</td>
                </tr>
                <tr>
                    <td width="5%">9.</td>
                    <td width="45%">Saya/kami telah melakukan proses tatap muka dengan PT BNI Sekuritas
melalui petugas yang berwenang, dilaksanakan pada saat penandatangan
kontrak kenasabahan.</td>
                    <td width="5%">9.</td>
                    <td width="45%">I / we have conducted a face-to-face process with PT BNI Sekuritas through
the authorized officer, carried out at the time of signing the legal contract.</td>
                </tr>
            </tbody>
        </table>
		<hr>
        <table id="table">
            <thead>
                <tr>
                    <th colspan="4">PERNYATAAN DAN KUASA (Statement and Authorization)</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td colspan="2">Ketentuan dan prosedur pelaksanaan mengenai Rekening Investor selanjutnya,
diatur dalam Syarat dan Ketentuan Pembukaan Rekening Investor yang menjadi
lampiran dari Formulir Aplikasi Pembukaan Rekening Investor dan mengikat
Pemohon.<br/>
Dengan ditandatanganinya Formulir Aplikasi Pembukaan Rekening Investor ini,
maka Pemohon menyatakan dan memberi kuasa sebagai berikut :</td>
                    <td colspan="2">Contract conditions and implementation procedures regarding Investor Account
will be arranged in the Investor Account Opening Terms and Conditions that will
be the attachment of the Investor Account Opening Application Form and it will
bind the Applicant.<br/>
By signing this Investor Account Opening Application Form, then the applicant
states and authorizes the following:</td>
                </tr>
                <tr>
                    <td width="5%">1.</td>
                    <td width="45%">
					Pemohon dengan ini menyatakan bahwa :
					<ol type="a">
					<li>Seluruh data dan informasi yang dicantumkan dalam Formulir Aplikasi
Pembukaan Rekening Investor adalah benar, lengkap, dan sah, dan Bank
diberi hak untuk memeriksa dan melakukan verifikasi atas kebenaran,
kelengkapan, dan keabsahan dari setiap data dan informasi dalam
Formulir Aplikasi Pembukaan Rekening Investor ini.</li>
					<li>Pemohon telah diberikan informasi yang cukup dan memadai perihal
karakteristik produk Rekening Investor yang akan dimanfaatkan oleh
Pemohon, dan Pemohon mengerti serta memahami segala konsekuensi
pemanfaatan produk Rekening Investor, termasuk manfaat, risiko, dan
biaya-biaya (bila ada) yang melekat pada produk Rekening Investor.</li>
					<li>Pemohon telah menerima, membaca, mengerti dan menyetujui isi
Ketentuan Umum dan Persyaratan Pembukaan Rekening Investor
sebagaimana terlampir dari Formulir Aplikasi Pembukaan Rekening
Investor, dengan ini Pemohon menyatakan tunduk dan terikat dengan
ketentuan-ketentuan tersebut, serta ketentuan lain terkait
produk/fasilitas Rekening Investor yang berlaku di Bank beserta segala
bentuk perubahannya yang akan diberitahukan dengan sarana yang
ditetapkan Bank.</li>
					</ol>
					</td>
                    <td width="5%">1.</td>
                    <td width="45%">
					The applicant hereby declares that:
					<ol type="a">
					<li>All data and information set forth in the Investor Account Opening
Application Form is true, complete, and valid, and the Bank was
granted the right to inspect and verify the correctness, completeness,
and validity of any data and information in this Investor Account
Opening Application Form.</li>
					<li>Applicant has been provided sufficient and adequate information
concerning product characteristics of the Investor Account that will be
utilized by the Applicant, and the applicant understands the
consequences of Investor Account product utilization, including
benefits, risks, and costs (if any) attached to the Investor Account
product.</li>
					<li>Applicant has received, read, understood and agreed to the contents of
the General Terms and Conditions as attached in this Investor Account
Opening Application Form, therefore the Applicant states to subject to
and bound by such provisions, and other provisions related to Investor
Account products / facilities applicable within the Bank and all forms of
amendment which will be notified by means determined by Bank.</li>
					</ol>
					</td>
                </tr>
                <tr>
                    <td width="5%">2.</td>
                    <td width="45%">
					Pemohon dengan ini memberi kuasa kepada pihak-pihak di bawah ini untuk
melakukan tindakan-tindakan sebagai berikut :					
					<ol type="a">
					<li>Memberikan kuasa kepada Bank untuk melakukan pemblokiran dan atau
penutupan rekening, apabila menurut pertimbangan Bank :
						<ol type="1">
							<li>Pemohon tidak mematuhi ketentuan Prinsip Mengenal Nasabah
(Knowing Your Customer);</li>
							<li>Data yang Pemohon berikan kepada Bank tidak benar atau diragukan
kebenarannya;</li>
							<li>Pemohon menyalahgunakan rekening.</li>
						</ol>
					</li>
					<li>Memberikan kuasa kepada PT. BNI Sekuritas (BNIS) untuk melakukan
tindakan-tindakan sebagai berikut :
						<ol type="1">
							<li>Memperoleh informasi tentang saldo dan mutasi rekening yang
terdapat pada Rekening Investor sehubungan dengan kegiatan
penyelesaian transaksi efek Pemohon pada BNIS melalui sarana
perbankan yang disediakan Bank.</li>
							<li>Melakukan segala tindakan-tindakan berkenaan dengan
pengoperasian Rekening Investor, termasuk memberikan instruksi
pemindahbukuan atau pendebitan seluruh dana atau sejumlah dana
tertentu yang terdapat dalam Rekening Investor, untuk penyelesaian
pembayaran dalam rangka penyelesaian transaksi efek Pemohon.</li>
						</ol>
					</li>
					<li>Memberikan kuasa kepada Bank untuk memberikan akses kepada PT.
Kustodian Sentral Efek Indonesia (KSEI) melalui sarana elektronik perihal
informasi mengenai saldo dan mutasi rekening yang terdapat pada
Rekening Investor, sehubungan dengan kegiatan penyelesaian transaksi
efek Investor melalui KSEI</li>
					<li>Memberikan kuasa kepada Bank untuk melakukan menutup rekening
apabila Rekening Investor tidak aktif dan bersaldo nihil selama enam
bulan berturut-turut serta berdasarkan data yang ada di PT. BNI Sekuritas
(BNIS) bahwa Pemohon/Nasabah tidak melakukan transaksi efek di BNIS.</li>
					</ol>
					</td>
                    <td width="5%">2.</td>
                    <td width="45%">
					Applicant hereby authorizes the parties below to perform the following actions:
					<ol type="a">
					<li>Authorize the Bank to suspend and or closing accounts, if in the opinion of
the Bank:
						<ol type="1">
							<li>he applicant does not comply with the Know Your Customer
provision;</li>
							<li>The data given to the Bank by the applicant is incorrect or doubtful;</li>
							<li>The applicant misuses the account.</li>
						</ol>
					</li>
					<li>Authorize PT. BNI Sekuritas (BNIS) to perform following actions:
						<ol type="1">
							<li>Obtain information about account balances and transfer contained
in the Investor Account in connection with the Applicant's securities
settlement activity in BNIS through banking facilities provided by the
Bank.</li>
							<li>Perform all actions with respect to the operation of the Investor
Account, including sending debit or transfer instruction of the entire
fund or a specific funds contained in the Investor Account, for the
purpose of payment settlement in order to settle the Applicant's
securities transaction.</li>
						</ol>
					</li>
					<li>Authorize the Bank to provide access to the Indonesian Central Securities
Depository (KSEI) through electronic means, regarding information on
account balances and mutation found in the Account Investor, in
connection with Investor's securities transaction settlement activities
through KSEI.</li>
					<li>Authorize the Bank to close the account if the Investor Account is not
active and nil balance for six consecutive months, and also based on
existing data in PT. BNI Sekuritas (BNIS) that the Applicant / Customer does
not conduct transactions in securities BNIS.</li>
					<ol>
					</td>
                </tr>
                <tr>
                    <td width="5%">3.</td>
                    <td width="45%">Pemberian akses dan informasi mengenai saldo dan mutasi rekening yang
terdapat pada Rekening Investor sebagaimana dimaksud angka 2 huruf b, c
dan d di atas bukanlah merupakan pelanggaran atas ketentuan Rahasia Bank
sebagaimana diatur dalam Undang-Undang Nomor 7 tahun 1992 tentang
Perbankan sebagaimana telah diubah dengan Undang-Undang Nomor 10
tahun 1998, berikut segenap peraturan pelaksanaannya dan perubahanperubahannya.</td>
                    <td width="5%">3.</td>
                    <td width="45%">Providing access and information regarding account balances and transfer
found in the Investor Account referred to item 2 letter b and c above, is not
a violation to the Bank Secrecy Provisions as stipulated by Act No. 7 Tahun
1992 regarding Banking, which was amended by Act No. 10 of 1998,
following all implementing regulations.</td>
                </tr>
                <tr>
                    <td width="5%">4.</td>
                    <td width="45%">Pemohon menjamin serta membebaskan Bank dari segala kewajiban,
tuntutan, gugatan dan klaim apapun serta dari pihak manapun, termasuk
Pemohon sendiri, serta dari segala kerugian dan resiko yang mungkin timbul
di kemudian hari sehubungan dengan pelaksanaan tindakan-tindakan
sebagaimana dimaksud dalam pernyataan dan kuasa Pemohon ini.</td>
                    <td width="5%">4.</td>
                    <td width="45%">Applicant guarantees as well as relieves the Bank from any liability, claims,
lawsuits and claims of any kind and from any party, including the Applicant
him/herself, and from all losses and risks that may arise later in connection
with the implementation of measures referred to this Applicant's statement
and authorization.</td>
                </tr>
            </tbody>
        </table>
		<hr>
        <table id="table">
            <tbody>
                <tr>
                    <td><center>
					<?php $row = $this->tabel_model->detail('city',$registrasi->ktp_cityid); echo $row->type.' '.$row->city; ?>, <?=date("d-m-Y", strtotime($registrasi->tanggal))?>
					<br/><br/><br/><br/>
					<?=$registrasi->nama_depan?> <?=$registrasi->nama_tengah?> <?=$registrasi->nama_belakang?>
					<br/>Nama jelas, tanda tangan, dan meterai
					<br/>(Name, Signature, and Stamp Duty)
					</center></td>
                </tr>
            </tbody>
        </table>
		<br/>
        <table id="table">
            <tbody>
                <tr>
                    <td width="20%"></td>
                    <td width="30%" class="kotak"><center>
					*)Tanda Tangan Nasabah
					(Client Signature)
					<br/><br/><br/><br/>
					Nama (Name)
					</center></td>
                    <td width="30%" class="kotak"><center>
					*)Tanda Tangan Nasabah
					(Client Signature)
					<br/><br/><br/><br/>
					Nama (Name)
					</center></td>
                    <td width="20%"></td>
                </tr>
            </tbody>
        </table>
		<br/><br/>
        <table id="table">
            <tbody>
                <tr>
                    <td colspan="4">*) Contoh TandaTangan Nasabah Sesuai Dengan Data Indentitas Diri (Example of customer signature in accordance with the Personal Identity Data)</td>
                </tr>
            </tbody>
        </table>

<br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>

        <table id="table3">
            <thead>
                <tr>
                    <th colspan="6">KETENTUAN UMUM DAN PERSYARATAN PEMBUKAAN REKENING (GENERAL TERMS AND CONDITIONS) KHUSUS UNTUK BNI (ONLY FOR BNI)</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td colspan="3">Dengan ini Pemohon menyatakan tunduk dan mentaati semua Ketentuan
Umum dan Persyaratan Pembukaan Rekening Investor yang berlaku di PT.
Bank Negara Indonesia (Persero) Tbk, selanjutnya disebut Bank,
sebagaimana disebutkan di bawah ini :</td>
                    <td colspan="3"><i>Dengan ini Pemohon menyatakan tunduk dan mentaati semua Ketentuan
Umum dan Persyaratan Pembukaan Rekening Investor yang berlaku di PT.
Bank Negara Indonesia (Persero) Tbk, selanjutnya disebut Bank,
sebagaimana disebutkan di bawah ini :</i></td>
                </tr>
                <tr>
                    <td width="5%">A</td>
                    <td colspan="2">Rekening</td>
                    <td width="5%">A</td>
                    <td colspan="2"><i>Rekening</i></td>
                </tr>
                <tr>
                    <td width="5%"></td>
                    <td width="5%">1.</td>
                    <td width="40%">Rekening Investor adalah rekening giro, baik perorangan maupun
non perorangan, yang dibuka khusus untuk penyelesaian
transaksi efek Nasabah atas permohonan tertulis dari Pemohon
atau dengan cara lain menurut tata cara yang ditentukan oleh
Bank dan memenuhi segala persyaratan sebagaimana ditentukan
oleh Bank.</td>
                    <td width="5%"></td>
                    <td width="5%">1.</td>
                    <td width="40%"><i>Investor's account is a current account, for both individuals
and non individuals, which is opened specifically for Customer's
securities transactions settlement upon the Applicant's written
instruction or by other means according to the procedure
prescribed by the Bank and meet all requirements as
determined by the Bank.</i></td>
                </tr>
                <tr>
                    <td width="5%"></td>
                    <td width="5%">2.</td>
                    <td width="40%">Jenis mata uang yang dapat digunakan untuk membuka
Rekening Investor adalah mata uang Rupiah, atau mata uang
asing (valas) yang ditentukan Bank. Dalam hal rekening dibuka
dengan mata uang asing (valas), maka Bank tidak
bertanggungjawab atas perubahan nilai mata uang asing tersebut
terhadap nilai rupiah.</td>
                    <td width="5%"></td>
                    <td width="5%">2.</td>
                    <td width="40%"><i>Type of currency that can be used to open an Investor Account
is Rupiah, or foreign currency (forex) determined by the Bank.
In the case of an accounts opened in foreign currency (forex),
then the Bank is not responsible for changes in the foreign
currency value to Rupiah</i></td>
                </tr>
                <tr>
                    <td width="5%"></td>
                    <td width="5%">3.</td>
                    <td width="40%">Pemohon yang membuka Rekening Investor di Bank dapat
berbentuk perorangan maupun non perorangan (badan
usaha/badan hukum).</td>
                    <td width="5%"></td>
                    <td width="5%">3.</td>
                    <td width="40%"><i>Applicants who open Investor Account at the Bank can take
the form of individuals and non individuals (business entity /
legal entity).</i></td>
                </tr>
                <tr>
                    <td width="5%"></td>
                    <td width="5%">4.</td>
                    <td width="40%">Bilamana Pemohon membuka lebih dari satu Rekening pada
Bank, maka seluruh rekening tersebut disetujui oleh nasabah
sebagai satu kesatuan.</td>
                    <td width="5%"></td>
                    <td width="5%">4.</td>
                    <td width="40%"><i>Whereby the applicant to open more than one account at the
Bank, all accounts are approved by the client as a single entity.</i></td>
                </tr>
                <tr>
                    <td width="5%"></td>
                    <td width="5%">5.</td>
                    <td width="40%">Bank atas kebijakannya sendiri berhak menolak permohonan
pembukaan Rekening Investor tanpa berkewajiban untuk
mengemukakan alasannya kepada Pemohon.</td>
                    <td width="5%"></td>
                    <td width="5%">5.</td>
                    <td width="40%"><i>Bank at its sole discretion has the right to refuse the
application of Investor Account opening without obliged to put
forward the reasons to the Applicant.</i></td>
                </tr>

                <tr>
                    <td width="5%">B</td>
                    <td colspan="2">Pembukaan Rekening Investor</td>
                    <td width="5%">B</td>
                    <td colspan="2"><i>Investor Account Opening</i></td>
                </tr>
                <tr>
                    <td width="5%"></td>
                    <td width="5%">1.</td>
                    <td width="40%">Untuk keperluan pembukaan Rekening Investor di Bank,
Pemohon wajib mengisi Formulir Aplikasi Pembukaan Rekening
Investor secara benar dan memberikan data serta dokumen yang
dipersyaratkan oleh Bank serta menandatangani Formulir Aplikasi
Pembukaan Rekening Investor.</td>
                    <td width="5%"></td>
                    <td width="5%">1.</td>
                    <td width="40%"><i>For the purposes of Investor Account opening at the Bank, the
Applicant shall fill the Investor Account Opening Application
Form properly and provide data and documents required by
the Bank and sign the Investor Account Opening Application
Form.</i></td>
                </tr>
                <tr>
                    <td width="5%"></td>
                    <td width="5%">2.</td>
                    <td width="40%">Bank berhak meminta informasi dan dokumen pendukung serta
menatakerjakan data profil Pemohon sesuai dengan kebutuhan
dan peraturan perundang-undangan yang berlaku.</td>
                    <td width="5%"></td>
                    <td width="5%">2.</td>
                    <td width="40%"><i>Bank has the right to request information and supporting
documents as well as administer Applicant's profile data in
accordance with the requirements and the applicable law and
regulations.</i></td>
                </tr>
                <tr>
                    <td width="5%"></td>
                    <td width="5%">3.</td>
                    <td width="40%">Pemohon menjamin bahwa semua dokumen dan keterangan
yang diberikan kepada Bank adalah benar, lengkap, sesuai
dengan yang asli, sah dan sesuai dengan peraturan perundangundangan
yang berlaku.</td>
                    <td width="5%"></td>
                    <td width="5%">3.</td>
                    <td width="40%"><i>Applicant ensures that all documents and information provided
to the Bank is correct, complete, same with the original, lawful
and in accordance with applicable law and regulations.</i></td>
                </tr>
                <tr>
                    <td width="5%"></td>
                    <td width="5%">4.</td>
                    <td width="40%">Bank akan memproses permohonan pembukaan Rekening
Investor apabila dokumen yang dipersyaratkan telah dipenuhi
dan Pemohon tidak masuk dalam Daftar Hitam Nasional (DHN)
yang diterbitkan Bank Indonesia.</td>
                    <td width="5%"></td>
                    <td width="5%">4.</td>
                    <td width="40%"><i>The Bank will process the request of the Investor Account
opening if the required documents have been met and the
Applicant is not listed in the Daftar Hitam Nasional (DHN)
issued by Bank Indonesia.</i></td>
                </tr>
                <tr>
                    <td width="5%"></td>
                    <td width="5%">5.</td>
                    <td width="40%">Pemohon wajib melakukan setoran dana awal sesuai dengan
ketentuan yang berlaku di Bank.</td>
                    <td width="5%"></td>
                    <td width="5%">5.</td>
                    <td width="40%"><i>Applicant shall make the initial deposit of funds in accordance
with the applicable provisions in the Bank.</i></td>
                </tr>

                <tr>
                    <td width="5%">C</td>
                    <td colspan="2">Transaksi</td>
                    <td width="5%">C</td>
                    <td colspan="2"><i>Transactions</i></td>
                </tr>
                <tr>
                    <td width="5%"></td>
                    <td width="5%">1.</td>
                    <td width="40%">Transaksi adalah kegiatan pembukuan pada suatu rekening baik
penambahan saldo (penyetoran dana) atau pengurangan saldo
(pemindahbukuan dana) pada Rekening Investor yang
pengaturannya mengacu pada ketentuan yang berlaku di Bank.</td>
                    <td width="5%"></td>
                    <td width="5%">1.</td>
                    <td width="40%"><i>Transaction is a booking activity on an account, both balance
addition (deposit funds) and balance reduction (funds transfer)
on Investor Account whose settings refer to the applicable
regulations in the Bank.</i></td>
                </tr>
                <tr>
                    <td width="5%"></td>
                    <td width="5%">2.</td>
                    <td width="40%">Dana yang disetorkan/dipergunakan/ditransaksikan pada Bank
tidak berasal dari/untuk tujuan tindak pidana pencucian uang
(money laundering).</td>
                    <td width="5%"></td>
                    <td width="5%">2.</td>
                    <td width="40%"><i>Fund deposited / used / traded on the Bank does not originate
from / for the purpose of money laundering.</i></td>
                </tr>
                <tr>
                    <td width="5%"></td>
                    <td width="5%">3.</td>
                    <td width="40%">Rekening Investor hanya dapat dilakukan untuk melakukan
transaksi penyelesaian transaksi efek atas nama Nasabah pada
perusahaan efek.</td>
                    <td width="5%"></td>
                    <td width="5%">3.</td>
                    <td width="40%"><i>Investor Account may only be used for settlement of securities
transactions on behalf of the Securities Company's customers.</i></td>
                </tr>
                <tr>
                    <td width="5%"></td>
                    <td width="5%">4.</td>
                    <td width="40%">Rekening Investor hanya dapat dilakukan transaksi (didebit dan
atau dikredit) oleh perusahaan efek dengan menggunakan sarana
BNI Internet Banking yang disediakan Bank atau sarana lainnya
yang berlaku di Bank, sesuai instruksi yang disampaikan oleh
Nasabah.</td>
                    <td width="5%"></td>
                    <td width="5%">4.</td>
                    <td width="40%"><i>Investor Account transactions (debit or credit) may only be
conducted by Securities Companies using BNI Internet Banking
facility provided by the Bank or any other means applicable at
the Bank, according to instructions delivered by the Customer.</i></td>
                </tr>
                <tr>
                    <td width="5%"></td>
                    <td width="5%">5.</td>
                    <td width="40%">Transaksi yang dilakukan oleh perusahaan efek terhadap
Rekening Investor sebagaimana dimaksud angka 4 huruf C ini,
dilakukan berdasarkan kuasa dari Pemohon/Nasabah
sebagaimana disebutkan dalam Formulir Aplikasi Pembukaan
Rekening Investor.</td>
                    <td width="5%"></td>
                    <td width="5%">5.</td>
                    <td width="40%"><i>Transactions conducted by Securities Companies on Investor
Account referred to item 4 letter C, conducted under authority
of the Applicant / Customer as stated in the Account Opening
Application Form Investors.</i></td>
                </tr>
                <tr>
                    <td width="5%"></td>
                    <td width="5%">6.</td>
                    <td width="40%">Nasabah tidak dapat melakukan transaksi penarikan dan atau
pemindahbukuan terhadap dana yang terdapat pada Rekening
Investor. Nasabah hanya diperkenankan melakukan aktivitas
melihat saldo dan mutasi saldo pada Rekening Investor melalui
BNI Internet Banking.</td>
                    <td width="5%"></td>
                    <td width="5%">6.</td>
                    <td width="40%"><i>Customer cannot perform withdrawals and/or transfers of
funds contained in the Investor Account. The Customer is only
allowed to make inquiry of the balance and the mutation in the
Investor Account through BNI Internet Banking.</i></td>
                </tr>
                <tr>
                    <td width="5%"></td>
                    <td width="5%">7.</td>
                    <td width="40%">Berdasarkan itikad baik, Bank berhak melakukan koreksi terhadap
pembukuan Rekening Investor tanpa berkewajiban
memberitahukan kepada Nasabah.</td>
                    <td width="5%"></td>
                    <td width="5%">7.</td>
                    <td width="40%"><i>Based on good faith, the Bank has the right to make
corrections to book entry of Investor Account without
obligation to notify the Customer.</i></td>
                </tr>
                <tr>
                    <td width="5%"></td>
                    <td width="5%">8.</td>
                    <td width="40%">Apabila terdapat perbedaan data transaksi antara catatan Bank
dengan catatan yang ada pada Nasabah, maka yang
dipergunakan adalah catatan pada pembukuan Bank, dan dengan
Ini Nasabah menyatakan tunduk, mengakui, dan menerima
bahwa catatan yang ada pada Bank merupakan alat bukti yang
sah dan mengikat Nasabah.</td>
                    <td width="5%"></td>
                    <td width="5%">8.</td>
                    <td width="40%"><i>If there is a difference in transaction data between the records
in the Bank and the records in the Customer, then the record
used is the records in the Bank, and Customer states to
subject to, acknowledges, and accepts that the records in the
Bank is a valid evidence and binding on the Customer.</i></td>
                </tr>

                <tr>
                    <td width="5%">D</td>
                    <td colspan="2">Jasa Giro, Pajak dan Biaya</td>
                    <td width="5%">D</td>
                    <td colspan="2"><i>Rate, Tax and Fees</i></td>
                </tr>
                <tr>
                    <td width="5%"></td>
                    <td width="5%">1.</td>
                    <td width="40%">Dana pada Rekening Investor diberikan jasa giro sesuai tarif yang
berlaku di Bank dan dapat berubah sewaktu-waktu mengikuti
kondisi pasar perbankan dan kebijakan Bank.</td>
                    <td width="5%"></td>
                    <td width="5%">1.</td>
                    <td width="40%"><i>Funds in the Investor Account is given a set of rate according
to the prevailing tariff in the Bank and may change at any time
following banking market conditions and Bank's policy.</i></td>
                </tr>
                <tr>
                    <td width="5%"></td>
                    <td width="5%">2.</td>
                    <td width="40%">Jasa giro yang diterima oleh Nasabah akan dikenakan pajak yang
besarnya sesuai dengan ketentuan perpajakan yang berlaku.</td>
                    <td width="5%"></td>
                    <td width="5%">2.</td>
                    <td width="40%"><i>Rate received by the Customer is subject to tax which amount
is in accordance with applicable tax regulations.</i></td>
                </tr>
                <tr>
                    <td width="5%"></td>
                    <td width="5%">3.</td>
                    <td width="40%">Rekening Investor tidak dikenakan biaya-biaya sehubungan
dengan transaksi yang dilakukan oleh perusahaan efek
sebagaimana dimaksud huruf C dalam Ketentuan Umum dan
Persyaratan Pembukaan Rekening Investor ini.</td>
                    <td width="5%"></td>
                    <td width="5%">3.</td>
                    <td width="40%"><i>Investor Account is not charged with fees regarding to the
transactions conducted by the Securities Company as referred
to the letter C in this General Terms and Conditions of the
Investor Account Opening.</i></td>
                </tr>

                <tr>
                    <td width="5%">E</td>
                    <td colspan="2">Nasabah Meninggal Dunia/Pailit/Dibubarkan</td>
                    <td width="5%">E</td>
                    <td colspan="2"><i>Customer Death / Bankruptcy / Dissolved</i></td>
                </tr>
                <tr>
                    <td width="5%"></td>
                    <td width="5%">1.</td>
                    <td width="40%">Dalam hal Nasabah meninggal dunia atau dinyatakan pailit atau
dibubarkan atau diletakkan di bawah pengawasan pihak yang
ditunjuk untuk itu, Bank sewaktu-waktu berhak untuk melakukan
penutupan Rekening Investor secara administratif untuk
sementara, dan hanya akan mengalihkan hak atas nama ahli
waris yang sah atau pihak yang ditunjuk tersebut, sesuai
ketentuan Bank maupun perundang-undangan yang berlaku</td>
                    <td width="5%"></td>
                    <td width="5%">1.</td>
                    <td width="40%"><i>If the Customer dies or is declared bankrupt or liquidated or
placed under the supervision of a designated party to it, the
Bank at any times reserves the right to close the Investor
Account administratively for a while, and will only assign the
rights in the name of the legitimate heirs or appointed parties,
in accordance with the Bank or the applicable law.</i></td>
                </tr>
                <tr>
                    <td width="5%"></td>
                    <td width="5%">2.</td>
                    <td width="40%">Bank berhak meminta dokumen yang dapat diterima sebagai
bukti yang sah tentang kedudukannya sebagai ahli waris atau
pengganti hak.</td>
                    <td width="5%"></td>
                    <td width="5%">2.</td>
                    <td width="40%"><i>Bank has the rights to request documents that can be
accepted as legal proof of his/her position as the heir or rights
succesor.</i></td>
                </tr>
                <tr>
                    <td width="5%"></td>
                    <td width="5%">3.</td>
                    <td width="40%">Ketentuan terkait dengan Nasabah meninggal
dunia/pailit/dibubarkan mengacu pada ketentuan umum yang
berlaku di Bank.</td>
                    <td width="5%"></td>
                    <td width="5%">3.</td>
                    <td width="40%"><i>Provisions related to the Customer's death / bankruptcy /
dissolution; refer to the general provisions applicable in the
Bank.</i></td>
                </tr>

                <tr>
                    <td width="5%">F</td>
                    <td colspan="2">Penyalahgunaan Rekening Investor/Fasilitas Lainnya</td>
                    <td width="5%">F</td>
                    <td colspan="2"><i>Misuse of Investor Account / Other Facilities</i></td>
                </tr>
                <tr>
                    <td width="5%"></td>
                    <td width="5%"></td>
                    <td width="40%">Bank dengan ini dibebaskan dari segala tuntutan dari kerugian
yang timbul karena pemalsuan dan/atau penyalahgunaan
Rekening Investor dan/atau fasilitas Rekening Investor lainnya
yang dilakukan oleh Nasabah, perusahaan efek atau pihak
lainnya dan hal tersebut sepenuhnya menjadi beban dan
tanggung jawab Nasabah.</td>
                    <td width="5%"></td>
                    <td width="5%"></td>
                    <td width="40%"><i>Bank hereby released from any claims and damages arising out
of fraud and / or misuse of Investor Account and / or other
Investor Account facilities done by the Customer, Securities
Company or other parties and it is entirely the burden and
responsibility of the Customer.</i></td>
                </tr>

                <tr>
                    <td width="5%">G</td>
                    <td colspan="2">Lain-lain</td>
                    <td width="5%">G</td>
                    <td colspan="2"><i>Others</i></td>
                </tr>
                <tr>
                    <td width="5%"></td>
                    <td width="5%">1.</td>
                    <td width="40%">Nasabah wajib memberitahukan dan menyampaikan perubahan
data kepada Bank apabila terdapat perubahan data, dan
Perubahan tersebut hanya berlaku jika pemberitahuan tersebut
telah diterima dan/atau disetujui oleh Bank.</td>
                    <td width="5%"></td>
                    <td width="5%">1.</td>
                    <td width="40%"><i>Customer must notify and submit data changes to the Bank if
there are changes to the data, and changes are only valid if
the notification has been received and / or approved by the
Bank.</i></td>
                </tr>
                <tr>
                    <td width="5%"></td>
                    <td width="5%">2.</td>
                    <td width="40%">Dana yang tersedia dalam Rekening Investor Nasabah dijamin
dalam program penjaminan yang diselenggarakan Lembaga
Penjamin Simpanan (LPS) sesuai dengan syarat dan ketentuan
yang ditetapkan oleh LPS.</td>
                    <td width="5%"></td>
                    <td width="5%">2.</td>
                    <td width="40%"><i>Funds available in Customer's Investor Account are guaranteed
in the guarantee program organized by Lembaga Penjamin
Simpanan (LPS) in accordance with the terms and conditions
set out by the LPS.</i></td>
                </tr>
                <tr>
                    <td width="5%"></td>
                    <td width="5%">3.</td>
                    <td width="40%">Bank berhak mengubah ketentuan dan syarat-syarat yang
berkaitan dengan produk Bank yang menjadi satu kesatuan dan
bagian yang tidak terpisahkan dari Ketentuan Umum dan
Persyaratan Pembukaan Rekening Investor ini, serta berlaku
mengikat sejak diberlakukannya perubahan tersebut</td>
                    <td width="5%"></td>
                    <td width="5%">3.</td>
                    <td width="40%"><i>Bank has the rights to change the terms and conditions related
to the Bank's product which is a single unit and an integral part
of this General Terms and Conditions of Investor Account
Opening, as well as the binding force since the enactment of
these changes.</i></td>
                </tr>
                <tr>
                    <td width="5%"></td>
                    <td width="5%">4.</td>
                    <td width="40%">Bank tidak bertanggung jawab atas terjadinya hal-hal di luar
kekuasaan Bank (Force Majeure).</td>
                    <td width="5%"></td>
                    <td width="5%">4.</td>
                    <td width="40%"><i>Bank is not responsible for the occurrence of things beyond
the power of the Bank (Force Majeure).</i></td>
                </tr>
                <tr>
                    <td width="5%"></td>
                    <td width="5%">5.</td>
                    <td width="40%">Bank berwenang melakukan koreksi mutasi dan saldo Rekening
Investor Nasabah apabila terjadi kekeliruan pembukuan oleh
Bank.</td>
                    <td width="5%"></td>
                    <td width="5%">5.</td>
                    <td width="40%"><i>The Bank is authorized to make corrections about mutations
and balances in the event of booking mistake made by the
Bank.</i></td>
                </tr>
                <tr>
                    <td width="5%"></td>
                    <td width="5%">6.</td>
                    <td width="40%">Syarat dan ketentuan Rekening Investor/fasilitas selengkapnya
diatur secara khusus yang ditetapkan oleh Bank termasuk tetapi
tidak terbatas pada Buku Petunjuk dan kebijakan internal Bank
lainnya yang merupakan satu kesatuan serta bagian yang tidak
terpisahkan dari Ketentuan Umum dan Persyaratan Pembukaan
Rekening Investor ini.</td>
                    <td width="5%"></td>
                    <td width="5%">6.</td>
                    <td width="40%"><i>Terms and Conditions of the Investor Account/facilities, which
are specifically regulated and set by the Bank, are including
but not limited to The Bank's other Guidelines and Internal
Policy, which is a single unit and an integral part of the General
Terms and Conditions of Investor Account Opening.</i></td>
                </tr>
                <tr>
                    <td width="5%"></td>
                    <td width="5%">7.</td>
                    <td width="40%">Ketentuan dan syarat-syarat Perjanjian ini dibuat dalam dua
bahasa yaitu Bahasa Indonesia dan Bahasa Inggris. Apabila
terdapat perbedaan pengertian bahasa dalam perjanjian ini,
maka versi Bahasa Indonesia adalah yang berlaku.</td>
                    <td width="5%"></td>
                    <td width="5%">7.</td>
                    <td width="40%"><i>Terms and conditions of this Agreement is made in bilingual
which are Bahasa Indonesian and English. If there are any
differences in language perceptions in this agreement, then
the Bahasa Indonesia version prevails.</i></td>
                </tr>

            </tbody>
        </table>

<div style="position: relative; border: 0px solid black; width: 700px; height: 940px; margin: auto;">
  <img src="<?=base_url('images/h1.jpg')?>" style="position: absolute; width: 700px; height: 940px; z-index: -1000;" />
</div>

<div style="position: relative; border: 0px solid black; width: 700px; height: 940px; margin: auto;">
  <img src="<?=base_url('images/h2.jpg')?>" style="position: absolute; width: 700px; height: 940px; z-index: -1000;" />
</div>

<div style="position: relative; border: 0px solid black; width: 700px; height: 940px; margin: auto;">
  <img src="<?=base_url('images/h3.jpg')?>" style="position: absolute; width: 700px; height: 940px; z-index: -1000;" />
</div>

<div style="position: relative; border: 0px solid black; width: 700px; height: 940px; margin: auto;">
  <img src="<?=base_url('images/h4.jpg')?>" style="position: absolute; width: 700px; height: 940px; z-index: -1000;" />
</div>

<div style="position: relative; border: 0px solid black; width: 700px; height: 940px; margin: auto;">
  <img src="<?=base_url('images/h5.jpg')?>" style="position: absolute; width: 700px; height: 940px; z-index: -1000;" />
</div>

<div style="position: relative; border: 0px solid black; width: 700px; height: 940px; margin: auto;">
  <img src="<?=base_url('images/h6.jpg')?>" style="position: absolute; width: 700px; height: 940px; z-index: -1000;" />
</div>

<div style="position: relative; border: 0px solid black; width: 700px; height: 940px; margin: auto;">
  <img src="<?=base_url('images/h7.jpg')?>" style="position: absolute; width: 700px; height: 940px; z-index: -1000;" />
</div>

<div style="position: relative; border: 0px solid black; width: 700px; height: 940px; margin: auto;">
  <img src="<?=base_url('images/h8.jpg')?>" style="position: absolute; width: 700px; height: 940px; z-index: -1000;" />
</div>

<div style="position: relative; border: 0px solid black; width: 700px; height: 940px; margin: auto;">
  <img src="<?=base_url('images/h9.jpg')?>" style="position: absolute; width: 700px; height: 940px; z-index: -1000;" />
</div>

<div style="position: relative; border: 0px solid black; width: 700px; height: 940px; margin: auto;">
  <img src="<?=base_url('images/h10.jpg')?>" style="position: absolute; width: 700px; height: 940px; z-index: -1000;" />
</div>

<div style="position: relative; border: 0px solid black; width: 700px; height: 940px; margin: auto;">
  <img src="<?=base_url('images/h11.jpg')?>" style="position: absolute; width: 700px; height: 940px; z-index: -1000;" />
</div>
<div style="position: relative; border: 0px solid black; width: 700px; height: 940px; margin: auto;">
  <img src="<?=base_url('images/h12.jpg')?>" style="position: absolute; width: 700px; height: 940px; z-index: -1000;" />
</div>
<div style="position: relative; border: 0px solid black; width: 700px; height: 940px; margin: auto;">
  <img src="<?=base_url('images/h13.jpg')?>" style="position: absolute; width: 700px; height: 940px; z-index: -1000;" />
</div>
<div style="position: relative; border: 0px solid black; width: 700px; height: 940px; margin: auto;">
  <img src="<?=base_url('images/h14.jpg')?>" style="position: absolute; width: 700px; height: 940px; z-index: -1000;" />
</div>
<div style="position: relative; border: 0px solid black; width: 700px; height: 940px; margin: auto;">
  <img src="<?=base_url('images/h15.jpg')?>" style="position: absolute; width: 700px; height: 940px; z-index: -1000;" />
  <div style="position: absolute; top: 310px; left: 330px; width: 100%; text-align: center; color: black; line-height: 1.5"><center><span style="background-color: white; padding: .5em;"><?=$registrasi->nama_depan?> <?=$registrasi->nama_tengah?> <?=$registrasi->nama_belakang?></span></center></div>
</div>

    </body>
</html>