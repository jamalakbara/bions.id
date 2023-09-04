<?php

ini_set("soap.wsdl_cache_enabled", "0");

class OnlineRegistrationV2Service extends \SoapClient
{

    /**
     * @var array $classmap The defined classes
     */
    private static $classmap = array (
      'register' => '\\Register',
      'registerResponse' => '\\RegisterResponse',
      'ping' => '\\Ping',
      'pingResponse' => '\\PingResponse',
      'registerForeign' => '\\RegisterForeign',
      'registerForeignResponse' => '\\RegisterForeignResponse',
      'OnlineRegistrationV2ServiceException' => '\\OnlineRegistrationV2ServiceException',
      'Exception' => '\\ExceptionCustom',
      'printReport' => '\\PrintReport',
      'printReportResponse' => '\\PrintReportResponse',
      'sendOtp' => '\\SendOtp',
      'sendOtpResponse' => '\\SendOtpResponse',
      'validateOtp' => '\\ValidateOtp',
      'validateOtpResponse' => '\\ValidateOtpResponse',
      'convertKtp' => '\\ConvertKtp',
      'convertKtpResponse' => '\\ConvertKtpResponse',
      'biometric' => '\\Biometrics',
      'biometricResponse' => '\\BiometricResponse',
      'checkAlreadyRegistration' => '\\CheckAlreadyRegistration',
      'checkAlreadyRegistrationResponse' => '\\CheckAlreadyRegistrationResponse',
      'RegisterEntityRequest' => '\\RegisterEntityRequest',
      'RegisterEntityResponse' => '\\RegisterEntityResponse',
      'RegisterForeignResponse' => '\\RegisterForeignResponse',
      'SendOtpResponse' => '\\SendOtpResponse',
      'ValidateOtpResponse' => '\\ValidateOtpResponse',
      'OcrResponse' => '\\OcrResponse',
      'BiometricEntityResponse' => '\\BiometricEntityResponse',
      'CheckAlreadyRegistrationEntityResponse' => '\\CheckAlreadyRegistrationEntityResponse',
      'VerijelasOcrResponse' => '\\VerijelasOcrResponse',
      'VerijelasOcrResponseData' => '\\VerijelasOcrResponseData'
    );

 
    /**
     * @param array $options A array of config values
     * @param string $wsdl The wsdl file to use
     */
    public function __construct(array $options = array(), $wsdl = null)
    {
      foreach (self::$classmap as $key => $value) {
        if (!isset($options['classmap'][$key])) {
          $options['classmap'][$key] = $value;
        }
      }
      $options = array_merge(array (
      'features' => 1,
    ), $options);
      if (!$wsdl) {
        $wsdl = APPPATH .  '/libraries/Bni/OnlineRegistrationV2Service.xml';
      }
      parent::__construct($wsdl, $options);
    }

    /**
     * @param registerForeign $parameters
     * @return registerForeignResponse
     */
    public function registerForeign(registerForeign $parameters)
    {
      return $this->__soapCall('registerForeign', array($parameters));
    }

    /**
     * @param sendOtp $parameters
     * @return sendOtpResponse
     */
    public function sendOtp(sendOtp $parameters)
    {
      return $this->__soapCall('sendOtp', array($parameters));
    }
    
    /**
     * @param ping $parameters
     * @return pingResponse
     */
    public function ping(ping $parameters)
    {
      return $this->__soapCall('ping', array($parameters));
    }

    /**
     * @param printReport $parameters
     * @return printReportResponse
     */
    public function printReport(printReport $parameters)
    {
      return $this->__soapCall('printReport', array($parameters));
    }

    /**
     * @param checkAlreadyRegistration $parameters
     * @return checkAlreadyRegistrationResponse
     */
    public function checkAlreadyRegistration(checkAlreadyRegistration $parameters)
    {
      return $this->__soapCall('checkAlreadyRegistration', array($parameters));
    }

    /**
     * @param validateOtp $parameters
     * @return validateOtpResponse
     */
    public function validateOtp(validateOtp $parameters)
    {
      return $this->__soapCall('validateOtp', array($parameters));
    }

    /**
     * @param convertKtp $parameters
     * @return convertKtpResponse
     */
    public function convertKtp(convertKtp $parameters)
    {
      return $this->__soapCall('convertKtp', array($parameters));
    }

    /**
     * @param register $parameters
     * @return registerResponse
     */
    public function register(register $parameters)
    {
      return $this->__soapCall('register', array($parameters));
    }

    /**
     * @param biometric $parameters
     * @return biometricResponse
     */
    public function biometric(biometrics $parameters)
    {
      return $this->__soapCall('biometric', array($parameters));
    }
}
