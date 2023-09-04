<?php

class RegisterEntityRequest
{

    /**
     * @var string $acctype
     */
    protected $acctype = null;

    /**
     * @var string $addresscity
     */
    protected $addresscity = null;

    /**
     * @var string $addresscountry
     */
    protected $addresscountry = null;

    /**
     * @var string $addressemail
     */
    protected $addressemail = null;

    /**
     * @var string $addresshousing
     */
    protected $addresshousing = null;

    /**
     * @var string $addresspcity
     */
    protected $addresspcity = null;

    /**
     * @var string $addresspcountry
     */
    protected $addresspcountry = null;

    /**
     * @var string $addressphousing
     */
    protected $addressphousing = null;

    /**
     * @var string $addresspostalcode
     */
    protected $addresspostalcode = null;

    /**
     * @var string $addressppostalcode
     */
    protected $addressppostalcode = null;

    /**
     * @var string $addresspprovince
     */
    protected $addresspprovince = null;

    /**
     * @var string $addressprovince
     */
    protected $addressprovince = null;

    /**
     * @var string $addresspsame
     */
    protected $addresspsame = null;

    /**
     * @var string $addresspstreet
     */
    protected $addresspstreet = null;

    /**
     * @var string $addresspsubdistrict
     */
    protected $addresspsubdistrict = null;

    /**
     * @var string $addresspvillage
     */
    protected $addresspvillage = null;

    /**
     * @var string $addressstreet
     */
    protected $addressstreet = null;

    /**
     * @var string $addresssubdistrict
     */
    protected $addresssubdistrict = null;

    /**
     * @var string $addressvillage
     */
    protected $addressvillage = null;

    /**
     * @var string $assetownership
     */
    protected $assetownership = null;

    /**
     * @var string $attachmentidcard
     */
    protected $attachmentidcard = null;

    /**
     * @var string $attachmentphotowithidcard
     */
    protected $attachmentphotowithidcard = null;

    /**
     * @var string $attachmentsignature
     */
    protected $attachmentsignature = null;

    /**
     * @var string $bankbeneficiaryaccount
     */
    protected $bankbeneficiaryaccount = null;

    /**
     * @var string $bankbeneficiaryname
     */
    protected $bankbeneficiaryname = null;

    /**
     * @var string $bankname
     */
    protected $bankname = null;

    /**
     * @var string $bankrdi
     */
    protected $bankrdi = null;

    /**
     * @var string $birthday
     */
    protected $birthday = null;

    /**
     * @var string $birthplace
     */
    protected $birthplace = null;

    /**
     * @var string $branch
     */
    protected $branch = null;

    /**
     * @var string $correspondencetype
     */
    protected $correspondencetype = null;

    /**
     * @var string $educationalbg
     */
    protected $educationalbg = null;

    /**
     * @var string $educationalbgother
     */
    protected $educationalbgother = null;

    /**
     * @var string $fatcaaddress
     */
    protected $fatcaaddress = null;

    /**
     * @var string $fullname
     */
    protected $fullname = null;

    /**
     * @var string $gender
     */
    protected $gender = null;

    /**
     * @var string $handphone
     */
    protected $handphone = null;

    /**
     * @var string $haveaccbni
     */
    protected $haveaccbni = null;

    /**
     * @var string $identityexpireddate
     */
    protected $identityexpireddate = null;

    /**
     * @var string $identityissueddate
     */
    protected $identityissueddate = null;

    /**
     * @var string $identityissuedplace
     */
    protected $identityissuedplace = null;

    /**
     * @var string $identitynum
     */
    protected $identitynum = null;

    /**
     * @var string $identitytype
     */
    protected $identitytype = null;

    /**
     * @var string $inforeference
     */
    protected $inforeference = null;

    /**
     * @var string $investmentobjectives
     */
    protected $investmentobjectives = null;

    /**
     * @var string $investmentobjectivesother
     */
    protected $investmentobjectivesother = null;

    /**
     * @var string $investortype
     */
    protected $investortype = null;

    /**
     * @var string $maritalstatus
     */
    protected $maritalstatus = null;

    /**
     * @var string $mothername
     */
    protected $mothername = null;

    /**
     * @var string $nationality
     */
    protected $nationality = null;

    /**
     * @var string $occupationalannualincome
     */
    protected $occupationalannualincome = null;

    /**
     * @var string $occupationalcity
     */
    protected $occupationalcity = null;

    /**
     * @var string $occupationalcountry
     */
    protected $occupationalcountry = null;

    /**
     * @var string $occupationalpostalcode
     */
    protected $occupationalpostalcode = null;

    /**
     * @var string $occupationalphone
     */
    protected $occupationalphone = null;

    /**
     * @var string $occupationalincomefrequency
     */
    protected $occupationalincomefrequency = null;

    /**
     * @var string $occupationaljobposition
     */
    protected $occupationaljobposition = null;

    /**
     * @var string $occupationallinebusiness
     */
    protected $occupationallinebusiness = null;

