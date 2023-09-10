var initiatedata = {
	taxidnum : '',
    occupationalsourceofincome : '1',
    occupationalsourceofincomeother : '',
    occupationalmonthlyincome : '1',
    occupationalannualincome : '00',
    occupationalincomefrequency: 'MONTHLY',
    investmentobjectives: 'IV',
    bankname : '',
    bankbeneficiaryaccount : '',
    bankbeneficiaryname : ''
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
    $('select').formSelect();
        
    if(store.vform.havebniacc == true) {
        store.vform.bankname = 'BNI';
        $('#bankname').prop('disabled', true);
        updateDropdownValue('bankname', store.vform.bankname);
    }

})
.on('click', '.btn-nextincome', function(e) {
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
            url: base_url+"registration/income/next",
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

var numericFields = [
    '#taxidnum',
    '#bankbeneficiaryaccount'
];
allowNumericValues(numericFields.join(','), false, false, false);

var incomeFields = [
    '#occupationalsourceofincomeother'
];
allowAlphabetValues(incomeFields.join(','), true,);

let taxFields = [
    '#taxidnum'
];
let listCode = [38, 39, ,92, 45, 123, 125, 44] /* code untuk karakter ==> & \ ' \ - { } , */

dontAllowChar(taxFields.join(','), listCode);
dontAllowChar(incomeFields.join(','), listCode);
