<script>
var total_pembayaran = 0;

$(document).ready(function(){
		$("#noinvoice").change(function(){
			var parent = $('#noinvoice').val();
//			alert(parent);
      		$.ajax({
            	type : 'POST',
           		url : "<?=base_url('admin/pembayaran/getdetailinvoice')?>",
            	data :  {'idinvoice' : parent},
				dataType: 'JSON',
					success: function (response) {
//					alert(parent);
//					alert(response.deposit);
					if(response.total_invoice !== null) {document.getElementById("total_invoice").value = formatnumdec(Math.round(response.total_invoice),2) ;}
					if(response.total_bayar !== null) {document.getElementById("sudah_dibayar").value = formatnumdec(response.total_bayar,2) ;}
					if(response.deposit !== null) {document.getElementById("saldo_deposit").value = formatnumdec(response.deposit,2) ;}
//					if(response.total_bayar !== null) { alert(response.total_bayar); }
					if(response.saldo_piutang !== null) {document.getElementById("saldo_piutang").value = formatnumdec(Math.round(Number(response.total_invoice)-Number(response.total_bayar)),2) ;}
					if(response.nova !== null) {document.getElementById("nova").value = response.nova;}
					if(response.unit !== null) {document.getElementById("units").value = response.unit;}

					if(response.total_listrik !== null) {$('#total_listrik').html(addCommas(Math.round(response.total_listrik)));}
					if(response.total_listrik !== null) { total_listrik = Math.round(response.total_listrik);}
					if(response.total_air !== null) {$('#total_air').html(addCommas(response.total_air));}
					if(response.total_air !== null) {total_air = response.total_air;}
					if(response.total_service !== null) {$('#total_service').html(addCommas(response.total_service));}
					if(response.total_service !== null) {total_service = response.total_service;}
					if(response.total_sf !== null) {$('#total_sf').html(addCommas(response.total_sf));}
					if(response.total_sf !== null) {total_sf = response.total_sf;}
					if(response.jumlah_ppn_sc !== null) {$('#total_ppnsc').html(addCommas(response.jumlah_ppn_sc));}
					if(response.jumlah_ppn_sc !== null) {jumlah_ppn_sc = response.jumlah_ppn_sc;}
//					if(response.bayar_air !== null) {document.getElementById("bayar_air").value = response.bayar_air;}
//					if(response.bayar_service !== null) {document.getElementById("bayar_service").value = response.bayar_service;}
				}
          	});
		});

		$("#jumlah").keyup(function(){
//			var jml = $('[name="jumlah"]').val();
//			total_pembayaran = Number($('[name="jumlah"]').val()) - Number($('[name="saldo_piutang"]').val());
//			document.getElementById("total_pembayaran").value = $('[name="jumlah"]').val();
//			document.getElementById("sisa_pelunasan").value = total_pembayaran;

			var parent = $('#metodebayar :selected').val();
			var deposit = formatnumnosplit($('[name="saldo_deposit"]').val());
			var jml = formatnumnosplit($('[name="jumlah"]').val());
			var spiut = formatnumnosplit($('[name="saldo_piutang"]').val());

			total_pembayaran = jml - spiut;

			if(parent == 2) {
				deposit = deposit;
			} else {
				if (total_pembayaran<0 && deposit>0)
				{
					total_pembayaran = 0 - total_pembayaran ;
					if (deposit - total_pembayaran<0){
						deposit = 0;
					} else if (deposit - total_pembayaran==0){
						deposit = deposit;
					} else {
						deposit = total_pembayaran;
					}
				} else {
					deposit = 0;
				}
			}

			jml = jml + deposit;
			if (jml > spiut){
				total_bayar = spiut;
			} else {
				total_bayar = jml;
			}
			total_pembayaran = jml - spiut;

			if (total_bayar<spiut){
				total_bayar = 0;
				total_pembayaran = jml;
			}


/*
			if (total_pembayaran<0){
				total_pembayaran = 0;
			}
*/
			document.getElementById("jumlah_pakai_deposit").value = formatnumdec(deposit,2);

			document.getElementById("total_pembayaran").value = formatnumdec(total_bayar,2);
			document.getElementById("sisa_pelunasan").value = formatnumdec(total_pembayaran,2);

		});

		$("#metodebayar").change(function(){
			var parent = $('#metodebayar :selected').val();
				//alert(parent);
			if(parent == 2) {
				var dpst = formatnumnosplit($('#saldo_deposit').val());
				var sdbyr = formatnumnosplit($('[name="sudah_dibayar"]').val());

				xdpst = 0;
				document.getElementById("jumlah").value = xdpst;
				document.getElementById('jumlah').readOnly = true;
	
				var jml = formatnumnosplit($('[name="jumlah"]').val());
				var spiut = formatnumnosplit($('[name="saldo_piutang"]').val());
				var sdpst = formatnumnosplit($('[name="saldo_deposit"]').val());
	
				total_pembayaran = jml - sdpst;
	
	//			total_pembayaran = jml - spiut - sdbyr;
	//			total_pembayaran = jml - spiut - (sdpst - sdbyr);
	//			total_pembayaran = jml - spiut + (sdpst - sdbyr);
	//			sisa_pelunasan = total_pembayaran - formatnumnosplit($('[name="sudah_dibayar"]').val());

				if (sdpst < spiut){
					alert('Jumlah deposit tidak bisa digunakan untuk pelunasan');
					total_bayar = 0;
				} else {
					total_bayar = spiut;
				}
				total_pembayaran = 0;

				document.getElementById("jumlah_pakai_deposit").value = formatnumdec(total_bayar,2);
				document.getElementById("total_pembayaran").value = formatnumdec(total_bayar,2);
				document.getElementById("sisa_pelunasan").value = formatnumdec(total_pembayaran,2);
			} else {
				var jml = '';
				total_pembayaran = jml;
				document.getElementById("jumlah").value = jml;
				document.getElementById('jumlah').readOnly = false;
				document.getElementById("jumlah_pakai_deposit").value = formatnumdec(dpst,2);
				document.getElementById("total_pembayaran").value = formatnumdec(jml,2);
				document.getElementById("sisa_pelunasan").value = formatnumdec(total_pembayaran,2);
			}

		});
		
});

