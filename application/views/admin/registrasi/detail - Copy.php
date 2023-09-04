<?php
	$admin = array('62','63','66'); 
?>
	<section class="invoice" id="invoice">
      <!-- title row -->
      <div class="row">
        <div class="col-xs-12">
			<!--<p class="page-header"><img height="50" src="<?=base_url()?>images/mings.jpg"><img height="50" class="pull-right" src="<?=base_url()?>images/iso.png"></p>-->
		    <h2 class="page-header">
			    <i class="fa fa-globe"></i>&nbsp;&nbsp;<?=$title?>
				<small class="pull-right"><strong>Tanggal :</strong> <?php if($registrasi->tanggal != '0000-00-00') { echo date('d-m-Y', strtotime($registrasi->tanggal)); } ?></small>
			</h2>
		  <p class="page-header">
		  <strong>Nomor Invoice : </strong><?=$registrasi->nama_depan?><br/>
		  </p>
        </div>
        <!-- /.col -->
      </div>
      <!-- info row -->
      <div class="row invoice-info">
			<div class="col-sm-4 invoice-col">
		  <strong>Tanggal Registrasi : </strong><?php if($registrasi->tanggal != '0000-00-00') { echo date('d-m-Y', strtotime($registrasi->tanggal)); } ?><br/>
		  <strong>Tanggal Jatuh Tempo : </strong>
		  <?php 
				  $tgl = strtotime($registrasi->tanggal);
				  $tgl = strtotime("+14 day", $tgl);
				  echo date('d-m-Y', $tgl);		  
		  ?>
		  <br/>
				<strong>Periode : </strong><?=date('M Y', strtotime($registrasi->tgl_inv)) ?><br/>
			</div>
<?php
					$datava = $this->tabel_model->cekfield('va', 'nova', $registrasi->nova);
					$pelanggan = $this->tabel_model->cekfield('users', 'id', $datava->userid);
