
$('body')
.ready(function(){
    
    
})
.on('click', '.btn-thankyou', function(e) {
   $.ajax({
        type: 'POST',
        url: base_url+"registration/thankyou/next",
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
    
});


