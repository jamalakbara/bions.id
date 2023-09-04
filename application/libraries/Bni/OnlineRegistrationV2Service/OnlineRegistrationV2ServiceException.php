<?php

class OnlineRegistrationV2ServiceException
{

    /**
     * @var Exception $OnlineRegistrationV2ServiceException
     */
    protected $OnlineRegistrationV2ServiceException = null;

    /**
     * @param Exception $OnlineRegistrationV2ServiceException
     */
    public function __construct()
    {
    }

    /**
     * @return Exception
     */
    public function getOnlineRegistrationV2ServiceException()
    {
      return $this->OnlineRegistrationV2ServiceException;
    }

    /**
     * @param Exception $OnlineRegistrationV2ServiceException
     * @return OnlineRegistrationV2ServiceException
     */
    public function setOnlineRegistrationV2ServiceException($OnlineRegistrationV2ServiceException)
    {
      $this->OnlineRegistrationV2ServiceException = $OnlineRegistrationV2ServiceException;
      return $this;
    }

}
