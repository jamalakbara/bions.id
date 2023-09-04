<?php

class Biometrics
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
     * @var string $identityNo
     */
    protected $identityNo = null;

    /**
     * @var string $name
     */
    protected $name = null;

    /**
     * @var string $birthdate
     */
    protected $birthdate = null;

    /**
     * @var string $birthplace
     */
    protected $birthplace = null;

    /**
     * @var string $photoBase64
     */
    protected $photoBase64 = null;

    
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
     * @return biometric
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
     * @return biometric
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
     * @return biometric
     */
    public function setBranch($branch)
    {
      $this->branch = $branch;
      return $this;
    }

    /**
     * @return string
     */
    public function getIdentityNo()
    {
      return $this->identityNo;
    }

    /**
     * @param string $identityNo
     * @return biometric
     */
    public function setIdentityNo($identityNo)
    {
      $this->identityNo = $identityNo;
      return $this;
    }

    /**
     * @return string
     */
    public function getName()
    {
      return $this->name;
    }

    /**
     * @param string $name
     * @return biometric
     */
    public function setName($name)
    {
      $this->name = $name;
      return $this;
    }

    /**
     * @return string
     */
    public function getBirthdate()
    {
      return $this->birthdate;
    }

    /**
     * @param string $birthdate
     * @return biometric
     */
    public function setBirthdate($birthdate)
    {
      $this->birthdate = $birthdate;
      return $this;
    }

    /**
     * @return string
     */
    public function getBirthplace()
    {
      return $this->birthplace;
    }

    /**
     * @param string $birthplace
     * @return biometric
     */
    public function setBirthplace($birthplace)
    {
      $this->birthplace = $birthplace;
      return $this;
    }

    /**
     * @return string
     */
    public function getPhotoBase64()
    {
      return $this->photoBase64;
    }

    /**
     * @param string $photoBase64
     * @return biometric
     */
    public function setPhotoBase64($photoBase64)
    {
      $this->photoBase64 = $photoBase64;
      return $this;
    }

}
