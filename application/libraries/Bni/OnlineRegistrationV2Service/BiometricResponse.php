<?php

class BiometricResponse
{

    /**
     * @var BiometricEntityResponse $return
     */
    protected $return = null;

    /**
     * @param BiometricEntityResponse $return
     */
    public function __construct()
    {
      
    }

    /**
     * @return BiometricEntityResponse
     */
    public function getReturn()
    {
      return $this->return;
    }

    /**
     * @param BiometricEntityResponse $return
     * @return biometricResponse
     */
    public function setReturn($return)
    {
      $this->return = $return;
      return $this;
    }

}