    /**
     * @var string $occupationalmonthlyincome
     */
    protected $occupationalmonthlyincome = null;

    /**
     * @var string $occupationalnetworth
     */
    protected $occupationalnetworth = null;

    /**
     * @var string $occupationalprovince
     */
    protected $occupationalprovince = null;

    /**
     * @var string $occupationalsourceofincome
     */
    protected $occupationalsourceofincome = null;

    /**
     * @var string $occupationalsourceofincomeother
     */
    protected $occupationalsourceofincomeother = null;

    /**
     * @var string $occupationalstreet
     */
    protected $occupationalstreet = null;

    /**
     * @var string $occupationalhousing
     */
    protected $occupationalhousing = null;

    /**
     * @var string $occupationalsubdistrict
     */
    protected $occupationalsubdistrict = null;

    /**
     * @var string $occupationaltype
     */
    protected $occupationaltype = null;

    /**
     * @var string $occupationaltypeother
     */
    protected $occupationaltypeother = null;

    /**
     * @var string $occupationalvillage
     */
    protected $occupationalvillage = null;

    /**
     * @var string $occupationalworkingplace
     */
    protected $occupationalworkingplace = null;

    /**
     * @var string $onlinetype
     */
    protected $onlinetype = null;

    /**
     * @var string $otherinfoemployeeof
     */
    protected $otherinfoemployeeof = null;

    /**
     * @var string $otherinfoemployeeofcompany
     */
    protected $otherinfoemployeeofcompany = null;

    /**
     * @var string $otherinfoemployeeofname
     */
    protected $otherinfoemployeeofname = null;

    /**
     * @var string $otherinfohavegreencard
     */
    protected $otherinfohavegreencard = null;

    /**
     * @var string $otherinfopoliticperson
     */
    protected $otherinfopoliticperson = null;

    /**
     * @var string $otherinfoprohibited
     */
    protected $otherinfoprohibited = null;

    /**
     * @var string $otherinfoprohibitedcompany
     */
    protected $otherinfoprohibitedcompany = null;

    /**
     * @var string $otherinfoprohibitedname
     */
    protected $otherinfoprohibitedname = null;

    /**
     * @var string $otherinfotaxoutsideindonesia
     */
    protected $otherinfotaxoutsideindonesia = null;

    /**
     * @var string $phone
     */
    protected $phone = null;

    /**
     * @var string $producttype
     */
    protected $producttype = null;

    /**
     * @var string $referral
     */
    protected $referral = null;

    /**
     * @var string $regid
     */
    protected $regid = null;

    /**
     * @var string $religion
     */
    protected $religion = null;

    /**
     * @var string $riskprofileagreeincome
     */
    protected $riskprofileagreeincome = null;

    /**
     * @var string $riskprofileknowledge
     */
    protected $riskprofileknowledge = null;

    /**
     * @var string $riskprofilelonginvest
     */
    protected $riskprofilelonginvest = null;

    /**
     * @var string $riskprofileloss
     */
    protected $riskprofileloss = null;

    /**
     * @var string $riskprofilepurpose
     */
    protected $riskprofilepurpose = null;

    /**
     * @var string $riskprofiletotalscore
     */
    protected $riskprofiletotalscore = null;

    /**
     * @var string $source
     */
    protected $source = null;

    /**
     * @var string $spousefullname
     */
    protected $spousefullname = null;

    /**
     * @var string $taxiddonthave
     */
    protected $taxiddonthave = null;

    /**
     * @var string $taxidnum
     */
    protected $taxidnum = null;

    
    public function __construct()
    {
    
    }

    /**
     * @return string
     */
    public function getAcctype()
    {
      return $this->acctype;
    }

    /**
     * @param string $acctype
     * @return RegisterEntityRequest
     */
    public function setAcctype($acctype)
    {
      $this->acctype = $acctype;
      return $this;
    }

    /**
     * @return string
     */
    public function getAddresscity()
    {
      return $this->addresscity;
    }

    /**
     * @param string $addresscity
     * @return RegisterEntityRequest
     */
    public function setAddresscity($addresscity)
    {
      $this->addresscity = $addresscity;
      return $this;
    }

    /**
     * @return string
     */
    public function getAddresscountry()
    {
      return $this->addresscountry;
    }

    /**
     * @param string $addresscountry
     * @return RegisterEntityRequest
     */
    public function setAddresscountry($addresscountry)
    {
      $this->addresscountry = $addresscountry;
      return $this;
    }

    /**
     * @return string
     */
    public function getAddressemail()
    {
      return $this->addressemail;
    }

    /**
     * @param string $addressemail
     * @return RegisterEntityRequest
     */
    public function setAddressemail($addressemail)
    {
      $this->addressemail = $addressemail;
      return $this;
    }

    /**
     * @return string
     */
    public function getAddresshousing()
    {
      return $this->addresshousing;
    }

    /**
     * @param string $addresshousing
     * @return RegisterEntityRequest
     */
    public function setAddresshousing($addresshousing)
    {
      $this->addresshousing = $addresshousing;
      return $this;
    }

