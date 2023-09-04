<?php

class RegisterResponse
{

    /**
     * @var string $return
     */
    protected $return = null;

    /**
     * @return string
     */
    public function getReturn()
    {
      return $this->return;
    }

    /**
     * @param string $return
     * @return \registerResponse
     */
    public function setReturn($return)
    {
      $this->return = $return;
      return $this;
    }

}
