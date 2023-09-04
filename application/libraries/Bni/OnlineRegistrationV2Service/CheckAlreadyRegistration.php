<?php

class CheckAlreadyRegistration
{

    /**
     * @var string $regid
     */
    protected $regid = null;

    /**
     * @var string $email
     */
    protected $email = null;

    /**
     * @var string $handphone
     */
    protected $handphone = null;

    /**
     * @var string $accType
     */
    protected $accType = null;

    /**
     * @param string $regid
     * @param string $email
     * @param string $handphone
     * @param string $accType
     */
    public function __construct()
    {
    }

    /**
     * @return string
     */
    public function getRegid()
    {
      return $this->regid;
    }

    /**
     * @param string $regid
     * @return checkAlreadyRegistration
     */
    public function setRegid($regid)
    {
      $this->regid = $regid;
      return $this;
    }

    /**
     * @return string
     */
    public function getEmail()
    {
      return $this->email;
    }

    /**
     * @param string $email
     * @return checkAlreadyRegistration
     */
    public function setEmail($email)
    {
      $this->email = $email;
      return $this;
    }

    /**
     * @return string
     */
    public function getHandphone()
    {
      return $this->handphone;
    }

    /**
     * @param string $handphone
     * @return checkAlreadyRegistration
     */
    public function setHandphone($handphone)
    {
      $this->handphone = $handphone;
      return $this;
    }

    /**
     * @return string
     */
    public function getAccType()
    {
      return $this->accType;
    }

    /**
     * @param string $accType
     * @return checkAlreadyRegistration
     */
    public function setAccType($accType)
    {
      $this->accType = $accType;
      return $this;
    }

}
