var initiatedata = {
	riskprofilelonginvest: 0,
    riskprofilepurpose: 0,
    riskprofileloss: 0,
    riskprofileagreeincome: 0,
    riskprofileknowledge: 0,
    riskprofiletotalscore: 0
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
    
    
})
.on('change', '[name*=riskprofile]', function(e) {
    computed_riskprofiletotalscore();
})
.on('click', '.btn-nextriskprofile', function(e) {
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
            url: base_url+"registration/riskprofile/next",
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

function computed_riskprofiletotalscore() {
    var result =
        parseInt(store.vform.riskprofilelonginvest || 0, 10) +
        parseInt(store.vform.riskprofilepurpose || 0, 10) +
        parseInt(store.vform.riskprofileloss || 0, 10) +
        parseInt(store.vform.riskprofileagreeincome || 0, 10) +
        parseInt(store.vform.riskprofileknowledge || 0, 10)
    ;
    store.vform.riskprofiletotalscore = result;
    return result;
}
