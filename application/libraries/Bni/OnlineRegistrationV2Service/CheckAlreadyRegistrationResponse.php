<?php

class CheckAlreadyRegistrationResponse
{

    /**
     * @var CheckAlreadyRegistrationEntityResponse $return
     */
    protected $return = null;

    /**
     * @param CheckAlreadyRegistrationEntityResponse $return
     */
    public function __construct()
    {}

    /**
     * @return CheckAlreadyRegistrationEntityResponse
     */
    public function getReturn()
    {
      return $this->return;
    }

    /**
     * @param CheckAlreadyRegistrationEntityResponse $return
     * @return checkAlreadyRegistrationResponse
     */
    public function setReturn($return)
    {
      $this->return = $return;
      return $this;
    }

}
