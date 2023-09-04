<?php

class ValidateOtp
{

    /**
     * @var string $sourceoa
     */
    protected $sourceoa = null;

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
     * @var string $otp
     */
    protected $otp = null;


    /**
     * @return string
     */
    public function getSourceoa()
    {
      return $this->sourceoa;
    }

    /**
     * @param string $sourceoa
     * @return validateOtp
     */
    public function setSourceoa($sourceoa)
    {
      $this->sourceoa = $sourceoa;
      return $this;
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
     * @return validateOtp
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
     * @return validateOtp
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
     * @return validateOtp
     */
    public function setHandphone($handphone)
    {
      $this->handphone = $handphone;
      return $this;
    }

    /**
     * @return string
     */
    public function getOtp()
    {
      return $this->otp;
    }

    /**
     * @param string $otp
     * @return validateOtp
     */
    public function setOtp($otp)
    {
      $this->otp = $otp;
      return $this;
    }

}
