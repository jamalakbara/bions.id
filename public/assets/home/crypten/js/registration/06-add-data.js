var initiatedata = {
	addresspsame : true,
    addresspstreet: '',
    addressphousing: '',
    addresspvillage: '',
    addresspsubdistrict: '',
    addresspcity: '',
    addresspprovince: '',
    addresspcountry: 'INA',
    addressppostalcode: '',
    addressphonecountry: '+62',
    addressphonearea: '',
    phone: '',
    occupationalworkingplace: '',
    occupationaljobposition: '',
    occupationallinebusiness: '',
    occupationalstreet: '',
    occupationalhousing: '000/000',
    occupationalvillage: '',
    occupationalsubdistrict: '',
    occupationalcity: '',
    occupationalprovince: '',
    occupationalcountry: 'INA',
    occupationalpostalcode: '',
    correspondencetype: '1'
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
    $("select").not("#occupationalpostalcode").formSelect();   



    //initiate kode area phone
    updateAreaPhone(store.vform.addressphonecountry, store.vform.addressphonearea);
    
    //initiate occupational
     if (store.vform.occupationaltype == 'HOUSE WIFE' 
            || store.vform.occupationaltype == 'STUDENT'
            || store.vform.occupationaltype == 'RETIREMENT') {
        $("#correspondencetype option[value='3']").remove();
        updateDropdownValue('correspondencetype', store.vform.correspondencetype);

     }

     //init zipcode ooccupational
    $('#occupationalpostalcode').select2({
        minimumInputLength: 3,
        language: {
            inputTooShort: function(a) {
                return 'Masukkan '+(a.minimum - a.input.length) + ' karakter atau lebih';
            },
            noResults: function(){
               return "Kode Pos kamu tidak ditemukan, periksa kembali Kode Pos kamu ya";
           }
          },
          ajax: {
            url: url_lookup,
            data: function (params) {
              var query = {
                type: 24,
                params: [store.vform.occupationalcountry, params.term]
              }
              return query;
            },
            processResults: function (data) {
                var result = [];
                data.forEach(function (item, index) {
                  result.push(
                        {
                            'id' : item[0],
                            'text' : item[1],
                            'subdistrict': item[2],
                            'village': item[3],
                            'provid': item[4],
                            'cityid': item[5]
                        }
                    );
                });
              
                return {
                    results: result
                };
            },
            error: function (jqXHR, status, error) {
                return { results: [] }; // Return dataset to load after error
            }
        }
    });
})
.on('change', '#addresspcountry', function(e) {
    
    //province
    $.getJSON(url_lookup, {
        type: 3,
        params: [$(this).val()]
    }, function(json) {
        addresscity_options = json;

        var update_field = $('#addresspprovince');
        var opts = createOptions(json, update_field);
        update_field.html(opts);

        if($('#addresspcountry').val() == 'INA'){
            $('select[name=addresspprovince]').attr("disabled",false);
            updateDropdownValue('addresspprovince', '');
        } else{
            $('select[name=addresspprovince]').attr("disabled",true);
            updateDropdownValue('addresspprovince', '1000');
        }
    });

    //city
    $.getJSON(url_lookup, {
        type: 4,
        params: [$('#addresspcountry').val(), $('#addresspprovince').val()]
    }, function(json) {
        addresscity_options = json;

        var update_field = $('#addresspcity');
        var opts = createOptions(json, update_field);

         if($('#addresspcountry').val() == 'INA'){
            update_field.html(opts);
            $('select[name=addresspcity]').attr("disabled",false);
            updateDropdownValue('addresspcity', '');
         } else{
            update_field.html(opts);
            $('select[name=addresspcity]').attr("disabled",true);
            updateDropdownValue('addresspcity', '1000');
         }
        
    });

    //subdistrict 
    $.getJSON(url_lookup, {
        type: 21,
        params: [$('#addresspcountry').val(), $('#addresspprovince').val(), $('#addresspcity').val()]
    }, function(json) {

        var update_field = $('#addresspsubdistrict');
        var opts = createOptions(json, update_field);

         if($('#addresspcountry').val() == 'INA'){
            update_field.html(opts);
            $('select[name=addresspsubdistrict]').attr("disabled",false);
            updateDropdownValue('addresspsubdistrict', '');
         } else{
            update_field.html(opts);
            $('select[name=addresspsubdistrict]').attr("disabled",true);
            updateDropdownValue('addresspsubdistrict', '1000');
         }
        
    });

    //villages 
    $.getJSON(url_lookup, {
        type: 22,
        params: [$('#addresspcountry').val(), $('#addresspprovince').val(), $('#addresspcity').val(), $('#addresspsubdistrict').val()]
    }, function(json) {

        var update_field = $('#addresspvillage');
        var opts = createOptions(json, update_field);

         if($('#addresspcountry').val() == 'INA'){
            update_field.html(opts);
            $('select[name=addresspvillage]').attr("disabled",false);
            updateDropdownValue('addresspvillage', '');
         } else{
            update_field.html(opts);
            $('select[name=addresspvillage]').attr("disabled",true);
            updateDropdownValue('addresspvillage', '1000');
         }
        
    });

    //postalcode
    $.getJSON(url_lookup, {
        type: 23,
        params: [$('#addresspcountry').val(), $('#addresspprovince').val(), $('#addresspcity').val(), $('#addresspvillage').val(), $('#addresspsubdistrict').val()]
    }, function(json) {

        var update_field = $('#addressppostalcode');
        var opts = createOptions(json, update_field);

         if($('#addresspcountry').val() == 'INA'){
            update_field.html(opts);
            $('select[name=addressppostalcode]').attr("disabled",false);
            updateDropdownValue('addressppostalcode', '');
         } else{
            update_field.html(opts);
            $('select[name=addressppostalcode]').attr("disabled",true);
            updateDropdownValue('addressppostalcode', '99999');
         }
        
    });
})

