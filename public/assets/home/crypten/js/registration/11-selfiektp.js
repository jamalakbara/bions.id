var xStream;

var countInitiateCamera = 0;
var defaultFacingMode = "user";

var video = document.querySelector("video");
var canvas = document.querySelector('#canvas');

function getStream() {
  countInitiateCamera = countInitiateCamera + 1;

  if (window.stream) {
    window.stream.getTracks().forEach(track => {
      track.stop();
    });
  }

  var constraints = null;
  if(countInitiateCamera == 1){
      constraints = {
        video: {
            facingMode: { exact: defaultFacingMode }
        }
      };
    } else{
        constraints = {
            video : true
        };
    }
  return navigator.mediaDevices.getUserMedia(constraints).
    then(gotStream).catch(handleError);
}

function gotStream(stream) {
  window.stream = stream; 
  video.srcObject = stream;

  $('#app-camera-error').hide();
    $('#app').show();
}

function handleError(error) {
    if(countInitiateCamera == 1){
        getStream();

    } else{
        console.error('error : '+error);
        errorToast(error);

        $('#app-camera-error').show();
        $('#app').hide();
    }
}

async function waitVideoShown() {
  while(video.videoWidth == 0){
    await sleep(100);  
  }
    await sleep(500); //iphone bug height and width
  
    //prepare style wait until video rendered
    var div = $('#video-wrapper');
    div.css('border', '2px solid var(--color-primary)');

    // var divoverlay = $('#video-wrapper>.overlay');
    // console.log(divoverlay);
    // divoverlay.css('background-image', 'url(/images/guide-selfie.png)');

    $('.btn-takeselfiektp').show();


    widthVideo = div.width();
    heightVideo = widthVideo*ratioHeight;

    ratioVideoView = (video.videoWidth/widthVideo);
    if(heightVideo > (video.videoHeight / ratioVideoView)){
        heightVideo = (video.videoHeight / ratioVideoView);
    }

    div.css('height', heightVideo);
}

var widthVideo = 0;
var heightVideo = 0;
var ratioVideoView = 0;
var ratioHeight = 1.33;
$('body')
    .ready(function(){
        $('select').formSelect(); 
        getStream();
        waitVideoShown();
    })
    .on('click', '.btn-takeselfiektp', function(e) {
        canvas.width = widthVideo * ratioVideoView;
        canvas.height = heightVideo * ratioVideoView;
        
        canvas.getContext('2d').translate(canvas.width, 0);
        canvas.getContext('2d').scale(-1, 1);
        // canvas.getContext('2d').drawImage(video, 0, 0);

        canvas.getContext('2d').drawImage(video, 
            0, 0,
            canvas.width, canvas.height,
            0, 0,
            canvas.width, canvas.height
        );

        video.style.display='none';
        canvas.style.display='block';;
        $('.btn-takeselfiektp').hide();
        $('.btn-retakeselfiektp').show();

        // const img = document.createElement('img');
        // img.src = canvas.toDataURL('image/png');
        // screenshotsContainer.prepend(img);
        
        video.pause();
    })
    .on('click', '.btn-retakeselfiektp', function(e) {
        video.style.display='block';
        canvas.style.display='none';;
        $('.btn-takeselfiektp').show();
        $('.btn-retakeselfiektp').hide();

        clearCanvas(canvas);
        // initiateCamera();
        video.play();

    })
    .on('click', '.btn-selfiektpnext', function(e) {
        
        
        if(!isCanvasBlank(canvas)){
            var formData = new FormData();
            formData.append('selfiektp',imageToDataUri(canvas, canvas.width, canvas.height));
           $.ajax({
                type: 'POST',
                url: base_url+"registration/selfiektp/next",
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
        } else{
            errorToast('Foto Selfie dengan memegang KTP terlebih dahulu');    
        }


        

    })


function stopBothVideoAndAudio(stream) {
    stream.getTracks().forEach(function(track) {
        if (track.readyState == 'live') {
            track.stop();
        }
    });
}

function stopBothVideoAndAudio(stream) {
    stream.getTracks().forEach(function(track) {
        if (track.readyState == 'live') {
            track.stop();
        }
    });
}

function isCanvasBlank(canvas) {
  return !canvas.getContext('2d')
    .getImageData(0, 0, canvas.width, canvas.height).data
    .some(channel => channel !== 0);
}

function clearCanvas(canvas){
    const context = canvas.getContext('2d');
    context.clearRect(0, 0, canvas.width, canvas.height);
}


