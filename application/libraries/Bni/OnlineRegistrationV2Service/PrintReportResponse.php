<?php

class PrintReportResponse
{

    /**
     * @var string $return
     */
    protected $return = null;

    /**
     * @param string $return
     */
    public function __construct()
    {
    }

    /**
     * @return string
     */
    public function getReturn()
    {
      return $this->return;
    }

    /**
     * @param string $return
     * @return printReportResponse
     */
    public function setReturn($return)
    {
      $this->return = $return;
      return $this;
    }

}
