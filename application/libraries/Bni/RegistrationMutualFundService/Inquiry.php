<?php

class Inquiry
{

    /**
     * @var string $p
     */
    protected $p = null;

    /**
     * @var boolean $isSendEmail
     */
    protected $isSendEmail = null;

    /**
     * @param string $p
     * @param boolean $isSendEmail
     */
    public function __construct($p, $isSendEmail)
    {
      $this->p = $p;
      $this->isSendEmail = $isSendEmail;
    }

    /**
     * @return string
     */
    public function getP()
    {
      return $this->p;
    }

    /**
     * @param string $p
     * @return inquiry
     */
    public function setP($p)
    {
      $this->p = $p;
      return $this;
    }

    /**
     * @return boolean
     */
    public function getIsSendEmail()
    {
      return $this->isSendEmail;
    }

    /**
     * @param boolean $isSendEmail
     * @return inquiry
     */
    public function setIsSendEmail($isSendEmail)
    {
      $this->isSendEmail = $isSendEmail;
      return $this;
    }

}
