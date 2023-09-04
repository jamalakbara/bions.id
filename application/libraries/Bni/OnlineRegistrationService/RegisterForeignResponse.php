<?php

class RegisterForeignResponse
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
     * @return \registerForeignResponse
     */
    public function setReturn($return)
    {
      $this->return = $return;
      return $this;
    }

}
