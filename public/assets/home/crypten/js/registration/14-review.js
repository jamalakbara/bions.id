var initiatedata = {


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
    
    //1.ocr-review
    var yearnow = new Date().getFullYear();
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


    //2.add-data
    //initiate kode area phone
    updateAreaPhone(store.vform.addressphonecountry, store.vform.addressphonearea);
    



    //initiate province
    if(store.vform.addresspcountry != ''){
        $.getJSON(url_lookup, {
            type: 3,
            params: [store.vform.addresspcountry]
        }, function(json) {
            var update_field = $('#addresspprovince');
            var opts = createOptions(json, update_field);
            update_field.html(opts);

            if(store.vform.addresspcountry == 'INA'){
                $('select[name=addresspprovince]').attr("disabled",false);
                updateDropdownValue('addresspprovince', store.vform.addresspprovince);
            } else{
                $('select[name=addresspprovince]').attr("disabled",true);
                updateDropdownValue('addresspprovince', '1000');
            }
        });
    }

    //initiate address city dropdown
    if(store.vform.addresspprovince != ''){

         $.getJSON(url_lookup, {
            type: 4,
            params: [store.vform.addresspcountry, store.vform.addresspprovince]
        }, function(json) {
            addresspcity_options = json;

            var update_field = $('#addresspcity');
            var opts = createOptions(json, update_field);
            update_field.html(opts);

            if(store.vform.addresspcountry == 'INA'){
                update_field.html(opts);
                $('select[name=addresspcity]').attr("disabled",false);
                updateDropdownValue('addresspcity', store.vform.addresspcity);
             } else{
                update_field.html(opts);
                $('select[name=addresspcity]').attr("disabled",true);
                updateDropdownValue('addresspcity', '1000');
             }
        });
    }

    //initiate address subdistrict
    if(store.vform.addresspprovince != '' && store.vform.addresspcity != ''){

        $.getJSON(url_lookup, {
            type: 21,
            params: [store.vform.addresspcountry, store.vform.addresspprovince, store.vform.addresspcity]
        }, function(json) {
            var update_field = $('#addresspsubdistrict');
            var opts = createOptions(json, update_field);
            update_field.html(opts);
            
            if(store.vform.addresspcountry == 'INA'){
                update_field.html(opts);
                $('select[name=addresspsubdistrict]').attr("disabled",false);
                updateDropdownValue('addresspsubdistrict', store.vform.addresspsubdistrict);
             } else{
                update_field.html(opts);
                $('select[name=addresspsubdistrict]').attr("disabled",true);
                updateDropdownValue('addresspsubdistrict', '1000');
             }
        });
    }

    //initiate address village
    if(store.vform.addresspprovince != '' 
        && store.vform.addresspcity != ''
        && store.vform.addresspsubdistrict != ''){
        $.getJSON(url_lookup, {
            type: 22,
            params: [store.vform.addresspcountry, store.vform.addresspprovince, store.vform.addresspcity,store.vform.addresspsubdistrict]
        }, function(json) {
            var update_field = $('#addresspvillage');
            var opts = createOptions(json, update_field);
            update_field.html(opts);
            
            if(store.vform.addresspcountry == 'INA'){
                update_field.html(opts);
                $('select[name=addresspvillage]').attr("disabled",false);
                updateDropdownValue('addresspvillage', store.vform.addresspvillage);
             } else{
                update_field.html(opts);
                $('select[name=addresspvillage]').attr("disabled",true);
                updateDropdownValue('addresspvillage', '1000');
             }
        });
    }

    //initiate address kode pos dropdown
    if(store.vform.addresspprovince != '' 
        && store.vform.addresspcity != ''
        && store.vform.addresspsubdistrict != ''
        && store.vform.addresspvillage != ''
        && store.vform.addresspcountry != '' ){
        
        $.getJSON(url_lookup, {
            type: 23,
            params: [store.vform.addresspcountry, store.vform.addresspprovince, store.vform.addresspcity,store.vform.addresspsubdistrict,store.vform.addresspvillage]
        }, function(json) {
            var update_field = $('#addressppostalcode');
            var opts = createOptions(json, update_field);
            update_field.html(opts);
            
            if(store.vform.addresspcountry == 'INA'){
                update_field.html(opts);
                $('select[name=addressppostalcode]').attr("disabled",false);
                updateDropdownValue('addressppostalcode', store.vform.addressppostalcode);
             } else{
                update_field.html(opts);
                $('select[name=addressppostalcode]').attr("disabled",true);
                updateDropdownValue('addressppostalcode', '99999');
             }
        });
    }






    //initiate occupational
     if (store.vform.occupationaltype == 'HOUSE WIFE' 
            || store.vform.occupationaltype == 'STUDENT'
            || store.vform.occupationaltype == 'RETIREMENT') {
        $("#correspondencetype option[value='3']").remove();
        updateDropdownValue('correspondencetype', store.vform.correspondencetype);

     }

     if(store.vform.occupationalprovince != ''){
         $.getJSON(url_lookup, {
            type: 4,
            params: [store.vform.occupationalcountry, store.vform.occupationalprovince]
        }, function(json) {
            var update_field = $('#occupationalcity');
            var opts = createOptions(json, update_field);
            update_field.html(opts);
            updateDropdownValue('occupationalcity', store.vform.occupationalcity);
        });
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
        }
        
        $('#occupationalpostalcode').val(store.vform.occupationalpostalcode).trigger('change');
    });


    //
    $('input[name=acctype]').attr("disabled",true);
    $('input[name=identitynum]').attr("disabled",true);
    $('input[name=fullname]').attr("disabled",true);
    $('input[name=birthplace]').attr("disabled",true);
    $('input[name=birthday]').attr("disabled",true);
    $('input[name=gender]').attr("disabled",true);
    $('input[name=addressstreet]').attr("disabled",true);
    $('input[name=addresshousing]').attr("disabled",true);
    $('select[name=addressvillage]').attr("disabled",true);
    $('select[name=addresssubdistrict]').attr("disabled",true);
    $('select[name=addresscity]').attr("disabled",true);
    $('select[name=addressprovince]').attr("disabled",true);
    $('select[name=religion]').attr("disabled",true);
    $('select[name=maritalstatus]').attr("disabled",true);
    $('select[name=occupationaltype]').attr("disabled",true);
    $('input[name=occupationaltypeother]').attr("disabled",true);
    $('input[name=identityissuedplace]').attr("disabled",true);
    $('input[name=identityissueddate]').attr("disabled",true);
    $('input[name=identityexpireddate]').attr("disabled",true);
    $('input[name=identityexpireddate_lifetime]').attr("disabled",true);

    $('select[name=bankname]').attr("disabled",true);
    $('input[name=bankbeneficiaryaccount]').attr("disabled",true);
    $('input[name=bankbeneficiaryname]').attr("disabled",true);

    $("select").not("#occupationalpostalcode").formSelect();   
})
//ocr-review
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

//add-data
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

.on('click', '.btn-review', function(e) {
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
            url: base_url+"registration/review/next",
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

var numericFields = [
    '#taxidnum',
    '#bankbeneficiaryaccount'
];
allowNumericValues(numericFields.join(','), false, false, false);

