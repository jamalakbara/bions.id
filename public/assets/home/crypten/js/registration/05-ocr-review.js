var initiatedata = {
    identitytype: '1',
	identitynum : '',
	identityissuedplace : '',
	identityissueddate : '',
    identityexpireddate: '',
    identityexpireddate_lifetime: true,
	fullname : '',
	birthplace : '',
	birthday : '',
	gender : '',
	addressstreet : '',
	addresshousing : '',
	addressvillage : '',
	addresssubdistrict : '',
	addresscity: '',
	addressprovince : '',
	addresspostalcode : '',
    addresscountry: 'INA',
	religion : '',
	maritalstatus : '',
	occupationaltype : '',
	occupationaltypeother : '',
	educationalbg : '',
	mothername : '',
	spousename : ''
}

var store = {
    vform: {
    	...initiatedata,
    	...savedata
    }
  };


setupVueApp();

$('body')
.ready(function(){
    var yearnow = new Date().getFullYear();
    $('select').formSelect();    
    $('#birthday, #identityissueddate').datepicker({
    	"format" : 'dd-mm-yyyy',
    	"maxDate" : new Date(),
        "yearRange": [yearnow-100,yearnow],
    	onSelect: function(date) {
	        var input = $(this.el);
	        var id = $(input).attr('id');
	        store.vform[id] = dateToString(date);
	    }
    });

    $('#identityexpireddate').datepicker({
        "format" : 'dd-mm-yyyy',
        "yearRange": [yearnow-100,yearnow+6],
        onSelect: function(date) {
            var input = $(this.el);
            var id = $(input).attr('id');
            store.vform[id] = dateToString(date);
        }
    });
        
    //disable identityexpireddate, cause lifetime true
    $('#identityexpireddate').prop('disabled', true);

    //intiate birthday
    M.Datepicker.getInstance($('#birthday')).setDate(stringToDate(store.vform['birthday']));
    
    //initiate city dropdown
    if(store.vform.addressprovince != ''){

    	 $.getJSON(url_lookup, {
	        type: 4,
	        params: [store.vform.addresscountry, store.vform.addressprovince]
	    }, function(json) {
	    	addresscity_options = json;

	    	var update_field = $('#addresscity');
	    	var opts = createOptions(json, update_field);
	        update_field.html(opts);
            updateDropdownValue('addresscity', store.vform.addresscity);
	    });
    }

    //initiate subdistrict
    if(store.vform.addressprovince != '' && store.vform.addresscity != ''){

        $.getJSON(url_lookup, {
            type: 21,
            params: [store.vform.addresscountry, store.vform.addressprovince, store.vform.addresscity]
        }, function(json) {
            var update_field = $('#addresssubdistrict');
            var opts = createOptions(json, update_field);
            update_field.html(opts);
            updateDropdownValue('addresssubdistrict', store.vform.addresssubdistrict);
        });
    }

    //initiate village
    if(store.vform.addressprovince != '' 
        && store.vform.addresscity != ''
        && store.vform.addresssubdistrict != ''){
        $.getJSON(url_lookup, {
            type: 22,
            params: [store.vform.addresscountry, store.vform.addressprovince, store.vform.addresscity,store.vform.addresssubdistrict]
        }, function(json) {
            var update_field = $('#addressvillage');
            var opts = createOptions(json, update_field);
            update_field.html(opts);
            updateDropdownValue('addressvillage', store.vform.addressvillage);
        });
    }

    //initiate kode pos dropdown
    if(store.vform.addressprovince != '' 
        && store.vform.addresscity != ''
        && store.vform.addresssubdistrict != ''
        && store.vform.addressvillage != ''
        && store.vform.addresscountry != '' ){
        
        $.getJSON(url_lookup, {
            type: 23,
            params: [store.vform.addresscountry, store.vform.addressprovince, store.vform.addresscity,store.vform.addresssubdistrict,store.vform.addressvillage]
        }, function(json) {
            var update_field = $('#addresspostalcode');
            var opts = createOptions(json, update_field);
            update_field.html(opts);
            updateDropdownValue('addresspostalcode', store.vform.addresspostalcode);
        });
    }
})
.on('change', '#identityexpireddate_lifetime', function(e) {
    
    if(store.vform.identityexpireddate_lifetime){
        $('#identityexpireddate').prop('disabled', true);
        store.vform.identityexpireddate = '';
    } else{
        $('#identityexpireddate').prop('disabled', false);
    }
})
.on('change', '#addressprovince', function(e) {
    
     $.getJSON(url_lookup, {
        type: 4,
        params: [store.vform.addresscountry, $(this).val()]
    }, function(json) {
        addresscity_options = json;

        var update_field = $('#addresscity');
        var opts = createOptions(json, update_field);
        update_field.html(opts);
        updateDropdownValue('addresscity', '');
    });

    //reset subdistrict
    var update_field = $('#addresssubdistrict');
    var opts = createOptions('', update_field);
    update_field.html(opts);
    updateDropdownValue('addresssubdistrict', '');

    //reset village
    var update_field = $('#addressvillage');
    var opts = createOptions('', update_field);
    update_field.html(opts);
    updateDropdownValue('addressvillage', '');

    //reset postalcode
    var update_field = $('#addresspostalcode');
    var opts = createOptions('', update_field);
    update_field.html(opts);
    updateDropdownValue('addresspostalcode', '');
})
.on('change', '#addresscity', function(e) {
    
    $.getJSON(url_lookup, {
        type: 21,
        params: [store.vform.addresscountry, $('#addressprovince').val(), $('#addresscity').val()]
    }, function(json) {
        var update_field = $('#addresssubdistrict');
        var opts = createOptions(json, update_field);
        update_field.html(opts);
        updateDropdownValue('addresssubdistrict', '');
    });


    //reset village
    var update_field = $('#addressvillage');
    var opts = createOptions('', update_field);
    update_field.html(opts);
    updateDropdownValue('addressvillage', '');

    //reset postalcode
    var update_field = $('#addresspostalcode');
    var opts = createOptions('', update_field);
    update_field.html(opts);
    updateDropdownValue('addresspostalcode', '');
})
.on('change', '#addresssubdistrict', function(e) {
    
    $.getJSON(url_lookup, {
        type: 22,
        params: [store.vform.addresscountry, $('#addressprovince').val(), $('#addresscity').val(), $('#addresssubdistrict').val()]
    }, function(json) {
        var update_field = $('#addressvillage');
        var opts = createOptions(json, update_field);
        update_field.html(opts);
        updateDropdownValue('addressvillage', '');
    });

    //reset postalcode
    var update_field = $('#addresspostalcode');
    var opts = createOptions('', update_field);
    update_field.html(opts);
    updateDropdownValue('addresspostalcode', '');
})
.on('change', '#addressvillage', function(e) {
    $.getJSON(url_lookup, {
        type: 23,
        params: [store.vform.addresscountry, $('#addressprovince').val(), $('#addresscity').val(), $('#addresssubdistrict').val(), $('#addressvillage').val()]
    }, function(json) {
        var update_field = $('#addresspostalcode');
        var opts = createOptions(json, update_field);
        update_field.html(opts);
        updateDropdownValue('addresspostalcode', '');
    });
})
.on('click', '.btn-nextocrreview', function(e) {
    var $FORM = $('#reg-form');
    
    $FORM.validate({
        rules:formValidationApp,
        messages:formValidationAppMessage,
        errorElement: formValidation_errorElement,
        errorClass: formValidation_errorClass,
        highlight: formValidation_highlight,
        unhighlight: formValidation_unhighlight,
        invalidHandler: formValidation_invalidHandler, 
        errorPlacement: formValidation_errorPlacement,
        ignore: []
    });

    if ($FORM.valid()) {
        var formData = new FormData();
        var clone = JSON.parse(JSON.stringify(store.vform));
        formData.append('vform', JSON.stringify(clone));
       $.ajax({
            type: 'POST',
            url: base_url+"registration/ocrreview/next",
            data: formData,
            contentType: false,
            processData: false, 
            success: function(json) {
                if(json['response']){
                    if(json['response'] == 1){
                        window.location.href = json['next-page'];
                    } else{
                        errorToast(json['description']);    
                    }
                } else{
                    errorToast('Oops, something went wrong');
                }
            }
        });
    }
})

let addressFields = [
    '#addressstreet',
    '#addresshousing'
];

let nikField = [
    '#identitynum'
];

let listCode = [38, 39, ,92, 45, 123, 125, 44] /* code untuk karakter ==> & \ ' \ - { } , */

dontAllowChar(addressFields.join(','), listCode);

dontAllowChar(nikField.join(','), listCode);
