<?php

class RegistrationMutualFundService extends \SoapClient
{

    /**
     * @var array $classmap The defined classes
     */
    private static $classmap = array (
      'RegistrationMutualFundServiceException' => '\\RegistrationMutualFundServiceException',
      'Exception' => '\\ExceptionCustom',
      'register' => '\\Register',
      'registerResponse' => '\\RegisterResponse',
      'ping' => '\\Ping',
      'pingResponse' => '\\PingResponse',
      'login' => '\\Login',
      'loginResponse' => '\\LoginResponse',
      'inquiryReksadana' => '\\InquiryReksadana',
      'inquiryReksadanaResponse' => '\\InquiryReksadanaResponse',
      'inquiry' => '\\Inquiry',
      'inquiryResponse' => '\\InquiryResponse',
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
        $wsdl = APPPATH . '/libraries/Bni/RegistrationMutualFundService.xml';
      }
      parent::__construct($wsdl, $options);
    }

    /**
     * @param inquiryReksadana $parameters
     * @return inquiryReksadanaResponse
     */
    public function inquiryReksadana(inquiryReksadana $parameters)
    {
      return $this->__soapCall('inquiryReksadana', array($parameters));
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
     * @param register $parameters
     * @return registerResponse
     */
    public function register(register $parameters)
    {
      return $this->__soapCall('register', array($parameters));
    }

}
