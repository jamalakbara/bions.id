<?php


 function autoload_755e54248b756efd3d517cc0576e8f92($class)
{
    $classes = array(
        'OnlineRegistrationService' => __DIR__ .'/OnlineRegistrationService.php',
        'OnlineRegistrationServiceException' => __DIR__ .'/OnlineRegistrationServiceException.php',
        'Exception' => __DIR__ .'/Exception.php',
        'registerForeign' => __DIR__ .'/registerForeign.php',
        'registerForeignResponse' => __DIR__ .'/registerForeignResponse.php',
        'register' => __DIR__ .'/register.php',
        'registerResponse' => __DIR__ .'/registerResponse.php',
        'ping' => __DIR__ .'/ping.php',
        'pingResponse' => __DIR__ .'/pingResponse.php',
        'login' => __DIR__ .'/login.php',
        'loginResponse' => __DIR__ .'/loginResponse.php',
        'loadMaster' => __DIR__ .'/loadMaster.php',
        'loadMasterResponse' => __DIR__ .'/loadMasterResponse.php',
        'inquiry' => __DIR__ .'/inquiry.php',
        'inquiryResponse' => __DIR__ .'/inquiryResponse.php',
        'checkDataFromDukcapil' => __DIR__ .'/checkDataFromDukcapil.php',
        'checkDataFromDukcapilResponse' => __DIR__ .'/checkDataFromDukcapilResponse.php'
    );
    if (!empty($classes[$class])) {
        include $classes[$class];
    };
}

spl_autoload_register('autoload_755e54248b756efd3d517cc0576e8f92');

// Do nothing. The rest is just leftovers from the code generation.
{
}
