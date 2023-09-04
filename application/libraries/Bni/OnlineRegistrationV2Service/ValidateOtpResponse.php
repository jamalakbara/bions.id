<?php

class ValidateOtpResponse
{

    /**
     * @var string $description
     */
    protected $description = null;

    /**
     * @var string $response
     */
    protected $response = null;

    /**
     * @var boolean $return
     */
    protected $return = null;


    public function __construct()
    {
    
    }

    /**
     * @return boolean
     */
    public function getReturn()
    {
      return $this->return;
    }

    /**
     * @param boolean $return
     * @return inquiryReksadanaResponse
     */
    public function setReturn($return)
    {
      $this->return = $return;
      return $this;
    }

    /**
     * @return string
     */
    public function getDescription()
    {
      return $this->description;
    }

    /**
     * @param string $description
     * @return ValidateOtpResponse
     */
    public function setDescription($description)
    {
      $this->description = $description;
      return $this;
    }

    /**
     * @return string
     */
    public function getResponse()
    {
      return $this->response;
    }

    /**
     * @param string $response
     * @return ValidateOtpResponse
     */
    public function setResponse($response)
    {
      $this->response = $response;
      return $this;
    }

}
