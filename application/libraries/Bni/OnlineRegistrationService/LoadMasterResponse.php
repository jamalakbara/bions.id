<?php

class LoadMasterResponse
{

    /**
     * @var anyType $return
     */
    protected $return = null;

    /**
     * @return anyType
     */
    public function getReturn()
    {
      return $this->return;
    }

    /**
     * @param anyType $return
     * @return \loadMasterResponse
     */
    public function setReturn($return)
    {
      $this->return = $return;
      return $this;
    }

}
