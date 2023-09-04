<?php

class InquiryResponse
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
     * @return \inquiryResponse
     */
    public function setReturn($return)
    {
      $this->return = $return;
      return $this;
    }

}
