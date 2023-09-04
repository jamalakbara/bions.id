<script>
var total_air = 0;
var total_service = 0;
var total_listrik = 0;
var total_sf = 0;
var jumlah_ppn_sc = 0;
var total_pembayaran = 0;
var tot_pelunasan = 0;
var tot_pakai = 0;
var sisa_pelunasan = 0;

$(document).on('click','.transaksis',function(){
//	$('[name="metode_bayar1"]').val(0);
//	$('.transaksi-row').remove();
//	$('.editsave').hide();
//	$('.save').show();
	tambahTransaksi();
});

$(document).on('change','[name="jumlah_pakai1"]',function(){
//	alert('y');
	var jml = $('[name="jumlah1"]').val();
    var	jmlpakai = $('[name="jumlah_pakai1"]').val();
	var	jmlsisa = Number(jml) - Number(jmlpakai);
	$('[name="jumlah_sisa1"]').val(jmlsisa);
});

function tambahTransaksi(){
	var leni = $('[name="metode_bayar1"]').val();
//	var leni = document.getElementById("metodebayar1").value;
	var metode = '';
	var totjumlah = $('[name="tot_pelunasan"]').val();
	var totjumlahpakai = $('[name="tot_pakai"]').val();
	var jumlah = $('[name="jumlah1"]').val();
	var jumlahpakai = $('[name="jumlah_pakai1"]').val();
	var jumlahsisa = $('[name="jumlah_sisa1"]').val();
	var keterangan = $('[name="keterangan1"]').val();

//	alert(leni);
	var inputpembeli = jQuery('select[name=pembeli]');
	var inputdokter = jQuery('select[name=dokter]');

	if ( leni === '0') {
		metode = 'Penerimaan Langsung Tunai';
    } else if (leni === '1')  {
		metode = 'Transfer Bank Langsung';
    } else {
		metode = 'Deposit';
    }

	inputpembeli.removeAttr("disabled");
	inputdokter.removeAttr("disabled");
//	$('[name="harga[]"]').val(len);

	$('h4.modal-title').text('Tambah Transaksi');
//	var barang = localStorage.getItem('barang_dataku');
//	alert(barang);
	$('#tabel-transaksi').append(
		'<tr class="transaksi-row"></td><td>'+metode+'</td>'+
		'<td>'+jumlah+'</td>'+
		'<td>'+jumlahpakai+'</td>'+
		'<td>'+jumlahsisa+'</td>'+
		'<td>'+keterangan+'</td><td>'+
		'<a class="btn btn-sm btn-white text-black" onclick="tambahTransaksi();"><i class="fa fa-plus-square-o fa-lg"></i></a>'+ 
		'<a class="btn btn-sm btn-white text-black" onclick="hapusTransaksi(this);"><i class="fa fa-minus-square-o fa-lg"></i></a>'+ 
		'</td><input type="hidden" class="form-control" value="'+leni+'" name="fmetode_bayar[]"><input type="hidden" class="form-control" value="'+jumlah+'" name="fjumlah[]"><input type="hidden" class="form-control" value="'+jumlahpakai+'" name="fjumlahpakai[]"><input type="hidden" class="form-control" value="'+jumlahsisa+'" name="fjumlahsisa[]"><input type="hidden" class="form-control" value="'+keterangan+'" name="fketerangan[]"></tr>'
	);
//	$(".select2").select2({
//	  placeholder: "Select barang"
//	});
	var len = $('[name="fjumlah[]"]').length;
	$('[name="total_item"]').val(len);
	$('[name="tot_pelunasan"]').val(Number(totjumlah)+Number(jumlah));
	$('[name="tot_pakai"]').val(Number(totjumlahpakai)+Number(jumlahpakai));

//	$('[name="metode_bayar1"]').val('');
	$('#metodebayar1 option[value=0]').attr('selected','selected');
	$('[name="jumlah1"]').val(0);
	$('[name="jumlah_pakai1"]').val(0);
	$('[name="jumlah_sisa1"]').val(0);
	$('[name="keterangan1"]').val('');

	tot_pakai = Number(tot_pakai) + Number(totjumlahpakai)+Number(jumlahpakai);
	tot_pelunasan = Number(tot_pelunasan) + Number(totjumlah)+Number(jumlah);

	document.getElementById("selisih_bayar").value = Math.round(tot_pakai) - Math.round(total_pembayaran);

	document.getElementById("sisa_pelunasan").value = Math.round(tot_pelunasan) - Math.round(tot_pakai);

//	$('[name="kode"]').val($('[name="kodetrans"]').val());
//	$('[name="pegawai"]').val($('[name="userid"]').val());
}

