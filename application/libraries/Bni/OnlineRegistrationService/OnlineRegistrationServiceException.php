<?php

 

class OnlineRegistrationServiceException
{

    /**
     * @var Exception $OnlineRegistrationServiceException
     */
    protected $OnlineRegistrationServiceException = null;

    /**
     * @param Exception $OnlineRegistrationServiceException
     */
    public function __construct($OnlineRegistrationServiceException)
    {
      $this->OnlineRegistrationServiceException = $OnlineRegistrationServiceException;
    }

    /**
     * @return Exception
     */
    public function getOnlineRegistrationServiceException()
    {
      return $this->OnlineRegistrationServiceException;
    }

    /**
     * @param Exception $OnlineRegistrationServiceException
     * @return \OnlineRegistrationServiceException
     */
    public function setOnlineRegistrationServiceException($OnlineRegistrationServiceException)
    {
      $this->OnlineRegistrationServiceException = $OnlineRegistrationServiceException;
      return $this;
    }

}