$(".form-horizontal").submit(function(){
	document.getElementById("jumlah_pakai_deposit").value = formatnumnosplit(document.getElementById("jumlah_pakai_deposit").value);
	document.getElementById("total_invoice").value = formatnumnosplit(document.getElementById("total_invoice").value);
	document.getElementById("sudah_dibayar").value = formatnumnosplit(document.getElementById("sudah_dibayar").value);
	document.getElementById("saldo_piutang").value = formatnumnosplit(document.getElementById("saldo_piutang").value);
	document.getElementById("saldo_deposit").value = formatnumnosplit(document.getElementById("saldo_deposit").value);
	document.getElementById("jumlah").value = formatnumnosplit(document.getElementById("jumlah").value);
	document.getElementById("total_pembayaran").value = formatnumnosplit(document.getElementById("total_pembayaran").value);
	document.getElementById("sisa_pelunasan").value = formatnumnosplit(document.getElementById("sisa_pelunasan").value);
//    alert('submit');
});

function isNumber(n) {return /^-?[\d.]+(?:e-?\d+)?$/.test(n); }

function formatnumdec(yourNumber,digdec) {
	var x=parseFloat(yourNumber).toFixed(digdec);
	var n= x.toString().split(".");
	n[0] = n[0].replace(/\B(?=(\d{3})+(?!\d))/g, ",");
	return n.join(".");
}

function formatnumnodec(yourNumber) {
	var x=parseFloat(yourNumber).toFixed(0);
	var n= x.toString().split(".");
	n[0] = n[0].replace(/\B(?=(\d{3})+(?!\d))/g, ",");
	return n.join(".");
}

function formatnumnosplit(yourNumber) {
	var n= yourNumber.replace(/,/g,"");
	return parseFloat(n);
}

</script>
