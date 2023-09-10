var store = {
    vform: {
        acctype : '01',
        onlinetype : '',
        branch : ''
    }
};

setupVueApp();

$('body')
    .ready(function(){
        $('select').formSelect();
    })
    .on('click', '.btn-nextsegmentation', function(e) {
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
                url: base_url+"registration/segmentation/next",
                data: formData,
                contentType: false,
                processData: false, 
                success: function(json) {
                    console.log(json);
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
