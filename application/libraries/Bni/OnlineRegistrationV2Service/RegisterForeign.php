<?php

class RegisterForeign
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
     * @var string $referral
     */
    protected $referral = null;

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
     * @var string $investorType
     */
    protected $investorType = null;

    /**
     * @var string $nationality
     */
    protected $nationality = null;

    /**
     * @var string $reference
     */
    protected $reference = null;

    /**
     * @var string $productType
     */
    protected $productType = null;

    /**
     * @var string $haveBniAcc
     */
    protected $haveBniAcc = null;

    /**
     * @return string
     */
    public function getSourceoa()
    {
      return $this->sourceoa;
    }

    /**
     * @param string $sourceoa
     * @return registerForeign
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
     * @return registerForeign
     */
    public function setRegid($regid)
    {
      $this->regid = $regid;
      return $this;
    }

    /**
     * @return string
     */
    public function getReferral()
    {
      return $this->referral;
    }

    /**
     * @param string $referral
     * @return registerForeign
     */
    public function setReferral($referral)
    {
      $this->referral = $referral;
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
     * @return registerForeign
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
     * @return registerForeign
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
     * @return registerForeign
     */
    public function setHandphone($handphone)
    {
      $this->handphone = $handphone;
      return $this;
    }

    /**
     * @return string
     */
    public function getInvestorType()
    {
      return $this->investorType;
    }

    /**
     * @param string $investorType
     * @return registerForeign
     */
    public function setInvestorType($investorType)
    {
      $this->investorType = $investorType;
      return $this;
    }

    /**
     * @return string
     */
    public function getNationality()
    {
      return $this->nationality;
    }

    /**
     * @param string $nationality
     * @return registerForeign
     */
    public function setNationality($nationality)
    {
      $this->nationality = $nationality;
      return $this;
    }

    /**
     * @return string
     */
    public function getReference()
    {
      return $this->reference;
    }

    /**
     * @param string $reference
     * @return registerForeign
     */
    public function setReference($reference)
    {
      $this->reference = $reference;
      return $this;
    }

    /**
     * @return string
     */
    public function getProductType()
    {
      return $this->productType;
    }

    /**
     * @param string $productType
     * @return registerForeign
     */
    public function setProductType($productType)
    {
      $this->productType = $productType;
      return $this;
    }

    /**
     * @return string
     */
    public function getHaveBniAcc()
    {
      return $this->haveBniAcc;
    }

    /**
     * @param string $haveBniAcc
     * @return registerForeign
     */
    public function setHaveBniAcc($haveBniAcc)
    {
      $this->haveBniAcc = $haveBniAcc;
      return $this;
    }

}
