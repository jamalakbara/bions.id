<?php


 function autoload_ff86e0c6dc0a38de84ddac5a1f34ae8a($class)
{
    $classes = array(
        'RegistrationMutualFundService' => __DIR__ .'/RegistrationMutualFundService.php',
        'RegistrationMutualFundServiceException' => __DIR__ .'/RegistrationMutualFundServiceException.php',
        'ExceptionCustom' => __DIR__ .'/ExceptionCustom.php',
        'register' => __DIR__ .'/register.php',
        'registerResponse' => __DIR__ .'/registerResponse.php',
        'ping' => __DIR__ .'/ping.php',
        'pingResponse' => __DIR__ .'/pingResponse.php',
        'login' => __DIR__ .'/login.php',
        'loginResponse' => __DIR__ .'/loginResponse.php',
        'inquiryReksadana' => __DIR__ .'/inquiryReksadana.php',
        'inquiryReksadanaResponse' => __DIR__ .'/inquiryReksadanaResponse.php',
        'inquiry' => __DIR__ .'/inquiry.php',
        'inquiryResponse' => __DIR__ .'/inquiryResponse.php'
    );
    if (!empty($classes[$class])) {
        include $classes[$class];
    };
}

spl_autoload_register('autoload_ff86e0c6dc0a38de84ddac5a1f34ae8a');

// Do nothing. The rest is just leftovers from the code generation.
{
}
