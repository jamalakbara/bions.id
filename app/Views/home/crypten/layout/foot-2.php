    <!--====== jquery js ======-->
    <script src="<?=base_url('assets/home/'.$config->template.'/')?>js/vendor/modernizr-3.6.0.min.js"></script>
    <script src="<?=base_url('assets/home/'.$config->template.'/')?>js/vendor/jquery-3.7.0.min.js"></script>
	<script type="text/javascript" src="<?=base_url('assets/home/'.$config->template.'/')?>js/moment.min.js"></script>
    <!--====== Bootstrap js ======-->
    <script src="<?=base_url('assets/home/'.$config->template.'/')?>js/bootstrap.min.js"></script>
    <script src="<?=base_url('assets/home/'.$config->template.'/')?>js/popper.min.js"></script>
    <script src="<?=base_url('assets/home/'.$config->template.'/')?>js/jquery.validate.js"></script>
    
<?php
	$task = $this->uri->rsegment(1);
	$action = $this->uri->rsegment(2);
	if($task != 'user') {
?>
    <!--====== nice select js ======-->
    <script src="<?=base_url('assets/home/'.$config->template.'/')?>js/jquery.nice-select.min.js"></script>
    <!--====== Images Loaded js ======-->
    <script src="<?=base_url('assets/home/'.$config->template.'/')?>js/jquery.syotimer.min.js"></script>
    <!--====== Main js ======-->
    <script src="<?=base_url('assets/home/'.$config->template.'/')?>js/main.js"></script>
	<script type="text/javascript" src="<?=base_url('assets/home/'.$config->template.'/')?>plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>
	<script type="text/javascript" src="<?=base_url('assets/home/'.$config->template.'/')?>plugins/fullcalendar/fullcalendar.js"></script>
<?php
	} else {
?>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    <script type="text/javascript" src="<?=base_url('assets/home/'.$config->template.'/')?>js/jquery.signature.min.js"></script>

	<script src="<?=base_url()?>assets/admin/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>    
	<script src="<?=base_url('assets/admin/')?>bower_components/select2/dist/js/select2.full.min.js"></script>
    <!--====== Images Loaded js ======-->
    <script src="<?=base_url('assets/home/'.$config->template.'/')?>js/jquery.syotimer.min.js"></script>
    <!--====== Main js ======-->
    <script src="<?=base_url('assets/home/'.$config->template.'/')?>js/mainreg.js"></script>
<?php
	}
?>
    

	<script>
