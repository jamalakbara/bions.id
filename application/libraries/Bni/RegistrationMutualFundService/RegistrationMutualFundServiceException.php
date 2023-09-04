<?php

class RegistrationMutualFundServiceException
{

    /**
     * @var Exception $RegistrationMutualFundServiceException
     */
    protected $RegistrationMutualFundServiceException = null;

    /**
     * @param Exception $RegistrationMutualFundServiceException
     */
    public function __construct($RegistrationMutualFundServiceException)
    {
      $this->RegistrationMutualFundServiceException = $RegistrationMutualFundServiceException;
    }

    /**
     * @return Exception
     */
    public function getRegistrationMutualFundServiceException()
    {
      return $this->RegistrationMutualFundServiceException;
    }

    /**
     * @param Exception $RegistrationMutualFundServiceException
     * @return RegistrationMutualFundServiceException
     */
    public function setRegistrationMutualFundServiceException($RegistrationMutualFundServiceException)
    {
      $this->RegistrationMutualFundServiceException = $RegistrationMutualFundServiceException;
      return $this;
    }

}
