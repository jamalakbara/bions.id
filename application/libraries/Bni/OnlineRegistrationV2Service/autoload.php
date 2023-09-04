<?php


 function autoload_60efb7c96cd00f09d6b37c693f298ce9($class)
{
    $classes = array(
        'OnlineRegistrationV2Service' => __DIR__ .'/OnlineRegistrationV2Service.php',
        'Register' => __DIR__ .'/Register.php',
        'RegisterResponse' => __DIR__ .'/RegisterResponse.php',
        'OnlineRegistrationV2ServiceException' => __DIR__ .'/OnlineRegistrationV2ServiceException.php',
        'ExceptionCustom' => __DIR__ .'/ExceptionCustom.php',
        'PrintReport' => __DIR__ .'/PrintReport.php',
        'PrintReportResponse' => __DIR__ .'/PrintReportResponse.php',
        'ValidateOtp' => __DIR__ .'/ValidateOtp.php',
        'ValidateOtpResponse' => __DIR__ .'/ValidateOtpResponse.php',
        'SendOtp' => __DIR__ .'/SendOtp.php',
        'SendOtpResponse' => __DIR__ .'/SendOtpResponse.php',
        'RegisterForeign' => __DIR__ .'/RegisterForeign.php',
        'RegisterForeignResponse' => __DIR__ .'/RegisterForeignResponse.php',
        'Ping' => __DIR__ .'/Ping.php',
        'PingResponse' => __DIR__ .'/PingResponse.php',
        'ConvertKtp' => __DIR__ .'/ConvertKtp.php',
        'ConvertKtpResponse' => __DIR__ .'/ConvertKtpResponse.php',
        'Biometrics' => __DIR__ .'/Biometrics.php',
        'BiometricResponse' => __DIR__ .'/BiometricResponse.php',
        'CheckAlreadyRegistration' => __DIR__ .'/CheckAlreadyRegistration.php',
        'CheckAlreadyRegistrationResponse' => __DIR__ .'/CheckAlreadyRegistrationResponse.php',
        'ValidateOtpResponse' => __DIR__ .'/ValidateOtpResponse.php',
        'SendOtpResponse' => __DIR__ .'/SendOtpResponse.php',
        'RegisterEntityRequest' => __DIR__ .'/RegisterEntityRequest.php',
        'RegisterEntityResponse' => __DIR__ .'/RegisterEntityResponse.php',
        'RegisterForeignResponse' => __DIR__ .'/RegisterForeignResponse.php',
        'OcrResponse' => __DIR__ .'/OcrResponse.php',
        'BiometricEntityResponse' => __DIR__ .'/BiometricEntityResponse.php',
        'CheckAlreadyRegistrationEntityResponse' => __DIR__ .'/CheckAlreadyRegistrationEntityResponse.php',
        'VerijelasOcrResponse' => __DIR__ .'/VerijelasOcrResponse.php',
        'VerijelasOcrResponseData' => __DIR__ .'/VerijelasOcrResponseData.php'
    );


    if (!empty($classes[$class])) {
        include $classes[$class];
    };
    
}

spl_autoload_register('autoload_60efb7c96cd00f09d6b37c693f298ce9');
// Do nothing. The rest is just leftovers from the code generation.
{
}
