<?php

class ConvertKtp
{

    /**
     * @var string $regid
     */
    protected $regid = null;

    /**
     * @var string $accType
     */
    protected $accType = null;

    /**
     * @var string $branch
     */
    protected $branch = null;

    /**
     * @var string $ktpBase64
     */
    protected $ktpBase64 = null;

    /**
     * @param string $regid
     * @param string $accType
     * @param string $branch
     * @param string $ktpBase64
     */
    public function __construct($regid, $accType, $branch, $ktpBase64)
    {
      $this->regid = $regid;
      $this->accType = $accType;
      $this->branch = $branch;
      $this->ktpBase64 = $ktpBase64;
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
     * @return convertKtp
     */
    public function setRegid($regid)
    {
      $this->regid = $regid;
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
     * @return convertKtp
     */
    public function setAccType($accType)
    {
      $this->accType = $accType;
      return $this;
    }

    /**
     * @return string
     */
    public function getBranch()
    {
      return $this->branch;
    }

    /**
     * @param string $branch
     * @return convertKtp
     */
    public function setBranch($branch)
    {
      $this->branch = $branch;
      return $this;
    }

    /**
     * @return string
     */
    public function getKtpBase64()
    {
      return $this->ktpBase64;
    }

    /**
     * @param string $ktpBase64
     * @return convertKtp
     */
    public function setKtpBase64($ktpBase64)
    {
      $this->ktpBase64 = $ktpBase64;
      return $this;
    }

}