    /**
     * @return string
     */
    public function getAddresspcity()
    {
      return $this->addresspcity;
    }

    /**
     * @param string $addresspcity
     * @return RegisterEntityRequest
     */
    public function setAddresspcity($addresspcity)
    {
      $this->addresspcity = $addresspcity;
      return $this;
    }

    /**
     * @return string
     */
    public function getAddresspcountry()
    {
      return $this->addresspcountry;
    }

    /**
     * @param string $addresspcountry
     * @return RegisterEntityRequest
     */
    public function setAddresspcountry($addresspcountry)
    {
      $this->addresspcountry = $addresspcountry;
      return $this;
    }

    /**
     * @return string
     */
    public function getAddressphousing()
    {
      return $this->addressphousing;
    }

    /**
     * @param string $addressphousing
     * @return RegisterEntityRequest
     */
    public function setAddressphousing($addressphousing)
    {
      $this->addressphousing = $addressphousing;
      return $this;
    }

    /**
     * @return string
     */
    public function getAddresspostalcode()
    {
      return $this->addresspostalcode;
    }

    /**
     * @param string $addresspostalcode
     * @return RegisterEntityRequest
     */
    public function setAddresspostalcode($addresspostalcode)
    {
      $this->addresspostalcode = $addresspostalcode;
      return $this;
    }

    /**
     * @return string
     */
    public function getAddressppostalcode()
    {
      return $this->addressppostalcode;
    }

    /**
     * @param string $addressppostalcode
     * @return RegisterEntityRequest
     */
    public function setAddressppostalcode($addressppostalcode)
    {
      $this->addressppostalcode = $addressppostalcode;
      return $this;
    }

    /**
     * @return string
     */
    public function getAddresspprovince()
    {
      return $this->addresspprovince;
    }

    /**
     * @param string $addresspprovince
     * @return RegisterEntityRequest
     */
    public function setAddresspprovince($addresspprovince)
    {
      $this->addresspprovince = $addresspprovince;
      return $this;
    }

    /**
     * @return string
     */
    public function getAddressprovince()
    {
      return $this->addressprovince;
    }

    /**
     * @param string $addressprovince
     * @return RegisterEntityRequest
     */
    public function setAddressprovince($addressprovince)
    {
      $this->addressprovince = $addressprovince;
      return $this;
    }

    /**
     * @return string
     */
    public function getAddresspsame()
    {
      return $this->addresspsame;
    }

    /**
     * @param string $addresspsame
     * @return RegisterEntityRequest
     */
    public function setAddresspsame($addresspsame)
    {
      $this->addresspsame = $addresspsame;
      return $this;
    }

    /**
     * @return string
     */
    public function getAddresspstreet()
    {
      return $this->addresspstreet;
    }

    /**
     * @param string $addresspstreet
     * @return RegisterEntityRequest
     */
    public function setAddresspstreet($addresspstreet)
    {
      $this->addresspstreet = $addresspstreet;
      return $this;
    }

    /**
     * @return string
     */
    public function getAddresspsubdistrict()
    {
      return $this->addresspsubdistrict;
    }

    /**
     * @param string $addresspsubdistrict
     * @return RegisterEntityRequest
     */
    public function setAddresspsubdistrict($addresspsubdistrict)
    {
      $this->addresspsubdistrict = $addresspsubdistrict;
      return $this;
    }

    /**
     * @return string
     */
    public function getAddresspvillage()
    {
      return $this->addresspvillage;
    }

    /**
     * @param string $addresspvillage
     * @return RegisterEntityRequest
     */
    public function setAddresspvillage($addresspvillage)
    {
      $this->addresspvillage = $addresspvillage;
      return $this;
    }

    /**
     * @return string
     */
    public function getAddressstreet()
    {
      return $this->addressstreet;
    }

    /**
     * @param string $addressstreet
     * @return RegisterEntityRequest
     */
    public function setAddressstreet($addressstreet)
    {
      $this->addressstreet = $addressstreet;
      return $this;
    }

    /**
     * @return string
     */
    public function getAddresssubdistrict()
    {
      return $this->addresssubdistrict;
    }

    /**
     * @param string $addresssubdistrict
     * @return RegisterEntityRequest
     */
    public function setAddresssubdistrict($addresssubdistrict)
    {
      $this->addresssubdistrict = $addresssubdistrict;
      return $this;
    }

    /**
     * @return string
     */
    public function getAddressvillage()
    {
      return $this->addressvillage;
    }

    /**
     * @param string $addressvillage
     * @return RegisterEntityRequest
     */
    public function setAddressvillage($addressvillage)
    {
      $this->addressvillage = $addressvillage;
      return $this;
    }

    /**
     * @return string
     */
    public function getAssetownership()
    {
      return $this->assetownership;
    }

    /**
     * @param string $assetownership
     * @return RegisterEntityRequest
     */
    public function setAssetownership($assetownership)
    {
      $this->assetownership = $assetownership;
      return $this;
    }