.on('change', '#addresspprovince', function(e) {
    
    $.getJSON(url_lookup, {
        type: 4,
        params: [$('#addresspcountry').val(), $(this).val()]
    }, function(json) {
        addresscity_options = json;

        var update_field = $('#addresspcity');
        var opts = createOptions(json, update_field);
        update_field.html(opts);
        updateDropdownValue('addresspcity', '');
    });

    //reset subdistrict
    var update_field = $('#addresspsubdistrict');
    var opts = createOptions('', update_field);
    update_field.html(opts);
    updateDropdownValue('addresspsubdistrict', '');

    //reset village
    var update_field = $('#addresspvillage');
    var opts = createOptions('', update_field);
    update_field.html(opts);
    updateDropdownValue('addresspvillage', '');

    //reset postalcode
    var update_field = $('#addressppostalcode');
    var opts = createOptions('', update_field);
    update_field.html(opts);
    updateDropdownValue('addressppostalcode', '');
})
.on('change', '#addresspcity', function(e) {
    
    $.getJSON(url_lookup, {
        type: 21,
        params: [$('#addresspcountry').val(), $('#addresspprovince').val(), $('#addresspcity').val()]
    }, function(json) {
        var update_field = $('#addresspsubdistrict');
        var opts = createOptions(json, update_field);
        update_field.html(opts);
        updateDropdownValue('addresspsubdistrict', '');
    });


    //reset village
    var update_field = $('#addresspvillage');
    var opts = createOptions('', update_field);
    update_field.html(opts);
    updateDropdownValue('addresspvillage', '');

    //reset postalcode
    var update_field = $('#addressppostalcode');
    var opts = createOptions('', update_field);
    update_field.html(opts);
    updateDropdownValue('addressppostalcode', '');
})
.on('change', '#addresspsubdistrict', function(e) {
    
    $.getJSON(url_lookup, {
        type: 22,
        params: [$('#addresspcountry').val(), $('#addresspprovince').val(), $('#addresspcity').val(), $('#addresspsubdistrict').val()]
    }, function(json) {
        var update_field = $('#addresspvillage');
        var opts = createOptions(json, update_field);
        update_field.html(opts);
        updateDropdownValue('addresspvillage', '');
    });

    //reset postalcode
    var update_field = $('#addressppostalcode');
    var opts = createOptions('', update_field);
    update_field.html(opts);
    updateDropdownValue('addressppostalcode', '');
})
.on('change', '#addresspvillage', function(e) {
    $.getJSON(url_lookup, {
        type: 23,
        params: [$('#addresspcountry').val(), $('#addresspprovince').val(), $('#addresspcity').val(), $('#addresspsubdistrict').val(), $('#addresspvillage').val()]
    }, function(json) {
        var update_field = $('#addressppostalcode');
        var opts = createOptions(json, update_field);
        update_field.html(opts);
        updateDropdownValue('addressppostalcode', '');
    });
})


