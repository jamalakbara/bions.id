<?php

class inquiryReksadanaResponse
{

    /**
     * @var boolean $return
     */
    protected $return = null;

    /**
     * @param boolean $return
     */
    public function __construct($return)
    {
      $this->return = $return;
    }

    /**
     * @return boolean
     */
    public function getReturn()
    {
      return $this->return;
    }

    /**
     * @param boolean $return
     * @return inquiryReksadanaResponse
     */
    public function setReturn($return)
    {
      $this->return = $return;
      return $this;
    }

}
