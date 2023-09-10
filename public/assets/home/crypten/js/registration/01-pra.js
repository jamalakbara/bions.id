var store = {
    vform: {
        referral: '',
        fullname: '',
        email: '',
        handphone: '',
        investortype: 'I',
        nationality: '01',
        reference: '',
        producttype: ['E','M','A','O'],
        havebniacc: '',
        
    }
};

setupVueApp();

$('body')
    .ready(function(){
        $('select').formSelect();
    })

    .on('change', 'input[type=radio][name=onlinetype]', function(e) {
        if (this.value == 'F') {
            $('#card-fullonline').removeClass("lighten-2").addClass("darken-2");
            $('#card-fullservice').removeClass("darken-2").addClass("lighten-3");
        }
        else if (this.value == 'C') {
            $('#card-fullonline').addClass("lighten-2").removeClass("darken-2");
            $('#card-fullservice').addClass("darken-2").removeClass("lighten-3");
        }
    })

    .on('change', 'input[type=radio][name=investortype]', function(e) {
        if (this.value == 'I') {
            updateDropdownValue('nationality', '01');
        }
        else if (this.value == 'A') {
            updateDropdownValue('nationality', '');
        }
    })

    .on('change', 'select', function(e) {
        store.vform[this.id] = this.value;
    })

    .on('click', '.btn-nextstep1', function(e) {
        var $FORM = $('#reg-pra');
        
        $FORM.validate({
            rules:formValidationStep1Rules,
            messages:formValidateionStep1Message,
            errorElement: formValidation_errorElement,
            errorClass: formValidation_errorClass,
            highlight: formValidation_highlight,
            unhighlight: formValidation_unhighlight,
            invalidHandler: formValidation_invalidHandler, 
            errorPlacement: formValidation_errorPlacement,
            ignore: []
        });

        store.validation_msg = [];
        if ($FORM.valid()) {
            
            var formData = new FormData();
            var clone = JSON.parse(JSON.stringify(store.vform));
            
            formData.append('vform', JSON.stringify(clone));
           $.ajax({
                type: 'POST',
                url: base_url+"registration/pra/next",
                data: formData,
                contentType: false,
                processData: false, 
                success: function(json) {
                    console.log(json);
                    if(json['response']){
                        if(json['response'] == 1){
                            if(localStorage.hasOwnProperty('otp-expired')){
                                localStorage.removeItem("otp-expired");
                            }
                            
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


var phoneFields = [
    '#handphone'
];

allowNumericValues(phoneFields.join(','), true, false, false);