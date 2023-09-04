<?php

class Register
{

    /**
     * @var string $p
     */
    protected $p = null;

    /**
     * @param string $p
     */
    public function __construct($p)
    {
      $this->p = $p;
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
     * @return register
     */
    public function setP($p)
    {
      $this->p = $p;
      return $this;
    }

}
