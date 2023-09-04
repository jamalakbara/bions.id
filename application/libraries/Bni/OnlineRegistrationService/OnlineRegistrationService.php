<?php

 

class OnlineRegistrationService extends \SoapClient
{

    /**
     * @var array $classmap The defined classes
     */
    private static $classmap = array (
      'OnlineRegistrationServiceException' => '\\OnlineRegistrationServiceException',
      'Exception' => '\\Exception',
      'registerForeign' => '\\RegisterForeign',
      'registerForeignResponse' => '\\RegisterForeignResponse',
      'register' => '\\Register',
      'registerResponse' => '\\RegisterResponse',
      'ping' => '\\Ping',
      'pingResponse' => '\\PingResponse',
      'login' => '\\Login',
      'loginResponse' => '\\LoginResponse',
      'loadMaster' => '\\LoadMaster',
      'loadMasterResponse' => '\\LoadMasterResponse',
      'inquiry' => '\\Inquiry',
      'inquiryResponse' => '\\InquiryResponse',
      'checkDataFromDukcapil' => '\\CheckDataFromDukcapil',
      'checkDataFromDukcapilResponse' => '\\CheckDataFromDukcapilResponse',
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
        $wsdl = APPPATH .  '/libraries/Bni/OnlineRegistrationService.xml';
      }
      parent::__construct($wsdl, $options);
    }

    /**
     * @param loadMaster $parameters
     * @return loadMasterResponse
     */
    public function loadMaster(loadMaster $parameters)
    {
      return $this->__soapCall('loadMaster', array($parameters));
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
     * @param ping $parameters
     * @return pingResponse
     */
    public function ping(ping $parameters)
    {
      return $this->__soapCall('ping', array($parameters));
    }

    /**
     * @param login $parameters
     * @return loginResponse
     */
    public function login(login $parameters)
    {
      return $this->__soapCall('login', array($parameters));
    }

    /**
     * @param inquiry $parameters
     * @return inquiryResponse
     */
    public function inquiry(inquiry $parameters)
    {
      return $this->__soapCall('inquiry', array($parameters));
    }

    /**
     * @param checkDataFromDukcapil $parameters
     * @return checkDataFromDukcapilResponse
     */
    public function checkDataFromDukcapil(checkDataFromDukcapil $parameters)
    {
      return $this->__soapCall('checkDataFromDukcapil', array($parameters));
    }

    /**
     * @param register $parameters
     * @return registerResponse
     */
    public function register(register $parameters)
    {
      return $this->__soapCall('register', array($parameters));
    }

}