$(document).ready(function(){

	$("#userid").change(function(){ 
		var parent = $('#userid').val();
		$.ajax({
			type: "POST", 
			url: "<?=base_url()?>/admin/pembayaran/getinvoice", 
			data: {'userid' : parent},
			dataType: "json",
			beforeSend: function(e) {
				if(e && e.overrideMimeType) {
					e.overrideMimeType("application/json;charset=UTF-8");
				}
			},
			success: function(response){
				setTimeout(function(){
					$("#noinvoice").html(response.list_invoice).show();
				}, 10);
			},
			error: function (xhr, ajaxOptions, thrownError) {
				alert(thrownError);
			}
		});
	});

		$("#noinvoice").change(function(){
			var parent = $('#noinvoice').val();
//			alert(parent);
      		$.ajax({
            	type : 'POST',
           		url : "<?=base_url('admin/pembayaran/getdetailinvoice')?>",
            	data :  {'idinvoice' : parent},
				dataType: 'JSON',
					success: function (response) {
//					alert(response.bayar_listrik);
					if(response.total_invoice !== null) {document.getElementById("total_invoice").value = Math.round(response.total_invoice);}
//					if(response.total_bayar !== null) {document.getElementById("total_bayar").value = response.total_bayar;}
					if(response.saldo_piutang !== null) {document.getElementById("saldo_piutang").value = Number(response.total_invoice)-Number(response.total_pembayaran);}
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
//					if(response.bayar_listrik !== null) {document.getElementById("bayar_listrik").value = response.bayar_listrik;}
//					if(response.bayar_air !== null) {document.getElementById("bayar_air").value = response.bayar_air;}
//					if(response.bayar_service !== null) {document.getElementById("bayar_service").value = response.bayar_service;}
				}
          	});
		});

	$('#listrik').change(function() {
		if ($(this).is(':checked')) {
			$('#listrik_bayar').html(addCommas(total_listrik));
			total_pembayaran = Number(total_pembayaran) + Number(total_listrik);
//			alert(Math.round(total_pembayaran));
			document.getElementById("fbayar_listrik").value = Math.round(total_listrik);
			document.getElementById("total_pembayaran").value = Math.round(total_pembayaran);
//			$('#total_pembayaran').val(total_pembayaran);
//			alert(total_pembayaran);

			document.getElementById("selisih_bayar").value = Math.round(tot_pakai) - Math.round(total_pembayaran);

		} else {
			$('#listrik_bayar').html(addCommas(0));
		}
	});

	$('#air').change(function() {
		if ($(this).is(':checked')) {
			$('#air_bayar').html(addCommas(total_air));
			total_pembayaran = Number(total_pembayaran) + Number(total_air);
			document.getElementById("fbayar_air").value = Math.round(total_air);
			document.getElementById("total_pembayaran").value = Math.round(total_pembayaran);
			document.getElementById("selisih_bayar").value = Math.round(tot_pakai) - Math.round(total_pembayaran);
		} else {
			$('#air_bayar').html(addCommas(0));
		}
	});

	$('#service').change(function() {
		if ($(this).is(':checked')) {
			$('#service_bayar').html(addCommas(total_service));
			total_pembayaran = Number(total_pembayaran) + Number(total_service);
			document.getElementById("fbayar_service").value = Math.round(total_service);
			document.getElementById("total_pembayaran").value = Math.round(total_pembayaran);
			document.getElementById("selisih_bayar").value = Math.round(tot_pakai) - Math.round(total_pembayaran);
		} else {
			$('#service_bayar').html(addCommas(0));
		}
	});

	$('#sf').change(function() {
		if ($(this).is(':checked')) {
			$('#sf_bayar').html(addCommas(total_sf));
			total_pembayaran = Number(total_pembayaran) + Number(total_sf);
			document.getElementById("fbayar_sf").value = Math.round(total_sf);
			document.getElementById("total_pembayaran").value = Math.round(total_pembayaran);
			document.getElementById("selisih_bayar").value = Math.round(tot_pakai) - Math.round(total_pembayaran);
		} else {
			$('#sf_bayar').html(addCommas(0));
		}
	});

	$('#ppnsc').change(function() {
		if ($(this).is(':checked')) {
			$('#ppnsc_bayar').html(addCommas(jumlah_ppn_sc));
			total_pembayaran = Number(total_pembayaran) + Number(jumlah_ppn_sc);
			document.getElementById("fbayar_ppnsc").value = Math.round(jumlah_ppn_sc);
			document.getElementById("total_pembayaran").value = Math.round(total_pembayaran);
			document.getElementById("selisih_bayar").value = Math.round(tot_pakai) - Math.round(total_pembayaran);
		} else {
			$('#ppnsc_bayar').html(addCommas(0));
		}
	});


});

function addCommas(nStr)
{
    nStr += '';
    x = nStr.split('.');
    x1 = x[0];
    x2 = x.length > 1 ? '.' + x[1] : '';
    var rgx = /(\d+)(\d{3})/;
    while (rgx.test(x1)) {
        x1 = x1.replace(rgx, '$1' + ',' + '$2');
    }
    return x1 + x2;
}

</script>