<?php
	if($task == 'user') {
?>
$(document).ready(function() {
    $('.select2').select2();

	$("#ktploading").hide();
<?php
	if($this->input->post('warganegara') == 'WNA') {
?>
	$("div#container").show();
<?php
	} else {
?>
	$("div#container").hide();
<?php
	}
?>
	$("div#pasangan").hide();
	$("div#containerdomisili").hide();
	$("div#kuis1").hide();
	$("div#kuis2").hide();
	$("div#kuis3").hide();
	$("div#kuis4").hide();
	$("div#kuis5").hide();
	$("div#kuis6").hide();
	$("div#kuis7").hide();
	$("div#kuis8").hide();
	$("div#bidangusaha").hide();
    $("div#inputjabatan").show();
    $("div#inputlamakerja").show();
	$("#risk1").hide();
	$("#risk2").hide();
	$("#risk3").hide();
//    $("div#inputnpwp").show();

	$("#ktp_province").change(function(){ // Ketika user mengganti atau memilih data provinsi
		$("#ktp_city").hide(); // Sembunyikan dulu combobox kota nya
		$("#ktploading").show(); // Tampilkan loadingnya
	
		$.ajax({
			type: "POST", // Method pengiriman data bisa dengan GET atau POST
			url: "<?=base_url('user/getkota')?>", // Isi dengan url/path file php yang dituju
			data: {prov_id : $("#ktp_province").val()}, // data yang akan dikirim ke file yang dituju
			dataType: "json",
			beforeSend: function(e) {
				if(e && e.overrideMimeType) {
					e.overrideMimeType("application/json;charset=UTF-8");
				}
			},
			success: function(response){ // Ketika proses pengiriman berhasil
				setTimeout(function(){
					$("#ktploading").hide(); // Sembunyikan loadingnya

					// set isi dari combobox kota
					// lalu munculkan kembali combobox kotanya
					$("#ktp_city").html(response.data_kota).show();
				}, 10);
			},
			error: function (xhr, ajaxOptions, thrownError) { // Ketika ada error
				alert(thrownError); // Munculkan alert error
			}
		});
    });

	$("#terkiniloading").hide();
	
	$("#terkini_province").change(function(){ // Ketika user mengganti atau memilih data provinsi
		$("#terkini_city").hide(); // Sembunyikan dulu combobox kota nya
		$("#terkiniloading").show(); // Tampilkan loadingnya
	
		$.ajax({
			type: "POST", // Method pengiriman data bisa dengan GET atau POST
			url: "<?=base_url('user/getkota')?>", // Isi dengan url/path file php yang dituju
			data: {prov_id : $("#terkini_province").val()}, // data yang akan dikirim ke file yang dituju
			dataType: "json",
			beforeSend: function(e) {
				if(e && e.overrideMimeType) {
					e.overrideMimeType("application/json;charset=UTF-8");
				}
			},
			success: function(response){ // Ketika proses pengiriman berhasil
				setTimeout(function(){
					$("#terkiniloading").hide(); // Sembunyikan loadingnya

					// set isi dari combobox kota
					// lalu munculkan kembali combobox kotanya
					$("#terkini_city").html(response.data_kota).show();
				}, 10);
			},
			error: function (xhr, ajaxOptions, thrownError) { // Ketika ada error
				alert(thrownError); // Munculkan alert error
			}
		});
    });

	$("#perusahaanloading").hide();
	
	$("#perusahaan_province").change(function(){ // Ketika user mengganti atau memilih data provinsi
		$("#perusahaan_city").hide(); // Sembunyikan dulu combobox kota nya
		$("#perusahaanloading").show(); // Tampilkan loadingnya
	
		$.ajax({
			type: "POST", // Method pengiriman data bisa dengan GET atau POST
			url: "<?=base_url('user/getkota')?>", // Isi dengan url/path file php yang dituju
			data: {prov_id : $("#perusahaan_province").val()}, // data yang akan dikirim ke file yang dituju
			dataType: "json",
			beforeSend: function(e) {
				if(e && e.overrideMimeType) {
					e.overrideMimeType("application/json;charset=UTF-8");
				}
			},
			success: function(response){ // Ketika proses pengiriman berhasil
				setTimeout(function(){
					$("#perusahaanloading").hide(); // Sembunyikan loadingnya

					// set isi dari combobox kota
					// lalu munculkan kembali combobox kotanya
					$("#perusahaan_city").html(response.data_kota).show();
				}, 10);
			},
			error: function (xhr, ajaxOptions, thrownError) { // Ketika ada error
				alert(thrownError); // Munculkan alert error
			}
		});
    });

});
 function check() {
    		if (document.getElementById('alamatsama').checked) {
            document.getElementById("terkini_alamat").value = $('#ktp_alamat').val();
            document.getElementById("terkini_rtrw").value = $('#ktp_rtrw').val();
            document.getElementById("terkini_kelurahan").value = $('#ktp_kelurahan').val();
            document.getElementById("terkini_kecamatan").value = $('#ktp_kecamatan').val();
            document.getElementById("terkini_province").value = $('#ktp_province').val();
            document.getElementById("terkini_city").value = $('#ktp_city').val();
            document.getElementById("terkini_kodepos").value = $('#ktp_kodepos').val();
        } else {
            document.getElementById("terkini_alamat").value = '';
            document.getElementById("terkini_rtrw").value = '';
            document.getElementById("terkini_kelurahan").value = '';
            document.getElementById("terkini_kecamatan").value = '';
            document.getElementById("terkini_province").value = '';
            document.getElementById("terkini_city").value = '';
            document.getElementById("terkini_kodepos").value = '';
        }
       
    }

$("#ktps").keydown(function(event) {
  k = event.which;
  if ((k >= 96 && k <= 105) || k == 8) {
    if ($(this).val().length == 16) {
      if (k == 8) {
        return true;
      } else {
        event.preventDefault();
        return false;

      }
    }
  } else {
    event.preventDefault();
    return false;
  }

});

$("#wni").change(function(){
   if($(this).val()=="WNI")
   {    
       $("div#container").hide();
   }
    else
    {
        $("div#container").show();
    }
});
$("#wna").change(function(){
   if($(this).val()=="WNA")
   {    
        $("div#container").show();
   }
    else
    {
       $("div#container").hide();
    }
});

$("#status_pernikahan").change(function(){
   if($(this).val()=="M")
   {    
       $("div#pasangan").show();
   }
    else
    {
        $("div#pasangan").hide();
    }
});
$("input[name='no_npwp']").change(function(){
        //$("div#inputnpwp").hide();
		if($(this).val()=="punya") {
			document.getElementById("npwp").readOnly = false;
		} else {
			document.getElementById("npwp").value = "";
			document.getElementById("npwp").readOnly = true;
		}
});
$("#pekerjaan").change(function(){
   if($(this).val()=="Wiraswasta")
   {    
        $("div#alamatperusahaan").show();
        $("div#bidangusaha").show();
        $("div#inputjabatan").show();
        $("div#inputlamakerja").show();
		$("div#opsinpwp").show();
   } else if($(this).val()=="Karyawan")
	{
        $("div#alamatperusahaan").show();
        $("div#bidangusaha").show();
        $("div#inputjabatan").show();
        $("div#inputlamakerja").show();
        $("div#namatempatkerja").show();
		$("div#opsinpwp").show();
	} else if($(this).val()=="Pelajar")
	{
        $("div#alamatperusahaan").show();
        $("div#bidangusaha").hide();
        $("div#inputjabatan").hide();
        $("div#inputlamakerja").hide();
        $("div#namatempatkerja").hide();
		$("div#opsinpwp").hide();
		document.getElementById("nama_perusahaan").required = false;
		document.getElementById("perusahaan_alamat").required = false;
		document.getElementById("perusahaan_rtrw").required = false;
		document.getElementById("perusahaan_kelurahan").required = false;
		document.getElementById("perusahaan_kecamatan").required = false;
		document.getElementById("perusahaan_province").required = false;
		document.getElementById("perusahaan_city").required = false;
		document.getElementById("perusahaan_kodepos").required = false;
		document.getElementById("perusahaan_telp").required = false;
		document.getElementById("perusahaan_fax").required = false;
		document.getElementById("perusahaan_negara").required = false;
		document.getElementById("kerja_tahun").required = false;
		document.getElementById("kerja_bulan").required = false;
		document.getElementById("bidang_usaha").required = false;
		document.getElementById("jabatan").required = false;
	} else if($(this).val()=="Guru")
	{
        $("div#alamatperusahaan").show();
        $("div#bidangusaha").hide();
        $("div#inputjabatan").show();
        $("div#inputlamakerja").show();
        $("div#namatempatkerja").show();
		$("div#opsinpwp").show();
	} else if($(this).val()=="Ibu Rumah Tangga")
	{
        $("div#alamatperusahaan").hide();
        $("div#bidangusaha").hide();
        $("div#inputjabatan").hide();
        $("div#inputlamakerja").hide();
        $("div#namatempatkerja").hide();
		$("div#opsinpwp").hide();
		document.getElementById("nama_perusahaan").required = false;
		document.getElementById("perusahaan_alamat").required = false;
		document.getElementById("perusahaan_rtrw").required = false;
		document.getElementById("perusahaan_kelurahan").required = false;
		document.getElementById("perusahaan_kecamatan").required = false;
		document.getElementById("perusahaan_province").required = false;
		document.getElementById("perusahaan_city").required = false;
		document.getElementById("perusahaan_kodepos").required = false;
		document.getElementById("perusahaan_telp").required = false;
		document.getElementById("perusahaan_fax").required = false;
		document.getElementById("perusahaan_negara").required = false;
		document.getElementById("kerja_tahun").required = false;
		document.getElementById("kerja_bulan").required = false;
		document.getElementById("bidang_usaha").required = false;
		document.getElementById("jabatan").required = false;
	} else if($(this).val()=="TNI/Polisi")
	{
        $("div#alamatperusahaan").show();
        $("div#bidangusaha").hide();
        $("div#inputjabatan").show();
        $("div#inputlamakerja").show();
		$("div#opsinpwp").show();
	} else if($(this).val()=="Pegawai Negeri")
	{
        $("div#alamatperusahaan").show();
        $("div#bidangusaha").hide();
        $("div#inputjabatan").show();
        $("div#inputlamakerja").show();
		$("div#opsinpwp").show();
	} else if($(this).val()=="Pensiunan")
	{
        $("div#alamatperusahaan").show();
        $("div#bidangusaha").hide();
        $("div#inputjabatan").show();
        $("div#inputlamakerja").show();
		$("div#opsinpwp").show();
	}
    else
    {
        $("div#alamatperusahaan").show();
        $("div#inputjabatan").show();
        $("div#inputlamakerja").show();
        $("div#bidangusaha").hide();
    }
});
$("input[name='ktp_berlaku_sampai']").change(function(){
   if($(this).val()=="ddmmyyyy")
   {    
       $("div#ktpberlaku").show();
   }
    else
    {
        $("div#ktpberlaku").hide();
    }
});
$("input[name='paspor_berlaku_sampai']").change(function(){
   if($(this).val()=="ddmmyyyy")
   {    
       $("div#pasporberlaku").show();
   }
    else
    {
        $("div#pasporberlaku").hide();
    }
});
$("input[name='kitas_berlaku_sampai']").change(function(){
   if($(this).val()=="ddmmyyyy")
   {    
       $("div#kitasberlaku").show();
   }
    else
    {
        $("div#kitasberlaku").hide();
    }
});
$("input[name='pengetahuan_investasi']").change(function(){
	if($(this).val()=="5")
    {
		var totalval = Number(5) + Number($("input[name='dana_investasi']:checked").val()) + Number($("input[name='resiko_investasi']:checked").val()) + Number($("input[name='tujuan_investasi']:checked").val()) + Number($("input[name='waktu_investasi']:checked").val());
		if(totalval >= 25 && totalval <= 35) {
			$("#risk1").show();
			$("#risk2").hide();
			$("#risk3").hide();
		} else if(totalval >= 36 && totalval <= 55) {
			$("#risk1").hide();
			$("#risk2").show();
			$("#risk3").hide();
		} else if(totalval >= 56 && totalval <= 100) {
			$("#risk1").hide();
			$("#risk2").hide();
			$("#risk3").show();
		}
	} else if($(this).val()=="15")
    {
		var totalval = Number(15) + Number($("input[name='dana_investasi']:checked").val()) + Number($("input[name='resiko_investasi']:checked").val()) + Number($("input[name='tujuan_investasi']:checked").val()) + Number($("input[name='waktu_investasi']:checked").val());
		if(totalval >= 25 && totalval <= 35) {
			$("#risk1").show();
			$("#risk2").hide();
			$("#risk3").hide();
		} else if(totalval >= 36 && totalval <= 55) {
			$("#risk1").hide();
			$("#risk2").show();
			$("#risk3").hide();
		} else if(totalval >= 56 && totalval <= 100) {
			$("#risk1").hide();
			$("#risk2").hide();
			$("#risk3").show();
		}
	} else if($(this).val()=="20")
    {
		var totalval = Number(20) + Number($("input[name='dana_investasi']:checked").val()) + Number($("input[name='resiko_investasi']:checked").val()) + Number($("input[name='tujuan_investasi']:checked").val()) + Number($("input[name='waktu_investasi']:checked").val());
		if(totalval >= 25 && totalval <= 35) {
			$("#risk1").show();
			$("#risk2").hide();
			$("#risk3").hide();
		} else if(totalval >= 36 && totalval <= 55) {
			$("#risk1").hide();
			$("#risk2").show();
			$("#risk3").hide();
		} else if(totalval >= 56 && totalval <= 100) {
			$("#risk1").hide();
			$("#risk2").hide();
			$("#risk3").show();
		}
	}
});

$("#ya").change(function(){
   if($(this).val()=="1")
   {    
       $("div#containerdomisili").hide();
   }
    else
    {
        $("div#containerdomisili").show();
    }
});
$("#tidak").change(function(){
   if($(this).val()=="0")
   {    
       $("div#containerdomisili").show();
   }
    else
    {
        $("div#containerdomisili").hide();
    }
});
$("input[name='kuis1']").change(function(){
   if($(this).val()=="ya")
   {    
       $("div#kuis1").show();
   }
    else
    {
        $("div#kuis1").hide();
    }
});
$("input[name='kuis2']").change(function(){
   if($(this).val()=="ya")
   {    
       $("div#kuis2").show();
   }
    else
    {
        $("div#kuis2").hide();
    }
});
$("input[name='kuis3']").change(function(){
   if($(this).val()=="ya")
   {    
       $("div#kuis3").show();
   }
    else
    {
        $("div#kuis3").hide();
    }
});
$("input[name='kuis4']").change(function(){
   if($(this).val()=="ya")
   {    
       $("div#kuis4").show();
   }
    else
    {
        $("div#kuis4").hide();
    }
});
$("input[name='kuis5']").change(function(){
   if($(this).val()=="ya")
   {    
       $("div#kuis5").show();
   }
    else
    {
        $("div#kuis5").hide();
    }
});
$("input[name='kuis6']").change(function(){
   if($(this).val()=="ya")
   {    
       $("div#kuis5").show();
   }
    else
    {
        $("div#kuis5").hide();
    }
});

$("input[name='kuis7']").change(function(){
   if($(this).val()=="ya")
   {    
       $("div#kuis6").show();
   }
    else
    {
        $("div#kuis6").hide();
    }
});
$("input[name='kuis8']").change(function(){
   if($(this).val()=="ya")
   {    
       $("div#kuis6").show();
   }
    else
    {
        $("div#kuis6").hide();
    }
});
$("input[name='kuis9']").change(function(){
   if($(this).val()=="ya")
   {    
       $("div#kuis6").show();
   }
    else
    {
        $("div#kuis6").hide();
    }
});
$("input[name='kuis10']").change(function(){
   if($(this).val()=="ya")
   {    
       $("div#kuis6").show();
   }
    else
    {
        $("div#kuis6").hide();
    }
});
$("input[name='kuis11']").change(function(){
   if($(this).val()=="ya")
   {    
       $("div#kuis6").show();
   }
    else
    {
        $("div#kuis6").hide();
    }
});
$("input[name='kuis12']").change(function(){
   if($(this).val()=="ya")
   {    
       $("div#kuis7").show();
   }
    else
    {
        $("div#kuis7").hide();
    }
});
$("input[name='kuis13']").change(function(){
   if($(this).val()=="ya")
   {    
       $("div#kuis8").show();
   }
    else
    {
        $("div#kuis8").hide();
    }
});

function numberOnly(id) {
    // Get element by id which passed as parameter within HTML element event
    var element = document.getElementById(id);
    // This removes any other character but numbers as entered by user
    element.value = element.value.replace(/[^0-9]/gi, "");
}

function charOnly(id) {
    // Get element by id which passed as parameter within HTML element event
    var element = document.getElementById(id);
    // This removes any other character but numbers as entered by user
    element.value = element.value.replace(/[^a-zA-Z-]/gi, "");
}

function cekpersetujuan(theForm) {
	if($('#sig').signature('isEmpty')){
		alert ('Mohon ditandatangani!');
		return false;
	} else if(theForm.status_setuju.checked == false) {
		alert ('Mohon kolom persetujuan dicentang!');
		return false;
	} else { 	
		return true;
	}
}

    $('#datepicker21').datepicker({
format: {
    /*
     * Say our UI should display a week ahead,
     * but textbox should store the actual date.
     * This is useful if we need UI to select local dates,
     * but store in UTC
     */
    toDisplay: function (date, format, language) {
                var date = new Date(date),
                        month = '' + (date.getMonth() + 1),
                        day = '' + date.getDate(),
                        year = date.getFullYear();
                if (month.length < 2) month = '0' + month;
                if (day.length < 2) day = '0' + day;
                return [day, month, year].join('-');
            },
            toValue: function (date, format, language) {
                var date = new Date(date),
                        month = '' + (date.getMonth() + 1),
                        day = '' + date.getDate(),
                        year = date.getFullYear();
                if (month.length < 2) month = '0' + month;
                if (day.length < 2) day = '0' + day;
                return [year, month, day].join('-');
            }
  },
   autoclose: true 
    })

    $('#datepicker2').datepicker({
	  dateFormat: 'yyyy-mm-dd', format: 'yyyy-mm-dd',
	  autoclose: true
    })

    $('#datepicker3').datepicker({
	  dateFormat: 'yyyy-mm-dd', format: 'yyyy-mm-dd',
	  autoclose: true
    })

    $('#datepicker4').datepicker({
	  dateFormat: 'yyyy-mm-dd', format: 'yyyy-mm-dd',
	  autoclose: true
    })

	$('#datepicker5').datepicker({
	  dateFormat: 'yyyy-mm-dd', format: 'yyyy-mm-dd',
	  autoclose: true
    })

	$('#datepicker6').datepicker({
	  dateFormat: 'yyyy-mm-dd', format: 'yyyy-mm-dd',
	  autoclose: true
    })
<?php
	}
