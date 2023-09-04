<?php

class PingResponse
{

    /**
     * @var boolean $return
     */
    protected $return = null;

    /**
     * @return boolean
     */
    public function getReturn()
    {
      return $this->return;
    }

    /**
     * @param boolean $return
     * @return \pingResponse
     */
    public function setReturn($return)
    {
      $this->return = $return;
      return $this;
    }

}
