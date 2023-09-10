$('body')
    .ready(function(){
        $('#first').focus();
        runCountdown();
    })
    .on('keyup', '.input-otp', function(event) {
      if(this.value.length == 0) {
        $(this).parent().prev().find('.input-otp').focus();
      } else if (this.value.length == 1) {
        $(this).parent().next().find('.input-otp').focus();
      } else{
        // console.log('else');
        // var id = $(this).attr('id');
        // if(id !== 'sixth'){
        //     var x= this.value.charAt(0);
        //     var y = this.value.charAt(1);
        //     $(this).val(x);
        //     $(this).parent().next().find('.input-otp').val(y);
        //     $(this).parent().next().find('.input-otp').focus();
        // } else{
        //     $(this).val(this.value);
        // }
        
      }
    })
    .on('keydown', '.input-otp', function(event) {

        if(this.value.length == 1) {
            $(this).val('');
        } 
    })
    .on('click', '.btn-nextstepotp', function(e) {
        var first = $('#first').val();
        var second = $('#second').val();
        var third = $('#third').val();
        var fourth = $('#fourth').val();
        var fifth = $('#fifth').val();
        var sixth = $('#sixth').val();

        if(first && second && third && fourth && fifth && sixth){
            var otp = first+second+third+fourth+fifth+sixth;

            var formData = new FormData();
            formData.append('otp',otp);
            $.ajax({
                type: 'POST',
                url: base_url+"registration/otp/next",
                data: formData,
                contentType: false,
                processData: false, 
                success: function(json) {
                    
                    if(json['response']){
                        if(json['response'] == 1){
                            localStorage.removeItem("otp-expired");
                            window.location.href = json['next-page'];
                        } else{
                            // errorToast(json['description']);    
                            $('#page-title').text('Verifikasi OTP Gagal');
                            $('#otp-desc').text('Kode verifikasi tidak sesuai. Silahkan masukkan kembali');
                            clearOtpInput();
                            $('#first').focus();
                        }
                    } else{
                        errorToast('Oops, something went wrong');
                    }
                }
            });
        } else{
            errorToast('Mohon isi OTP');
        }
    })
    .on('click', '.btn-resendotp', function(e) {
        if ( msLeft < 1000 ) {

            $.ajax({
                type: 'POST',
                url: base_url+"registration/otp/resend",
                contentType: false,
                processData: false, 
                success: function(json) {
                    
                    if(json['response']){
                        if(json['response'] == 1){
                            resetCountdown();

                            clearOtpInput();

                            $('#first').focus();
                        } else{
                            errorToast(json['description']);    
                        }
                    } else{
                        errorToast('Oops, something went wrong');
                    }
                }
            });
        } else{
            errorToast('OTP Masih aktif');
        }
    });


var msLeft;
function countdown( elementName, endTime )
{
   var element, endTime, hours, mins, time;

    function twoDigits( n )
    {
        return ("0" + n).slice(-2);
    }

    function updateTimer()
    {
        msLeft = endTime - (+new Date);
        localStorage.setItem("otp-expired", (msLeft + (+new Date)));
        if ( msLeft < 1000 ) {
            element.innerHTML = "<a class=\"waves-effect waves-light btn col s12 white-text btn-resendotp\">Resend OTP</a>"
        } else {
            time = new Date( msLeft );
            hours = time.getUTCHours();
            mins = time.getUTCMinutes();
            element.innerHTML = 'Kirim ulang OTP dalam waktu : ' + (hours ? hours + ':' + twoDigits( mins ) : mins) + ':' + twoDigits( time.getUTCSeconds() );
            setTimeout( updateTimer, time.getUTCMilliseconds() + 500 );
        }
    }

    element = document.getElementById( elementName );
    updateTimer();
}

function runCountdown(){

    if(localStorage.getItem("otp-expired")){
        countdown( "countdown", localStorage.getItem("otp-expired"));
    } else{
        countdown( "countdown", calculateEndTime(5, 0) );
    }
}

function resetCountdown(){
    countdown( "countdown", calculateEndTime(5, 0));
}

function calculateEndTime (minutes, seconds){
    return (+new Date) + 1000 * (60*minutes + seconds) + 500;
}

function clearOtpInput(){

    $('#first').val('');
    $('#second').val('');
    $('#third').val('');
    $('#fourth').val('');
    $('#fifth').val('');
    $('#sixth').val('');
}

