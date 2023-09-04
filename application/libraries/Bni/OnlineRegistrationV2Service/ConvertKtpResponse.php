<?php

class ConvertKtpResponse
{

    /**
     * @var OcrResponse $return
     */
    protected $return = null;

    /**
     * @param OcrResponse $return
     */
    public function __construct($return)
    {
      $this->return = $return;
    }

    /**
     * @return OcrResponse
     */
    public function getReturn()
    {
      return $this->return;
    }

    /**
     * @param OcrResponse $return
     * @return convertKtpResponse
     */
    public function setReturn($return)
    {
      $this->return = $return;
      return $this;
    }

}