    /**
     * @return string
     */
    public function getAttachmentidcard()
    {
      return $this->attachmentidcard;
    }

    /**
     * @param string $attachmentidcard
     * @return RegisterEntityRequest
     */
    public function setAttachmentidcard($attachmentidcard)
    {
      $this->attachmentidcard = $attachmentidcard;
      return $this;
    }

    /**
     * @return string
     */
    public function getAttachmentphotowithidcard()
    {
      return $this->attachmentphotowithidcard;
    }

    /**
     * @param string $attachmentphotowithidcard
     * @return RegisterEntityRequest
     */
    public function setAttachmentphotowithidcard($attachmentphotowithidcard)
    {
      $this->attachmentphotowithidcard = $attachmentphotowithidcard;
      return $this;
    }

    /**
     * @return string
     */
    public function getAttachmentsignature()
    {
      return $this->attachmentsignature;
    }

    /**
     * @param string $attachmentsignature
     * @return RegisterEntityRequest
     */
    public function setAttachmentsignature($attachmentsignature)
    {
      $this->attachmentsignature = $attachmentsignature;
      return $this;
    }

    /**
     * @return string
     */
    public function getBankbeneficiaryaccount()
    {
      return $this->bankbeneficiaryaccount;
    }

    /**
     * @param string $bankbeneficiaryaccount
     * @return RegisterEntityRequest
     */
    public function setBankbeneficiaryaccount($bankbeneficiaryaccount)
    {
      $this->bankbeneficiaryaccount = $bankbeneficiaryaccount;
      return $this;
    }

    /**
     * @return string
     */
    public function getBankbeneficiaryname()
    {
      return $this->bankbeneficiaryname;
    }

    /**
     * @param string $bankbeneficiaryname
     * @return RegisterEntityRequest
     */
    public function setBankbeneficiaryname($bankbeneficiaryname)
    {
      $this->bankbeneficiaryname = $bankbeneficiaryname;
      return $this;
    }

    /**
     * @return string
     */
    public function getBankname()
    {
      return $this->bankname;
    }

    /**
     * @param string $bankname
     * @return RegisterEntityRequest
     */
    public function setBankname($bankname)
    {
      $this->bankname = $bankname;
      return $this;
    }

    /**
     * @return string
     */
    public function getBankrdi()
    {
      return $this->bankrdi;
    }

    /**
     * @param string $bankrdi
     * @return RegisterEntityRequest
     */
    public function setBankrdi($bankrdi)
    {
      $this->bankrdi = $bankrdi;
      return $this;
    }

    /**
     * @return string
     */
    public function getBirthday()
    {
      return $this->birthday;
    }

