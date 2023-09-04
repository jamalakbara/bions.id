<?php

class RegisterResponse
{

    /**
     * @var RegisterEntityResponse $return
     */
    protected $return = null;

    /**
     * @param RegisterEntityResponse $return
     */
    public function __construct()
    {
     
    }

    /**
     * @return RegisterEntityResponse
     */
    public function getReturn()
    {
      return $this->return;
    }

    /**
     * @param RegisterEntityResponse $return
     * @return registerResponse
     */
    public function setReturn($return)
    {
      $this->return = $return;
      return $this;
    }

}