?>
			<div class="col-sm-4 invoice-col">
				<strong>Nama : </strong><?=$pelanggan->fullname?><br/>
				<strong>No VA : </strong><?=$registrasi->nova?><br/>
				<strong>Unit : </strong><?php
					$unit = $this->tabel_model->detaildata('unit',$datava->idunit);  echo $unit->nama.', ';
					$lantai = $this->tabel_model->detaildata('lantai',$datava->idlantai);  echo $lantai->nama.', ';
					$tower = $this->tabel_model->detaildata('tower',$datava->idtower);  echo $tower->nama.', ';
					$apartemen = $this->tabel_model->detaildata('apartemen',$datava->idapartemen);  echo $apartemen->nama;
				?><br/>
			</div>
			<div class="col-sm-4 invoice-col">
			
			</div>
      </div>
      <!-- end info row --><br/><br/>
      <!-- Table row -->
      <div class="row">
			<div class="col-xs-12 table-responsive">
				<strong>Tagihan LIstrik : </strong><br/>
				<table class="table table-striped">
					<tbody>
					<tr>
						<td>Stand Awal Meter (Kwh)</td>
						<td><?=number_format($registrasi->l_s_awal,2,".",",")?></td>
						<td>Daya Terpasang (kva)</td>
						<td><?=number_format($registrasi->l_daya,2,".",",")?></td>
						<td>&nbsp;</td>
					</tr>
					<tr>
						<td>Stand Akhir Meter (Kwh)</td>
						<td><?=number_format($registrasi->l_s_akhir,2,".",",")?></td>
						<td>Jam Nyala</td>
						<td><?=number_format($registrasi->l_j_nyala,2,".",",")?></td>
						<td>&nbsp;</td>
					</tr>
					<tr>
						<td>Pemakaian/Usage (Kwh)</td>
						<td><?php $pemakaian = $registrasi->l_s_akhir - $registrasi->l_s_awal; echo number_format($pemakaian,2,".",",") ?></td>
						<td>Tarif   Rp</td>
						<td><?=number_format($registrasi->l_tarif,2,".",",")?></td>
						<td>&nbsp;</td>
					</tr>
					<tr>
						<td>Rekening Minimum</td>
						<td><?php echo number_format($registrasi->l_r_min,2,".",",") ?></td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
					</tr>
					<tr>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
					</tr>
					<tr>
						<td>Rekening Minimum</td>
						<td>Rp. <?=number_format($registrasi->rp_rek_min,2,".",",")?></td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
					</tr>
					<tr>
						<td>Pemakaian</td>
						<td>Rp. <?php
						 $pemakaian = $registrasi->l_s_akhir - $registrasi->l_s_awal;
						 echo number_format($registrasi->rp_l_pemakaian,2,".",",");
						?></td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
					</tr>
					<tr>
						<td>Sub Total</td>
						<td>Rp. <?php
						 $pemakaian = $registrasi->l_s_akhir - $registrasi->l_s_awal;
						 $subtot_l = ($pemakaian * $registrasi->l_tarif) + $registrasi->l_r_min;
						 echo number_format($registrasi->subtot_l,2,".",",");
						?></td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
					</tr>
					<tr>
						<td>PPJU <?=$registrasi->pct_ppju?>%</td>
						<td>Rp. <?php
						 $ppju = (($pemakaian * $registrasi->l_tarif) + $registrasi->l_r_min)*($registrasi->ppju/100);
						 echo number_format($registrasi->ppju,2,".",",");
						?></td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
					</tr>
					<tr>
						<td>&nbsp;</td>
						<th>Sub Total Biaya Listrik</th>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<th>Rp. <?php 
						 echo number_format(round($registrasi->total_listrik),0,".",",");
						?></th>
					</tr>
				</table>
			</div>
      </div>
      <!-- endTable row -->
      <!-- Table row -->
      <div class="row">
			<div class="col-xs-12 table-responsive">
				<strong>Tagihan Air : </strong><br/>
				<table class="table table-striped">
					<tbody>
					<tr>
						<td>Stand Awal Meter </td>
						<td><?=number_format($registrasi->a_s_awal,2,".",",")?></td>
						<td>Tarif</td>
						<td><?=number_format($registrasi->a_tarif,2,".",",")?></td>
						<td>&nbsp;</td>
					</tr>
					<tr>
						<td>Stand Akhir Meter </td>
						<td><?=number_format($registrasi->a_s_akhir,2,".",",")?></td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
					</tr>
					<tr>
						<td>Pemakaian/Usage </td>
						<td><?php $pemakaian = $registrasi->a_s_akhir - $registrasi->a_s_awal; echo number_format($pemakaian,2,".",",");?></td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
					</tr>
					<tr>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
					</tr>
					<tr>
						<td>Sub Total</td>
						<td>Rp. <?php
						 $pemakaian = $registrasi->a_s_akhir - $registrasi->a_s_awal;
						 $subtot_a = $pemakaian * $registrasi->a_tarif;
						 echo number_format($registrasi->subtot_a,2,".",",")
						?></td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
					</tr>
					<tr>
						<td>Biaya Tetap</td>
						<td>Rp. <?=number_format($registrasi->a_b_tetap,2,".",",")?></td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
					</tr>
					<tr>
						<td>Biaya Operasional</td>
						<td>Rp. <?=number_format($registrasi->a_b_operasional,2,".",",")?></td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
					</tr>					<tr>
						<td>&nbsp;</td>
						<th>Sub Total Biaya air</th>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<th>Rp. <?php 
						 echo number_format(round($registrasi->total_air),0,".",",");
						?></th>
					</tr>
				</table>
			</div>
      </div>
      <!-- endTable row -->
      <!-- Table row -->
      <div class="row">
			<div class="col-xs-12 table-responsive">
				<p>Perhitungan Biaya Service Charge, Sinking Fund, Listrik & Air</p>
				<strong>Service Charge & Sinking Fund : </strong><br/>
				<table class="table table-striped">
					<tbody>
					<tr>
						<td>Service Charge </td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>Rp. <?=number_format(round($registrasi->sc),0,".",",")?></td>
					</tr>
					<tr>
						<td>Sinking Fund </td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>Rp. <?=number_format(round($registrasi->sf),0,".",",")?></td>
					</tr>
					<tr>
						<td>PPN</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>Rp. <?php
						$ppn_sc = $registrasi->sc * (10/100);
						echo number_format(round($registrasi->jumlah_ppn_sc),0,".",",")
						?></td>
					</tr>
					<tr>
						<td>Administrasi </td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>Rp. <?php
						echo number_format(round($registrasi->administrasi),0,".",",")
						?></td>
					</tr>
					<tr>
						<td>Materai </td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>Rp. <?php
						echo number_format(round($registrasi->materai),0,".",",")
						?></td>
					</tr>
					<tr>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
					</tr>
					<tr>
						<td>&nbsp;</td>
						<th>Total Bulan Ini</th>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<th>Rp. <?php 
//						$totbulanini = $subtot_a + $registrasi->a_b_tetap + $ppn_sc + $registrasi->sf + $registrasi->sc + $subtot_l + $ppju;
						echo number_format(round($registrasi->total_invoice),0,".",",")
						?></th>
					</tr>
					<tr>
						<td>&nbsp;</td>
						<th>Outstanding</th>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<th>Rp.</th>
					</tr>
					<tr>
						<td>&nbsp;</td>
						<th>Denda</th>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<th>Rp.</th>
					</tr>
					<tr>
						<td>&nbsp;</td>
						<th>Grand Total</th>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<th>Rp. <?php 
						$grandtot = $subtot_a + $registrasi->a_b_tetap + $ppn_sc + $registrasi->sf + $registrasi->sc + $subtot_l + $ppju;
						echo number_format(round($registrasi->total_invoice),0,".",",")
						?></th>
					</tr>

				</table>
			</div>
      </div>
      <!-- endTable row -->
      <div class="row no-print">
			<div class="col-xs-12">
				<button onclick="window.history.go(-1); return false;" type="button" class="btn btn-success">Back</button>
			</div>
      </div>

    </section>