    /**
     * @param string $birthday
     * @return RegisterEntityRequest
     */
    public function setBirthday($birthday)
    {
      $this->birthday = $birthday;
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
     * @return RegisterEntityRequest
     */
    public function setBirthplace($birthplace)
    {
      $this->birthplace = $birthplace;
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
     * @return RegisterEntityRequest
     */
    public function setBranch($branch)
    {
      $this->branch = $branch;
      return $this;
    }

    /**
     * @return string
     */
    public function getCorrespondencetype()
    {
      return $this->correspondencetype;
    }

    /**
     * @param string $correspondencetype
     * @return RegisterEntityRequest
     */
    public function setCorrespondencetype($correspondencetype)
    {
      $this->correspondencetype = $correspondencetype;
      return $this;
    }

    /**
     * @return string
     */
    public function getEducationalbg()
    {
      return $this->educationalbg;
    }

    /**
     * @param string $educationalbg
     * @return RegisterEntityRequest
     */
    public function setEducationalbg($educationalbg)
    {
      $this->educationalbg = $educationalbg;
      return $this;
    }

    /**
     * @return string
     */
    public function getEducationalbgother()
    {
      return $this->educationalbgother;
    }

    /**
     * @param string $educationalbgother
     * @return RegisterEntityRequest
     */
    public function setEducationalbgother($educationalbgother)
    {
      $this->educationalbgother = $educationalbgother;
      return $this;
    }

    /**
     * @return string
     */
    public function getFatcaaddress()
    {
      return $this->fatcaaddress;
    }

    /**
     * @param string $fatcaaddress
     * @return RegisterEntityRequest
     */
    public function setFatcaaddress($fatcaaddress)
    {
      $this->fatcaaddress = $fatcaaddress;
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
     * @return RegisterEntityRequest
     */
    public function setFullname($fullname)
    {
      $this->fullname = $fullname;
      return $this;
    }

    /**
     * @return string
     */
    public function getGender()
    {
      return $this->gender;
    }

    /**
     * @param string $gender
     * @return RegisterEntityRequest
     */
    public function setGender($gender)
    {
      $this->gender = $gender;
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
     * @return RegisterEntityRequest
     */
    public function setHandphone($handphone)
    {
      $this->handphone = $handphone;
      return $this;
    }

    /**
     * @return string
     */
    public function getHaveaccbni()
    {
      return $this->haveaccbni;
    }

    /**
     * @param string $haveaccbni
     * @return RegisterEntityRequest
     */
    public function setHaveaccbni($haveaccbni)
    {
      $this->haveaccbni = $haveaccbni;
      return $this;
    }

    /**
     * @return string
     */
    public function getIdentityexpireddate()
    {
      return $this->identityexpireddate;
    }

    /**
     * @param string $identityexpireddate
     * @return RegisterEntityRequest
     */
    public function setIdentityexpireddate($identityexpireddate)
    {
      $this->identityexpireddate = $identityexpireddate;
      return $this;
    }

    /**
     * @return string
     */
    public function getIdentityissueddate()
    {
      return $this->identityissueddate;
    }

    /**
     * @param string $identityissueddate
     * @return RegisterEntityRequest
     */
    public function setIdentityissueddate($identityissueddate)
    {
      $this->identityissueddate = $identityissueddate;
      return $this;
    }

    /**
     * @return string
     */
    public function getIdentityissuedplace()
    {
      return $this->identityissuedplace;
    }

    /**
     * @param string $identityissuedplace
     * @return RegisterEntityRequest
     */
    public function setIdentityissuedplace($identityissuedplace)
    {
      $this->identityissuedplace = $identityissuedplace;
      return $this;
    }

    /**
     * @return string
     */
    public function getIdentitynum()
    {
      return $this->identitynum;
    }

    /**
     * @param string $identitynum
     * @return RegisterEntityRequest
     */
    public function setIdentitynum($identitynum)
    {
      $this->identitynum = $identitynum;
      return $this;
    }

    /**
     * @return string
     */
    public function getIdentitytype()
    {
      return $this->identitytype;
    }

    /**
     * @param string $identitytype
     * @return RegisterEntityRequest
     */
    public function setIdentitytype($identitytype)
    {
      $this->identitytype = $identitytype;
      return $this;
    }

    /**
     * @return string
     */
    public function getInforeference()
    {
      return $this->inforeference;
    }

    /**
     * @param string $inforeference
     * @return RegisterEntityRequest
     */
    public function setInforeference($inforeference)
    {
      $this->inforeference = $inforeference;
      return $this;
    }

    /**
     * @return string
     */
    public function getInvestmentobjectives()
    {
      return $this->investmentobjectives;
    }

    /**
     * @param string $investmentobjectives
     * @return RegisterEntityRequest
     */
    public function setInvestmentobjectives($investmentobjectives)
    {
      $this->investmentobjectives = $investmentobjectives;
      return $this;
    }

    /**
     * @return string
     */
    public function getInvestmentobjectivesother()
    {
      return $this->investmentobjectivesother;
    }

    /**
     * @param string $investmentobjectivesother
     * @return RegisterEntityRequest
     */
    public function setInvestmentobjectivesother($investmentobjectivesother)
    {
      $this->investmentobjectivesother = $investmentobjectivesother;
      return $this;
    }

    /**
     * @return string
     */
    public function getInvestortype()
    {
      return $this->investortype;
    }

    /**
     * @param string $investortype
     * @return RegisterEntityRequest
     */
    public function setInvestortype($investortype)
    {
      $this->investortype = $investortype;
      return $this;
    }

    /**
     * @return string
     */
    public function getMaritalstatus()
    {
      return $this->maritalstatus;
    }

    /**
     * @param string $maritalstatus
     * @return RegisterEntityRequest
     */
    public function setMaritalstatus($maritalstatus)
    {
      $this->maritalstatus = $maritalstatus;
      return $this;
    }

    /**
     * @return string
     */
    public function getMothername()
    {
      return $this->mothername;
    }

    /**
     * @param string $mothername
     * @return RegisterEntityRequest
     */
    public function setMothername($mothername)
    {
      $this->mothername = $mothername;
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
     * @return RegisterEntityRequest
     */
    public function setNationality($nationality)
    {
      $this->nationality = $nationality;
      return $this;
    }

    /**
     * @return string
     */
    public function getOccupationalannualincome()
    {
      return $this->occupationalannualincome;
    }

    /**
     * @param string $occupationalannualincome
     * @return RegisterEntityRequest
     */
    public function setOccupationalannualincome($occupationalannualincome)
    {
      $this->occupationalannualincome = $occupationalannualincome;
      return $this;
    }

    /**
     * @return string
     */
    public function getOccupationalcity()
    {
      return $this->occupationalcity;
    }

    /**
     * @param string $occupationalcity
     * @return RegisterEntityRequest
     */
    public function setOccupationalcity($occupationalcity)
    {
      $this->occupationalcity = $occupationalcity;
      return $this;
    }

    /**
     * @return string
     */
    public function getOccupationalcountry()
    {
      return $this->occupationalcountry;
    }

    /**
     * @param string $occupationalcountry
     * @return RegisterEntityRequest
     */
    public function setOccupationalcountry($occupationalcountry)
    {
      $this->occupationalcountry = $occupationalcountry;
      return $this;
    }

    /**
     * @return string
     */
    public function getOccupationalpostalcode()
    {
      return $this->occupationalpostalcode;
    }

    /**
     * @param string $occupationalpostalcode
     * @return RegisterEntityRequest
     */
    public function setOccupationalpostalcode($occupationalpostalcode)
    {
      $this->occupationalpostalcode = $occupationalpostalcode;
      return $this;
    }
    
    /**
     * @return string
     */
    public function getOccupationalphone()
    {
      return $this->occupationalphone;
    }

    /**
     * @param string $occupationalphone
     * @return RegisterEntityRequest
     */
    public function setOccupationalphone($occupationalphone)
    {
      $this->occupationalphone = $occupationalphone;
      return $this;
    }

    /**
     * @return string
     */
    public function getOccupationalincomefrequency()
    {
      return $this->occupationalincomefrequency;
    }

    /**
     * @param string $occupationalincomefrequency
     * @return RegisterEntityRequest
     */
    public function setOccupationalincomefrequency($occupationalincomefrequency)
    {
      $this->occupationalincomefrequency = $occupationalincomefrequency;
      return $this;
    }

    /**
     * @return string
     */
    public function getOccupationaljobposition()
    {
      return $this->occupationaljobposition;
    }

    /**
     * @param string $occupationaljobposition
     * @return RegisterEntityRequest
     */
    public function setOccupationaljobposition($occupationaljobposition)
    {
      $this->occupationaljobposition = $occupationaljobposition;
      return $this;
    }

    /**
     * @return string
     */
    public function getOccupationallinebusiness()
    {
      return $this->occupationallinebusiness;
    }

    /**
     * @param string $occupationallinebusiness
     * @return RegisterEntityRequest
     */
    public function setOccupationallinebusiness($occupationallinebusiness)
    {
      $this->occupationallinebusiness = $occupationallinebusiness;
      return $this;
    }

    /**
     * @return string
     */
    public function getOccupationalmonthlyincome()
    {
      return $this->occupationalmonthlyincome;
    }

    /**
     * @param string $occupationalmonthlyincome
     * @return RegisterEntityRequest
     */
    public function setOccupationalmonthlyincome($occupationalmonthlyincome)
    {
      $this->occupationalmonthlyincome = $occupationalmonthlyincome;
      return $this;
    }

    /**
     * @return string
     */
    public function getOccupationalnetworth()
    {
      return $this->occupationalnetworth;
    }

    /**
     * @param string $occupationalnetworth
     * @return RegisterEntityRequest
     */
    public function setOccupationalnetworth($occupationalnetworth)
    {
      $this->occupationalnetworth = $occupationalnetworth;
      return $this;
    }

    /**
     * @return string
     */
    public function getOccupationalprovince()
    {
      return $this->occupationalprovince;
    }

    /**
     * @param string $occupationalprovince
     * @return RegisterEntityRequest
     */
    public function setOccupationalprovince($occupationalprovince)
    {
      $this->occupationalprovince = $occupationalprovince;
      return $this;
    }

    /**
     * @return string
     */
    public function getOccupationalsourceofincome()
    {
      return $this->occupationalsourceofincome;
    }

    /**
     * @param string $occupationalsourceofincome
     * @return RegisterEntityRequest
     */
    public function setOccupationalsourceofincome($occupationalsourceofincome)
    {
      $this->occupationalsourceofincome = $occupationalsourceofincome;
      return $this;
    }

    /**
     * @return string
     */
    public function getOccupationalsourceofincomeother()
    {
      return $this->occupationalsourceofincomeother;
    }

    /**
     * @param string $occupationalsourceofincomeother
     * @return RegisterEntityRequest
     */
    public function setOccupationalsourceofincomeother($occupationalsourceofincomeother)
    {
      $this->occupationalsourceofincomeother = $occupationalsourceofincomeother;
      return $this;
    }

    /**
     * @return string
     */
    public function getOccupationalstreet()
    {
      return $this->occupationalstreet;
    }

    /**
     * @param string $occupationalstreet
     * @return RegisterEntityRequest
     */
    public function setOccupationalstreet($occupationalstreet)
    {
      $this->occupationalstreet = $occupationalstreet;
      return $this;
    }

    /**
     * @return string
     */
    public function getOccupationalhousing()
    {
      return $this->occupationalhousing;
    }

    /**
     * @param string $occupationalhousing
     * @return RegisterEntityRequest
     */
    public function setOccupationalhousing($occupationalhousing)
    {
      $this->occupationalhousing = $occupationalhousing;
      return $this;
    }

    /**
     * @return string
     */
    public function getOccupationalsubdistrict()
    {
      return $this->occupationalsubdistrict;
    }

    /**
     * @param string $occupationalsubdistrict
     * @return RegisterEntityRequest
     */
    public function setOccupationalsubdistrict($occupationalsubdistrict)
    {
      $this->occupationalsubdistrict = $occupationalsubdistrict;
      return $this;
    }

    /**
     * @return string
     */
    public function getOccupationaltype()
    {
      return $this->occupationaltype;
    }

    /**
     * @param string $occupationaltype
     * @return RegisterEntityRequest
     */
    public function setOccupationaltype($occupationaltype)
    {
      $this->occupationaltype = $occupationaltype;
      return $this;
    }

    /**
     * @return string
     */
    public function getOccupationaltypeother()
    {
      return $this->occupationaltypeother;
    }

    /**
     * @param string $occupationaltypeother
     * @return RegisterEntityRequest
     */
    public function setOccupationaltypeother($occupationaltypeother)
    {
      $this->occupationaltypeother = $occupationaltypeother;
      return $this;
    }

    /**
     * @return string
     */
    public function getOccupationalvillage()
    {
      return $this->occupationalvillage;
    }

    /**
     * @param string $occupationalvillage
     * @return RegisterEntityRequest
     */
    public function setOccupationalvillage($occupationalvillage)
    {
      $this->occupationalvillage = $occupationalvillage;
      return $this;
    }

    /**
     * @return string
     */
    public function getOccupationalworkingplace()
    {
      return $this->occupationalworkingplace;
    }

    /**
     * @param string $occupationalworkingplace
     * @return RegisterEntityRequest
     */
    public function setOccupationalworkingplace($occupationalworkingplace)
    {
      $this->occupationalworkingplace = $occupationalworkingplace;
      return $this;
    }

    /**
     * @return string
     */
    public function getOnlinetype()
    {
      return $this->onlinetype;
    }

    /**
     * @param string $onlinetype
     * @return RegisterEntityRequest
     */
    public function setOnlinetype($onlinetype)
    {
      $this->onlinetype = $onlinetype;
      return $this;
    }

    /**
     * @return string
     */
    public function getOtherinfoemployeeof()
    {
      return $this->otherinfoemployeeof;
    }

    /**
     * @param string $otherinfoemployeeof
     * @return RegisterEntityRequest
     */
    public function setOtherinfoemployeeof($otherinfoemployeeof)
    {
      $this->otherinfoemployeeof = $otherinfoemployeeof;
      return $this;
    }

    /**
     * @return string
     */
    public function getOtherinfoemployeeofcompany()
    {
      return $this->otherinfoemployeeofcompany;
    }

    /**
     * @param string $otherinfoemployeeofcompany
     * @return RegisterEntityRequest
     */
    public function setOtherinfoemployeeofcompany($otherinfoemployeeofcompany)
    {
      $this->otherinfoemployeeofcompany = $otherinfoemployeeofcompany;
      return $this;
    }

    /**
     * @return string
     */
    public function getOtherinfoemployeeofname()
    {
      return $this->otherinfoemployeeofname;
    }

    /**
     * @param string $otherinfoemployeeofname
     * @return RegisterEntityRequest
     */
    public function setOtherinfoemployeeofname($otherinfoemployeeofname)
    {
      $this->otherinfoemployeeofname = $otherinfoemployeeofname;
      return $this;
    }

    /**
     * @return string
     */
    public function getOtherinfohavegreencard()
    {
      return $this->otherinfohavegreencard;
    }

    /**
     * @param string $otherinfohavegreencard
     * @return RegisterEntityRequest
     */
    public function setOtherinfohavegreencard($otherinfohavegreencard)
    {
      $this->otherinfohavegreencard = $otherinfohavegreencard;
      return $this;
    }

    /**
     * @return string
     */
    public function getOtherinfopoliticperson()
    {
      return $this->otherinfopoliticperson;
    }

    /**
     * @param string $otherinfopoliticperson
     * @return RegisterEntityRequest
     */
    public function setOtherinfopoliticperson($otherinfopoliticperson)
    {
      $this->otherinfopoliticperson = $otherinfopoliticperson;
      return $this;
    }

    /**
     * @return string
     */
    public function getOtherinfoprohibited()
    {
      return $this->otherinfoprohibited;
    }

    /**
     * @param string $otherinfoprohibited
     * @return RegisterEntityRequest
     */
    public function setOtherinfoprohibited($otherinfoprohibited)
    {
      $this->otherinfoprohibited = $otherinfoprohibited;
      return $this;
    }

    /**
     * @return string
     */
    public function getOtherinfoprohibitedcompany()
    {
      return $this->otherinfoprohibitedcompany;
    }

    /**
     * @param string $otherinfoprohibitedcompany
     * @return RegisterEntityRequest
     */
    public function setOtherinfoprohibitedcompany($otherinfoprohibitedcompany)
    {
      $this->otherinfoprohibitedcompany = $otherinfoprohibitedcompany;
      return $this;
    }

    /**
     * @return string
     */
    public function getOtherinfoprohibitedname()
    {
      return $this->otherinfoprohibitedname;
    }

    /**
     * @param string $otherinfoprohibitedname
     * @return RegisterEntityRequest
     */
    public function setOtherinfoprohibitedname($otherinfoprohibitedname)
    {
      $this->otherinfoprohibitedname = $otherinfoprohibitedname;
      return $this;
    }

    /**
     * @return string
     */
    public function getOtherinfotaxoutsideindonesia()
    {
      return $this->otherinfotaxoutsideindonesia;
    }

    /**
     * @param string $otherinfotaxoutsideindonesia
     * @return RegisterEntityRequest
     */
    public function setOtherinfotaxoutsideindonesia($otherinfotaxoutsideindonesia)
    {
      $this->otherinfotaxoutsideindonesia = $otherinfotaxoutsideindonesia;
      return $this;
    }

    /**
     * @return string
     */
    public function getPhone()
    {
      return $this->phone;
    }

    /**
     * @param string $phone
     * @return RegisterEntityRequest
     */
    public function setPhone($phone)
    {
      $this->phone = $phone;
      return $this;
    }

    /**
     * @return string
     */
    public function getProducttype()
    {
      return $this->producttype;
    }

    /**
     * @param string $producttype
     * @return RegisterEntityRequest
     */
    public function setProducttype($producttype)
    {
      $this->producttype = $producttype;
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
     * @return RegisterEntityRequest
     */
    public function setReferral($referral)
    {
      $this->referral = $referral;
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
     * @return RegisterEntityRequest
     */
    public function setRegid($regid)
    {
      $this->regid = $regid;
      return $this;
    }

    /**
     * @return string
     */
    public function getReligion()
    {
      return $this->religion;
    }

    /**
     * @param string $religion
     * @return RegisterEntityRequest
     */
    public function setReligion($religion)
    {
      $this->religion = $religion;
      return $this;
    }

    /**
     * @return string
     */
    public function getRiskprofileagreeincome()
    {
      return $this->riskprofileagreeincome;
    }

    /**
     * @param string $riskprofileagreeincome
     * @return RegisterEntityRequest
     */
    public function setRiskprofileagreeincome($riskprofileagreeincome)
    {
      $this->riskprofileagreeincome = $riskprofileagreeincome;
      return $this;
    }

    /**
     * @return string
     */
    public function getRiskprofileknowledge()
    {
      return $this->riskprofileknowledge;
    }

    /**
     * @param string $riskprofileknowledge
     * @return RegisterEntityRequest
     */
    public function setRiskprofileknowledge($riskprofileknowledge)
    {
      $this->riskprofileknowledge = $riskprofileknowledge;
      return $this;
    }

    /**
     * @return string
     */
    public function getRiskprofilelonginvest()
    {
      return $this->riskprofilelonginvest;
    }

    /**
     * @param string $riskprofilelonginvest
     * @return RegisterEntityRequest
     */
    public function setRiskprofilelonginvest($riskprofilelonginvest)
    {
      $this->riskprofilelonginvest = $riskprofilelonginvest;
      return $this;
    }

    /**
     * @return string
     */
    public function getRiskprofileloss()
    {
      return $this->riskprofileloss;
    }

    /**
     * @param string $riskprofileloss
     * @return RegisterEntityRequest
     */
    public function setRiskprofileloss($riskprofileloss)
    {
      $this->riskprofileloss = $riskprofileloss;
      return $this;
    }

    /**
     * @return string
     */
    public function getRiskprofilepurpose()
    {
      return $this->riskprofilepurpose;
    }

    /**
     * @param string $riskprofilepurpose
     * @return RegisterEntityRequest
     */
    public function setRiskprofilepurpose($riskprofilepurpose)
    {
      $this->riskprofilepurpose = $riskprofilepurpose;
      return $this;
    }

    /**
     * @return string
     */
    public function getRiskprofiletotalscore()
    {
      return $this->riskprofiletotalscore;
    }

    /**
     * @param string $riskprofiletotalscore
     * @return RegisterEntityRequest
     */
    public function setRiskprofiletotalscore($riskprofiletotalscore)
    {
      $this->riskprofiletotalscore = $riskprofiletotalscore;
      return $this;
    }

    /**
     * @return string
     */
    public function getSource()
    {
      return $this->source;
    }

    /**
     * @param string $source
     * @return RegisterEntityRequest
     */
    public function setSource($source)
    {
      $this->source = $source;
      return $this;
    }

    /**
     * @return string
     */
    public function getSpousefullname()
    {
      return $this->spousefullname;
    }

    /**
     * @param string $spousefullname
     * @return RegisterEntityRequest
     */
    public function setSpousefullname($spousefullname)
    {
      $this->spousefullname = $spousefullname;
      return $this;
    }

    /**
     * @return string
     */
    public function getTaxiddonthave()
    {
      return $this->taxiddonthave;
    }

    /**
     * @param string $taxiddonthave
     * @return RegisterEntityRequest
     */
    public function setTaxiddonthave($taxiddonthave)
    {
      $this->taxiddonthave = $taxiddonthave;
      return $this;
    }

    /**
     * @return string
     */
    public function getTaxidnum()
    {
      return $this->taxidnum;
    }

    /**
     * @param string $taxidnum
     * @return RegisterEntityRequest
     */
    public function setTaxidnum($taxidnum)
    {
      $this->taxidnum = $taxidnum;
      return $this;
    }

}