?>
function roundTo2(num) {    
    return +(Math.round(num + "e+4")  + "e-4");
}
function roundTo4(num) {    
    return +(Math.round(num + "e+4")  + "e-4");
}
function FV(rate, nper, pmt, pv, type) {
  var pow = Math.pow(1 + rate, nper),
     fv;
  if (rate) {
   fv = (pmt*(1+rate*type)*(1-pow)/rate)-pv*pow;
  } else {
   fv = -1 * (pv + pmt * nper);
  }
  return fv.toFixed(2);
}
function PMT(ir, np, pv, fv, type) {
    /*
     * ir   - interest rate per month
     * np   - number of periods (months)
     * pv   - present value
     * fv   - future value
     * type - when the payments are due:
     *        0: end of the period, e.g. end of month (default)
     *        1: beginning of period
     */
    var pmt, pvif;

    fv || (fv = 0);
    type || (type = 0);

    if (ir === 0)
        return -(pv + fv)/np;

    pvif = Math.pow(1 + ir, np);
    pmt = - ir * pv * (pvif + fv) / (pvif - 1);

    if (type === 1)
        pmt /= (1 + ir);

    return pmt;
}
function addCommas(nStr) {
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
function hitungcg() {
	var cgbeli = $('#cgbeli').val();
	var cglotbeli = $('#cglotbeli').val();
	var cgfeebeli = $('#cgfeebeli').val() / 100;
	cgnilaibeli = (cgbeli*cglotbeli*100)+((cgbeli*cglotbeli*100)*cgfeebeli);
	document.getElementById("cgnilaibeli").value = addCommas(cgnilaibeli);

	var cgjual = $('#cgjual').val();
	var cglotjual = $('#cglotjual').val();
	var cgfeejual = $('#cgfeejual').val() / 100;
	cgnilaijual = (cgjual*cglotjual*100)-((cgjual*cglotjual*100)*cgfeejual);
	document.getElementById("cgnilaijual").value = addCommas(cgnilaijual);
	document.getElementById("cgloss").value = addCommas(cgnilaijual-cgnilaibeli);
}
function hitungfb() {
	var tinggi = $('#tinggi').val();
	var rendah = $('#rendah').val();
	var tutup = $('#tutup').val();
	pivot = (Number(tinggi)+Number(rendah)+Number(tutup))/3;
	r3 = pivot+(1*(Number(tinggi)-Number(rendah)));
	r2 = pivot+(0.618*(Number(tinggi)-Number(rendah)));
	r1 = pivot+(0.382*(Number(tinggi)-Number(rendah)));
	s1 = pivot-(0.382*(Number(tinggi)-Number(rendah)));
	s2 = pivot-(0.618*(Number(tinggi)-Number(rendah)));
	s3 = pivot-(1*(Number(tinggi)-Number(rendah)));
//	alert((tinggi+rendah+tutup)/3);
//	document.getElementById("resistance3").value = addCommas(roundTo4(r3));
//	document.getElementById("resistance2").value = addCommas(roundTo4(r2));
//	document.getElementById("resistance1").value = addCommas(roundTo4(r1));
//	document.getElementById("pivot").value = addCommas(roundTo4(pivot));
//	document.getElementById("support1").value = addCommas(roundTo4(s1));
//	document.getElementById("support2").value = addCommas(roundTo4(s2));
//	document.getElementById("support3").value = addCommas(roundTo4(s3));

	document.getElementById("resistance3").value = addCommas(Math.ceil(r3));
	document.getElementById("resistance2").value = addCommas(Math.ceil(r2));
	document.getElementById("resistance1").value = addCommas(Math.ceil(r1));
	document.getElementById("pivot").value = addCommas(Math.ceil(pivot));
	document.getElementById("support1").value = addCommas(Math.ceil(s1));
	document.getElementById("support2").value = addCommas(Math.ceil(s2));
	document.getElementById("support3").value = addCommas(Math.ceil(s3));
}
function investasibulan() {
	var danabulan = $('#danabulan').val();
	var jangkabulan = $('#jangkabulan').val();
	var returnbulan = $('#returnbulan').val() / 100;
//alert(danabulan);
	hasilbulan = FV(returnbulan/12,jangkabulan,-danabulan,0,1);
//	document.getElementById("hasilbulan").value = addCommas(hasilbulan);
	document.getElementById("hasilbulan").value = addCommas(Math.ceil(hasilbulan));
}
function investasisekali() {
	var sekalidana = $('#sekalidana').val();
	var sekalijangka = $('#sekalijangka').val();
	var sekalireturn = $('#sekalireturn').val() / 100;
//alert(danabulan);
//	sekalihasil = Number(sekalidana)*(1+Number(sekalireturn))^Number(sekalijangka);
	sekalihasil = Number(sekalidana)*(1+Number(sekalireturn)) ** Number(sekalijangka);
//	document.getElementById("sekalihasil").value = addCommas(sekalihasil);
	document.getElementById("sekalihasil").value = addCommas(Math.ceil(sekalihasil));
}
function danabulan() {
	var bulantarget = $('#bulantarget').val();
	var jangkabulan2 = $('#jangkabulan2').val();
	var returnbulan2 = $('#returnbulan2').val() / 100;
//alert(danabulan);
	hasilbulan2 = PMT(returnbulan2/12,jangkabulan2,-bulantarget,0,0);
	document.getElementById("hasilbulan2").value = addCommas(Math.ceil(hasilbulan2));
}
function danalumpsump() {
	var sekalitarget = $('#sekalitarget').val();
	var sekalijangka2 = $('#sekalijangka2').val();
	var sekalireturn2 = $('#sekalireturn2').val() / 100;
//alert(danabulan);
//	sekalihasil2 = (Number(sekalitarget)*(1+Number(sekalireturn2))**Number(sekalijangka2);
	sekalihasil2 = sekalitarget*(1+Number(sekalireturn2)) ** -Number(sekalijangka2);
//	=C12*(1+C14)^-C13
//	sekalihasil2 = Math.pow ((sekalitarget*(1+sekalireturn2)),sekalijangka2)
	document.getElementById("sekalihasil2").value = addCommas(Math.ceil(sekalihasil2));
}

function isnumber(e)
{
    var keyCode = (event.which) ? event.which : (window.event.keyCode) ? window.event.keyCode : -1;
    var str=e.value;

    if ((str.length==0) && (event.keyCode==46)) return false; // checking that length ==0 than not allow to enter '.'
    if ((str.indexOf('.')>0) && (event.keyCode==46)) return false; // checking that if user already entered '.' than not allow to enter '.'

          if (keyCode != 46 && keyCode > 31
            && (keyCode < 48 || keyCode > 57))
             return false;

          return true;
}

</script>
<?php
	if($task == 'event') {
?>

<script type="text/javascript">
    var get_data        = '<?php if(isset($get_data))  { echo $get_data; } ?>';
    var backend_url     = '<?php echo base_url(); ?>';

    $(document).ready(function() {
        $('.date-picker').datepicker();
        $('#calendarIO').fullCalendar({
            header: {
                left: 'prev,next today',
                center: 'title',
                right: 'month,basicWeek,basicDay'
            },
			displayEventTime: false,
            defaultDate: moment().format('YYYY-MM-DD'),
            editable: true,
                eventLimit: true, // allow "more" link when too many events
                selectable: true,
                selectHelper: true,
                select: function(start, end) {
                    $('#create_modal input[name=start_date]').val(moment(start).format('YYYY-MM-DD'));
                    $('#create_modal input[name=end_date]').val(moment(end).format('YYYY-MM-DD'));
                    $('#create_modal').modal('show');
                    save();
                    $('#calendarIO').fullCalendar('unselect');
                },
                eventDrop: function(event, delta, revertFunc) { // si changement de position
                    editDropResize(event);
                },
                eventResize: function(event,dayDelta,minuteDelta,revertFunc) { // si changement de longueur
                    editDropResize(event);
                },
                eventClick: function(event, element)
                {
                    deteil(event);
//                    editData(event);
//                    deleteData(event);
                },
                events: JSON.parse(get_data)
            });
    });

    $(document).on('click', '.add_calendar', function(){
        $('#create_modal input[name=calendar_id]').val(0);
        $('#create_modal').modal('show');  
    })

    $(document).on('submit', '#form_create', function(){

        var element = $(this);
        var eventData;
        $.ajax({
            url     : backend_url+'calendar/save',
            type    : element.attr('method'),
            data    : element.serialize(),
            dataType: 'JSON',
            beforeSend: function()
            {
                element.find('button[type=submit]').html('<i class="fa fa-spinner fa-spin" aria-hidden="true"></i>');
            },
            success: function(data)
            {
                if(data.status)
                {   
                    eventData = {
                        id          : data.id,
                        title       : $('#create_modal input[name=title]').val(),
                        description : $('#create_modal textarea[name=description]').val(),
                        start       : moment($('#create_modal input[name=start_date]').val()).format('YYYY-MM-DD HH:mm:ss'),
                        end         : moment($('#create_modal input[name=end_date]').val()).format('YYYY-MM-DD HH:mm:ss'),
                        color       : $('#create_modal select[name=color]').val()
                    };
                        $('#calendarIO').fullCalendar('renderEvent', eventData, true); // stick? = true
                        $('#create_modal').modal('hide');
                        element[0].reset();
                        $('.notification').removeClass('alert-danger').addClass('alert-primary').find('p').html(data.notif);
                    }
                    else
                    {
                        element.find('.alert').css('display', 'block');
                        element.find('.alert').html(data.notif);
                    }
                    element.find('button[type=submit]').html('Submit');
                },
                error: function (jqXHR, textStatus, errorThrown)
                {
                    element.find('button[type=submit]').html('Submit');
                    element.find('.alert').css('display', 'block');
                    element.find('.alert').html('Wrong server, please save again');
                }         
            });
        return false;
    })

    function editDropResize(event)
    {
        start = event.start.format('YYYY-MM-DD HH:mm:ss');
        if(event.end)
        {
            end = event.end.format('YYYY-MM-DD HH:mm:ss');
        }
        else
        {
            end = start;
        }
        
        $.ajax({
            url     : backend_url+'calendar/save',
            type    : 'POST',
            data    : 'calendar_id='+event.id+'&title='+event.title+'&start_date='+start+'&end_date='+end,
            dataType: 'JSON',
            beforeSend: function()
            {
            },
            success: function(data)
            {
                if(data.status)
                {   
                    $('.notification').removeClass('alert-danger').addClass('alert-primary').find('p').html('Data success update');
                }
                else
                {
                    $('.notification').removeClass('alert-primary').addClass('alert-danger').find('p').html('Data cant update');
                }
                
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                $('.notification').removeClass('alert-primary').addClass('alert-danger').find('p').html('Wrong server, please save again');
            }         
        });
    }

    function save()
    {
        $('#form_create').submit(function(){
            var element = $(this);
            var eventData;
            $.ajax({
                url     : backend_url+'calendar/save',
                type    : element.attr('method'),
                data    : element.serialize(),
                dataType: 'JSON',
                beforeSend: function()
                {
                    element.find('button[type=submit]').html('<i class="fa fa-spinner fa-spin" aria-hidden="true"></i>');
                },
                success: function(data)
                {
                    if(data.status)
                    {   
                        eventData = {
                            id          : data.id,
                            title       : $('#create_modal input[name=title]').val(),
                            description : $('#create_modal textarea[name=description]').val(),
                            start       : moment($('#create_modal input[name=start_date]').val()).format('YYYY-MM-DD HH:mm:ss'),
                            end         : moment($('#create_modal input[name=end_date]').val()).format('YYYY-MM-DD HH:mm:ss'),
                            color       : $('#create_modal select[name=color]').val()
                        };
                            $('#calendarIO').fullCalendar('renderEvent', eventData, true); // stick? = true
                            $('#create_modal').modal('hide');
                            element[0].reset();
                            $('.notification').removeClass('alert-danger').addClass('alert-primary').find('p').html(data.notif);
                        }
                        else
                        {
                            element.find('.alert').css('display', 'block');
                            element.find('.alert').html(data.notif);
                        }
                        element.find('button[type=submit]').html('Submit');
                    },
                    error: function (jqXHR, textStatus, errorThrown)
                    {
                        element.find('button[type=submit]').html('Submit');
                        element.find('.alert').css('display', 'block');
                        element.find('.alert').html('Wrong server, please save again');
                    }         
                });
            return false;
        })
    }

    function deteil(event)
    {
		window.open("<?=base_url('event/detail/')?>"+event.id, "_self");
//        $('#create_modal input[name=calendar_id]').val(event.id);
//        $('#create_modal input[name=start_date]').val(moment(event.start).format('YYYY-MM-DD'));
//        $('#create_modal input[name=end_date]').val(moment(event.end).format('YYYY-MM-DD'));
//        $('#create_modal input[name=title]').val(event.title);
//        $('#create_modal input[name=description]').val(event.description);
//        $('#create_modal select[name=color]').val(event.color);
//        $('#create_modal .delete_calendar').show();
//        $('#create_modal').modal('show');
    }

    function editData(event)
    {
        $('#form_create').submit(function(){
            var element = $(this);
            var eventData;
            $.ajax({
                url     : backend_url+'calendar/save',
                type    : element.attr('method'),
                data    : element.serialize(),
                dataType: 'JSON',
                beforeSend: function()
                {
                    element.find('button[type=submit]').html('<i class="fa fa-spinner fa-spin" aria-hidden="true"></i>');
                },
                success: function(data)
                {
                    if(data.status)
                    {   
                        event.title         = $('#create_modal input[name=title]').val();
                        event.description   = $('#create_modal textarea[name=description]').val();
                        event.start         = moment($('#create_modal input[name=start_date]').val()).format('YYYY-MM-DD HH:mm:ss');
                        event.end           = moment($('#create_modal input[name=end_date]').val()).format('YYYY-MM-DD HH:mm:ss');
                        event.color         = $('#create_modal select[name=color]').val();
                        $('#calendarIO').fullCalendar('updateEvent', event);

                        $('#create_modal').modal('hide');
                        element[0].reset();
                        $('#create_modal input[name=calendar_id]').val(0)
                        $('.notification').removeClass('alert-danger').addClass('alert-primary').find('p').html(data.notif);
                    }
                    else
                    {
                        element.find('.alert').css('display', 'block');
                        element.find('.alert').html(data.notif);
                    }
                    element.find('button[type=submit]').html('Submit');
                },
                error: function (jqXHR, textStatus, errorThrown)
                {
                    element.find('button[type=submit]').html('Submit');
                    element.find('.alert').css('display', 'block');
                    element.find('.alert').html('Wrong server, please save again');
                }         
            });
            return false;
        })
    }

    function deleteData(event)
    {
        $('#create_modal .delete_calendar').click(function(){
            $.ajax({
                url     : backend_url+'calendar/delete',
                type    : 'POST',
                data    : 'id='+event.id,
                dataType: 'JSON',
                beforeSend: function()
                {
                },
                success: function(data)
                {
                    if(data.status)
                    {   
                        $('#calendarIO').fullCalendar('removeEvents',event._id);
                        $('#create_modal').modal('hide');
                        $('#form_create')[0].reset();
                        $('#create_modal input[name=calendar_id]').val(0)
                        $('.notification').removeClass('alert-danger').addClass('alert-primary').find('p').html(data.notif);
                    }
                    else
                    {
                        $('#form_create').find('.alert').css('display', 'block');
                        $('#form_create').find('.alert').html(data.notif);
                    }
                },
                error: function (jqXHR, textStatus, errorThrown)
                {
                    $('#form_create').find('.alert').css('display', 'block');
                    $('#form_create').find('.alert').html('Wrong server, please save again');
                }         
            });
        })
    }

</script>
<?php
	} //if event
?>


<script type="text/javascript">
const popup = document.querySelector('.chat-popup');
const chatBtn = document.querySelector('.chat-btn');
const submitBtn = document.querySelector('.submit');
const chatArea = document.querySelector('.chat-area');
const inputElm = document.querySelector('input');
const emojiBtn = document.querySelector('#emoji-btn');

//   chat button toggler 

chatBtn.addEventListener('click', ()=>{
    popup.classList.toggle('show');
})

		 function getCurrentTime(){
			var now = new Date();
			var hh = now.getHours();
			var min = now.getMinutes();
			var ampm = (hh>=12)?'PM':'AM';
			hh = hh%12;
			hh = hh?hh:12;
			hh = hh<10?'0'+hh:hh;
			min = min<10?'0'+min:min;
			var time = hh+":"+min+" "+ampm;
			return time;
		 }
		 function send_msg(){
			jQuery('.start_chat').hide();
			var txt=jQuery('#input-me').val();
			var name=jQuery('#nama-me').val();
			var email=jQuery('#nama-me').val();
			var handphone=jQuery('#handphone-me').val();
			var sessid='<?=$session_id?>';
			var html='<li class="messages-me clearfix"><span class="message-img"><img src="<?=base_url()?>images/user_avatar.png" class="avatar-sm rounded-circle"></span><div class="message-body clearfix"><div class="message-header"><strong class="messages-title">'+name+'</strong> <small class="time-messages text-muted"><span class="fas fa-time"></span> <span class="minutes">'+getCurrentTime()+'</span></small> </div><p class="messages-p">'+txt+'</p></div></li>';
			jQuery('.messages-list').append(html);
			jQuery('#input-me').val('');
			if(txt){
				jQuery.ajax({
					url:'get_bot_message.php',
					type:'post',
					data:{txt:txt,name:name,email:email,handphone:handphone,sessid:sessid,},
					success:function(result){
						var html='<li class="messages-you clearfix"><span class="message-img"><img src="<?=base_url()?>images/bot_avatar2.png" class="avatar-sm rounded-circle"></span><div class="message-body clearfix"><div class="message-header"><strong class="messages-title">Dina</strong> <small class="time-messages text-muted"><span class="fas fa-time"></span> <span class="minutes">'+getCurrentTime()+'</span></small> </div><p class="messages-p">'+result+'</p></div></li>';
						jQuery('.messages-list').append(html);
						jQuery('.messages-box').scrollTop(jQuery('.messages-box')[0].scrollHeight);
					}
				});
			}
		 }
		 function send_pilihan(pilid){
			if(pilid){
				jQuery.ajax({
					url:'get_bot_pilihan.php',
					type:'post',
					data:{id:pilid},
					success:function(result){
						var html='<li class="messages-you clearfix"><span class="message-img"><img src="<?=base_url()?>images/bot_avatar2.png" class="avatar-sm rounded-circle"></span><div class="message-body clearfix"><div class="message-header"><strong class="messages-title">Dina</strong> <small class="time-messages text-muted"><span class="fas fa-time"></span> <span class="minutes">'+getCurrentTime()+'</span></small> </div><p class="messages-p">'+result+'</p></div></li>';
						jQuery('.messages-list').append(html);
						jQuery('.messages-box').scrollTop(jQuery('.messages-box')[0].scrollHeight);
					}
				});
			}
		 }
		 function send_login(){
			var name='';
			var name=jQuery('#nama-me').val();
			var email=jQuery('#nama-me').val();
			var handphone=jQuery('#handphone-me').val();
			var sessid='<?=$session_id?>';
			if(!name){
				alert('Mohon Nama Diisi');
				return false;
			}
			if(!email){
				alert('Mohon Email Diisi');
				return false;
			}
			if(!handphone){
				alert('Mohon Handphone Diisi');
				return false;
			}
			if(name){
				jQuery.ajax({
					url:'<?php echo base_url("user/setbotid"); ?>',
					type:'post',
					data:{name:name,email:email,handphone:handphone,sessid:sessid,},
					success:function(result){
						var html=result;
//						jQuery('.messages-list').append(html);
//						jQuery('.messages-box').scrollTop(jQuery('.messages-box')[0].scrollHeight);
					}
				});
			}
			jQuery('.login_chat').hide();
			$("#input-msg").show();
			$("#input-login").hide();
			$("#welcome-msg").hide();
//			 alert('login');
		 }
var inputchat = document.getElementById("input-me");

window.onload = function() {
  $("#input-msg").hide();
};

// Execute a function when the user releases a key on the keyboard
inputchat.addEventListener("keyup", function(event) {
  // Number 13 is the "Enter" key on the keyboard
  if (event.keyCode === 13) {
    // Cancel the default action, if needed
    event.preventDefault();
    // Trigger the button element with a click
    document.getElementById("send-me").click();
  }
});
<?php
	if($task == 'user') {
?>
    var sig = $('#sig').signature({syncField: '#signature64', syncFormat: 'PNG'});
    $('#clear').click(function(e) {
        e.preventDefault();
        sig.signature('clear');
        $("#signature64").val('');
    });
<?php
    }
?>
</script>
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-MPTH52Q"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->