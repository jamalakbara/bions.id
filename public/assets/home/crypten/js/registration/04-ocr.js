var xStream;

var countInitiateCamera = 0;
var defaultFacingMode = "environment";

var video = document.querySelector("video");
var canvas = document.querySelector('#canvas');
var devicess = [];

(async () => {   
  await navigator.mediaDevices.getUserMedia({video: true}).then(function(stream) {
    stopBothVideoAndAudio(stream);
    })
    .catch(function(err) {
      /* handle the error */
    });

  await navigator.mediaDevices.enumerateDevices().then(function(devices) {
      devices.forEach(function(device) {
        if(device.kind == "videoinput"){
            devicess.push(device);
          }
      });
       var constraints = null;
      if(devicess.length > 0){
          constraints = {
            video: {
                deviceId : devicess[devicess.length-1].deviceId
            }
          };
        } else{
            constraints = {
                video : true
            };
        };

        if (window.stream) {
            window.stream.getTracks().forEach(track => {
              track.stop();
            });
        }
        // console.log(constraints);
      navigator.mediaDevices.getUserMedia(constraints).
        then(gotStream).catch(handleError);
    })
    .catch(function(err) {
      alert(err.name + ": " + err.message);
    });

})();


function gotStream(stream) {
  window.stream = stream; 
  video.srcObject = stream;

  $('#app-camera-error').hide();
    $('#app').show();
}

function handleError(error) {
    
    console.error('error : '+error);
    errorToast(error);

    $('#app-camera-error').show();
    $('#app').hide();
    
}

async function waitVideoShown() {
  while(video.videoWidth == 0){
    await sleep(100);  
  }
    await sleep(500); //iphone bug height and width

     //prepare style wait until video rendered
    var div = $('#video-wrapper');
    div.css('border', '2px solid var(--color-primary)');

    var divoverlay = $('#video-wrapper>.overlay');
    console.log(divoverlay);
    divoverlay.css('background-image', 'url(/images/guide-ktp2.png)');

    $('.btn-takephotoocr').show();


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
var ratioHeight = 0.63;
$('body')
    .ready(function(){
        $('select').formSelect(); 
        waitVideoShown();

    })
    .on('click', '.btn-takephotoocr', function(e) {
        canvas.width = widthVideo * ratioVideoView;
        canvas.height = heightVideo * ratioVideoView;
        // canvas.getContext('2d').drawImage(video, 0,0);
        
        canvas.getContext('2d').drawImage(video, 
            0, 0,
            canvas.width, canvas.height,
            0, 0,
            canvas.width, canvas.height
        );
        
        video.style.display='none';
        canvas.style.display='block';;
        $('.btn-takephotoocr').hide();
        $('.btn-retakephotoocr').show();

        // const img = document.createElement('img');
        // img.src = canvas.toDataURL('image/png');
        // screenshotsContainer.prepend(img);
        
        video.pause();
    })
    .on('click', '.btn-retakephotoocr', function(e) {
        video.style.display='block';
        canvas.style.display='none';;
        $('.btn-takephotoocr').show();
        $('.btn-retakephotoocr').hide();

        clearCanvas(canvas);
        // initiateCamera();
        video.play();

    })
    .on('click', '.btn-ocrnext', function(e) {
        
        
        if(!isCanvasBlank(canvas)){
            var formData = new FormData();
             
            formData.append('idcardphoto',imageToDataUri(canvas, canvas.width, canvas.height));
            console.log(imageToDataUri(canvas, canvas.width, canvas.height));
           $.ajax({
                type: 'POST',
                url: base_url+"registration/ocr/next",
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
            errorToast('Foto KTP Anda terlebih dahulu');    
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

