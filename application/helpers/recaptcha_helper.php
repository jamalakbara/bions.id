<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

function validateCaptcha($captcha_response){
    if($captcha_response != '')
    {
        $keySecret = '6LfbivccAAAAAPTK94zPgdp0BZLW9bSTXEkF7n19';

        $check = array(
            'secret'        =>  $keySecret,
            'response'      =>  $captcha_response
        );

        $startProcess = curl_init();
        curl_setopt($startProcess, CURLOPT_URL, "https://www.google.com/recaptcha/api/siteverify");
        curl_setopt($startProcess, CURLOPT_POST, true);
        curl_setopt($startProcess, CURLOPT_POSTFIELDS, http_build_query($check));
        curl_setopt($startProcess, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($startProcess, CURLOPT_RETURNTRANSFER, true);
        $receiveData = curl_exec($startProcess);

        $finalResponse = json_decode($receiveData, true);
        if($finalResponse['success'])
        {
            return true;
        }
    } 

    return false;
}