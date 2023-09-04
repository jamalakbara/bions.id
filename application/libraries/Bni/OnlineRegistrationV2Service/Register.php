<?php

class Register
{

    /**
     * @var RegisterEntityRequest $request
     */
    protected $request = null;

    /**
     * @param RegisterEntityRequest $request
     */
    public function __construct()
    {
    }

    /**
     * @return RegisterEntityRequest
     */
    public function getRequest()
    {
      return $this->request;
    }

    /**
     * @param RegisterEntityRequest $request
     * @return register
     */
    public function setRequest($request)
    {
      $this->request = $request;
      return $this;
    }

}
