<?php

class SendOtp
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
     * @var string $fullname
     */
    protected $fullname = null;

    /**
     * @var string $email
     */
    protected $email = null;

    /**
     * @var string $handphone
     */
    protected $handphone = null;


    /**
     * @return string
     */
    public function getSourceoa()
    {
      return $this->sourceoa;
    }

    /**
     * @param string $sourceoa
     * @return sendOtp
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
     * @return sendOtp
     */
    public function setRegid($regid)
    {
      $this->regid = $regid;
      return $this;
    }

    /**
     * @return string
     */
    public function getFullname()
    {
      return $this->fullname;
    }

    /**
     * @param string $fullname
     * @return sendOtp
     */
    public function setFullname($fullname)
    {
      $this->fullname = $fullname;
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
     * @return sendOtp
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
     * @return sendOtp
     */
    public function setHandphone($handphone)
    {
      $this->handphone = $handphone;
      return $this;
    }

}