.on('change', '#occupationalcountry', function(e) {
    if($('#occupationalcountry').val() == 'INA'){
        $('#occupationalpostalcode').attr("disabled",false);
        store.vform.occupationalpostalcode = '';
        $('#occupationalpostalcode').val(null).trigger('change');

        store.vform.occupationalprovince = '';
        // updateDropdownValue('occupationalprovince', '');

        store.vform.occupationalcity = '';
        // updateDropdownValue('occupationalcity', '');

        store.vform.occupationalsubdistrict = '';
        store.vform.occupationalvillage = '';
        
     } else{
        $.getJSON(url_lookup, {
            type: 24,
            params: [store.vform.occupationalcountry,store.vform.occupationalpostalcode]
        }, function(data) {
            var result = [];
            data.forEach(function (item, index) {
              var data =
                    {
                        'id' : item[0],
                        'text' : item[1],
                        'subdistrict': item[2],
                        'village': item[3],
                        'provid': item[4],
                        'cityid': item[5]
                    };

                var newOption = new Option(data.text, data.id, false, false);
                $('#occupationalpostalcode').append(newOption);
            });
            
            if($('#occupationalcountry').val() != 'INA'){
                $('#occupationalpostalcode').attr("disabled",true);
                store.vform.occupationalpostalcode = '99999';
            }
            
            $('#occupationalpostalcode').val(store.vform.occupationalpostalcode).trigger('change');
        });
     }


})

.on('select2:select', '#occupationalpostalcode', function(e) {
    var data = e.params.data;

    store.vform.occupationalprovince = data.provid;
    //province
    // $.getJSON(url_lookup, {
    //     type: 3,
    //     params: [store.vform.occupationalcountry]
    // }, function(json) {
    //     addresscity_options = json;

    //     var update_field = $('#occupationalprovince');
    //     var opts = createOptions(json, update_field);
    //     update_field.html(opts);

    //     updateDropdownValue('occupationalprovince', store.vform.occupationalprovince);
    // });
    

    //city
    store.vform.occupationalcity = data.cityid;
    // if(store.vform.occupationalprovince != ''){
    //     $.getJSON(url_lookup, {
    //         type: 4,
    //         params: [store.vform.occupationalcountry, store.vform.occupationalprovince]
    //     }, function(json) {
    //         addresscity_options = json;

    //         var update_field = $('#occupationalcity');
    //         var opts = createOptions(json, update_field);
    //         update_field.html(opts);
    //         updateDropdownValue('occupationalcity', store.vform.occupationalcity);
    //     });
    // }

    store.vform.occupationalsubdistrict = data.subdistrict;
    store.vform.occupationalvillage = data.village;
    store.vform.occupationalpostalcode = data.id;
})

.on('change', '#addressphonecountry', function(e) {
    updateAreaPhone($(this).val(), '');
})

.on('change', '[name=addresspsame]', function(e) {
    if ($(this).is(':checked')) {
        //set on controller
    } else {
        store.vform.addresspstreet = '';
        store.vform.addressphousing = '';
        store.vform.addresspvillage = '';
        store.vform.addresspsubdistrict = '';
        updateDropdownValue('addresspprovince', '');
        
        var update_field = $('#addresspcity');
        var opts = createOptions('', update_field);
        update_field.html(opts);
        updateDropdownValue('addresspcity', '');
        
        updateDropdownValue('addresspcountry', 'INA');

        var update_field = $('#addresspsubdistrict');
        var opts = createOptions('', update_field);
        update_field.html(opts);
        updateDropdownValue('addresspsubdistrict', '');

        var update_field = $('#addresspvillage');
        var opts = createOptions('', update_field);
        update_field.html(opts);
        updateDropdownValue('addresspvillage', '');

        var update_field = $('#addressppostalcode');
        var opts = createOptions('', update_field);
        update_field.html(opts);
        updateDropdownValue('addressppostalcode', '');
    };
})
.on('click', '.btn-nextadddata', function(e) {
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
            url: base_url+"registration/adddata/next",
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
});

function updateAreaPhone(countryphone, value){
    $.getJSON(url_lookup, {
        type: 8,
        params: [countryphone]
    }, function(json) {
        var update_field = $('#addressphonearea');
        var opts = createOptions(json, update_field);
        update_field.html(opts);
        updateDropdownValue('addressphonearea', value);
    });
}


var phoneFields = [
    '#phone',
    '#occupationalphone'
];

allowNumericValues(phoneFields.join(','), true, false, false);

let workingFields = [
    '#occupationalworkingplace',
    '#occupationalstreet'
];

let listCode = [38, 39, ,92, 45, 123, 125, 44]; /* code untuk karakter ==> & \ ' \ - { } , */

dontAllowChar(workingFields.join(','), listCode);

let addresspFields = [
    '#addresspstreet',
    '#addressphousing'
];

dontAllowChar(addresspFields.join(','), listCode);

let occupationalworkingplace = [
    '#occupationalworkingplace',
];

// allowAlphabetValues(occupationalworkingplace.join(','), true)
