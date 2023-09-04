<?php

class ExceptionCustom
{

    /**
     * @var string $Message
     */
    protected $Message = null;

    
    public function __construct()
    {
    
    }

    /**
     * @return string
     */
    public function getMessage()
    {
      return $this->Message;
    }

    /**
     * @param string $Message
     * @return Exception
     */
    public function setMessage($Message)
    {
      $this->Message = $Message;
      return $this;
    }

}
