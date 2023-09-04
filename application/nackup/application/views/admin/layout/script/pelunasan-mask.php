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
//					alert(response.deposit);
					if(response.total_invoice !== null) {$('#total_invoice').val(Math.round(response.total_invoice));$('#total_invoice').trigger('input');}
					if(response.total_bayar !== null) {$('#sudah_dibayar').val(Math.round(response.total_bayar));$('#sudah_dibayar').trigger('input');}
					if(response.deposit !== null) {$('#saldo_deposit').val(Math.round(response.total_bayar));$('#deposit').trigger('input');}
//					if(response.total_bayar !== null) { alert(response.total_bayar); }
					if(response.saldo_piutang !== null) {$('#saldo_piutang').val(Math.round(Number(response.total_invoice)-Number(response.total_bayar)));$('#saldo_piutang').trigger('input');}
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
			var jml = $('[name="jumlah"]').val();
			total_pembayaran = Number($('[name="jumlah"]').val()) - Number($('[name="saldo_piutang"]').val());
			document.getElementById("total_pembayaran").value = $('[name="jumlah"]').val();
			document.getElementById("sisa_pelunasan").value = total_pembayaran;
		});
    $( '#jumlah' ).mask('000,000,000', {reverse: true});
	$('#total_invoice').mask('000,000,000', {reverse: true,watchDataMask: true});
	$('#sudah_dibayar').mask('000,000,000', {reverse: true,watchDataMask: true});
	$('#saldo_deposit').mask('000,000,000', {reverse: true,watchDataMask: true});
	$('#saldo_piutang').mask('000,000,000', {reverse: true,watchDataMask: true});
	$('#total_invoice').mask('000,000,000', {reverse: true,watchDataMask: true});
	$('#total_invoice').mask('000,000,000', {reverse: true,watchDataMask: true});
	$('#total_invoice').mask('000,000,000', {reverse: true,watchDataMask: true});
});

</script>
